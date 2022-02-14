@extends('main')

@section('content')
<div class="container-fluid">

    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Buat Surat Masuk</li>
            </ol>
        </div>
    </div>

    <div class="card" style="width:60%;margin: 0 auto;">
        <div class="card-title">

        </div>
        <div class="card-body">
            <span><b>Tambah Surat Masuk</b></span>
            <hr>
            <form action="{{ route('masuk.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="">No. Surat</label>
                        <input type="text" name="asal" class="form-control {{ $errors->has('asal') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('asal', '<span class="invalid-feedback">:message</span>') !!}
                    </div>

                    <div class="col-md-6">
                        <label for="">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control {{ $errors->has('tanggal') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('tanggal', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Pengirim</label>
                        <input type="text" name="pengirim" class="form-control {{ $errors->has('pengirim') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('pengirim', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Perihal</label>
                        <input type="text" name="perihal" class="form-control {{ $errors->has('perihal') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('perihal', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Kategori Surat</label>
                        <select name="kategori" id="" class="form-control">
                            <option value="pemerintahan">Kasie Pemerintahan dan Trantib</option>
                            <option value="ekonomi">Kasie Ekonomi dan Pembangunan</option>
                            <option value="kemasyarakatan">Kasie Kemasyarakatan dan Pelayanan</option>
                        </select>
                        {!! $errors->first('kategori', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('keterangan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Lampiran</label>
                        <input type="file" name="lampiran" class="form-control {{ $errors->has('lampiran') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('lampiran', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <hr>
                <span><b>Lembar Disposisi</b></span>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Nomor Disposisi</label>
                        <input type="text" name="disposisi" class="form-control {{ $errors->has('disposisi') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('disposisi', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-4">
                        <label for="">Perihal</label>
                        <input type="text" name="perihal_disposisi" class="form-control {{ $errors->has('perihal_disposisi') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('perihal_disposisi', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                    <div class="col-md-4">
                        <label for="">Tujuan Surat</label>
                        <input type="text" name="tujuan" class="form-control {{ $errors->has('tujuan') ? 'is-invalid' : ''}}" required>
                        {!! $errors->first('tujuan', '<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    <a href="{{ route('masuk.index') }}" class="btn btn-warning btn-sm">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
