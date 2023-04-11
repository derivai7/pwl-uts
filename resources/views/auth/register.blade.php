<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    @include('layouts.css')

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-header login-logo font-weight-bold">
            Register
        </div>
        <form action="{{ url('register') }}" method="post">
            <div class="card-body login-card-body">
                @csrf
                <div class="mb-3">
                    <label class="d-block">
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               placeholder="Name" value="{{ old('name') }}">
                        @error('name')
                        <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </label>

                </div>
                <div class="mb-3">
                    <label class="d-block">
                        <input name="username" type="text" class="form-control @error('username') is-invalid @enderror"
                               placeholder="Username" value="{{ old('username') }}">
                        @error('username')
                        <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </label>
                </div>
                <div class="mb-3">
                    <label class="d-block">
                        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                        <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </label>
                </div>
                <div class="mb-3">
                    <label class="d-block">
                        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                               placeholder="Password">
                        @error('password')
                        <small class="text-danger">{{ $message }} </small>
                        @enderror
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <div class="card-body border-top">
                <div>
                    Already have an account? <a href="{{ url('login') }}">Login</a>.
                </div>
            </div>
        </form>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

@include('layouts.js')
</body>
</html>
