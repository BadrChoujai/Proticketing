
@extends('layouts.globale')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<div class="container">
   <div class="card-1" style="">
      <div class="row">
         <div class="col-md-12" style="margin-top:10px;">
            <form action="{{url('roles/' .$role->id)}}" method="POST">
               <input type="hidden" name="_method" value="PUT">
               @csrf
               <h2>Update role permissions</h2>
               <br>
               <div class="form-group">
                  <label><strong>Role name:</strong></label><br/>
                  <input type="text"  name="name" class="form-control" value="{{ $role->name}}"  style="width: 30%">
               </div>
               <br>
               <div >
                  <label><strong>Select Permissions :</strong></label><br/>
                  <select class="selectpicker" multiple data-live-search="true" name="permission_id[]">
                     @foreach($permissions as $permission)
                     <option value="{{$permission->id}}">{{ $permission->name}}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group" style="margin-right:60px; margin-bottom:80px; float: right">
                  <label for=""></label><br>
                  <input type="submit"  class="btn btn-primary" class="form-control" value="Save">
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@stop
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
   console.log(1)
   $(document).ready(function() {
       $('select').selectpicker();
   });
</script>
@stop