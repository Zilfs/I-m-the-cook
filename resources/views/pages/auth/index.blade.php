@extends('layouts.app')

@section('contents')
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-start">
                                    <div class="d-flex py-5 w-100 align-items-center">
                                        <div class="w-25">
                                            <img src="/template/assets/img/app-icon.png" class="w-50" alt="">
                                        </div>
                                        <div class="w-75 align-items-center">
                                            <p class="font-weight-bolder mt-3">I'm the cook restaurant</p>
                                        </div>

                                    </div>
                                    <h4 class="font-weight-bolder">Sign In</h4>
                                    <p class="mb-0">Enter your credentials to access our dashboard</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="{{ route('authenticate') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-lg"
                                                placeholder="Username" aria-label="Username" name="username">
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control form-control-lg"
                                                placeholder="Password" aria-label="Password" name="password">
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="showPw">
                                            <label class="form-check-label" for="showPw">Show Password</label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div
                            class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
                                style="background-image: url('/template/assets/img/login-image.jpg');
          background-size: cover;">
                                <span class="mask bg-black opacity-6"></span>
                                <h2 class="mt-5 text-white font-weight-bolder position-relative">"Welcome aboard fellows!"
                                </h2>
                                <p class="text-white position-relative">As you log in, you gain access to the heart of our
                                    culinary operations.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
