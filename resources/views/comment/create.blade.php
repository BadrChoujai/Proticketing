@extends('layouts.globale')
@section('content')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<div class="container-fluid">
    <div class="container">
        <div class="card-1">
        <div class="row">
        <div class="col-md-12" style="margin-left:30px;">
        <form action="{{url('comments')}}" method="post"><br>
        @csrf
        <h2>add a new comment</h2><br>
            <div class="form-group">
            <label for="">body</label>
            <textarea type="text"  name="body" class="form-control" style="width: 30%;"></textarea>
              <br>
              @if(!hasRole('agent'))
              <label for="">user</label> 
              <select name="user_id"  required style="width:30% ;border-radius: 2px;"  class="form-control" id="exampleFormControlSelect1" class="form-select form-select-lg mb-3 addticket">
               @foreach($users as $user)
                  <option value="{{$user->id}}">{{ $user->name }}</option>
               @endforeach
               </select>
               @endif

               <br>
               @if(!hasRole('agent'))
              <label for="">ticket</label>
                <select name="ticket_id" required style="width:30% ;border-radius: 2px;"  class="form-control" id="exampleFormControlSelect1" class="form-select form-select-lg mb-3 addticket">
               @foreach($tickets as $ticket)
                  <option value="{{$ticket->id}}">{{ $ticket->subject }}</option>
               @endforeach
               </select>
                 @endif
            </div><br>
            <div class="form-group" style="margin-right:60px; margin-bottom:80px; float: right">
            <label for=""></label>
            <input type="submit"  class="btn btn-primary" class="form-control" value="Save">
            </div>
        </form>
        </div>
    </div>
</div>

@stop
