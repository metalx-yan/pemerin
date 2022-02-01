<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masuk extends Model
{
    protected $fillable = ['nomor','tanggal','pengirim','perihal','lampiran','kategori','keterangan','disposisi','perihal_disposisi','tujuan'];
}
