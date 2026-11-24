<x-backend.layouts>
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>Slider</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i
                                    class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Slider</li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 ">
                    <div class="d-flex flex-row-reverse">
                        <div class="page_action">
                            <a href="{{ url('slider/add') }}" class="btn btn-primary"><i
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
                                        <th>
                                            #
                                        </th>
                                        <th>Photo</th>
                                        <th>Judul</th>
                                        <th>Ditampilkan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($collection as $item)
                                        <tr id="data-{{ $item->id }}">
                                            <td style="width: 50px;">
                                                {{ $item->order }}
                                            </td>
                                            <td>
                                                @if(!empty($item->photo))
                                                    <img src="{{ asset($item->photo) }}" alt="Photo" width="160" height="90">
                                                @else
                                                    <span class="text-danger">No Photo</span>
                                                @endif
                                            </td>
                                            <td>
                                                <p class="c_name">{{ $item->title }}</p>
                                            </td>
                                           
                                            <td>
                                                <span
                                                    class="badge {{ $item->visible == 'yes' ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $item->visible == 'yes' ? 'Ya' : 'Tidak' }}
                                                </span>
                                            </td>
                                            <td style="width: 10%;">
                                                <a href="{{ url('slider/edit/' . $item->id) }}"
                                                    class="btn btn-sm btn-info" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
                                                <form action="{{ url('slider/delete') }}" 
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
        <script>
            $('.sparkbar').sparkline('html', {
                type: 'bar'
            });
        </script>
    </x-slot>
</x-backend.layouts>
