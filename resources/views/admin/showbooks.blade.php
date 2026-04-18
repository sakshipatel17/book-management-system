@extends('admin.layouts.main')
@section('content')
<div class="card">
    <div class="card-header">
        <h1 style="font-weight:bolder;font-size:45px;color:white;background-color:#D19C97;border-radius:45px;padding-left:100px;">
            View Book Details</h1>
    </div>
    <div class="card-body">
        <div class="card-body" style="padding-left:330px;color:navy;background-color:#D19C97;font-weight:bolder;">
            <table cellspacing="150" cellpadding="150">
                @foreach($books as $book)
                <thead>
                    <tr>
                        <td>
                            <img src="{{url('uploads/'. $book->image)}}" height="200px" width="130px" alt="Cover Missing">
                            <h2 class="card-text">Book Name : {{ $book->bookname }}</h2>
                            <h3 class="card-text">Author Name : {{ $book->authorname }}</h3>
                            <h4 class="card-text">Price : Rs. {{ $book->price }}</h4>
                            <h4 class="card-text">Discount : {{ $book->discount }}%</h4>
                            <h4 class="card-text">Quantity in Stock : {{ $book->quantity }}</h4>
                            <a href="admin_book" class="btn btn-success">Back to Main Page</a>
                        </td>
                    </tr>
                </thead>

                @endforeach
            </table>
        </div>
        </hr>
    </div>
</div>
@endsection