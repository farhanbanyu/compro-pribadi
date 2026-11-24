<!-- Sidebar Utama -->
<div id="left-sidebar" class="sidebar">
    <button type="button" class="btn-toggle-offcanvas">
        <i class="fa fa-arrow-left"></i>
    </button>
    <div class="sidebar-scroll">
        <!-- Profil Pengguna -->
        <div class="user-account">
            <img src="{{ asset($user->photo) }}" class="rounded-circle user-photo" alt="User Profile Picture">
            <div class="dropdown">
                <span>Selamat Datang,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown">
                    <strong>{{ $user->name }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-right account">
                    <li>
                        <a href="{{ url('configuration/profile') }}">
                            <i class="icon-user"></i> ProfilKu
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ url('logout') }}">
                            <i class="icon-power"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
            <hr>
        </div>

        <!-- Navigasi Tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#menu">Menu</a>
            </li>
        </ul>

        <!-- Konten Tabs -->
        <div class="tab-content padding-0">
            <!-- Menu Utama -->
            <div class="tab-pane active" id="menu">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu li_animation_delay">
                        <!-- Dashboard -->
                        <li class="{{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                            <a href="{{ url('dashboard') }}">
                                <i class="fa fa-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <!-- Konten Utama -->
                        <x-backend.sidebar.menu url="{{ url('about') }}" icon="icon-layers mr-3 mt-1"
                            key="about" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('trade-finance-support') }}" icon="icon-layers mr-3 mt-1"
                            key="trade-finance-support" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('trade-networks') }}" icon="icon-layers mr-3 mt-1"
                            key="trade-networks" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('slider') }}" icon="icon-picture mr-3 mt-1"
                            key="slider" :authority="$authority" />
                            <x-backend.sidebar.menu url="{{ url('banner_superiority') }}"
                            icon="icon-picture mr-3 mt-1" key="banner_superiority" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('benefit') }}" icon="icon-layers mr-3 mt-1"
                            key="benefit" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('superiority') }}" icon="icon-layers mr-3 mt-1"
                            key="superiority" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('category') }}" icon="icon-list mr-3 mt-1"
                            key="category" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('catalog') }}" icon="icon-list mr-3 mt-1"
                            key="catalog" :authority="$authority" />


                        <x-backend.sidebar.menu url="{{ url('category-addon') }}" icon="icon-list mr-3"
                            key="category-addon" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('add-on') }}" icon="icon-list mr-3"
                            key="add-on" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('cara-daftar') }}" icon="icon-list mr-3"
                            key="cara-daftar" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('service') }}" icon="icon-list mr-3"
                            key="service" :authority="$authority" />

                        <x-backend.sidebar.menu url="{{ url('product') }}" icon="icon-list mr-3"
                            key="product" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('team') }}" icon="icon-users mr-3"
                            key="team" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('category-portfolio') }}" icon="icon-list mr-3"
                            key="category-portfolio" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('portfolio') }}" icon="icon-list mr-3"
                            key="portfolio" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('banner_testimonial') }}" icon="icon-picture mr-3 mt-1"
                            key="banner_testimonial" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('testimonial') }}" icon="icon-bubbles mr-3"
                            key="testimonial" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('partner') }}" icon="icon-list mr-3"
                            key="partner" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('blog') }}" icon="icon-layers mr-3"
                            key="blog" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('technology') }}" icon="icon-grid mr-3"
                            key="technology" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('banner_contact') }}" icon="icon-picture mr-3 mt-1"
                            key="banner_contact" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('counter') }}" icon="icon-list mr-3"
                            key="counter" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('social_media') }}" icon="icon-layers mr-3"
                            key="social_media" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('faq') }}" icon="icon-question mr-3"
                            key="faq" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('award') }}" icon="icon-trophy mr-3"
                            key="award" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('certificate') }}" icon="icon-badge mr-3"
                            key="certificate" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('lowongan-pekerjaan') }}" icon="icon-briefcase mr-3"
                            key="lowongan-pekerjaan" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('lamaran-pekerjaan') }}" icon="icon-docs mr-3"
                            key="lamaran-pekerjaan" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('office') }}" icon="icon-home mr-3"
                            key="office" :authority="$authority" />
                            <li
                            class="{{ in_array(Route::currentRouteName(), ['gallery', 'category_gallery']) ? ' active' : '' }} d-none">
                            <a href="#!" class="has-arrow"><i
                                    class="icon-picture mr-3"></i><span>Gallery</span></a>
                            <ul>
                                <x-backend.sidebar.menu url="{{ url('gallery') }}" icon=" "
                                    key="gallery" :authority="$authority" />
                                <x-backend.sidebar.menu url="{{ url('category_gallery') }}"
                                    key="category_gallery" icon=" " :authority="$authority" />
                            </ul>
                        </li>
                        <!-- Manajemen Halaman (Hanya untuk admin) -->
                        @if(auth()->user()->authorities_id == 1)
                        <li class="{{ in_array(Route::currentRouteName(), ['page', 'menu', 'submenu', 'categoryfooter','menufooter']) ? 'active' : '' }} d-none">
                            <a href="#!" class="has-arrow">
                                <i class="icon-list mr-3"></i>
                                <span>Manajemen Halaman</span>
                            </a>
                            <ul>

                                <x-backend.sidebar.menu url="{{ url('page') }}" icon=" " key="page"
                                    :authority="$authority" />
                                <x-backend.sidebar.menu url="{{ url('menu') }}" icon=" " key="menu"
                                    :authority="$authority" />
                                <x-backend.sidebar.menu url="{{ url('submenu') }}" icon=" "
                                    key="submenu" :authority="$authority" />
                                <x-backend.sidebar.menu url="{{ url('categoryfooter') }}" icon=" " key="categoryfooter"
                                    :authority="$authority" />
                                <x-backend.sidebar.menu url="{{ url('menufooter') }}" icon=" " key="menufooter"
                                    :authority="$authority" />
                            </ul>
                        </li>
                        @endif

                        <!-- Divider dan Konfigurasi (Admin Only)-->
                        @if(auth()->user()->authorities_id == 1)
                        <li class="my-3 px-3 fw-bold font-weight-bold">
                            Konfigurasi
                        </li>
                        @endif

                        <!-- Pengaturan -->
                        <x-backend.sidebar.menu url="{{ url('configuration') }}" icon="fa fa-cogs"
                            key="configuration" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('authority') }}" icon="fa fa-cogs"
                            key="authority" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('user') }}" icon="fa fa-users"
                            key="user" :authority="$authority" />
                    </ul>
                </nav>
            </div>

            <!-- Tab Setting (Jika diperlukan di masa depan) -->
            <div class="tab-pane" id="setting">
                <nav id="left-sidebar-nav" class="sidebar-nav">
                    <ul id="main-menu" class="metismenu li_animation_delay">
                        <x-backend.sidebar.menu url="{{ url('configuration') }}" icon="fa fa-cogs"
                            key="configuration" :authority="$authority" />
                        <x-backend.sidebar.menu url="{{ url('user') }}" icon="fa fa-users"
                            key="user" :authority="$authority" />
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
