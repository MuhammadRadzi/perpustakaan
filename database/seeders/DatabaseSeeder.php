<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $fiksi = \App\Models\Category::create([
            'name' => 'Fiksi',
        ]);
        $pelajaran = \App\Models\Category::create([
            'name' => 'Pelajaran',
        ]);
        $teknologi = \App\Models\Category::create([
            'name' => 'Teknologi',
        ]);

        // Seed data for books
        \App\Models\Book::create([
            'category_id' => $fiksi->id,
            'judul' => 'Laskar Pelangi',
            'penulis' => 'Andrea Hirata',
            'penerbit' => 'Gramedia',
            'tahun' => 2005,
            'stok' => 10,
        ]);

        Book::create([
            'category_id' => $pelajaran->id,
            'judul' => 'Matematika Dasar',
            'penulis' => 'John Doe',
            'penerbit' => 'Penerbit ABC',
            'tahun' => 2010,
            'stok' => 5,
        ]);

        Book::create([
            'category_id' => $teknologi->id,
            'judul' => 'Pemrograman PHP',
            'penulis' => 'Jane Smith',
            'penerbit' => 'Penerbit XYZ',
            'tahun' => 2020,
            'stok' => 5,
        ]);
    }
}
