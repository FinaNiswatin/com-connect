<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reward extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_reward';
    protected $table = 'reward';
    protected $fillable = [
        'nama_reward',
       'jumlah_point'

    ];
    public function user()
    {
        return $this->belongsToMany(User::class, 'user_reward', 'reward_id', 'users_id');
    }
}
