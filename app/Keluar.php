<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
    protected $fillable = ['nomor','tanggal','pengirim','perihal','lampiran','kategori','keterangan','status'];
}
