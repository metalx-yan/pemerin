@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Surat Keluar</li>
            </ol>
        </div>
    </div>

    <div class="card" style="width:75%;margin: 0 auto;">
        <div class="card-title">

        </div>
        @php
            $no = 1;
        @endphp
        <div class="card-body">
            <a href="{{ route('keluar.create') }}" class="btn btn-primary btn-sm">Buat Surat Keluar</a>
            <br>
            <br>
            <table class="table border" id="myTable" style="font-size: 10px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Tujuan Surat</th>
                        <th>Perihal</th>
                        <th>Kategori Surat</th>
                        <th>Keterangan Status</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    @if ($item->status == 0)

                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->nomor }}</td>
                            <td>{{ $item->pengirim }}</td>
                            <td>{{ $item->perihal }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->keterangan_status }}</td>
                            <td>
                                    <form action="{{ route('status.kasie', $item->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="1">
                                        
                                        <button type="submit" class="btn btn-primary btn-sm" style="width:100px;">Kirim ke kasie</button>
                                    </form>

                                   
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{ route('keluar.show', $item->id ) }}" class="btn btn-secondary btn-sm">View</a>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3">
                                        <a href="{{ route('keluar.edit', $item->id ) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <form action="{{ route('keluar.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to Remove?');">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @elseif($item->status == 1)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->nomor }}</td>
                            <td>{{ $item->pengirim }}</td>
                            <td>{{ $item->perihal }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->keterangan_status }}</td>

                            <td>
                                    <span class="badge badge-success">Terkirim ke kasie</span>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{ route('keluar.show', $item->id ) }}" class="btn btn-secondary btn-sm">View</a>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3">
                                        <a href="{{ route('keluar.edit', $item->id ) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <form action="{{ route('keluar.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to Remove?');">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @elseif($item->status == 3)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->nomor }}</td>
                            <td>{{ $item->pengirim }}</td>
                            <td>{{ $item->perihal }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->keterangan_status }}</td>

                            <td>
                                    <span class="badge badge-success">Disetujui oleh lurah</span>
                            </td>
                            <td>
                            <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{ route('keluar.show', $item->id ) }}" class="btn btn-secondary btn-sm">View</a>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3">
                                        <a href="{{ route('keluar.edit', $item->id ) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <form action="{{ route('keluar.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to Remove?');">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @elseif($item->status == 4)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->nomor }}</td>
                            <td>{{ $item->pengirim }}</td>
                            <td>{{ $item->perihal }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->keterangan_status }}</td>

                            <td>
                                    <span class="badge badge-danger">Ditolak oleh kasie</span>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{ route('keluar.show', $item->id ) }}" class="btn btn-secondary btn-sm">View</a>
                                    <div class="col-md-1"></div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3">
                                        <a href="{{ route('keluar.edit', $item->id ) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <form action="{{ route('keluar.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to Remove?');">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @elseif($item->status == 5)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->nomor }}</td>
                            <td>{{ $item->pengirim }}</td>
                            <td>{{ $item->perihal }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>{{ $item->keterangan_status }}</td>

                            <td>
                                    <span class="badge badge-danger">Ditolak oleh lurah</span>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{ route('keluar.show', $item->id ) }}" class="btn btn-secondary btn-sm">View</a>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-3">
                                        <a href="{{ route('keluar.edit', $item->id ) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                    <div class="col-md-1"></div>

                                    <div class="col-md-2">
                                        <form action="{{ route('keluar.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to Remove?');">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @else
                            <span class="badge badge-success">Terkirim ke kasie</span>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

@endsection
