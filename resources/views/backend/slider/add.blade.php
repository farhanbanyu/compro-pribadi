<x-backend.layouts>
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Tambah Slider</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i
                                    class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Slider</li>
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
                    <h2>Tambah Slider</h2>
                </div>
                <div class="body">
                    <form id="basic-form" action="{{ url('slider/store') }}" class="_form" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group d-none">
                            <label>Subjudul</label>
                            <input type="text" name="subtitle" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Link Tombol </label>
                                    <input type="text" name="button_link_1" value="-" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label>Teks Tombol </label>
                                    <input type="text" name="button_text_1" value="-" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-none">
                                    <label>Link Tombol 2</label>
                                    <input type="text" name="button_link_2" value="-" class="form-control"
                                        >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group d-none">
                                    <label>Teks Tombol 2</label>
                                    <input type="text" name="button_text_2" value="-" class="form-control"
                                        >
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label>Upload Video</label>
                            <input type="file" name="video" class="form-control" accept="video/*" required>
                        </div> -->
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="photo" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Urutan</label>
                            <input type="number" name="order" class="form-control" required>
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
