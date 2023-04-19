@extends('seller_account.layout') @section('content')

<div class="tab-content container  m-5 w-50">
    <div class="tab-pane  active" id="settings">
        <form role="form"  action="{{route('create.product')}}"  method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-3">
                <label for="Image">Product image</label>
                <input type="file" id="image" class="mt-2 form-control"  name="image">
            </div>
            <div class="form-group mt-3">
                <label for="Title">Title</label>
                <input type="text" id="title" class="mt-2 form-control"  name="title">
            </div>
            <div class="form-group mt-3">
                <label for="Description">Description</label>
                <input type="text" id="description" class="mt-2 form-control" name="description">
            </div>
            <div class="form-group mt-3">
                <label for="Price">Price</label>
                <input type="text" id="price" class="mt-2 form-control"  name="price">
            </div>
            <div class="form-group mt-3">
                <label for="Username">Status</label>
                <select  type="" id="status" class="mt-2 form-control"  name="status">
                    <option  value="inactive">Inactive</option>
                    <option  value="active">Active</option>
                </select>

            </div>
            <input class="btn btn-success  mt-5" type="submit"  value="Add">
        </form>
    </div>
</div>

@endsection
