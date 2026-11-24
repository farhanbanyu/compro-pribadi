<x-backend.layouts>
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Edit About</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i
                                    class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">About</li>
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
                    <h2>Edit About</h2>
                </div>
                <div class="body">
                    <form id="basic-form" action="{{ url('about/update') }}" class="_form" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="title" class="form-control" required
                                value="{{ $item->title }}">
                        </div>
                        <div class="row d-none">
                            <div class="form-group col-md-6">
                                <label>Counter</label>
                                <input type="text" name="counter" class="form-control"
                                    value="{{ $item->counter }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Title Counter</label>
                                <input type="text" name="title_counter" class="form-control"
                                    value="{{ $item->title_counter }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control summernote">{{ $item->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Overview</label>
                            <textarea name="overview" class="form-control summernote">{{ $item->overview }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Visi</label>
                            <textarea name="vision" class="form-control summernote">{{ $item->vision }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Misi</label>
                            <textarea name="mission" class="form-control summernote">{{ $item->mission }}</textarea>
                        </div>
                        <div class="form-group d-none">
                            <label>Perjalanan</label>
                            <textarea name="perjalanan" class="form-control summernote">{{ $item->perjalanan }}</textarea>
                        </div>
                        <div class="form-group d-none ">
                            <label>Management / Organization</label>
                            <textarea name="management" class="form-control summernote">{{ $item->management }}</textarea>
                        </div>
                        <div class="row">
                        <div class="form-group col-md-6 d-none">
                            <label>Link Video Tentang Kami</label>
                            <input type="text" name="link_video_about" class="form-control" value="{{ $item->link_video_about ?? '' }}" placeholder="Masukkan link video (misal: YouTube)">
                        </div>
                        <div class="form-group col-md-6 d-none">
                            <label>Link Video Timeline</label>
                            <input type="text" name="video_timeline" class="form-control" value="{{ $item->video_timeline ?? '' }}" placeholder="Masukkan link video timeline">
                        </div>
                        <div class="form-group col-md-4">
                            <label>File</label>
                            <input type="file" name="file" class="form-control">
                            <img style="width: 100px;" src="{{ asset($item->file) }}" />
                        </div>
                        <div class="form-group d-none">
                            <label>File 2</label>
                            <input type="file" name="file2" class="form-control">
                            <img style="width: 100px;" src="{{ asset($item->file2) }}" />
                        </div>
                        <div class="form-group d-none">
                            <label>File 3</label>
                            <input type="file" name="file3" class="form-control">
                            <img style="width: 100px;" src="{{ asset($item->file3) }}" />
                        </div>
                        </div>
                        <div class="form-group d-none">
                            <label>Legalitas</label>
                            <div id="legality-container" class="row px-3">
                                @forelse (json_decode($item->legality) ?? [] as $key => $value)
                                    <div class="row mb-2 col-2 p-4">
                                        <img src="{{ asset($value) }}" style="width: 100%" alt="">
                                    </div>
                                @empty
                                    <div class="row col-md-12">
                                        <div class="col-md-10">
                                            <input type="file" name="legality[]" class="form-control" value="">
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger remove-legality">Hapus</button>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                            <button type="button" class="btn btn-primary mt-2" id="add-legality">Ganti
                                Legalitas</button>
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
                var legalityIndex = {{ count(json_decode($item->legality) ?? []) }};

                $('#add-legality').on('click', function() {
                    legalityIndex++;
                    $('#legality-container').append(`
                        <div class="row col-md-12">
                            <div class="col-md-10">
                                <input type="file" name="legality[]" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger remove-legality">Hapus</button>
                            </div>
                        </div>
                    `);
                });

                $(document).on('click', '.remove-legality', function() {
                    $(this).closest('.row').remove();
                });
            });
        </script>

    </x-slot>
</x-backend.layouts>
