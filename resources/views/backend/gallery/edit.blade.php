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
                        <!-- <div class="form-group">
                            <label>Kategori</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" data-type="{{ $category->title }}"
                                        {{ $category->id == $item->category_id ? 'selected' : '' }}>
                                        {{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div> -->
                        <div class="form-group">
                            <label>Judul</label>
                            <input type="text" name="title" class="form-control" required
                                value="{{ $item->title }}">
                        </div>

                        <div class="form-group" id="video_input" style="display: none;">
                            <label>Masukkan URL Video</label>
                            <input type="text" name="link_vd" class="form-control" placeholder="Masukkan URL Video"
                                value="{{ $item->link_vd ?? '' }}">
                            <iframe src="{{$item->link_vd}}" frameborder="0" height="200px;width:200px;"></iframe>
                        </div>

                        <div class="form-group" id="image_input">
                            <label>Upload Gambar</label>
                            <input type="file" name="file" class="form-control"><br>
                                <img style="width: 100px;" src="{{ asset($item->file) }}" />
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
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const categorySelect = document.getElementById("category_id");
                const videoInput = document.getElementById("video_input");
                const imageInput = document.getElementById("image_input");

                function toggleInputs() {
                    const selectedOption = categorySelect.options[categorySelect.selectedIndex];
                    const type = selectedOption.dataset.type;

                    // Reset semua input
                    videoInput.style.display = "none";
                    imageInput.style.display = "none";

                    // Tampilkan input berdasarkan tipe
                    if (type === "Video") {
                        videoInput.style.display = "block";
                    } else if (type === "Gambar") {
                        imageInput.style.display = "block";
                    }
                }

                // Panggil saat halaman pertama kali dimuat
                toggleInputs();

                // Panggil setiap kali kategori diubah
                categorySelect.addEventListener("change", toggleInputs);
            });
        </script>
    </x-slot>
</x-backend.layouts>
