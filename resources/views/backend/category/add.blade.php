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
                    <form id="basic-form" action="{{ $base_url . '/store' }}" class="_form" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group d-none">
                            <label>Produk</label>
                            <select name="type" id="type-select" class="form-control form-select">
                                <option value="product">Produk</option>
                            </select>
                        </div>
                   
                        <!-- <div class="form-group">
                            <label>Tipe Kategori</label>
                            <select name="type" id="type-select" class="form-control form-select">
                                <option value="service">Layanan</option> -->
                                <!-- <option value="portfolio">Portofolio</option> -->
                                <!-- <option value="blog">Blog</option> -->
                                <!-- <option value="gallery">Galeri</option> -->
                                <!-- <option value="product">Produk</option> -->
                            <!-- </select>
                        </div> -->

                        <!-- <div class="form-group d-none" id="partners-group">
                            <label>Pilih Partners <span class="text-danger">*</span></label>
                            <select name="brand[]" class="form-control form-select" multiple size="5" id="brand-select">
                                @foreach ($partners ?? [] as $partner)
                                    <option value="{{ $partner->id }}">{{ $partner->title }}</option>
                                @endforeach
                            </select>
                        </div> -->

                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group d-none">
                            <label>Deskripsi (optional)</label>
                            <textarea name="description" id="description" class="form-control summernote" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Urutan</label>
                            <input type="number" name="order" class="form-control" required>
                        </div>
                        <div class="form-group ">
                            <label>Foto</label>
                            <input type="file" name="file" class="form-control" >
                        </div>
                        <div class="form-group d-none">
                            <label>Banner</label>
                            <input type="file" name="bg" class="form-control">
                        </div>
                        <div class="form-group d-none">
                            <label>Link</label>
                            <input type="text" name="link" class="form-control">
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
        <!-- Select2 CSS & JS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function () {
                let typeSelect = document.getElementById('type-select');
                let partnersGroup = document.getElementById('partners-group');
                let brandSelect = document.getElementById('brand-select');

                // Inisialisasi select2 agar multiple select bisa Ctrl+klik atau pilih banyak lebih UX friendly
                $(brandSelect).select2({
                    width: '100%',
                    dropdownParent: $('#partners-group')
                });

                function togglePartners() {
                    if(typeSelect.value === 'product') {
                        partnersGroup.classList.remove('d-none');
                        // Enable select2 input
                        $(brandSelect).prop('disabled', false);
                    } else {
                        partnersGroup.classList.add('d-none');
                        // Clear & disable select2 input
                        $(brandSelect).val(null).trigger('change');
                        $(brandSelect).prop('disabled', true);
                    }
                }

                typeSelect.addEventListener('change', togglePartners);

                // Initialize on page load
                togglePartners();
            });
        </script>
    </x-slot>
</x-backend.layouts>
