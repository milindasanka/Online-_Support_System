@extends('layouts.app')
@section('content')
    <style>
        .lbl{
            color: blue;
            text-decoration-style: double;
        }
        .form-group{
            margin: 10px;
        }

    </style>

    <div class="container">
        <div>@foreach($tickets as $ticket)
            <h1 id="head">Ticket Reference No : {{$ticket->reference}} </h1>
            <form action="/update_ticket"method="POST">
                @csrf
                <div class="form-group">
                    <label class="lbl" for="exampleFormControlInput1">Customer Name</label>
                    <input type="text" class="form-control" name="name" id="exampleFormControlInput1" value="{{$ticket->name}}" disabled>
                    <input type="hidden" name="reference" value="{{$ticket->reference}}">
                </div>
                <div class="form-group">
                    <label class="lbl" for="exampleFormControlInput1">Email</label>
                    <input type="email" class="form-control" name="email" id="exampleFormControlInput1" value="{{$ticket->email}}" disabled>
                </div>
                <div class="form-group">
                    <label class="lbl" for="exampleFormControlInput1">Phone</label>
                    <div class="input-group">
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{$ticket->phone}}" maxlength="9" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="lbl" for="exampleFormControlTextarea1">Problem Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" disabled>{{$ticket->Description}}</textarea>
                </div>
                <div class="form-group">
                    <label class="lbl" for="exampleFormControlTextarea1">Reply For Ticket</label>
                    <textarea class="form-control" name="reply" id="exampleFormControlTextarea1" rows="3" Required>{{$ticket->Description}}</textarea>
                </div><br>
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-success btn-lg">UPDATE TICKET</button>
                </div>
                <br>
            </form>
            @endforeach
        </div>
    </div>
    @include('sweetalert::alert')


@endsection
