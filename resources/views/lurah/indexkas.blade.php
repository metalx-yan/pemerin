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
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        @if($item->status == 2)
                        
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->nomor }}</td>
                            <td>{{ $item->pengirim }}</td>
                            <td>{{ $item->perihal }}</td>
                            <td>{{ $item->kategori }}</td>
                            <td>
                                <span class="badge badge-success">Terkirim ke kasie</span>
                                    
                                <!-- <div class="row">
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
                                </div> -->
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
                            <td>
                                    <form action="{{ route('status.kasiemasuk', $item->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="2">
                                        <input type="text" name="keterangan_status" class="form-control form-control-sm" placeholder="Keterangan Status">
                                        <button type="submit" class="btn btn-primary btn-sm" style="width:100px;">Kirim ke kasie</button>
                                    </form>
                                <!-- <div class="row">
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
                                </div> -->
                            </td>
                        </tr>
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
