@extends('admin.layouts.main')
@section('content')
<div class="card">
    <div class="card-header">
        <h1 style="font-weight:bolder;font-size:45px;color:white;background-color:#D19C97;border-radius:45px;padding-left:100px;">
        View Author</h1>
    </div>
    <div class="card-body">
        <div class="card-body" style="padding-left:330px;color:navy;background-color:#D19C97;font-weight:bolder;">
            @foreach($category as $a)
            <h3 class="card-text">Category ID : {{ $a->id }}</h3>
            <h2 class="card-text">Category Name : {{ $a->categoryname }}</h2>
            <a href="admin_category" class="btn btn-success">Back to Main Page</a>
            @endforeach
        </div>
        </hr>
    </div>
</div>
@endsection