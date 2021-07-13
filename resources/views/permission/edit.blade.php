@extends('layouts.globale')
@section('content')
    <div class="container-fluid">
<div class="container">
   <div class="card-1">
   <div class="row">
      <div class="col-md-12" style="margin-left:30px;">
         <form action="{{url('permissions/' .$permission->id)}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            <div class="form-group">
               <br>
               <h2> <label for="">Update the Permission:</label> </h2>
                
               <br> <input type="text"  name="name" class="form-control" value="{{ $permission->name }}" style="width: 30%;">
            </div>
            <div class="form-group"  style="margin-right:60px; margin-bottom:80px; float: right">
               <label for=""></label>
               <input type="submit" class="form-control , btn btn-primary" value="Save" >
            </div>
         </form>
      </div>
   </div>
</div>
</div>
    </div>
@stop
