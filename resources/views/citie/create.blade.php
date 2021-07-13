@extends('layouts.globale')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<div class="container-fluid">
    <div class="container">
        <div class="card-1">
        <div class="row">
            <div class="col-md-12" style="margin-left:30px;">
            <form action="{{url('cities')}}" method="post">
            @csrf
            <h2>add a new city</h2><br>
                <div class="form-group">
                <label><strong>City name:</strong></label><br/>
                <input type="text"  name="name" class="form-control" style="width: 30%;">
                </div><br>
                <div class="form-group" style="margin-right:60px; margin-bottom:80px; float: right">
                <label for=""></label>
                <input type="submit"  class="btn btn-primary" class="form-control" value="Save">
                </div>
            </form>
            </div>
    </div>
</div>
</div>
</div>
<style>
.card-1 {
  border-radius: 15px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  margin-top:20px; 
  padding-bottom:80px; 
  padding: 0 10px 10px 10px;
}
</style>
@stop


