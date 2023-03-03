@extends('backend.layouts.layout')

@section('content')

    <!-- Page Wrapper -->

    <div class="container-fluid">

        <div class="pull-right mb-2">
            <a class="btn btn-success" onClick="add_action('ReaderForm','ReaderModal','reader-modal','Add Reader')" href="javascript:void(0)"> Add Reader</a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Readers</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="readers_table" data-url="{{ route('librarian.dashboard.readers') }}">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        <!-- boostrap model -->
        <div class="modal fade" id="reader-modal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="ReaderModal"></h4>
                    </div>
                    <div class="modal-body">
                        <form action="javascript:void(0)" id="ReaderForm" name="ReaderForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="title" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="name" name="name"  maxlength="50" required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="surname" class="col-sm-2 control-label">Surname</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="surname" name="surname"  maxlength="50" required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="email" name="email" maxlength="50" required="true">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" id="password" name="password" maxlength="50" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password" class="col-sm-2 control-label">Confirm Password</label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" maxlength="50" >
                                </div>
                            </div>
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="btn-save-reader">Save changes
                                </button>
                            </div>
                        </form>

                        <div id="errors-list">

                        </div>

                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <!-- end bootstrap model -->

    </div>



@endsection
