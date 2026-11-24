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
                            <label>Nama Office</label>
                            <input type="text" name="nama_office" class="form-control" required
                                value="{{ $item->nama_office }}">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3">{{ $item->alamat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Telepon</label>
                            <input type="text" name="telepon" class="form-control" value="{{ $item->telepon }}">
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <select name="tipe" class="form-control">
                                <option value="Office" {{ $item->tipe == 'Office' ? 'selected' : '' }}>Office</option>
                                <option value="Seal" {{ $item->tipe == 'Seal' ? 'selected' : '' }}>Seal</option>
                                <option value="Safety & Cutting Tools" {{ $item->tipe == 'Safety & Cutting Tools' ? 'selected' : '' }}>Safety & Cutting Tools</option>
                                <option value="Safety" {{ $item->tipe == 'Safety' ? 'selected' : '' }}>Safety</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Gambar</label>
                            <input type="file" name="gambar" class="form-control">
                            @if ($item->gambar)
                                <img style="width: 100px;" src="{{ asset($item->gambar) }}" />
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="js">
        <script type="text/javascript" src="{{ asset('backend/system/crud/post.js') }}"></script>
    </x-slot>
</x-backend.layouts>

