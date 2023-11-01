<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username'=> 'admin',
            'name'=> 'Nanda Dwi Nurkholifah',
            'email'=> 'xollovoling@gmail.com',
            'password'=> Hash::make('admin123'),
            'level'=> 'admin',
        ]);
        $this->command->info("User Admin berhasil dibuat");
    }
}
