<x-backend.layouts>
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>Dasboard</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row clearfix row-deck">'
            @if(auth()->user()->authorities_id == 1)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card number-chart">
                    <div class="body">
                        <span class="text-uppercase">Pengunjung Hari Ini</span>
                        <h4 class="mb-0 mt-2">
                            {{ number_format(\App\Models\Visitor::whereDate('created_at', today())->count()) }}</h4>
                    </div>
                    <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%"
                        data-height="50px" data-line-Width="1" data-line-Color="#39afa6" data-fill-Color="#73cec7">
                        4,1,5,2,7,3,4</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card number-chart">
                    <div class="body">
                        <span class="text-uppercase">Pengunjung Bulan Ini</span>
                        <h4 class="mb-0 mt-2">
                            {{ number_format(\App\Models\Visitor::whereMonth('created_at', today()->month)->count()) }}
                        </h4>
                    </div>
                    <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%"
                        data-height="50px" data-line-Width="1" data-line-Color="#39afa6" data-fill-Color="#73cec7">
                        4,1,5,2,7,3,4</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card number-chart">
                    <div class="body">
                        <span class="text-uppercase">Pengunjung Tahun Ini</span>
                        <h4 class="mb-0 mt-2">
                            {{ number_format(\App\Models\Visitor::whereYear('created_at', today()->year)->count()) }}
                        </h4>
                    </div>
                    <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%"
                        data-height="50px" data-line-Width="1" data-line-Color="#39afa6" data-fill-Color="#73cec7">
                        4,1,5,2,7,3,4</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card number-chart">
                    <div class="body">
                        <span class="text-uppercase">Total Pengunjung</span>
                        <h4 class="mb-0 mt-2">{{ number_format(\App\Models\Visitor::count()) }}</h4>
                    </div>
                    <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%"
                        data-height="50px" data-line-Width="1" data-line-Color="#39afa6" data-fill-Color="#73cec7">
                        4,1,5,2,7,3,4</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card number-chart">
                    <div class="body">
                        <span class="text-uppercase">Slider</span>
                        <h4 class="mb-0 mt-2">{{ number_format(\App\Models\Slider::count()) }}</h4>
                    </div>
                    <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%"
                        data-height="50px" data-line-Width="1" data-line-Color="#39afa6" data-fill-Color="#73cec7">
                        4,1,5,2,7,3,4</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card number-chart">
                    <div class="body">
                        <span class="text-uppercase">Produk</span>
                        <h4 class="mb-0 mt-2">{{ number_format(\App\Models\Product::count()) }}</h4>
                    </div>
                    <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%"
                        data-height="50px" data-line-Width="1" data-line-Color="#ffa901" data-fill-Color="#efc26b">
                        1,4,2,3,6,2</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card number-chart">
                    <div class="body">
                        <span class="text-uppercase">Kategori</span>
                        <h4 class="mb-0 mt-2">{{ number_format(\App\Models\Category::count()) }}</h4>
                    </div>
                    <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%"
                        data-height="50px" data-line-Width="1" data-line-Color="#38c172" data-fill-Color="#84d4a6">
                        1,4,2,3,1,5</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card number-chart">
                    <div class="body">
                        <span class="text-uppercase">User</span>
                        <h4 class="mb-0 mt-2">
                            {{ number_format(\App\Models\User::where('authorities_id', 1)->count()) }}</h4>
                    </div>
                    <div class="sparkline" data-type="line" data-spot-Radius="0" data-offset="90" data-width="100%"
                        data-height="50px" data-line-Width="1" data-line-Color="#226fd8" data-fill-Color="#7ea7de">
                        1,3,5,1,4,2</div>
                </div>
            </div>
               
            @else
               
            @endif

            
        </div>

    </div>
</x-backend.layouts>
