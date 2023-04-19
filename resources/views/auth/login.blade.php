@extends('layout')  @section('content')

    <div class="container  mt-5 mb-5">
        <div class="error_message">
            @error('msg'){{$message}}@enderror
            @error('email'){{$message}}@enderror
        </div>


        <h1 class="mt-4 auth_txt  w-25  m-auto">Login</h1>
        <form action="{{route('submit.login.form')}} " class="w-25  m-auto" method="post">
            @csrf
            <div class="form-group mt-3">
                <label for="Username">Login as</label>
                <select  type="" id="role" class="mt-2 form-control"  name="role">
                    <option  value="seller">Seller</option>
                    <option  value="customer">Customer</option>
                </select>

            </div>
            <div class="mt-4 form-group">
                <input class="form-control" type="email" name="email" placeholder="email" value="{{old('email')}}">
                <span class="text-danger "> @error('email'){{$message}}@enderror</span>
            </div>
            <div class="mt-4">
                <input class="form-control" type="password" name="password" placeholder="password">
                <span class="text-danger">@error('password'){{$message}}@enderror</span>
            </div>

            <div class="mt-4  mb-4">
                <input type="submit" value="Sign In" class="btn btn-primary">
            </div>
            <a href="signup">Create an account</a><br>
            <a href="{{ route('forget.password.get') }}">Forgot Password?</a>
        </form>
    </div>
@endsection

