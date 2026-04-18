<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;

class BookController extends Controller
{
    public function index()
    {
        $cat = Category::all();
        $aut = Author::all();
        $books = Book::all();
        return view('admin.book', compact(['cat', 'books', 'aut']));
    }
    public function save_book_fun(Request $request)
    {
        $request->validate([
            'bookname' => 'required',
            'authorname' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'discount' => 'required',
            'image' => 'required|image',

        ]);
        $book = new Book;
        $book->bookname = $request->bookname;
        $book->authorname = $request->authorname;
        $book->price = $request->price;
        $book->qty = $request->qty;
        $book->discount = $request->discount;

        $catgry = Category::where('categoryname', '=', $request->categoryname)->get();
        $bkid = '';
        foreach ($catgry as $cat) {
            $bkid = $cat->id;
        }
        $book->catid = $bkid;
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/', $filename);
        $book->image = $filename;
        $book->save();

        return back()->with('success', 'Book Successfully Added..!!');
    }
    public function admin_book_view(Request $request)
    {
        $books = Book::where('id', '=', $request->admin_book_id)->get();
        return view('admin.showbooks', compact('books'));
    }
    public function admin_book_edit(Request $request)
    {
        $cat = Category::all();
        $aut = Author::all();
        $books = Book::all();
        $book = Book::where('id', '=', $request->admin_book_id)->get();
        return view('admin.updatebook', compact(['book','books','cat','aut']));
    }
    public function update_book_fun(Request $request)
    {
        $request->validate([
            'bookname' => 'required',
            'authorname' => 'required',
            'price' => 'required',
            'qty' => 'required',
            'discount' => 'required',
            'image' => 'required|image',

        ]);
        $book = Book::find($request->bookid);
        $book->bookname = $request->bookname;
        $book->authorname = $request->authorname;
        $book->price = $request->price;
        $book->qty = $request->qty;
        $book->discount = $request->discount;

        $catgry = Category::where('categoryname', '=', $request->categoryname)->get();
        $bkid = '';
        foreach ($catgry as $cat) {
            $bkid = $cat->id;
        }
        $book->catid = $bkid;
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $file->move('uploads/', $filename);
        $book->image = $filename;
        $book->save();

        $cat = Category::all();
        $aut = Author::all();
        $books = Book::all();
        return view('admin.book', compact(['cat', 'books', 'aut']));
    }
    public function admin_book_delete(Request $request)
    {
        $book = Book::find($request->admin_book_id);
        $book->delete();
        $cat = Category::all();
        $aut = Author::all();
        $books = Book::all();
        return view('admin.book', compact(['cat', 'books', 'aut']));       
    }
}
