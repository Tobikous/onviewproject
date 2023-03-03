<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onsen extends Model
{
    protected $table = 'onsenAreaData';
    protected $fillable = ['name','area','adress','API'];
}
