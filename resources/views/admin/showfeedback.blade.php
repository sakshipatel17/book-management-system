@extends('admin.layouts.main')
@section('content')
<div style="width:90%;font-style:arial;font-weight:bold;font-size:15px;padding-left:330px;">
    <br><br><br><br>
    <table class="table table-dark table-striped" cellpadding="5px" cellspacing="5px">
        <thead>
            <tr>
                <th style="text-align:center;font-size:45px;font-family:times;" colspan="5">F E E D B A C K S</th>
            </tr>
            <tr>
                <th>Full Name</th>
                <th>Email ID</th>
                <th>Text</th>
                <th colspan="2" style="text-align:center;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $b)
            <tr>
                <th scope="row">{{$b->fullname}}</th>
                <td>{{$b->email}}</td>
                <td>{{$b->message}}</td>
                <td>
                    <form name="frm" method="post" action="admin_feedback_view">
                        @csrf
                        <input type="hidden" name="admin_feedback_id" value="{{$b->id}}" />
                        <button type="submit" class="btn btn-primary">View</button>
                    </form>
                </td>
                <td>
                    <form name="frm" method="post" action="admin_feedback_delete">
                        @csrf
                        <input type="hidden" name="admin_feedback_id" value="{{$b->id}}" />
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection