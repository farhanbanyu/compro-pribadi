<x-backend.layouts>
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Edit Add On</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i
                                    class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Add On</li>
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
                    <h2>Edit Add On</h2>
                </div>
                <div class="body">
                    <form id="basic-form" action="{{ url('add-on/update') }}" class="_form" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">— Pilih —</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}" @selected($item->category_id == $cat->id)>{{ $cat->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="title" class="form-control" required value="{{ $item->title }}">
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" id="description" class="form-control summernote" required>{{ $item->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Berkas (kosongkan jika tidak diubah)</label>
                            @if (!empty($item->file))
                                @php
                                    $ext = strtolower(pathinfo($item->file, PATHINFO_EXTENSION));
                                @endphp
                                <div class="mb-2">
                                    @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg']))
                                        <img src="{{ asset($item->file) }}" alt="" width="160" class="img-thumbnail">
                                    @else
                                        <a href="{{ asset($item->file) }}" target="_blank">Berkas saat ini</a>
                                    @endif
                                </div>
                            @endif
                            <input type="file" name="file" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="visible" data-parsley-errors-container="#error-checkbox"
                                    {{ $item->visible == 'yes' ? 'checked' : '' }}>
                                <span>Tampilkan?</span>
                            </label>
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
