<x-backend.layouts>
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Tambah FAQ</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i
                                    class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">FAQ</li>
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
                    <h2>Tambah FAQ</h2>
                </div>
                <div class="body">
                    <form id="basic-form" action="{{ url('faq/store') }}" class="_form" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Pertanyaan</label>
                            <input type="text" name="question" class="form-control" placeholder="Masukkan pertanyaan" required>
                        </div>
                        <div class="form-group">
                            <label>Jawaban</label>
                            <textarea name="answer" class="form-control summernote" placeholder="Masukkan jawaban" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Status Aktif</label>
                            <div>
                                <label class="radio-inline mr-3">
                                    <input type="radio" name="is_active" value="1" checked> Ya
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="is_active" value="0"> Tidak
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Urutan</label>
                            <input type="number" name="sort_order" class="form-control" placeholder="Masukkan urutan tampilan" min="0" required>
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
                $('.summernote').summernote({
                    height: 120
                });
            });
        </script>
    </x-slot>
</x-backend.layouts>
