<x-backend.layouts>
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Tambah {{ $title }}</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i
                                    class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">{{ $title }}</li>
                        <li class="breadcrumb-item active">Tambah</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Tambah {{ $title }}</h2>
                </div>
                <div class="body">
                    <form id="basic-form" action="{{ $base_url . '/store' }}" class="_form" method="post">
                        @csrf
                         <div class="form-group d-none">
                            <label>Kategori</label>
                            <select name="category_id" id="" class="form-select form-control">
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group d-none">
                            <label>Harga</label>
                            <input type="number" name="price" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control summernote"></textarea>
                        </div>
                        <div class="form-group d-none">
                            <label for="detail_information">Detail Informasi {{ $title }}</label>
                            <textarea name="detail_information" id="detail_information" class="form-control summernote"></textarea>
                        </div>
                        <div class="form-group d-none ">
                            <label for="meta_keyword">Meta Keyword</label>
                            <textarea name="meta_keyword" id="meta_keyword" class="form-control summernote"></textarea>
                        </div>
                        <div class="form-group d-none">
                            <label for="meta_description">Meta Deskripsi</label>
                            <textarea name="meta_description" id="meta_description" class="form-control summernote"></textarea>
                        </div>
                        <div class="form-group d-none ">
                            <label for="meta_tag">Label</label>
                            <textarea name="meta_tag" id="meta_tag" class="form-control summernote"></textarea>
                        </div>
                        <div class="row d-none">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Button Text</label>
                                    <input type="text" name="button_text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Button Link</label>
                                    <input type="text" name="button_link" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4 d-none">
                                <div class="form-group">
                                    <label>Icon</label>
                                    <input type="file" name="icon" class="form-control" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="visible" data-parsley-errors-container="#error-checkbox">
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
