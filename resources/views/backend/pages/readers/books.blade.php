@extends('backend.layouts.layout')

@section('content')

    <!-- Page Wrapper -->

    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Books</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="readers_books_table" data-url="{{ route('reader.dashboard.books') }}">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Book Number</th>
                            <th>Author</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>


    </div>



@endsection
