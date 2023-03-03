<?php

namespace App\Http\Controllers\Back\Librarians;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;


class AuthorsController extends Controller
{

    public function index()
    {

        $authors = Author::with('librarian');

        if(request()->ajax()) {
            return datatables()->of($authors)
                ->addColumn('action', 'backend.pages.librarians.components.authors_action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.pages.librarians.authors')->with('title','Authors');
    }


    public function create(Request $request)
    {

        $AuthorId = $request->id;

        $author   =   Author::updateOrCreate(
            [
                'id' => $AuthorId
            ],
            [
                'name' => $request->name,
                'surname' => $request->surname,
                'librarian_id' => auth()->user()->id,
            ]);

        return Response()->json($author);


    }

    public function edit(Request $request)
    {

        $author  = Author::where('id',$request->id)->first();

        return Response()->json($author);
    }

    public function destroy(Request $request)
    {
        $author = Author::where('id',$request->id)->delete();
        return Response()->json($author);
    }
}
