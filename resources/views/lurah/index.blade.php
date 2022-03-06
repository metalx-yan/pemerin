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
            <br>
            <table class="table border" id="myTable" style="font-size: 10px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Tujuan Surat</th>
                        <th>Nomor Surat</th>
                        <th>Perihal</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    @if ($item->status == 2)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->nomor }}</td>
                        <td>{{ $item->pengirim }}</td>
                        <td>{{ $item->nomor }}</td>
                        <td>{{ $item->perihal }}</td>
                        <td>

                                <!-- <span class="badge badge-success">Data approve kasie</span> -->
                                <form action="{{ route('status.admin', $item->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="3">
                                    <input type="text" name="keterangan_status" class="form-control form-control-sm" placeholder="Keterangan Status">

                                    <button type="submit" class="btn btn-primary btn-sm" style="width:100px;">Kirim ke admin</button>
                                </form>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-xs-6">
                                    <a href="{{ route('view.lurah', $item->id ) }}" class="btn btn-secondary btn-sm">View</a>
                                </div>
                                <div class="col-xs-6">
                                    <form action="{{ route('status.admin', $item->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="5">
                                        <input type="text" name="keterangan_status" class="form-control form-control-sm" placeholder="Keterangan Status">

                                        <button type="submit" class="btn btn-danger btn-sm" style="width:70px;">Decline</button>
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
                        <td>{{ $item->nomor }}</td>
                        <td>{{ $item->perihal }}</td>
                        <td>

                                <span class="badge badge-success">Terkirim ke admin</span>
                               
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ route('view.lurah', $item->id ) }}" class="btn btn-secondary btn-sm">View</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @else
                    
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
