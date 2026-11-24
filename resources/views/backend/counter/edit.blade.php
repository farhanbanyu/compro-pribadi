<x-backend.layouts>
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Edit Counter</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i
                                    class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Counter</li>
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
                    <h2>Edit Counter</h2>
                </div>
                <div class="body">
                    <form id="basic-form" action="{{ url('counter/update') }}" class="_form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="title" class="form-control" value="{{ $item->title }}" required>
                        </div>
                        <div class="form-group">
                            <label>Angka</label>
                            <input type="text" name="number" class="form-control" value="{{ $item->number }}" required>
                        </div>
                        <div class="form-group d-none">
                            <label>Satuan</label>
                            <input type="text" name="item" class="form-control" value="{{ $item->item }}">
                        </div>
                        <div class="form-group">
                            <label>Foto</label><br>
                            @if (!empty($item->file))
                                <img src="{{ asset($item->file) }}" style="width: 100px;" class="mb-2" />
                            @endif
                            <input type="file" name="photo" class="form-control" {{ empty($item->file) ? 'required' : '' }}>
                        </div>
                        <div class="form-group">
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="visible" data-parsley-errors-container="#error-checkbox" {{ $item->visible == 'yes' ? 'checked' : '' }}>
                                <span>Tampilkan ?</span>
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
