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
                    <form id="basic-form" action="{{ $base_url . '/update' }}" class="_form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">

                        <!-- TITLE -->
                        <div class="form-group">
                            <label for="title"><strong>Judul</strong></label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $item->title ?? '' }}" required>
                        </div>

                        <!-- FILE (PDF) -->
                        <div class="form-group">
                            <label for="file"><strong>File PDF</strong></label>
                            <input type="file" name="file" id="file" class="form-control" accept="application/pdf">
                            @if (!empty($item->file))
                                <br>
                                <a href="{{ asset($item->file) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                    <i class="fa fa-file-pdf-o"></i> Lihat PDF Saat Ini
                                </a>
                            @endif
                        </div>

                        <!-- VISIBLE -->
                        <div class="form-group">
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="visible" {{ $item->visible == 'yes' ? 'checked' : '' }} data-parsley-errors-container="#error-checkbox">
                                <span><strong>Tampilkan?</strong></span>
                            </label>
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
