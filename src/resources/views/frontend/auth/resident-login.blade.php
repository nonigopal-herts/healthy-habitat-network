<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login | Healthy Habitat Network</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
</head>
<body>

<div
    class="container d-flex justify-content-center align-items-center vh-100"
>
    <div class="card p-4 col-md-6 col-lg-4">
        <h2 class="text-center mb-4 text-success">Welcome to Healthy Habitat Network</h2>
        <h3 class="text-center mb-4">Login</h3>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('resident.login') }}">
            @csrf
            <div class="mb-3">
                <label for="loginEmail" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="loginEmail" required />
            </div>
            <div class="mb-3">
                <label for="loginPassword" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="loginPassword" required />
            </div>
            <button type="submit" class="btn btn-group-sm btn-success">Login</button>
            <p class="text-center mt-3">
                Don't have an account?
                <a href="{{route('register')}}" class="text-secondary">Register</a>
            </p>
        </form>
    </div>
</div>

</body>
</html>
