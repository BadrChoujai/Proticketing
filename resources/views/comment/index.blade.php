@extends('layouts.globale')
@section('content')
<div class="container-fluid">
<div class="row">
   <div class="col-md-12">
      <br>
      <h2>Comment </h2>
      <br><br>
      <ol class="breadcrumb mb-4" style="background-color :white;">
         <li class="breadcrumb-item"><a href="{{ url('home')}}">Dashboard</a></li>
         <li class="breadcrumb-item active">comments</li>
      </ol>
      <div class="col">
         <div class="card shadow" style="margin-right:-12px; border-radius: 7px; padding-right:15px; padding-left:15px; margin-left:-12px;">
            <div class="pull-right">
               <a href="{{ url('comments/create')}}" class="btn btn-outline-dark" style="margin-left: 2px; margin-top: 15px;"><i class="fa fa-plus-square"></i></a><br><br>
            </div>
          <div class="table-responsive align-items-center " style=" border-radius: 7px;">
              <table class="table align-items-center table-flush" >
                <thead class="thead-light"> 
                     <tr>
                        <th>comment</th>
                        <th>user name</th>
                        <th>ticket subject</th>
                        <th>date<th>
                     </tr>
                  </thead>
                  
                  <tbody>
                     @foreach($comments as $comment)
                     <tr>
                        <td>{{ $comment->body }}</td>
                        <td>{{ $comment ->user['name']}}</td>
                        <td>{{ $comment ->ticket['subject']}} </td>
                        <td>{{ $comment->created_at}}</td>
                        <td>
                           <form action="{{ url('comments/' .$comment->id )}}" method="post">
                              @csrf
                              @method('DELETE')
                              <a href="{{ url('comments/' .$comment->id.'/edit')}}" class="btn btn-outline-success" ><i class="fa fa-edit"></i></a>
                              @if(!hasRole('agent'))
                              <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                              @endif
                           </form>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <div class="card-footer py-2">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
         </div>
      </div>
   </div>
</div>

@stop
