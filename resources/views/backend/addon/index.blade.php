<x-backend.layouts>
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>Add On</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i
                                    class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Add On</li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 ">
                    <div class="d-flex flex-row-reverse">
                        <div class="page_action">
                            <a href="{{ url('add-on/add') }}" class="btn btn-primary"><i
                                    class="fa fa-plus mr-1"></i>
                                Tambah Data</a>
                        </div>
                    </div>
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
                                        <th style="width: 50px;">#</th>
                                        <th>Berkas</th>
                                        <th>Judul</th>
                                        <th>Kategori</th>
                                        <th>Ditampilkan</th>
                                        <th style="width: 15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collection as $item)
                                        <tr id="data-{{ $item->id }}">
                                            <td>{{ $loop->iteration + ($collection->currentPage() - 1) * $collection->perPage() }}</td>
                                            <td>
                                                @if (!empty($item->file))
                                                    @php
                                                        $ext = strtolower(pathinfo($item->file, PATHINFO_EXTENSION));
                                                    @endphp
                                                    @if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg']))
                                                        <img src="{{ asset($item->file) }}" alt="" width="100" height="60" style="object-fit: cover;">
                                                    @else
                                                        <a href="{{ asset($item->file) }}" target="_blank">Lihat berkas</a>
                                                    @endif
                                                @else
                                                    <span class="text-muted">—</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->categoryAddOn->title ?? '-' }}</td>
                                            <td>
                                                <span
                                                    class="badge {{ $item->visible == 'yes' ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $item->visible == 'yes' ? 'Ya' : 'Tidak' }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ url('add-on/edit/' . $item->id) }}"
                                                    class="btn btn-sm btn-info" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
                                                <form action="{{ url('add-on/delete') }}"
                                                    style="display:inline-block"
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
