@extends('layouts.globale')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<div class="container">
   <div class="card-01">
      <div class="row">
         <div class="col-md-12" style="margin-top:10px;">
            <form action="{{url('roles')}}" method="post">
               @csrf
               <h2>Add a new Role</h2>
               <br>
               <div class="form-group">
                  <label><strong>Role name:</strong></label><br/>
                  <input type="text"  name="name" style="width: 30%;" class="form-control">
               </div>
               <br>
               <div class="">
                  <label><strong>Select Permissions :</strong></label><br/>
                  <select class="selectpicker" multiple data-live-search="true" name="permission_id[]">
                     @foreach ($permissions as $permission)
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
<style>
   .card-01 {
   border-radius: 15px;
   background-color: white;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  margin-top:20px; 
  padding-bottom:80px; 
  padding: 0 10px 10px 10px;
}
</style>
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
