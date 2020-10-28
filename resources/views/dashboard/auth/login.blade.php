<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign in </title>
        <link rel="stylesheet" href="{{ asset('dashboard/assets/css/bootstrap.css') }}">
        <link rel="shortcut icon" href="{{ asset('dashboard/assets/images/favicon.svg') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('dashboard/assets/css/app.css') }}">
        @toastr_css
    </head>
    <body>
        <div id="auth">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-12 mx-auto">
                        <div class="card pt-4">
                            <div class="card-body">
                                <div class="text-center mb-5">
                                    <img src="{{ asset('dashboard/assets/images/favicon.svg') }}" height="48" class='mb-4'>
                                    <h3>Sign In</h3>
                                    <p>Please sign in to continue to Website.</p>
                                </div>
                                {{-- Hiển thị thông tin trạng thái tạo bài viết --}}
                                @if (session('errors'))
                                    <div class="alert alert-danger">{{session('errors')}}</div>
                                @endif

                                {{-- Hiển thị thông tin trạng thái tạo bài viết --}}
                                @if (session('notify'))
                                    <div class="alert alert-info">{{session('notify')}}</div>
                                @endif
                                <form action="{{ route("post.login") }}" method="POST" id="formLogin">
                                    @csrf
                                    <div class="form-group position-relative has-icon-left">
                                        <label for="username">Email</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" id="username" name="email" placeholder="Email">
                                            <div class="form-control-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group position-relative has-icon-left">
                                        <div class="clearfix">
                                            <label for="password">Password</label>
                                            <a href="auth-forgot-password.html" class='float-right'>
                                            <small>Forgot password?</small>
                                            </a>
                                        </div>
                                        <div class="position-relative">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                            <div class="form-control-icon">
                                                <i data-feather="lock"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-check clearfix my-4'>
                                        <div class="checkbox float-left">
                                            <input type="checkbox" id="checkbox1" class='form-check-input' >
                                            <label for="checkbox1">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('dashboard/assets/js/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/app.js') }}"></script>
        <script src="{{ asset('dashboard/assets/js/main.js') }}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- DataTables -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <!-- Validate Jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
        @toastr_js
        @toastr_render
    </body>
</html>