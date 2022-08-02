<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "transaksi";

    public function pupuk()
    {
        return $this->belongsTo(Pupuk::class, "pupuk_id");
    }
}
