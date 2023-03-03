<?php

namespace App\Http\Controllers\Back\Readers;

use App\Models\Book;

class BooksController extends DashboardController
{

    public function index()
    {
        $books = Book::with('author');

        if(request()->ajax()) {
            return datatables()->of($books)
                ->addIndexColumn()
                ->make(true);
        }

        return view('backend.pages.readers.books');
    }


}
