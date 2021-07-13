
@extends('layouts.globale')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<div class="card-body">
<div class="container-fluid">
    <div class="container">
      <div class="card-1">
        <div class="row">
            <div class="col-md-12" style="margin-left:30px;">
                <form action="{{url('statuses')}}" method="post"><br>
                @csrf
                <h2>Add a new Status</h2><br>
                    <div class="form-group">
                        <label><strong>Status name:</strong></label><br/>
                        <input type="text"  name="name" class="form-control" style="width: 30%;">
                    </div>
                        <br>
                    <div class="form-group" style="margin-right:60px; margin-bottom:80px; float: right">
                        <input type="submit" class="form-control , btn btn-primary" value="Save " >
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
@stop
