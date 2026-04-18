@extends('admin.layouts.main')
@section('content')

<div class="main-w3layouts wrapper">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    <h1 style="margin-left:400px;margin-right:400px;padding:20px;border-radius:60px;background-color:#D19C97;color:navy;font-weight:bold;font-family:times;">
        Update Category</h1>
    <div class="main-agileinfo">
        <div class="agileits-top" style="background-color:#D19C97;">
            <form action="admin_update_category" method="post">
                @csrf
                @foreach($category as $key => $a)
                    <input type="hidden" name="categoryid" value="{{$a->id}}">
                    <input type="text" style="background-color:navy;border-radius:15px" name="categoryname" 
                    placeholder="category name" value="{{$a->categoryname}}" required><br>
                    @error('categoryname')
                    <div class="alert alert-danger mt-1 mb-1">
                        {{ $message }}
                    </div>
                    @enderror
                @endforeach
                <input type="submit" value="Update Category" 
                style="background-color:navy;color:white;border-radius:18px;">
            </form>
        </div>
    </div>
    <div style="width:90%;font-style:arial;font-weight:bold;font-size:15px;padding-left:330px">
        <table class="table table-dark table-striped" cellpadding="5px" cellspacing="5px">
            <thead>
                <tr style="text-align:center;">
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th colspan="3" style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $b)
                <tr>
                    <th scope="row">{{$b->id}}</th>
                    <td>{{$b->categoryname}}</td>
                    <td>
                        <form name="frm" method="post" action="admin_category_view">
                            @csrf
                            <input type="hidden" name="admin_category_id" value="{{$b->id}}" />
                            <button type="submit" class="btn btn-primary">View</button>
                        </form>
                    </td>
                    <td>
                        <form name="frm" method="post" action="admin_category_edit">
                            @csrf
                            <input type="hidden" name="admin_category_id" value="{{$b->id}}" />
                            <button type="submit" class="btn btn-success">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form name="frm" method="post" action="admin_category_delete">
                            @csrf
                            <input type="hidden" name="admin_category_id" value="{{$b->id}}" />
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