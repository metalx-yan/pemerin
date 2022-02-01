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
            <a href="{{ route('keluar.index') }}" class="btn btn-warning btn-sm">Back</a>
            <br>
            <br>
            <table class="table border" id="myTable" style="font-size: 10px;">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Tanggal Surat</th>
                        <th>Nomor Surat</th>
                        <th>Perihal</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $get->tanggal }}</td>
                            <td>{{ $get->nomor }}</td>
                            <td>{{ $get->tanggal }}</td>
                            <td>{{ $get->nomor }}</td>
                            <td>{{ $get->perihal }}</td>
                            <td>
                                <a href="{{ route('download.data.keluar', $get->id) }}" class="btn btn-primary btn-sm">Download</a>
                            </td>
                        </tr>
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
