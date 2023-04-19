@extends('layout') @section('content')

    <div class="container  mt-5 mb-5">
        <h1 class="mt-4 auth_txt  w-25  m-auto">Sign Up</h1>
        <form action="{{route('submit.register.form')}}" class="w-25  m-auto" method="post">
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif

            @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <div class="mt-4">
                <label>Sign up as</label>
                <select type="" id="role" class="mt-2 form-control" name="role">
                    <option value="seller">Seller</option>
                    <option value="customer">Customer</option>
                </select>

            </div>
            <div class="mt-4">
                <input class="form-control" type="text" name="name" placeholder="name" value="{{old('name')}}">
                <span class="text-danger">@error('name'){{$message}}@enderror</span>
            </div>
            <div class="mt-4">
                <input class="form-control" type="email" name="email" placeholder="email" value="{{old('email')}}">
                <span class="text-danger">@error('email'){{$message}}@enderror</span>

            </div>
            <div class="mt-4">
                <input class="form-control" type="password" name="password" placeholder="password"
                       value="{{old('password')}}">
                <span class="text-danger">@error('password'){{$message}}@enderror</span>
            </div>
            <div class="mt-4  mb-4">
                <input type="submit" value="Sign Up" class="btn btn-primary">
            </div>
            <a href="login">Already have an account ? login</a>
        </form>
    </div>
@endsection
