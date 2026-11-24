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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="category_id" id="category_id" class="form-select custom-select" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach($category as $cat)
                                            <option value="{{ $cat->id }}" {{ $item->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ $item->title }}" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Target</label>
                                    <select name="target" id="target" class="form-select custom-select">
                                        <option value="">Pilih Target</option>
                                        <option value="_SELF" {{ $item->target == '_SELF' ? 'selected' : '' }}>_SELF
                                        </option>
                                        <option value="_BLANK" {{ $item->target == '_BLANK' ? 'selected' : '' }}>_BLANK
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="wrapper">
                                        <div class="form-group">
                                            <label>Link</label>
                                            <input name="link" class="form-control" value="{{ $item->link }}"
                                                required />
                                        </div>
                                    
                                </div>
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
                $('#type').on('change', function() {
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

                        console.log('Runn');


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
