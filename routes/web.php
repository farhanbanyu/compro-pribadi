<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check()
        ? redirect('/dashboard')
        : redirect('/login');
});

Route::get('/logout', [\App\Http\Controllers\Backend\AuthController::class, 'logout']);

Route::controller(\App\Http\Controllers\Backend\AuthController::class)->group(function () {
    Route::get('/login', 'index');
    Route::post('_login', 'login');
});

Route::middleware('auth')->group(function () {
    Route::controller(\App\Http\Controllers\Backend\DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::prefix('configuration')->name('configuration')->controller(\App\Http\Controllers\Backend\ConfigurationController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/update', 'update');
        Route::get('/profile', 'profile');
        Route::post('/profile/update', 'profileUpdate');
        Route::post('/profile/change-password', 'changePasswordProfile');
        Route::get('/profile-more', 'profileMore');
        Route::post('/profile-more/update', 'profileMoreUpdate');
        Route::post('/profile-more/change-password', 'changePasswordProfileMore');
    });

    Route::prefix('product')->name('product')->controller(\App\Http\Controllers\Backend\ProductController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('blog')->name('blog')->controller(\App\Http\Controllers\Backend\BlogController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('counter')->name('counter')->controller(\App\Http\Controllers\Backend\CounterController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('faq')->name('faq')->controller(\App\Http\Controllers\Backend\FaqController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });

    Route::prefix('slider')->name('slider')->controller(\App\Http\Controllers\Backend\SliderController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });

    Route::prefix('technology')->name('technology')->controller(\App\Http\Controllers\Backend\TechnologyController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });

    Route::prefix('social_media')->name('social_media')->controller(\App\Http\Controllers\Backend\SocialMediaController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });

    Route::prefix('superiority')->name('superiority')->controller(\App\Http\Controllers\Backend\SuperiorityController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('portfolio')->name('portfolio')->controller(\App\Http\Controllers\Backend\PortfolioController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('team')->name('team')->controller(\App\Http\Controllers\Backend\TeamController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('subsidiary')->name('subsidiary')->controller(\App\Http\Controllers\Backend\SubsidiaryController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('concept')->name('concept')->controller(\App\Http\Controllers\Backend\ConceptController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('foreword')->name('foreword')->controller(\App\Http\Controllers\Backend\ForewordController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('service')->name('service')->controller(\App\Http\Controllers\Backend\ServiceController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('testimonial')->name('testimonial')->controller(\App\Http\Controllers\Backend\TestimonialController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('partner')->name('partner')->controller(\App\Http\Controllers\Backend\PartnerController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('gallery')->name('gallery')->controller(\App\Http\Controllers\Backend\GalleryController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('category')->name('category')->controller(\App\Http\Controllers\Backend\CategoryController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('category-portfolio')->name('category-portfolio')->controller(\App\Http\Controllers\Backend\CategoryPortfolioController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('benefit')->name('benefit')->controller(\App\Http\Controllers\Backend\BenefitController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('page')->name('page')->controller(\App\Http\Controllers\Backend\PageController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('categoryfooter')->name('categoryfooter')->controller(\App\Http\Controllers\Backend\CategoryFooterController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('menufooter')->name('menufooter')->controller(\App\Http\Controllers\Backend\MenuFooterController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('menu')->name('menu')->controller(\App\Http\Controllers\Backend\MenuController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('submenu')->name('submenu')->controller(\App\Http\Controllers\Backend\SubmenuController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('about')->name('about')->controller(\App\Http\Controllers\Backend\AboutController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/update', 'update');
    });

    Route::prefix('trade-finance-support')->name('trade-finance-support')->controller(\App\Http\Controllers\Backend\TradeFinanceSupportController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/update', 'update');
    });

    Route::prefix('trade-networks')->name('trade-networks')->controller(\App\Http\Controllers\Backend\TradeNetworkController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/update', 'update');
    });

    Route::prefix('award')->name('award')->controller(\App\Http\Controllers\Backend\AwardController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });

    Route::prefix('certificate')->name('certificate')->controller(\App\Http\Controllers\Backend\CertificateController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });

    Route::prefix('lowongan-pekerjaan')->name('lowongan-pekerjaan')->controller(\App\Http\Controllers\Backend\LowonganPekerjaanController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });

    Route::prefix('lamaran-pekerjaan')->name('lamaran-pekerjaan')->controller(\App\Http\Controllers\Backend\LamaranPekerjaanController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/detail/{id}', 'show');
        Route::post('/delete', 'delete');
    });

    Route::prefix('office')->name('office')->controller(\App\Http\Controllers\Backend\OfficeController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });

    Route::prefix('headline')->name('headline')->controller(\App\Http\Controllers\Backend\HeadlineController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/update', 'update');
    });

    Route::prefix('banner_contact')->name('banner_contact')->controller(\App\Http\Controllers\Backend\BannerContactController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/update', 'update');
    });

    Route::prefix('banner_superiority')->name('banner_superiority')->controller(\App\Http\Controllers\Backend\BannerSuperiorityController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/update', 'update');
    });
    Route::prefix('banner_testimonial')->name('banner_testimonial')->controller(\App\Http\Controllers\Backend\BannerTestimonialController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/update', 'update');
    });
    Route::prefix('banner')->name('banner')->controller(\App\Http\Controllers\Backend\BannerController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/update', 'update');
    });

    Route::prefix('authority')->name('authority')->controller(\App\Http\Controllers\Backend\AuthorityController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
    Route::prefix('user')->name('user')->controller(\App\Http\Controllers\Backend\UserController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
        Route::get('/password/{id}', 'password');
        Route::post('/change-password', 'changePassword');
    });

    Route::prefix('catalog')->name('catalog')->controller(\App\Http\Controllers\Backend\CatalogController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });

    Route::prefix('category-addon')->name('category-addon')->controller(\App\Http\Controllers\Backend\CategoryAddOnController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });

    Route::prefix('add-on')->name('add-on')->controller(\App\Http\Controllers\Backend\AddOnController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });

    Route::prefix('cara-daftar')->name('cara-daftar')->controller(\App\Http\Controllers\Backend\CaraDaftarController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/add', 'add');
        Route::post('/store', 'store');
        Route::post('/delete', 'delete');
        Route::get('/edit/{id}', 'edit');
        Route::post('/update', 'update');
    });
});
