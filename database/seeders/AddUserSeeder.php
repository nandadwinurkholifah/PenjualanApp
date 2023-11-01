<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AddUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'username' => 'anton',
            'name' => 'Anton Santoso',
            'email' => 'anton@gmail.com',
            'password' => Hash::make('anton123'),
            'level' => 'staff',
        ]);

        $user2 = User::create([
            'username' => 'budi',
            'name' => 'Budiarto',
            'email' => 'budi@gmail.com',
            'password' => Hash::make('budi123'),
            'level' => 'staff',
        ]);

        $user3 = User::create([
            'username' => 'Anggun',
            'name' => 'Anggun Sulistya',
            'email' => 'Anggun@gmail.com',
            'password' => Hash::make('aggun123'),
            'level' => 'staff',
        ]);
        $this->command->info("User berhasil dibuat");
    }
}
