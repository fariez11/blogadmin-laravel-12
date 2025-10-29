<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // sebenarnya bisa digabung di DatabaseSeeder tapi ini untuk contoh sajaa klo bisa di pisah di sini (supaya terstruktur)
        User::factory()->create([
            'name'      => 'zhafira',
            'username'  => 'admin',
            'email'     => 'admin@admin.com',
            'password'  => Hash::make('admin123'),
            'is_admin'  => true,
            'is_active' => true,
        ]);
        // kenapa masih menggunakan factory()? karena untuk mengisi field lain yang tidak disebutkan di atas secara random oleh faker

    }
}
