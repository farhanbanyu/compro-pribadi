<x-backend.layouts>
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2>Detail {{ $title }}</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('dashboard') }}"><i
                                    class="fa fa-dashboard"></i></a>
                        </li>
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">{{ $title }}</li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2>Detail Lamaran</h2>
                </div>
                <div class="body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Lowongan</th>
                            <td>{{ $item->lowongan->judul_pekerjaan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>{{ $item->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $item->email }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $item->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>{{ $item->tanggal_lahir }}</td>
                        </tr>
                        <tr>
                            <th>Bersedia Dinas Luar Kota</th>
                            <td>{{ $item->bersedia_dinas_luar_kota }}</td>
                        </tr>
                        <tr>
                            <th>File Ijazah</th>
                            <td>
                                @if ($item->file_ijazah)
                                    <a href="{{ asset($item->file_ijazah) }}" target="_blank">Download</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>File KTP</th>
                            <td>
                                @if ($item->file_ktp)
                                    <a href="{{ asset($item->file_ktp) }}" target="_blank">Download</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>File Surat Lamaran</th>
                            <td>
                                @if ($item->file_surat_lamaran)
                                    <a href="{{ asset($item->file_surat_lamaran) }}" target="_blank">Download</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>File CV</th>
                            <td>
                                @if ($item->file_cv)
                                    <a href="{{ asset($item->file_cv) }}" target="_blank">Download</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>File Sertifikat</th>
                            <td>
                                @if ($item->file_sertifikat)
                                    <a href="{{ asset($item->file_sertifikat) }}" target="_blank">Download</a>
                                @endif
                            </td>
                        </tr>
                    </table>
                    <a href="{{ $base_url }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-backend.layouts>

