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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Menu</label>
                                    <select name="menu_id" id="menu_id" required class="form-select form-control">
                                        <option value="">Pilih Tipe</option>
                                        @foreach ($menu as $menu)
                                            <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tipe</label>
                                    <select name="type" id="type" class="form-select form-control">
                                        <option value="">Pilih Tipe</option>
                                        <option value="custom">Custom</option>
                                        <option value="halaman">Halaman</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Target</label>
                                    <select name="target" id="target" class="form-select form-control">
                                        <option value="">Pilih Target</option>
                                        <option value="_SELF">_SELF</option>
                                        <option value="_BLANK">_BLANK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="wrapper">

                                </div>
                            </div>
                            <div class="col-md-6 form-group" id="image_input">
                                <label>Upload Gambar</label>
                                <input type="file" name="file" class="form-control">
                            </div>
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

        <script>
            $(document).ready(function() {
                console.log('running');

                $('#type').on('change', function() {
                    console.log($(this).val());

                    if ($(this).val() == 'custom') {
                        $('.wrapper').html(`
                            <div class="form-group">
                                <label>Link</label>
                                <input name="link" class="form-control" required />
                            </div>
                        `)
                    } else {
                        $('.wrapper').html(`
                            <div class="form-group">
                                <label>Link</label>
                                <select name="link" id="link" class="form-control form-select" required>
                                    <option value="">Pilih Halaman</option>
                                </select>
                            </div>
                        `)

                        console.log('Runna');


                        $.each({!! $page !!}, function(index, value) {
                            $('#link').append('<option value="' + value.link + '">' + value.title +
                                '</option>');
                        });
                    }
                })
            })
        </script>
    </x-slot>
</x-backend.layouts>
