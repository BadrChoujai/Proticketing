@extends('layouts.globale')
@section('content')
    <div class="container-fluid">
       <div class="container">
 <div class="card-1">
          <div class="row">
            <div class="col-md-12" style="margin-left:30px;">
               <form action="{{url('permissions')}}" method="post"><br>
                @csrf
                 <h2>Add a new Permission</h2>
              <div class="form-group"><br>
                <label><strong>Permission name:</strong></label><br/>
                <input type="text"  name="name" class="form-control" style="width: 30%;">
              </div><br>

            <div class="form-group" style="margin-right:60px; margin-bottom:80px; float: right">
            <label for=""></label>
            <input type="submit" class="form-control , btn btn-primary " value="Save " >
            </div>
        </form>
        </div>
    </div>
</div>
</div>
    </div>
@stop
