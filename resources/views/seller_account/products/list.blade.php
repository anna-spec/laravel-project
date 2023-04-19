@extends('seller_account.layout') @section('content')
    <main>
        <div class="card mb-4">
            <div class="card-header  d-flex justify-content-between">
                <div><i class="fas fa-table me-1"></i>
                    Product Table</div>
                <button class="btn btn-danger mb-2 px-4  py-1 "><a class="text-light text-decoration-none" href="{{route('add.product')}}">Add product</a></button>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Status</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->status}}</td>
                        <td> <img width="100" src="{{asset('storage/product/'.$product->image) }}" class="" alt="profile-image"></td>
                         <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->created_at}}</td>
                        <td>{{$product->price}} $</td>
                        <td><button class="btn btn-secondary py-1 px-4"><a class="text-light text-decoration-none" href="{{url('seller/edit-product/'.$product->id)}}"> Edit</a></button><br>
                            <button class="btn btn-primary px-3  py-1 mt-2"><a class="text-light text-decoration-none" href="{{url('seller/delete-product/'.$product->id)}}">Delete</a></button></td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
