<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kegiatan';
    protected $table = 'kegiatan';
    protected $fillable = [
        'nama_kegiatan',
        'status',
        'gambar_kegiatan',
        'waktu_pelaksanaan',
        'lokasi_kegiatan',
        'kategori',
       'jumlah_relawan',
       'kode_unik',
       'jumlah_point'
    ];
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_kegiatan', 'kegiatan_id', 'users_id')->withPivot(['claim']);
    }
}
