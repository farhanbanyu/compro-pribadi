<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'per_page' => ['nullable', 'integer', 'min:1', 'max:100'],
            'sort' => ['nullable', 'in:id,name,email,created_at'],
            'direction' => ['nullable', 'in:asc,desc'],
        ]);

        $users = User::query()
            ->select(['id', 'name', 'email', 'created_at'])
            ->when($validated['search'] ?? null, function ($query, string $search): void {
                $query->where(function ($query) use ($search): void {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%");
                });
            })
            ->orderBy($validated['sort'] ?? 'id', $validated['direction'] ?? 'desc')
            ->paginate($validated['per_page'] ?? 20)
            ->withQueryString();

        return response()->json($users);
    }

    public function show(User $user): JsonResponse
    {
        return response()->json([
            'data' => $user->only(['id', 'name', 'email', 'created_at', 'updated_at']),
        ]);
    }
}
