<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        Position::create(['name' => 'Lawyer']);
        Position::create(['name' => 'Content manager']);
        Position::create(['name' => 'Security']);
        Position::create(['name' => 'Designer']);
    }
}
