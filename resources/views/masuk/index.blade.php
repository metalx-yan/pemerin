@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Surat Masuk</li>
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
            <a href="{{ route('masuk.create') }}" class="btn btn-primary btn-sm">Buat Surat Masuk</a>
            <br>
            <br>
            <table class="table border" id="myTable" style="font-size: 10px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nomor</th>
                        <th>Tanggal Surat</th>
                        <th>Nomor Surat</th>
                        <th>Perihal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->nomor }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->nomor }}</td>
                            <td>{{ $item->perihal }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{ route('masuk.show', $item->id ) }}" class="btn btn-secondary btn-sm">View</a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{{ route('masuk.edit', $item->id ) }}" class="btn btn-warning btn-sm">Edit</a>
                                    </div>
                                    <div class="col-md-2">
                                        <form action="{{ route('masuk.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to Remove?');">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
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
