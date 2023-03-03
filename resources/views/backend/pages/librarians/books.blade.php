@extends('backend.layouts.layout')

@section('content')

    <!-- Page Wrapper -->

    <div class="container-fluid">

        <div class="pull-right mb-2">
            <a class="btn btn-success" onClick="add_action('BookForm','BookModal','book-modal','Add Book')" href="javascript:void(0)"> Add Book</a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Books</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="books_table" data-url="{{ route('librarian.dashboard.books') }}">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Book Number</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <!-- boostrap employee model -->
        <div class="modal fade" id="book-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="BookModal"></h4>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:void(0)" id="BookForm" name="BookForm" class="form-horizontal" method="POST" enctype="multipart/form-data" data-url="{{ route('librarian.dashboard.books.create') }}">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="title" name="title"  maxlength="50" required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="description" name="description"  maxlength="50" required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Book Number</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="book_number" name="book_number" maxlength="50" required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Author</label>
                                <select class="select_author" id="select_author" name="select_author" required="true">
                                    <option value="0">Select</option>
                                    @foreach($authors as $author)
                                        <option value="{{$author->id}}">{{$author->name . " " . $author->surname}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="btn-save-books">Save changes
                                </button>
                            </div>

                            <div id="errors-list">

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <!-- end bootstrap model -->

    </div>



@endsection
