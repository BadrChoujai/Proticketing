@extends('layouts.globale')
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<div class="container">
    <div class="row">
         <div class="col-md-12">
  <div class="card-1">
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group" style="margin-left:30px;margin-right:30px;">
               <h2 class="pt-5"> Details </h2>
                 <div class="row">
                     <div class="col-sm-6">
               <div>
                  <label for="" style="font-weight: bold;">Subject:</label><br>
               <input readonly  placeholder="Write your description here" type="text" name="description" id="" cols="100" rows="5" style="width:70% ; " class="form-control" id="exampleInputEmail1" value="{{$ticket->subject}}" />
                 
               </div>
               <label for="" style="font-weight: bold;">Description:</label><br>
              <input readonly placeholder="Write your description here" type="text" name="description" id="" cols="100" rows="5" style="width:70% ; " class="form-control" id="exampleInputEmail1" value="{{$ticket->description}}" >
               <div>
                  <label for="" style="font-weight: bold;">Owner name:</label><br>
                 <input readonly placeholder="Write your description here" type="text" name="description" id="" cols="100" rows="5" style="width:70%; " class="form-control" id="exampleInputEmail1" value=" {{$ticket->user->name}}">
               </div>
               <div>
                  <label for="" style="font-weight: bold;">Categorie:</label><br>
                <input readonly  placeholder="Write your description here" type="text" name="description" id="" cols="100" rows="5" style="width:70% ; " class="form-control" id="exampleInputEmail1" 
                   value=" {{$ticket->categorie->name }}">  
                
               </div>
</div>
 <div class="col-sm-6">
               <div>
                  <label for="" style="font-weight: bold;">Status:</label><br>
                  <input readonly  placeholder="Write your description here" type="text" name="description" id="" cols="100" rows="5" style="width:70% ; " class="form-control" id="exampleInputEmail1" 
                    value=" {{$ticket->status->name }}"        
                >
               </div>
               <div>
                  <label for="" style="font-weight: bold;">Priority:</label><br>
                 <input readonly placeholder="Write your description here" type="text" name="description" id="" cols="100" rows="5" style="width:70% ; " class="form-control" id="exampleInputEmail1" 
                    value="{{$ticket->priority->name }}" 
             >
               </div>
               <div>
                  <label for="" style="font-weight: bold;">City:</label><br>
                 <input readonly  placeholder="Write your description here" type="text" name="description" id="" cols="100" rows="5" style="width:70% ; " class="form-control" id="exampleInputEmail1" 
                    value="{{$ticket->citie->name }}" 
              >
</div>
               </div>
            </div>
            </div>
            
         </div>
         <div class="card-1">
            <div style="margin-left:30px;margin-right:30px;">
            
               <form action="/comments" method="POST">
                  @csrf
                  
                 <br> <input type="hidden" value="{{$ticket->id}}" name="ticket_id"/>
                     <textarea placeholder="Comment" name="body" placeholder="Write your description here" type="text" name="description" id="" cols="100" rows="7" style="width:65% ; background-color: #fafafa; box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15); " class="form-control" id="exampleInputEmail1"></textarea>
                  <br>
                 
                   <button type="submit" class="btn btn-outline-primary" style="margin-left:61%"> <i class="fa fa-comment-medical"></i></button>  





               </form>
               <br>
               <label for="" style="font-weight: bold;"> Comments :</label><br>
            <div>
            
               @foreach($ticket->comments as $comment)
<div class="row">
    <div class="col-md-8">
        <div class="media g-mb-30 media-comment">
            <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" src="{{asset('/assets/img/' . $comment->user->avatar)}}" alt="Image Description">
            <div class=" border media-body u-shadow-v18 g-bg-secondary g-pa-30">
              <div class="g-mb-15">
                <h5 class="h5 g-color-gray-dark-v1 mb-0">{{ $comment->user->name}}</h5>
                <span class="g-color-gray-dark-v4 g-font-size-12">{{$comment->date_diff}}</span>
              </div>
        
              <p > {{$comment->body}}</p>
              
                  <form class="d-none" method="POST" action="/comments/{{$comment->id}}">
                  
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            
               <textarea name="body" placeholder="Comment" type="text" name="description"  cols="100" rows="5" style="width:86% ; " class="form-control">{{$comment->body}}</textarea>
                    <br> <button type="submit" class="btn btn-outline-primary" style="margin-left: 77%;" > <i class="fa fa-comment-medical"></i></button>  
                  </form>
         <div>
  <a onclick="onEdit(this)" class="btn btn-outline-success" style="margin-left: 80%;"><i class="fa fa-edit"></i></a>
                              
         <a href="/comment/delete/{{$comment->id}}" class="btn btn-outline-danger" style="margin-left: 90%; margin-top:-15%"><i class="fa fa-trash"></i></a>
   </div>
             
            </div>
        </div>
    </div>
   
</div>
               @endforeach
            </div>
            <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
            </div>
         </div>
      </div>

<div>
</div>
<style> 
@media (min-width: 0) {
    .g-mr-15 {
        margin-right: 1.07143rem !important;
    }
}
@media (min-width: 0){
    .g-mt-3 {
        margin-top: 0.21429rem !important;
    }
}

.g-height-50 {
    height: 50px;
}

.g-width-50 {
    width: 50px !important;
}

@media (min-width: 0){
    .g-pa-30 {
        padding: 2.14286rem !important;
    }
}

.g-bg-secondary {
    background-color: #fafafa !important;
}

.u-shadow-v18 {
    box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
}

.g-color-gray-dark-v4 {
    color: #777 !important;
}

.g-font-size-12 {
    font-size: 0.85714rem !important;
}

.media-comment {
    margin-top:20px
}



 </style>
 <script>
 function onEdit(el){
   
   $(el).parent().parent().find("form").toggleClass("d-none");
    $(el).parent().parent().find("p").toggleClass("d-none");
    $(el).toggleClass("d-none");



}




 </script>
@stop
