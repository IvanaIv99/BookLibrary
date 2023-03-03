@extends('frontend.layouts.layout')

@section('content')

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style="    background-image: url(assets/img/hero-section.png);
    background-position: center;
    background-size: cover;background-repeat: no-repeat;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <img src="<?=asset('assets/img/favicons/favicon-32x32.png')?>"/>
                                        <h1 class="h4 mt-1 text-gray-900 mb-4 text-bold" style="color: #3a1d40;"> BookLibrary</h1>
                                    </div>

                                    <div class="ajaxErrors"> </div>

                                    <form id="loginForm" class="d-flex flex-column " method="" action="" >
                                        @csrf
                                        <div class="form-group mb-2">
                                            <input type="email" class="form-control form-control-user"
                                                   id="email" name="email" aria-describedby="emailHelp"
                                                   placeholder="Email" required>

                                        </div>

                                        <div class="form-group mb-2">
                                            <input type="password" class="form-control form-control-user"
                                                   id="password" name="password" placeholder="Password">

                                        </div>

                                        <button type="submit" class=" mb-2 btn btn-primary btn-user btn-block">
                                            Login
                                        </button>

                                        <div id="errors-list">

                                        </div>


                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
