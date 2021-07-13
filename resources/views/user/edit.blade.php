@extends('layouts.globale')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="card-1">
            <form action="{{url('users/' .$user->id)}}" method="post">
               <input type="hidden" name="_method" value="PUT">
               @csrf
               <div class="form-group" style="margin-left:30px;margin-right:30px;">
                  <h2 class="pt-5">Update the User:</h2>
                  <div class="row">
                     <div class="col-sm-6">
                        <br><label for="">name</label>
                        <br><input type="text"  name="name" class="form-control" value="{{ $user->name }}" style="width: 77%;">
                        <br><label for="">email</label>
                        <br> <input type="email"  name="email" class="form-control" value="{{ $user->email }}" style="width: 77%;">
                        <br><label for="">new password</label>
                        <br> <input type="text"  name="password" class="form-control" style="width: 77%;" >
                     </div>
                     <div class="col-sm-6">
                        <br><label for="">role</label>
                        <select name="role_id"   required style="border-radius: 2px; width: 77%;"  class="form-control" id="exampleFormControlSelect1" class="form-select form-select-lg mb-3 addticket">
                        @foreach($roles as $role)
                           <option value="{{$role->id}}">{{ $role->name }}</option>
                        @endforeach
                        </select>
                        <br><label for="">city</label>
                        <select name="citie_id" required style="border-radius: 2px;width: 77%;"  class="form-control" id="exampleFormControlSelect1" class="form-select form-select-lg mb-3 addticket">
                        @foreach($cities as $citie)
                           <option value="{{$citie->id}}">{{ $citie->name }}</option>
                        @endforeach
                        </select> <br/><br/> <br>
                        <div style="width:77%">
                           <input type="submit" class="form-control btn btn-primary" value="Save" style="width: 30%;margin-left:100%;" >
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
