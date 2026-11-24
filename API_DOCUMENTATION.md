# Compro API Documentation

Dokumentasi endpoint GET untuk mengambil data tabel bisnis dari frontend.

## Base URL

Jika server dijalankan pada port 8001:

```text
http://127.0.0.1:8001/api
```

Jika server dijalankan pada port 8000:

```text
http://127.0.0.1:8000/api
```

Jalankan server dengan:

```bash
php artisan serve --host=127.0.0.1 --port=8001
```

## 1. Melihat Tabel yang Tersedia

```http
GET /api/tables
```

Contoh:

```text
http://127.0.0.1:8001/api/tables
```

Response:

```json
{
  "data": ["sliders", "products", "blogs"],
  "count": 3
}
```

Hanya tabel yang benar-benar tersedia di database yang dikirim oleh endpoint ini.

## 2. Mengambil Data Slider

```http
GET /api/data/sliders
```

Contoh lengkap:

```text
http://127.0.0.1:8001/api/data/sliders?per_page=20&direction=desc
```

Untuk pencarian slider:

```text
http://127.0.0.1:8001/api/data/sliders?search=promo&per_page=10
```

Untuk sorting:

```text
http://127.0.0.1:8001/api/data/sliders?sort=created_at&direction=desc
```

Nilai `sort` harus berupa nama kolom yang memang ada pada tabel `sliders`.

## 3. Mengambil Data Tabel Lain

Pola URL untuk semua tabel bisnis:

```http
GET /api/data/{nama_tabel}
```

Contoh endpoint:

```text
GET /api/data/products
GET /api/data/blogs
GET /api/data/categories
GET /api/data/services
GET /api/data/portfolios
GET /api/data/banners
GET /api/data/pages
GET /api/data/teams
GET /api/data/testimonials
GET /api/data/technologies
GET /api/data/galleries
GET /api/data/awards
GET /api/data/faqs
```

Nama tabel yang tersedia dapat dilihat melalui `GET /api/tables`. Gunakan nama tabel persis seperti yang dikembalikan oleh endpoint tersebut.

## 4. Parameter Query

Semua endpoint `/api/data/{nama_tabel}` mendukung parameter berikut:

| Parameter | Wajib | Contoh | Keterangan |
| --- | --- | --- | --- |
| `search` | Tidak | `promo` | Mencari pada semua kolom teks tabel |
| `per_page` | Tidak | `20` | Jumlah data per halaman, minimum 1, maksimum 100 |
| `sort` | Tidak | `created_at` | Nama kolom untuk sorting |
| `direction` | Tidak | `asc` atau `desc` | Arah sorting |
| `page` | Tidak | `2` | Nomor halaman pagination |

Contoh gabungan:

```text
GET /api/data/products?search=computer&per_page=10&sort=name&direction=asc&page=1
```

## 5. Format Response

Response menggunakan format pagination Laravel:

```json
{
  "current_page": 1,
  "data": [
    {
      "id": 1,
      "name": "Contoh data",
      "created_at": "2026-09-24T10:00:00.000000Z"
    }
  ],
  "first_page_url": "http://127.0.0.1:8001/api/data/products?page=1",
  "from": 1,
  "last_page": 1,
  "last_page_url": "http://127.0.0.1:8001/api/data/products?page=1",
  "next_page_url": null,
  "path": "http://127.0.0.1:8001/api/data/products",
  "per_page": 20,
  "prev_page_url": null,
  "to": 1,
  "total": 1
}
```

Frontend mengambil data dari property `data`:

```javascript
const response = await fetch(
  'http://127.0.0.1:8001/api/data/sliders?per_page=20'
);

const result = await response.json();
const sliders = result.data;
```

Contoh React:

```javascript
useEffect(() => {
  fetch('http://127.0.0.1:8001/api/data/sliders?per_page=20')
    .then((response) => response.json())
    .then((result) => setSliders(result.data));
}, []);
```

## 6. Endpoint User

Daftar user:

```http
GET /api/users?per_page=20
```

Detail user:

```http
GET /api/users/1
```

## 7. Health Check

Untuk memeriksa apakah API aktif:

```http
GET /api/health
```

Response:

```json
{
  "status": "ok",
  "service": "Compro API"
}
```

## 8. Keamanan Data

Endpoint data tidak membuka tabel internal Laravel seperti `cache`, `jobs`, `sessions`, dan `migrations`.

Kolom sensitif berikut tidak dikirim ke frontend:

- `password`
- `remember_token`
- `token`
- `payload`
- `exception`
- `user_agent`
- `ip_address`

Collection Postman tersedia di `Compro API.postman_collection.json`.
