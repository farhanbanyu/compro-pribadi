<x-backend.layouts>
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Konfigurasi</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i
                                    class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Konfigurasi</li>
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
                    <h2>Konfigurasi</h2>
                </div>
                <div class="body">
                    <form id="basic-form" action="{{ url('configuration/update') }}" class="_form"
                        method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="card">
                            <div class="card-header">
                                <h3>Informasi Website</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Kumpulan Identitas Website -->
                                    <div class="col-md-12">
                                        <div class="card mb-3">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0">Identitas Website</h5>
                                            </div>
                                            <div class="card-body row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ $item->name }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Judul</label>
                                                        <input type="text" name="title" class="form-control"
                                                            value="{{ $item->title }}" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Logo</label>
                                                        <input type="file" accept="image/*" name="logo" class="form-control">
                                                        <img src="{{ asset($item->logo) }}" class="mt-3" alt=""
                                                            width="100">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Favicon</label>
                                                        <input type="file" accept="image/*" name="favicon" class="form-control">
                                                        <img src="{{ asset($item->favicon) }}" class="mt-3" alt=""
                                                            width="50">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Logo Footer</label>
                                                        <input type="file" accept="image/*" name="logo_footer"
                                                            class="form-control">
                                                        <img src="{{ asset($item->logo_footer) }}" class="mt-3" alt=""
                                                            width="100">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 d-none">
                                                    <div class="form-group">
                                                        <label>Gambar Map</label>
                                                        <input type="file" accept="image/*" name="banner_video_background" class="form-control">
                                                        @if(!empty($item->banner_video_background))
                                                            <img src="{{ asset($item->banner_video_background) }}" class="mt-3" alt="Gambar Map" width="100">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Kumpulan File Upload -->
                                    <div class="col-md-12 d-none">
                                        <div class="card mb-3">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0">File & Media</h5>
                                            </div>
                                            <div class="card-body row">
                                                <!--<div class="col-md-4 d-none">-->
                                                <!--    <div class="form-group">-->
                                                <!--        <label>File Testimoni</label>-->
                                                <!--        <input type="file" accept="image/*" name="file_testimoni"-->
                                                <!--            class="form-control">-->
                                                <!--        <img src="{{ asset($item->file_testimoni) }}" class="mt-3" alt=""-->
                                                <!--            width="100">-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                <!--<div class="col-md-4 d-none">-->
                                                <!--    <div class="form-group">-->
                                                <!--        <label>File FAQ</label>-->
                                                <!--        <input type="file" accept="image/*" name="file_faq"-->
                                                <!--            class="form-control">-->
                                                <!--        <img src="{{ asset($item->file_faq) }}" class="mt-3" alt=""-->
                                                <!--            width="100">-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                <!--<div class="col-md-4 d-none">-->
                                                <!--    <div class="form-group">-->
                                                <!--        <label>Katalog</label>-->
                                                <!--        <input type="file" accept="pdf/*" name="katalog"-->
                                                <!--            class="form-control">-->
                                                <!--        <a href="{{asset($item->katalog)}}">Lihat File</a>-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                <!--<div class="col-md-4 d-none">-->
                                                <!--    <div class="form-group">-->
                                                <!--        <label>Background Banner</label>-->
                                                <!--        <input type="file" accept="image/*" name="bg_category_product"-->
                                                <!--            class="form-control">-->
                                                <!--        <img src="{{ asset($item->bg_category_product_product) }}" class="mt-3" alt=""-->
                                                <!--            width="100">-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                                <!--<div class="col-md-6 d-none">-->
                                                <!--    <label for="">Disclaimer</label>-->
                                                <!--    <textarea name="disclaimer"rows="5" class="form-control">{{ $item->disclaimer }}</textarea>-->
                                                <!--</div>-->
                                                <!--<div class="col-md-6 d-none">-->
                                                <!--    <label for="">Privacy Policy</label>-->
                                                <!--    <textarea name="privacy_policy"rows="5" class="form-control">{{ $item->privacy_policy }}</textarea>-->
                                                <!--</div>-->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Icon Banner Slider</label>
                                                        <input type="file" name="icon_banner_slider" class="form-control">
                                                        @if(!empty($item->icon_banner_slider))
                                                        <img src="{{ asset($item->icon_banner_slider) }}" class="mt-3" alt="" width="100">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Kumpulan Deskripsi/Teks -->
                                    <div class="col-md-12 d-none">
                                        <div class="card mb-3">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0">Deskripsi & Teks</h5>
                                            </div>
                                            <div class="card-body row">
                                                <div class="col-md-12 d-none">
                                                    <div class="form-group">
                                                        <label>Deskripsi Singkat Footer</label>
                                                        <textarea name="short_description" class="form-control">{{ $item->short_description }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 d-none">
                                                    <div class="form-group">
                                                        <label>Running Text</label>
                                                        <textarea name="running_text" class="form-control">{{ $item->running_text }}</textarea>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Petunjuk Paket</label>
                                                        <textarea name="petunjuk_paket" class="form-control summernote">{{ $item->petunjuk_paket }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Catatan Paket</label>
                                                        <textarea name="note_paket" class="form-control summernote">{{ $item->note_paket }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Catatan Add On</label>
                                                        <textarea name="note_add_on" class="form-control summernote">{{ $item->note_add_on }}</textarea>
                                                    </div>
                                                </div>
                                           
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Judul dan Subjudul Section -->
                                    <div class="col-md-12 d-none">
                                        <div class="card mb-3">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0">Banner Add On</h5>
                                            </div>
                                            <div class="card-body row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Judul Add On</label>
                                                        <input type="text" name="title_addon" class="form-control" value="{{ $item->title_addon }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Deskripsi Add On</label>
                                                        <textarea name="desc_addon" class="form-control summernote">{{ $item->desc_addon }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>File Add On</label>
                                                        <input type="file" name="file_addon" class="form-control">
                                                        @if(!empty($item->file_addon))
                                                            <p class="mt-2">File terupload: <a href="{{ asset($item->file_addon) }}" target="_blank">Download File</a></p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="card mb-3">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0">Judul dan Subjudul Section</h5>
                                            </div>
                                            <div class="card-body row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Judul About</label>
                                                        <input type="text" name="title_about" class="form-control" value="{{ $item->title_about }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Subjudul About</label>
                                                        <input type="text" name="subtitle_about" class="form-control" value="{{ $item->subtitle_about }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Judul Layanan</label>
                                                        <input type="text" name="title_layanan" class="form-control" value="{{ $item->title_layanan }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Subjudul Layanan</label>
                                                        <input type="text" name="subtitle_layanan" class="form-control" value="{{ $item->subtitle_layanan }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Judul Keunggulan</label>
                                                        <input type="text" name="title_keunggulan" class="form-control" value="{{ $item->title_keunggulan }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Subjudul Keunggulan</label>
                                                        <input type="text" name="subtitle_keunggulan" class="form-control" value="{{ $item->subtitle_keunggulan }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Judul Portfolio</label>
                                                        <input type="text" name="title_portfolio" class="form-control" value="{{ $item->title_portfolio }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Subjudul Portfolio</label>
                                                        <input type="text" name="subtitle_portfolio" class="form-control" value="{{ $item->subtitle_portfolio }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Judul Counter</label>
                                                        <input type="text" name="title_counter" class="form-control" value="{{ $item->title_counter }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Subjudul Counter</label>
                                                        <input type="text" name="subtitle_counter" class="form-control" value="{{ $item->subtitle_counter }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Judul Team</label>
                                                        <input type="text" name="title_team" class="form-control" value="{{ $item->title_team }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Subjudul Team</label>
                                                        <input type="text" name="subtitle_team" class="form-control" value="{{ $item->subtitle_team }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <label>Judul Product</label>
                                                        <input type="text" name="title_lainnya" class="form-control" value="{{ $item->title_lainnya }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <label>Subjudul Product</label>
                                                        <input type="text" name="subtitle_lainnya" class="form-control" value="{{ $item->subtitle_lainnya }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Judul Testimoni</label>
                                                        <input type="text" name="title_testimoni" class="form-control" value="{{ $item->title_testimoni }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Subjudul Testimoni</label>
                                                        <input type="text" name="subtitle_testimoni" class="form-control" value="{{ $item->subtitle_testimoni }}">
                                                    </div>
                                                </div>
                                             
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Judul Blog</label>
                                                        <input type="text" name="title_blog" class="form-control" value="{{ $item->title_blog }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Subjudul Blog</label>
                                                        <input type="text" name="subtitle_blog" class="form-control" value="{{ $item->subtitle_blog }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Judul Pendaftaran</label>
                                                        <input type="text" name="title_faq" class="form-control" value="{{ $item->title_faq }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 ">
                                                    <div class="form-group">
                                                        <label>Subjudul Pendaftaran</label>
                                                        <input type="text" name="subtitle_faq" class="form-control" value="{{ $item->subtitle_faq }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Lain-lain, Copyright & Tombol -->
                                    <div class="col-md-12">
                                        <div class="card mb-3">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0">Lain-lain & Pengaturan Tombol</h5>
                                            </div>
                                            <div class="card-body row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Copyright</label>
                                                        <input type="text" name="copyright" class="form-control" value="{{ $item->copyright }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Judul Tombol Header</label>
                                                        <input type="text" name="title_button_header" class="form-control" value="{{ $item->title_button_header }}">
                                                    </div>
                                                </div> 
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Link Tombol Header</label>
                                                        <input type="text" name="link_button_header" class="form-control" value="{{ $item->link_button_header }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Judul Banner Slider</label>
                                                        <input type="text" name="title_banner_slider" class="form-control" value="{{ $item->title_banner_slider }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Counter Banner Slider</label>
                                                        <input type="number" name="counter_banner_slider" class="form-control" value="{{ $item->counter_banner_slider }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Judul Counter Banner Slider</label>
                                                        <input type="text" name="title_counter_banner_slider" class="form-control" value="{{ $item->title_counter_banner_slider }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Judul Tombol About</label>
                                                        <input type="text" name="title_button_about" class="form-control" value="{{ $item->title_button_about }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Link Tombol About</label>
                                                        <input type="text" name="link_button_about" class="form-control" value="{{ $item->link_button_about }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Judul Banner 1</label>
                                                        <input type="text" name="banner_1_title" class="form-control" value="{{ $item->banner_1_title }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Judul Tombol Banner 1</label>
                                                        <input type="text" name="banner_1_title_button" class="form-control" value="{{ $item->banner_1_title_button }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 d-none">
                                                    <div class="form-group">
                                                        <label>Link Tombol Banner 1</label>
                                                        <input type="text" name="banner_1_link_button" class="form-control" value="{{ $item->banner_1_link_button }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Benefit Counter -->
                                    <div class="col-md-12 d-none">
                                        <div class="card mb-3">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0">Judul Benefit Counter</h5>
                                            </div>
                                            <div class="card-body row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Judul Benefit Counter 1</label>
                                                        <input type="text" name="benefit_counter_title_1" class="form-control" value="{{ $item->benefit_counter_title_1 }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Judul Benefit Counter 2</label>
                                                        <input type="text" name="benefit_counter_title_2" class="form-control" value="{{ $item->benefit_counter_title_2 }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Judul Benefit Counter 3</label>
                                                        <input type="text" name="benefit_counter_title_3" class="form-control" value="{{ $item->benefit_counter_title_3 }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Benefit Counter 1</label>
                                                        <input type="number" name="benefit_counter_1" class="form-control" value="{{ $item->benefit_counter_1 }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Benefit Counter 2</label>
                                                        <input type="number" name="benefit_counter_2" class="form-control" value="{{ $item->benefit_counter_2 }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Benefit Counter 3</label>
                                                        <input type="number" name="benefit_counter_3" class="form-control" value="{{ $item->benefit_counter_3 }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Banner Video Section -->
                                    <div class="col-md-12 d-none">
                                        <div class="card mb-3">
                                            <div class="card-header bg-light">
                                                <h5 class="mb-0">Pengaturan Banner Video</h5>
                                            </div>
                                            <div class="card-body row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Judul Banner Video</label>
                                                        <input type="text" name="banner_video_title" class="form-control" value="{{ $item->banner_video_title }}">
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Background Banner Video</label>
                                                        <input type="file" accept="image/*" name="banner_video_background" class="form-control">
                                                        @if(!empty($item->banner_video_background))
                                                        <img src="{{ asset($item->banner_video_background) }}" class="mt-3" alt="" width="100">
                                                        @endif
                                                    </div>
                                                </div> -->
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Link YouTube Banner Video</label>
                                                        <input type="text" name="banner_video_linkyt" class="form-control" value="{{ $item->banner_video_linkyt }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3>Informasi Kontak</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Embed Peta</label>
                                            <textarea name="map" class="form-control" >{{ $item->map }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea name="address" class="form-control" required>{{ $item->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $item->email }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>No. Telepon</label>
                                            <input type="text" name="notelp" class="form-control"
                                                value="{{ $item->notelp }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>No. Whatsapp</label>
                                            <input type="text" name="wa" class="form-control"
                                                value="{{ $item->wa }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3>Informasi Meta</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Meta Kata Kunci</label>
                                            <input type="text" name="meta_keyword" class="form-control"
                                                value="{{ $item->meta_keyword }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Meta Deskripsi</label>
                                            <textarea name="meta_description" class="form-control" required>{{ $item->meta_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Meta Abstrak</label>
                                            <textarea name="meta_abstract" class="form-control" required>{{ $item->meta_abstract }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Meta SEO</label>
                                            <textarea name="meta_seo" class="form-control" required>{{ $item->meta_seo }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pemilik Website</label>
                                            <input type="text" name="meta_author" class="form-control"
                                                value="{{ $item->meta_author }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Meta Judul</label>
                                            <input type="text" name="meta_title" class="form-control"
                                                value="{{ $item->meta_title }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Meta Pixel</label>
                                    <textarea name="meta_pixel" class="form-control">{{ $item->meta_pixel }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Google Analytics</label>
                                    <textarea name="google_analytics" class="form-control">{{ $item->google_analytics }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tawkto</label>
                                    <textarea name="tawkto" class="form-control">{{ $item->tawkto }}</textarea>
                                </div>

                            </div>
                        </div>
                        <div class="card d-none">
                            <div class="card-header">
                                <h3>Informasi Keagean</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Judul Identitas</label>
                                            <input type="text" name="title_identitas" class="form-control" value="{{ $item->title_identitas }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Deskripsi Identitas</label>
                                            <textarea name="identitas_website" class="form-control summernote">{{ $item->identitas_website }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Judul Hubungan Keagean</label>
                                            <input type="text" name="title_hubungan_keagean" class="form-control" value="{{ $item->title_hubungan_keagean }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Deskripsi Hubungan Keagean</label>
                                            <textarea name="hubungan_keagean" class="form-control summernote">{{ $item->hubungan_keagean }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Judul Ruang Lingkup</label>
                                            <input type="text" name="title_ruang_lingkup" class="form-control" value="{{ $item->title_ruang_lingkup }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Deskripsi Ruang Lingkup</label>
                                            <textarea name="ruang_lingkup" class="form-control summernote">{{ $item->ruang_lingkup }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Judul Pernyataan Independensi</label>
                                            <input type="text" name="title_peryataan_independensi" class="form-control" value="{{ $item->title_peryataan_independensi }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Deskripsi Pernyataan Independensi</label>
                                            <textarea name="peryataan_independensi" class="form-control summernote">{{ $item->peryataan_independensi }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Judul Penggunaan Merek</label>
                                            <input type="text" name="title_penggunaan_merek" class="form-control" value="{{ $item->title_penggunaan_merek }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Deskripsi Penggunaan Merek</label>
                                            <textarea name="penggunaan_merek" class="form-control summernote">{{ $item->penggunaan_merek }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Judul Transparasi</label>
                                            <input type="text" name="title_transparasi" class="form-control" value="{{ $item->title_transparasi }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Deskripsi Transparasi</label>
                                            <textarea name="transparasi" class="form-control summernote">{{ $item->transparasi }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Judul Kontak Resmi</label>
                                            <input type="text" name="title_kontak_resmi" class="form-control" value="{{ $item->title_kontak_resmi }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Deskripsi Kontak Resmi</label>
                                            <textarea name="kontak_resmi" class="form-control summernote">{{ $item->kontak_resmi }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   


                        <br>
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
