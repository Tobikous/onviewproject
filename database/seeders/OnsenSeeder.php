<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Onsen;

class OnsenSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'あけび温泉', 'area' => '東京都', 'address' => '東京都千代田区'],
            ['name' => '嵐の湯 高崎', 'area' => '神奈川県', 'address' => '神奈川県横浜市'],
            ['name' => 'とちの湯', 'area' => '大阪府', 'address' => '大阪府大阪市'],
            ['name' => '極楽湯　三島店', 'area' => '大阪府', 'address' => '大阪府大阪市'],
            ['name' => '極楽湯　和光店', 'area' => '大阪府', 'address' => '大阪府大阪市'],
            ['name' => '王様の湯', 'area' => '大阪府', 'address' => '大阪府大阪市'],
            ['name' => '金太郎温泉', 'area' => '大阪府', 'address' => '大阪府大阪市'],
            ['name' => 'たから湯', 'area' => '大阪府', 'address' => '大阪府大阪市'],

        ];

        foreach ($data as $d) {
            Onsen::create([
                'name' => $d['name'],
                'area' => $d['area'],
                'address' => $d['address'],
            ]);
        }
    }
}
