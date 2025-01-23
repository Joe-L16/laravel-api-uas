<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create(['name' => 'Author 1', 'birthdate' => '1980-01-01', 'email' => 'author1@example.com']);
        Author::create(['name' => 'Author 2', 'birthdate' => '1985-02-02', 'email' => 'author2@example.com']);
        Author::create(['name' => 'Author 3', 'birthdate' => '1990-03-03', 'email' => 'author3@example.com']);
        Author::create(['name' => 'Author 4', 'birthdate' => '1975-04-04', 'email' => 'author4@example.com']);
        Author::create(['name' => 'Author 5', 'birthdate' => '1982-05-05', 'email' => 'author5@example.com']);
    }
}
