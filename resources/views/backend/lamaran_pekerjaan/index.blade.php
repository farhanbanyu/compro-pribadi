<x-backend.layouts>
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>{{ $title }}</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i
                                    class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 c_list">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Lowongan</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Bersedia Dinas Luar Kota</th>
                                        <th>Tanggal Lamar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collection as $item)
                                        <tr id="data-{{ $item->id }}">
                                            <td style="width: 50px;">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>{{ $item->lowongan->judul_pekerjaan ?? '-' }}</td>
                                            <td>{{ $item->nama_lengkap }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->bersedia_dinas_luar_kota }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            <td style="width: 15%;">
                                                <a href="{{ $base_url . '/detail/' . $item->id }}"
                                                    class="btn btn-sm btn-info" title="Detail"><i
                                                        class="fa fa-eye"></i></a>
                                                <form action="{{ $base_url . '/delete' }}" style="display:inline-block"
                                                    class="deleteForm-{{ $item->id }}">
                                                    @csrf
                                                    <button type="button"
                                                        onclick="return confirmation('{{ $item->id }}')"
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                {{ $collection->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
    <x-slot name="js">
        <script type="text/javascript" src="{{ asset('backend/system/crud/delete.js') }}"></script>
    </x-slot>
</x-backend.layouts>

