@extends('dashboard.auth.auth')


@section('title')
Login
@endsection

@section('content')

<!-- auth page content -->
<div class="auth-page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mt-sm-5 mb-4 text-white-50">
                    <div>
                        <a href="index.html" class="d-inline-block auth-logo">
                            <img src="assets/images/logo-light.png" alt="" height="20">
                        </a>
                    </div>
                    <p class="mt-3 fs-15 fw-medium">welcome to login && Admin</p>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card mt-4">

                    <div class="card-body p-4">
                        <div class="text-center mt-2">

                            <p class="text-muted">Get your free velzon account now</p>
                        </div>
                        <div class="p-2 mt-4">
                            <form class="needs-validation" novalidate action="{{ route('admin.login.post') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="useremail"  class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="useremail" name="email" placeholder="Enter email address" required>
                                    <div class="invalid-feedback">
                                        Please enter email
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="password-input">Password</label>
                                    <div class="position-relative auth-pass-inputgroup">
                                        <input type="password" class="form-control pe-5 password-input" name="password" onpaste="return false" placeholder="Enter password" id="password-input" aria-describedby="passwordInput"  required>
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none shadow-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                        <div class="invalid-feedback">
                                            Please enter password
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                </div>



                                <div class="mt-4">
                                    <button class="btn btn-success w-100" type="submit">Login</button>
                                </div>

                                <div class="mt-4 text-center">

                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->



            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end auth page content -->

@endsection
