<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table = 'favorite';
    protected $fillable = ['user_id','onsen_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function onsen()
    {
        return $this->belongsTo(Onsen::class);
    }
}
