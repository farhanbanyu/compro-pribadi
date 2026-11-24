<x-backend.layouts>
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Edit {{ $title }}</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i
                                    class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">{{ $title }}</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Edit {{ $title }}</h2>
                </div>
                <div class="body">
                    <form id="basic-form" action="{{ $base_url . '/update' }}" class="_form" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="form-group">
                            <label>Judul Pekerjaan</label>
                            <input type="text" name="judul_pekerjaan" class="form-control" required
                                value="{{ $item->judul_pekerjaan }}">
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" required
                                value="{{ $item->lokasi }}">
                        </div>
                        <div class="form-group">
                            <label>Tipe Pekerjaan</label>
                            <select name="tipe_pekerjaan" class="form-control">
                                <option value="Full-time"
                                    {{ $item->tipe_pekerjaan == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                <option value="Part-time"
                                    {{ $item->tipe_pekerjaan == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                <option value="Contract"
                                    {{ $item->tipe_pekerjaan == 'Contract' ? 'selected' : '' }}>Contract</option>
                                <option value="Freelance"
                                    {{ $item->tipe_pekerjaan == 'Freelance' ? 'selected' : '' }}>Freelance</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" class="form-control"
                                value="{{ $item->tanggal_mulai }}">
                        </div>
                        <div class="form-group">
                            <label>Tanggal Berakhir</label>
                            <input type="date" name="tanggal_berakhir" class="form-control"
                                value="{{ $item->tanggal_berakhir }}">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control summernote">{{ $item->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Kualifikasi</label>
                            <textarea name="kualifikasi" class="form-control summernote">{{ $item->kualifikasi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="Buka" {{ $item->status == 'Buka' ? 'selected' : '' }}>Buka</option>
                                <option value="Tutup" {{ $item->status == 'Tutup' ? 'selected' : '' }}>Tutup</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="js">
        <link rel="stylesheet" href="{{ asset('backend/assets/vendor/summernote/dist/summernote.css') }}" />
        <script src="{{ asset('backend/assets/vendor/summernote/dist/summernote.js') }}"></script>
        <script type="text/javascript" src="{{ asset('backend/system/crud/post.js') }}"></script>
    </x-slot>
</x-backend.layouts>

