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
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" required
                                value="{{ $item->name }}">
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <input type="text" name="job" class="form-control" required
                                value="{{ $item->job }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" required
                                value="{{ $item->email }}">
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="file" class="form-control">
                            <img style="width: 100px;" src="{{ asset($item->file) }}" />
                        </div>

                        <div class="form-group">
                            <label for="">Grade</label>
                            <select name="grade" id="" class="form-control form-select custom-select">
                                <option value="1" {{ $item->grade == '1' ? 'selected' : '' }}>1</option>
                                <option value="2" {{ $item->grade == '2' ? 'selected' : '' }}>2</option>
                                <option value="3" {{ $item->grade == '3' ? 'selected' : '' }}>3</option>
                                <option value="4" {{ $item->grade == '4' ? 'selected' : '' }}>4</option>
                                <option value="5" {{ $item->grade == '5' ? 'selected' : '' }}>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="visible" {{ $item->visible == 'yes' ? 'checked' : '' }}
                                    data-parsley-errors-container="#error-checkbox">
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
