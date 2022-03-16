<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KodeQR extends Model
{

    protected $hidden = [
        'id'
    ];

    protected $fillable = [
        'uuid',
        'kode_unik',
        'qr_nama'
    ];

    protected $connection = 'pelindo_repport';
    protected $table      = 'ms_kode_qr';
    protected $guarded    = [];

    public function formisian()
    {
        return $this->hasMany(FormIsian::class, 'qr_code', 'uuid');
    }

    public function getCreatedAtAttribute($value)
    {
        return formatTanggal($value);
    }

    public function getUpdatedAtAttribute($value)
    {
        return formatTanggal($value);
    }
    
}
