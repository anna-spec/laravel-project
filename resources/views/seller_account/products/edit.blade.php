@extends('seller_account.layout') @section('content')

    <div class="tab-content container  m-5 w-50">
        <div class="tab-pane  active" id="settings">
            <form role="form"  action="{{url(url('seller/update-product-action/'.$product->id))}}"  method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group mt-3">
                    <img width="150" src="{{asset('storage/product/'.$product->image) }}" class="" alt="profile-image"><br>

                    <div class="fileUpload px-3 py-2 btn btn-primary">
                         <span>Edit product image</span>
                    <input type="file" id="image" value="{{$product->image}}" class="upload btn btn-warning m-4"  name="image"  >
                    </div>
                </div>
                <div class="form-group mt-3">
                    <label for="Email">Title</label>
                    <input type="text" id="name" value="{{$product->title}}" class="mt-2 form-control"  name="title" >
                </div>
                <div class="form-group mt-3">
                    <label for="Username">Description</label>
                    <input style="height: 125px" id="description" class="mt-2 form-control" name="description"  value="{{$product->description}}">
                </div>
                <div class="form-group mt-3">
                    <label for="Username">Price</label>
                    <input type="text" id="price" class="mt-2 form-control"  name="price"  value="{{$product->price}}">
                </div>
                <div class="form-group mt-3">
                    <label for="Username">Status</label>
                    <select  type="" id="status" class="mt-2 form-control"  name="status">
                        <option  value="inactive">Inactive</option>
                        <option  value="active">Active</option>
                    </select>

                </div>
                <input class="btn btn-success  mt-4" type="submit"  value="Update">
            </form>
        </div>
    </div>

@endsection
