@extends('layouts.globale')
@section('content')

<div class="container">
      <div class="row">
         <div class="col-md-12">
              <div class="card-1">
            <form action="{{url('tickets/' .$ticket->id)}}" method="post">
               <input type="hidden" name="_method" value="PUT">
               @csrf
               <div class="form-group" style="margin-left:30px;margin-right:30px;">
                  <br>
                  <h2 class="pt-5"> Update Ticket: </h2>
                    <div class="row">
                        <div class="col-sm-6">
                  <div>
                     @if(hasRole('admin'))
                     <label for="" style="font-weight: bold;">Subject:</label><br>
                     <input value="{{$ticket->subject}}" type="text"  name="subject" style="width:70% ; " class="form-control" id="exampleInputEmail1" >
                     @else
                     <p>{{$ticket->subject}}</p>
                     @endif
                  </div>
                  <label for="" style="font-weight: bold;">Description:</label><br>
                  <textarea  placeholder="Write your description here" type="text" name="description" id="" cols="100" rows="4" style="width:70% ; " class="form-control" id="exampleInputEmail1" >{{$ticket->description}}</textarea>
                  <div>
                     @if(hasRole('admin'))
                     <label for="" style="font-weight: bold;">Owner name:</label><br>
                     <select name="user_id" style="width:70% ;border-radius: 2px;"  class="form-control" id="exampleFormControlSelect1">
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{ $user->name }}</option>
                        @endforeach
                     </select>
                     @endif
                  </div>
</div>
<div class="col-sm-6">
                  <div>
                     @if(!hasRole('agent'))
                     <label for="" style="font-weight: bold;">Categorie:</label><br>
                     <select style="width:70% ;border-radius: 2px;"  class="form-control" id="exampleFormControlSelect1" aria-label="Default select example" value="{{old('categorie', $ticket->categorie)}}" name="categories_id">
                        @foreach($categories as $categorie)
                        <option value="{{$categorie->id}}">{{ $categorie->name }}</option>
                        @endforeach
                     </select>
                     @endif
                  </div>
                  <div>
                     @if(!hasRole('agent'))
                     <label for="" style="font-weight: bold;">Status:</label><br>
                     <select style="width:70% ;border-radius: 2px;"  class="form-control" id="exampleFormControlSelect1" aria-label="Default select example" value="{{old('status', $ticket->status)}}" name="status_id">
                        @foreach($statuses as $status)
                        <option value="{{$status->id}}">{{ $status->name }}</option>
                        @endforeach
                     </select>
                     @endif
                  </div>
                  <div>
                     @if(!hasRole('agent'))
                     <label for="" style="font-weight: bold;">Priority:</label><br>
                     <select style="width:70% ;border-radius: 2px;"  class="form-control" id="exampleFormControlSelect1" aria-label="Default select example" value="{{old('priority', $ticket->priority)}}" name="priority_id">
                        @foreach($priorities as $priority)
                        <option value="{{$priority->id}}">{{ $priority->name }}</option>
                        @endforeach
                     </select>
                     @endif
                  </div>
                  <div>
                     @if(hasRole('admin'))
                     <label for="" style="font-weight: bold;">City:</label><br>
                     <select style="width:70% ;border-radius: 2px;"  class="form-control" id="exampleFormControlSelect1" aria-label="Default select example" value="{{old('citie', $ticket->citie)}}" name="citie_id">
                        @foreach($cities as $citie)
                        <option value="{{$citie->id}}">{{ $citie->name }}</option>
                        @endforeach
                     </select>
                     @endif
                  </div>
               </div>
               <div class="form-group" >
                  <input type="submit" class="form-control , btn btn-primary" value="Save" style="width: 20%; margin-left:750px;margin-top:20px">
               </div>
</div>
         </div>
            </form>
         </div>
         </div>
      </div>

</div>
@stop
