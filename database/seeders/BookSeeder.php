<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = Author::all();

    $genres = ['Fiction', 'Non-Fiction', 'Mystery', 'Science Fiction', 'Fantasy', 'Biography'];

    for ($i = 1; $i <= 10; $i++) {
        Book::create([
            'title' => 'Book Title ' . $i,
            'author_id' => $authors->random()->id, // Menghubungkan buku dengan author secara acak
            'published_year' => rand(2000, 2023), // Tahun publikasi secara acak
            'genre' => $genres[array_rand($genres)], // Mengambil genre secara acak
        ]);
    }
    }
}
