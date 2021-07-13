@extends('layouts.globale')
@section('content')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <div class="container">
        <div class="row">
        <div class="col-md-12">
        <div class="card-1">
          <div class="row">
        <div class="col-md-12" style="margin-left:30px;">
           
               <form action="{{url('tickets')}}" method="post">
                  @csrf
                  <div class="form-group" style="margin-left:30px;margin-right:30px;">
                     <label for="">
                        <h2 class="pt-5">New Ticket</h2>
                     </label>
                     <div class="row">
                        <div class="col-sm-6">
                     <div >
                        <label for="" style="font-weight: bold;">Subject:</label><br>
                        <textarea type="text" style="width:70% ;" name="subject" id=""  cols="10" rows="1"  required="required" style="width:35% ; " class="form-control" id="exampleInputEmail1" > name your ticket here </textarea>
                     </div>
                     <div>
                        <label for="" style="font-weight: bold; ">Description:</label><br>
                        <textarea type="text" style="width:70% ;" name="description" id=""  cols="100" rows="4" required="required" class="form-control" id="exampleInputEmail1" >write your description</textarea>
                     </div>
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
                        <label for="" style="font-weight: bold;">Categorie:</label><br>
                        <select  style="width:70% ;border-radius: 2px;"  class="form-control" id="exampleFormControlSelect1" aria-label="Default select example" name="categories_id">
                           @foreach($categories as $categorie)
                           <option value="{{$categorie->id}}">{{ $categorie->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div>
                        <label for="" style="font-weight: bold;">Status:</label><br>
                        <select  style="width:70% ;border-radius: 2px;"  class="form-control" id="exampleFormControlSelect1" aria-label="Default select example" name="status_id">
                           @foreach($statuses as $status)
                           <option value="{{$status->id}}">{{ $status->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div>
                        <label for="" style="font-weight: bold;">Priority:</label><br>
                        <select  style="width:70%;border-radius: 2px;"  class="form-control" id="exampleFormControlSelect1" aria-label="Default select example" name="priority_id">
                           @foreach($priorities as $priority)
                           <option value="{{$priority->id}}">{{ $priority->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div>
                        @if(hasRole('admin'))
                        <label for="" style="font-weight: bold;">City:</label><br>
                        <select  style="width:70% ;border-radius: 2px;"  class="form-control" id="exampleFormControlSelect1" class="form-select form-select-lg mb-3 addticket"  aria-label="Default select example" name="citie_id">
                           @foreach($cities as $citie)
                           <option value="{{$citie->id}}">{{ $citie->name }}</option>
                           @endforeach
                        </select>
                        @endif
                     </div>
                

                  <div class="form-group" style="margin-right:70px; margin-top:70px;  float: right" >
    
                     <input type="submit" class="btn btn-primary" class="form-control" value="Save" style=" width:180%;">
                  </div>
                      </div>
                 </div>
                   </div>
               </form>
            </div>
         </div>
        </div>
     
   </div>

@stop
