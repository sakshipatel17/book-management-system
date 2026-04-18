@extends('admin.layouts.main')
@section('content')

<div class="main-w3layouts wrapper">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif

    <h1 style="margin-left:400px;margin-right:400px;padding:20px;border-radius:60px;background-color:#D19C97;color:navy;font-weight:bold;font-family:times;">Add New Author</h1>
    <div class="main-agileinfo">
        <div class="agileits-top" style="background-color:#D19C97;">
            <form action="admin_save_author" method="post">
                @csrf
                <input type="text" style="background-color:#D19C97;border-radius:15px" 
                name="authorname" placeholder="authorname" value="{{old('authorname')}}" required><br>
                @error('authorname')
                <div class="alert alert-danger mt-1 mb-1">
                    {{ $message }}
                </div>
                @enderror
                <input type="text" style="background-color:#D19C97;border-radius:15px" 
                name="description" placeholder="description" value="{{old('description')}}" required><br>
                @error('description')
                <div class="alert alert-danger mt-1 mb-1">
                    {{ $message }}
                </div>
                @enderror

                <input type="submit" value="Add Author" style="background-color:navy;color:white;border-radius:18px;">
            </form>
        </div>
    </div>
    <div style="width:90%;font-style:arial;font-weight:bold;font-size:15px;padding-left:330px">
        <table class="table table-dark table-striped" cellpadding="5px" cellspacing="5px">
            <thead>
                <tr style="text-align:center;">
                    <th>Author Name</th>
                    <th>Description</th>
                    <th colspan="3" style="text-align:center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $b)
                <tr>
                    <th scope="row">{{$b->authorname}}</th>
                    <td>{{$b->description}}</td>
                    <td>
                        <form name="frm" method="post" action="admin_author_view">
                            @csrf
                            <input type="hidden" name="admin_author_id" value="{{$b->id}}" />
                            <button type="submit" class="btn btn-primary">View</button>
                        </form>
                    </td>
                    <td>
                        <form name="frm" method="post" action="admin_author_edit">
                            @csrf
                            <input type="hidden" name="admin_author_id" value="{{$b->id}}" />
                            <input type="hidden" name="admin_book_id" value="{{$b->bookid}}" />
                            <button type="submit" class="btn btn-success">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form name="frm" method="post" action="admin_author_delete">
                            @csrf
                            <input type="hidden" name="admin_author_id" value="{{$b->id}}" />
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