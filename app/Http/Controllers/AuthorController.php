<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;


class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('admin.author', compact('authors'));
    }

    public function save_author_fun(Request $request)
    {
        $request->validate([
            'authorname' => 'required',
            'description' => 'required',
        ]);
        $author = new Author;
        $author->authorname = $request->authorname;
        $author->description = $request->description;
        $author->save();
        return back()->with('success', 'Author Successfully Added..!!');
    }
    public function admin_author_view(Request $request)
    {
        $author = Author::where('id', '=', $request->admin_author_id)->get();
        return view('admin.showauthor', compact('author'));
    }
    public function admin_author_edit(Request $request)
    {
        $authors = Author::all();
        $author = Author::where('id', '=', $request->admin_author_id)->get();
        return view('admin.updateauthor', compact(['author','authors']));
    }
    public function update_author_fun(Request $request)
    {
        $request->validate([
            'authorname' => 'required',
            'description' => 'required',
        ]);
        $author = Author::find($request->authorid);
        $author->authorname = $request->authorname;
        $author->description = $request->description;
        $author->save();
        $authors = Author::all();
        return view('admin.author', compact('authors'));
    }
    public function admin_author_delete(Request $request)
    {
        $author = Author::find($request->admin_author_id);
        $author->delete();
        $authors = Author::all();
        return view('admin.author', compact('authors'));        
    }
}
