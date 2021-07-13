@extends('layouts.globale')
@section('content')

    <div class="container-fluid">
<div class="container">
    <div class="card-1">
    <div class="row">
        <div class="col-md-12" style="margin-left:30px;"> 
            
        <form action="{{url('users')}}" method="post"><br>
        @csrf
        <h2> Add a new User</h2>
            <div class="form-group">
            <label for="" style="font-weight: bold;" >Name:</label><br>
            <input type="text"  name="name"  style="width:35% ; " class="form-control" id="exampleInputEmail1"  required>
            <label for="" style="font-weight: bold;">Email:</label><br>
            <input type="text"  name="email"  style="width:35% ; " class="form-control" id="exampleInputEmail1" required>
              <label for="" style="font-weight: bold;">Password:</label><br>
              <input type="text"  name="password"  required="required" style="width:35% ; " class="form-control" id="exampleInputEmail1"  required>
                <div> <label for="" style="font-weight: bold;">Role:</label></div>
              <select name="role_id"  required style="width:35% ;border-radius: 2px;"  class="form-control" id="exampleFormControlSelect1" class="form-select form-select-lg mb-3 addticket">
               @foreach($roles as $role)
                  <option value="{{$role->id}}">{{ $role->name }}</option>
               @endforeach
               </select>
               <div><label for="" style="font-weight: bold; ">Citie:</label></div>
                <select name="citie_id" required style="width:35% ;border-radius: 2px;"  class="form-control" id="exampleFormControlSelect1" class="form-select form-select-lg mb-3 addticket">
               @foreach($cities as $citie)
                  <option value="{{$citie->id}}">{{ $citie->name }}</option>
               @endforeach
               </select>
            </div><br>
            <div class="form-group" style="margin-right:60px; margin-bottom:80px; float: right">
            <label for=""></label>
            <input type="submit" class="form-control btn btn-primary" value="Save ">
            </div>
        </form>
        </div>
    </div>
</div>
</div>
</div>
@stop
