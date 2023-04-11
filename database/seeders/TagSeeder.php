<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run()
    {
        Tag::factory()->count(5)->create();
    }
}
