<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Faker\Factory as FakerFactory;

class UserSeeder extends Seeder
{
    public function run()
    {
        $predefinedNames = ['わこつ太郎', 'まいやみ３３', 'おんせんっこ', 'サウナマン', '温泉太郎'];

        foreach ($predefinedNames as $name) {
            $email = Str::random(10) . '@example.com';
            while (User::where('email', $email)->exists()) {
                $email = Str::random(10) . '@example.com';
            }
            User::factory()->create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make('password'),
            ]);
        }
    }
}
