<?php

namespace Database\Seeders;

use App\Models\BusinessRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BusinessRole::create(['role' => 'Индивидуальный мастер']);
        BusinessRole::create(['role' => 'Салон']);
        BusinessRole::create(['role' => 'Коворкинг']);
    }
}
