@section('nav')
    <div class="w-100    justify-content-between  p-3  mb-3 bg-white border-bottom box-shadow">


        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">Shop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse  d-flex justify-content-between" id="navbarSupportedContent">
                    <div class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link " id="navbarDropdown" href="{{route('shop')}}" role="button">Shop</a>
                        </li>
                        @if(!Auth::check())
                            <li class="btn btn-light border btn-outline-light"><a class="btn-outline-light"
                                                                                  href="../signup">Sign up</a></li>
                            <li class="btn btn-light border btn-outline-light"><a class="btn-outline-light"
                                                                                  href="../login">Login</a></li>
                        @else
                        </div>
                        <div  class="d-flex justify-content-between w-25">
                            <div>
                            <form class="d-flex" method="get"  action="{{route('show.basket')}}">
                                <button class="btn btn-outline-dark" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Cart
                                    <span class="badge bg-dark text-white ms-1 rounded-pill">{{$count}}</span>
                                </button>
                            </form>
                            </div>
                            <div>

                            <ul class="navbar-nav ms-auto ms-md-0 me-lg-4">
                                <li class="nav-item dropdown">
                                    <a class=" p-0 nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img
                                          width="24px"  src="{{asset('images/icons8-customer-30.png')}}" alt=""></a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                        <li><a class="dropdown-item" href="{{auth()->user()->role=='seller' ? url('seller/profile') : url('customer/profile')}}">Profile</a></li>
                                        <li><hr class="dropdown-divider" /></li>
                                        <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                            </div>
                        </div>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div>
        </div>
    </div>


