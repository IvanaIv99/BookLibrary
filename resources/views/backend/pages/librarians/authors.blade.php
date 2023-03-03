@extends('backend.layouts.layout')

@section('content')

    <!-- Page Wrapper -->

    <div class="container-fluid">

        <div class="pull-right mb-2">
            <a class="btn btn-success" onClick="add_action('AuthorForm','AuthorModal','author-modal','Add Author')" href="javascript:void(0)"> Add Author</a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Authors</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="authors_table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Added By</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <!-- boostrap employee model -->
        <div class="modal fade" id="author-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="AuthorModal"></h4>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:void(0)" id="AuthorForm" name="AuthorForm" class="form-horizontal" method="POST" enctype="multipart/form-data" data-url="{{ route('librarian.dashboard.authors.create') }}">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Author Name" maxlength="50" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Surname</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter Author Surname" maxlength="50" required="">
                                </div>
                            </div>
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="btn-save">Save changes
                                </button>
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
