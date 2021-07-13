@extends('layouts.globale')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
  <div class="container">
   <div class="card-1">
      <div class="row" >
      <div class="col-md-12">
         <form action="{{url('comments/' .$comment->id)}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="form-group">
               <br>
               <h2> <label for="">Update the comment:</label> </h2>
               <input type="text"  name="body" class="form-control" value="{{ $comment->body }}" style="width: 30%;" >
               @if(!hasRole('agent'))
               <br><label for="">user</label>
               <br> 
               <select name="user_id"   required style="width:30% ;border-radius: 2px;"  class="form-control" id="exampleFormControlSelect1" class="form-select form-select-lg mb-3 addticket">
                  @foreach($users as $user)
                  <option value="{{$user->id}}">{{ $user->name }}</option>
                  @endforeach
               </select>
               <br>
               @endif
               @if(hasRole('agent'))
               @foreach($users as $user)
               <p>{{ $user->name }}</p>
               @endforeach
               @endif
               @if(!hasRole('agent'))
               <br><label for="">ticket</label><br>
               <select name="ticket_id" required style="width:30% ;border-radius: 2px;"  class="form-control" id="exampleFormControlSelect1" class="form-select form-select-lg mb-3 addticket">
                  @foreach($tickets as $ticket)
                  <option value="{{$ticket->id}}">{{ $ticket->subject }}</option>
                  @endforeach
               </select>
               @endif
               @if(hasRole('agent'))
               @foreach($tickets as $ticket)
               <p>{{ $ticket->subject }}</p>
               @endforeach
               @endif
            </div>
            <br>
            <div class="form-group" style="margin-right:60px; margin-bottom:60px; float: right">
               <label for=""></label>
               <input type="submit"  class="btn btn-primary" class="form-control" value="Save">
            </div>
         </form>
      </div>
   </div>
</div>
<!-- <style>
.card-1 {
  border-radius: 15px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  margin-top:20px; 
  padding-bottom:80px; 
  padding: 0 10px 10px 10px;
}
</style> -->
@stop
