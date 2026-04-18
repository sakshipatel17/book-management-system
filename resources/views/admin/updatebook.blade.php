@extends('admin.layouts.main')
@section('content')

<div class="main-w3layouts wrapper">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    <h1 style="margin-left:400px;margin-right:400px;padding:20px;border-radius:60px;background-color:#D19C97;color:white;font-weight:bold;font-family:times;">
    Update Book</h1>
    <div class="main-agileinfo">
        <div class="agileits-top" style="background-color:#D19C97;">
            <form action="admin_update_book" method="post" enctype="multipart/form-data">
                @csrf
                @foreach($book as $key => $a)
                <input type="hidden" name="bookid" value="{{$a->id}}">

                <input style="background-color:#D19C97" type="text" name="bookname" value="{{$a->bookname}}" required><br>
                @error('bookname')
                <div class="alert alert-danger mt-1 mb-1">
                    {{ $message }}
                </div>
                @enderror

                <label>Author Name : </label>
                <select name="authorname" style="height:30px;width:315px;background-color:#D19C97;color:white;">
                    @foreach($aut as $a)
                    <option name="{{$a->authorname}}" value="{{$a->authorname}}">{{$a->authorname}}</option>
                    @endforeach
                </select>
                <br><br>

                <input style="background-color:#D19C97" type="text" name="price" value="{{$a->price}}" required><br>
                @error('price')
                <div class="alert alert-danger mt-1 mb-1">
                    {{ $message }}
                </div>
                @enderror

                <input style="background-color:#D19C97" type="text" name="qty" placeholder="Quantity in Stock" value="{{$a->qty}}" required><br>
                @error('qty')
                <div class="alert alert-danger mt-1 mb-1">
                    {{ $message }}
                </div>
                @enderror

                <input style="background-color:#D19C97" type="text" name="discount" placeholder="Discount if any" value="{{$a->discount}}" required><br>
                @error('discount')
                <div class="alert alert-danger mt-1 mb-1">
                    {{ $message }}
                </div>
                @enderror

                <label>Select Book Category : </label>
                <select name="categoryname" style="height:30px;width:420px;background-color:#D19C97;color:white;font-weight:bolder;">
                    @foreach($cat as $c)
                    <option name="{{$c->categoryname}}" value="{{$c->categoryname}}">{{$c->categoryname}}</option>
                    @endforeach
                </select>
                <br><br>

                <label>Select Book Image : </label><br>
                <input type="file" name="image" placeholder="Book Image"><br>
                @error('image')
                <div class="alert alert-danger mt-1 mb-1">
                    {{ $message }}
                </div>
                @enderror
                <input type="submit" value="Update Book" style="background-color:navy;color:white;border-radius:18px;">
                @endforeach
            </form>
        </div>
    </div>

    <div style="width:90%;font-style:arial;font-weight:bold;font-size:15px;padding-left:330px">
        <table class="table table-dark table-striped" cellpadding="5px" cellspacing="5px">
            <thead>
                <tr style="text-align:center;">
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th>Cover Image</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Quantity</th>
                    <th colspan="3" style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $b)
                <tr>
                    <th scope="row">{{$b->bookname}}</th>
                    <td>{{$b->authorname}}</td>
                    <td><img src="{{url('uploads/'. $b->image)}}" height="120px" width="80px" style="border-radius:5px"></td>
                    <td>{{$b->price}}</td>
                    <td>{{$b->discount}}</td>
                    <td>{{$b->qty}}</td>
                    <td>
                        <form name="frm" method="post" action="admin_book_view">
                            @csrf
                            <input type="hidden" name="admin_book_id" value="{{$b->id}}" />
                            <button type="submit" class="btn btn-primary">View</button>
                        </form>
                    </td>
                    <td>
                        <form name="frm" method="get" action="admin_book_edit">
                            @csrf
                            <input type="hidden" name="admin_book_id" value="{{$b->id}}" />
                            <button type="submit" class="btn btn-success">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form name="frm" method="post" action="admin_book_delete">
                            @csrf
                            <input type="hidden" name="admin_book_id" value="{{$b->id}}" />
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- //main -->
@endsection