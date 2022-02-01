@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Buat Surat Keluar</li>
            </ol>
        </div>
    </div>

    <div class="card" style="width:60%;margin: 0 auto;">
        <div class="card-title">

        </div>
        <div class="card-body">
            <span><b>Ubah Surat keluar</b></span>
            <hr>
            <form action="{{ route('keluar.update', $get->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <label for="">No. Asal</label>
                        <input type="text" name="asal" class="form-control {{ $errors->has('asal') ? 'is-invalid' : ''}}" value="{{ $get->nomor }}" required>
                        {!! $errors->first('asal', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                    <div class="col-md-6">
                        <label for="">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : ''}}" value="{{ $get->tanggal }}" required>
                        {!! $errors->first('tanggal', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Pengirim</label>
                        <input type="text" name="pengirim" class="form-control {{ $errors->has('pengirim') ? 'is-invalid' : ''}}" value="{{ $get->pengirim }}" required>
                        {!! $errors->first('pengirim', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Perihal</label>
                        <input type="text" name="perihal" class="form-control {{ $errors->has('perihal') ? 'is-invalid' : ''}}" value="{{ $get->perihal }}" required>
                        {!! $errors->first('perihal', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Kategori Surat</label>
                        <select name="kategori" id="" class="form-control">
                            <option value="pemerintahan" {{ $get->keterangan == 'pemerintahan' ? 'selected' : '' }}>Kasie Pemerintahan dan Trantib</option>
                            <option value="ekonomi" {{ $get->keterangan == 'ekonomi' ? 'selected' : '' }}>Kasie Ekonomi dan Pembangunan</option>
                            <option value="kemasyarakatan" {{ $get->keterangan == 'kemasyarakatan' ? 'selected' : '' }}>Kasie Kemasyarakatan dan Pelayanan</option>
                        </select>
                        {!! $errors->first('kategori', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : ''}}" value="{{ $get->keterangan }}" required>
                        {!! $errors->first('keterangan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Lampiran</label>
                        <input type="file" name="lampiran" class="form-control {{ $errors->has('lampiran') ? 'is-invalid' : ''}}">
                        {!! $errors->first('lampiran', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <hr>

                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('keluar.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection