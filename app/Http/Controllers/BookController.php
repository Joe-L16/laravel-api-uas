<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Mengambil semua buku beserta penulisnya
        $books = Book::with('author')->get();

        // Mengembalikan data dalam format JSON
        return response()->json($books);
    }

        public function store(Request $request)
    {
            // Validasi input menggunakan aturan dari model
             $validatedData = $request->validate(Book::rules());

            // Membuat buku baru jika validasi berhasil
            $book = Book::create($validatedData);

        return response()->json($book, 201); // Mengembalikan response JSON dengan status 201
    }
}
