<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ApiDataController extends Controller
{
    private const TABLES = [
        'abouts', 'add_on', 'authorities', 'awards', 'banners', 'benefits',
        'blogs', 'business_inquiries', 'catalog', 'categories', 'category_add_on',
        'category_footer', 'certificates', 'concepts', 'configurations', 'counters',
        'faqs', 'features', 'forewords', 'galleries', 'gallery', 'headlines',
        'lamaran_pekerjaan', 'lowongan_pekerjaan', 'menus', 'menu_footer', 'offices',
        'pages', 'partners', 'portfolios', 'products', 'services', 'sliders',
        'sosmed', 'submenus', 'subsidiaries', 'superiorities', 'teams',
        'technologies', 'testimonials', 'trade_finance_support', 'trade_networks',
    ];

    private const HIDDEN_COLUMNS = [
        'password', 'remember_token', 'token', 'payload', 'exception',
        'user_agent', 'ip_address',
    ];

    public function tables(): JsonResponse
    {
        $tables = collect(self::TABLES)
            ->filter(fn (string $table): bool => Schema::hasTable($table))
            ->values();

        return response()->json([
            'data' => $tables,
            'count' => $tables->count(),
        ]);
    }

  public function index(Request $request, string $table): JsonResponse
    {
        $table = $this->validatedTable($table);
        $columns = $this->publicColumns($table);

        $validated = $request->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'per_page' => ['nullable', 'integer', 'min:1', 'max:100'],
            'sort' => ['nullable', 'string', 'max:64'],
            'direction' => ['nullable', 'in:asc,desc'],
            'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
        ]);

        $query = $this->query($table)->select($columns);

        // Search
        $search = $validated['search'] ?? null;
        $searchableColumns = $this->searchableColumns($table);

        if ($search && $searchableColumns !== []) {
            $query->where(function (Builder $query) use ($search, $searchableColumns): void {
                foreach ($searchableColumns as $column) {
                    $query->orWhere($column, 'like', "%{$search}%");
                }
            });
        }

        // Sort
        $sort = $validated['sort'] ?? $this->defaultSort($columns);

        abort_unless(
            in_array($sort, $columns, true),
            422,
            'Kolom sort tidak tersedia pada tabel ini.'
        );

        $direction = $validated['direction'] ?? 'desc';

        $query->orderBy($sort, $direction);

        /*
        |--------------------------------------------------------------------------
        | Configurations
        |--------------------------------------------------------------------------
        */

        if ($table === 'configurations') {
            return response()->json(
                $query->first()
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Limit
        |--------------------------------------------------------------------------
        |
        | Contoh:
        | ?limit=5
        | ?limit=10
        |
        */

        if (isset($validated['limit'])) {
            return response()->json([
                'data' => $query
                    ->limit($validated['limit'])
                    ->get(),
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Pagination default
        |--------------------------------------------------------------------------
        */

        return response()->json(
            $query
                ->paginate($validated['per_page'] ?? 20)
                ->withQueryString()
        );
    }

    private function query(string $table): Builder
    {
        return app('db')->table($table);
    }

    private function validatedTable(string $table): string
    {
        abort_unless(in_array($table, self::TABLES, true), 404, 'Tabel API tidak ditemukan.');
        abort_unless(Schema::hasTable($table), 404, 'Tabel belum tersedia di database.');

        return $table;
    }

    private function publicColumns(string $table): array
    {
        $columns = array_values(array_diff(Schema::getColumnListing($table), self::HIDDEN_COLUMNS));
        abort_unless($columns !== [], 404, 'Tabel tidak memiliki kolom publik.');

        return $columns;
    }

    private function searchableColumns(string $table): array
    {
        return collect($this->publicColumns($table))
            ->filter(function (string $column) use ($table): bool {
                return in_array(Schema::getColumnType($table, $column), ['char', 'string', 'text'], true);
            })
            ->values()
            ->all();
    }

    private function defaultSort(array $columns): string
    {
        return in_array('id', $columns, true) ? 'id' : $columns[0];
    }

   public function show(Request $request, string $table, string $url): JsonResponse
    {
        $table = $this->validatedTable($table);
        $columns = $this->publicColumns($table);

        $data = $this->query($table)
            ->select($columns)
            ->where('url', $url)
            ->first();

        if (!$data) {
            return response()->json([
                'message' => 'Data tidak ditemukan.'
            ], 404);
        }

        return response()->json($data);
    }
}
