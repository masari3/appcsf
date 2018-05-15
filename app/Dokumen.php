<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen';
    protected $primaryKey = 'id_dok';
    public $incrementing = false;

    public function mako(){
        return $this->belongsTo('App\Mako');
    }
}
