<?php

namespace App\Http\Controllers\Back\Librarians;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class BooksController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $books = Book::with('author');
        $authors = Author::all();

        if(request()->ajax()) {
            return datatables()->of($books)
                ->addColumn('action', 'backend.pages.librarians.components.books_action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.pages.librarians.books')->with('authors',$authors)->with('title','Books');
    }

    public function create(Request $request)
    {

        $BookId = $request->id;

        $validator = Validator::make($request->all(), [
            'book_number' => 'required|integer|unique:books,book_number,'.$BookId,
            'select_author' => 'required|exists:authors,id'
        ]);

        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors(),'status' => false]);
        }

        $book   =   Book::updateOrCreate(
            [
                'id' => $BookId
            ],
            [
                'title' => $request->title,
                'description' => $request->description,
                'book_number' => $request->book_number,
                'author_id' => $request->select_author,
            ]);


        return response()->json($book);


    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $book  = Book::where($where)->first();

        return Response()->json($book);
    }

    public function destroy(Request $request)
    {
        $author = Book::where('id',$request->id)->delete();

        return Response()->json($author);
    }
}
