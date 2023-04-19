


@extends('layout') @section('content')

    @if(session()->get('message'))
        <div class="alert alert-success" role="alert">
            <strong>Success: </strong>{{session()->get('message')}}
        </div>
    @endif

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container  mt-5 mb-5">
        <div class="row">

            <div class="col-lg-4 col-md-4">
                <div class="text-center card-box">
                    <div class="member-card">
                        <div class="thumb-xl member-thumb m-b-10 center-block">
                            <img  src="{{asset('storage/image/'. $user->image) }}" class=" mb-3 w-50 m-auto  img-circle img-thumbnail" alt="profile-image">
                            <form action="{{ route('profile.image.upload') }}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                <div class="fileUpload px-3 py-2 btn btn-primary">
                                    <span>Edit profile image</span>
                                    <input id="uploadBtn" type="file" name="file" class="upload btn btn-warning m-4" />
                                </div>
                                    @error('image')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                <button type="submit" class="px-3 py-2 btn  btn-warning">Save</button>
                            </form>


                        </div>

                        <div class="mt-3">
                            <h2 class="mt-3 mb-3 text-dark-700">{{ $user->name }}</h2>
                        </div>


                        <div class="text-left m-t-40">
                            <p class="mt-3 text-muted text-center font-13"><strong>Mobile :</strong><span class="m-l-15">{{ $user->phone }}</span></p>
                            <p class="mt-3 text-muted text-center font-13"><strong>Email :</strong> <span class="m-l-15">{{ $user->email }}</span></p>
                            <p class="mt-3 text-muted text-center font-13"><strong>Location :</strong> <span class="m-l-15">{{ $user->location }}</span></p>
                        </div>


                    </div>
                </div> <!-- end card-box -->


                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">{{ __('Chnage Password') }}</div>

                                <form action="{{ route('update.password') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @elseif (session('error'))
                                            <div class="alert alert-danger" role="alert">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        <div class="mb-3">
                                            <label for="oldPasswordInput" class="form-label">Old Password</label>
                                            <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                                   placeholder="Old Password">
                                            @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="newPasswordInput" class="form-label">New Password</label>
                                            <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                                   placeholder="New Password">
                                            @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                            <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                                   placeholder="Confirm New Password">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-success">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                <div>
                    <button class="btn btn-danger px-3  py-1 m-3 "><a class="text-light text-decoration-none" href="{{route('delete.user')}}">Delete account</a></button>
                    <button class="btn btn-warning px-3  py-1 m-3 "><a class="text-light text-decoration-none" href="{{route('logout')}}">Logout</a></button>
                </div>

            </div> <!-- end col -->


            <div class="col-md-6 col-lg-7">
                <div class="">
                    <div class="">
                        <div class="tab-content">
                            <div class="tab-pane  active" id="settings">
                                <form role="form"  action="{{route('profile.update')}}"  method="post">
                                    @csrf
                                    <div class="form-group mt-3">
                                        <label for="FullName">Full Name</label>
                                        <input type="text" value="{{ $user->name }}" id="FullName" class="form-control"  name="name">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="Email">Email</label>
                                        <input type="email" value="{{ $user->email }}" id="Email" class="form-control"  name="email">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="Username">Phone</label>
                                        <input type="text" value="{{ $user->phone }}" id="Username" class="form-control" name="phone">
                                    </div>
                                    <div class="form-group mt-3">
                                    <label for="location">Location</label>
                                    <select  type="" id="SelExample" class="mt-2 form-control"  name="location">

                                        @foreach($countries as $country)
                                        <option  value="{{ $country->name }}">{{ $country->name }}</option>
                                        @endforeach
                                        <option selected  value="{{ $selected }}">{{ $selected }}</option>
                                    </select>
                                    </div>
                                    <div class="form-group  mt-3">
                                        <label for="AboutMe">About Me</label>
                                        <textarea style="height: 125px" id="AboutMe" name="about_me" class=" form-control">{{ $user->about_me }}</textarea>
                                    </div>
                                    <input class="btn btn-primary bg-danger mt-3" type="submit"  value="Save">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>

@endsection

