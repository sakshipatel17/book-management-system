<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class AdminBackupCSVController extends Controller
{
    public function index()
    {
        // header('Content-Type: text/csv; charset=utf-8');
        // header('Content-Disposition: attachment; filename=books-' . date("Y-m-d-h-i-s") . '.csv');
        //if (($fp = fopen(storage_path() . "\students.csv", 'r')) !== false) {
        $output = fopen(storage_path() . "\booksCSV.csv", 'w');
        fputcsv($output, array('Id', 'Bookame', 'Authorname', 'Image', 'Price', 'Discount', 'Qty'));
        $books = Book::get();
        if (count($books) > 0) 
        {
            foreach ($books as $book) 
            {
                $book_row = [
                    $book['id'],
                    ucfirst($book['bookname']),
                    ucfirst($book['authorname']),
                    $book['image'],
                    $book['price'],
                    $book['discount'],
                    $book['qty']
                ];

                fputcsv($output, $book_row);
            }
        }
        return redirect()->route('admin_dashboard')->with('success_csv', 'All Books Backuped Successfully..!!!\n\nGoto storage folder and check booksCSV.csv');
    }
}
