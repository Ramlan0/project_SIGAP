<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Report;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first(); // ambil user pertama
        $category = Category::first(); // ambil kategori pertama

        if ($user && $category) {
            Report::create([
                'user_id' => $user->id,
                'category_id' => $category->id,
                'judul' => 'Lampu Jalan Mati di Jl. Mawar',
                'deskripsi' => 'Lampu jalan padam total selama 3 malam terakhir.',
                'status' => 'Pending',
            ]);
        } else {
            $this->command->error('Pastikan sudah ada data user dan kategori sebelum menjalankan seeder ini.');
        }
    }
}
