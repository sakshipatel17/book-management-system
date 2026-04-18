<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index()
    {
        $allBooks = Book::all();
        return view('checkout', compact('allBooks'));
    }
}
