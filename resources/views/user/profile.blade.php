@extends('layouts.globale')
@section('content')
<div class="my-0">
   <form method="POST" class="d-flex flex-row-reverse"  enctype="multipart/form-data">
    <div class="card-1 d-inline p-3" style="height: 50%;">
      @csrf
      <div>
        <div class="d-flex align-items-right">
            <div class="image">
              @if(Auth::user()->avatar)
                <img  src="{{asset('/assets/img/'.Auth::user()->avatar)}}" alt="profile_image" style="border-radius:8px; width: 150px;height: 160px; ">
              @endif
            </div>
            <div class="ml-3 w-100">
                <h4 class="mb-0 mt-0">{{Auth::user()->name}}</h4> <span>{{Auth::user()->role['name']}}</span>
                <br><br>
                <div class="">
                  <div class='file file--upload'>
                    <label for='input-file'>
                      <i class="fas fa-upload fa-fw" style="padding-right:5px;"></i> Upload Avatar
                    </label> 
                    <input class="form-control" name="avatar" id='input-file' type='file' />
                  </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-1 w-75 d-inline p-0 mx-2" >
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <input type="hidden" name="_method" value="PUT" />
        <div class="form-group" style=" padding-left:3rem;">
          <br>
          <label for="name">Name</label>
          <input
            style="width:90%"
            type="text"
            name="name"
            value="{{ $user->name }}"
            class="form-control"
            required
          />
        </div>
        
      <div class="form-group" style=" padding-left:3rem;">
        <label for="email">Email</label>
        <input
          style="width:90%"
          type="email"
          name="email"
          value="{{ $user->email }}"
          class="form-control"
          required
        />
      </div>
        @if(hasRole('admin'))
      <div class="form-group" style=" padding-left:3rem;">
        <label for="city">City</label>
        <input
          style="width:90%"
          type="text"
          name="citie_id"
          value="{{ $user->citie['name'] }}"
          class="form-control"
        />
        
      </div>
        @else
          <div class="form-group" style=" padding-left:3rem;">
        <label for="city">City</label>
        <input
          style="width:90%"
          type="text"
          name="citie_id"
          value="{{ $user->citie['name'] }}"
          class="form-control"
          readonly
        />
        
      </div>
        @endif
        
          @if(hasRole('admin'))
      <div class="form-group" style=" padding-left:3rem;">
        <label for="role">Role</label>
        <input
          style="width:90%"
          type="text"
          name="role_id"
          value="{{ $user->role['name']}}"
          class="form-control"
        />
      </div>
      @else
      <div class="form-group" style=" padding-left:3rem;">
        <label for="role">Role</label>
        <input
          style="width:90%"
          type="text"
          name="role_id"
          value="{{ $user->role['name']}}"
          class="form-control"
          readonly
        />
      </div>
        @endif
        
      <div class="form-group" style=" padding-left:3rem;">
        <label for="">Enter Current Or New password</label>
        <input type="password" id="myInput" name="password" class="form-control"  style="width:90%;" required>
        
        <div class="form-check">
          <input class="form-check-input" type="checkbox" onclick="showPass()" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Show Password
          </label>
        </div>
      </div>
      <button type="submit" class="btn btn-outline-primary" style="float: right; margin-right:55px; margin-bottom:10px;">
        Save
      </button>
      </div>
  </form>
</div>
<style>
/* Profile Card Style */

.articles {
    font-size: 10px;
    color: #a1aab9
}

.number1 {
    font-weight: 500
}

.followers {
    font-size: 10px;
    color: #a1aab9
}

.number2 {
    font-weight: 500
}

.rating {
    font-size: 10px;
    color: #a1aab9
}

.number3 {
    font-weight: 500
}

/* Upload Button Style */
.file {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
}

.file > input[type='file'] {
  display: none
}

.file > label {
  font-size: 1rem;
  font-weight: 300;
  cursor: pointer;
  outline: 0;
  user-select: none;
  border-color: rgb(216, 216, 216) rgb(209, 209, 209) rgb(186, 186, 186);
  border-style: solid;
  border-radius: 4px;
  border-width: 1px;
  background-color: hsl(0, 0%, 100%);
  color: hsl(0, 0%, 29%);
  padding-left: 18px;
  padding-right: 18px;
  padding-top: 2px;
  padding-bottom: 2px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.file > label:hover {
  border-color: hsl(0, 0%, 21%);
}

.file > label:active {
  background-color: hsl(0, 0%, 96%);
}

.file > label > i {
  padding-right: 5px;
}

.file--upload > label {
  color: hsl(204, 86%, 53%);
  border-color: hsl(204, 86%, 53%);
}

.file--upload > label:hover {
  border-color: hsl(204, 86%, 53%);
  background-color: hsl(203, 100%, 92%);
}

.file--upload > label:active {
  background-color: hsl(204, 86%, 91%);
}

.file--uploading > label {
  color: hsl(48, 100%, 67%);
  border-color: hsl(48, 100%, 67%);
}

.file--uploading > label > i {
  animation: pulse 5s infinite;
}

.file--uploading > label:hover {
  border-color: hsl(48, 100%, 67%);
  background-color: hsl(48, 100%, 96%);
}

.file--uploading > label:active {
  background-color: hsl(48, 100%, 91%);
}

</style>
  <script>
    function showPass() {
      var x = document.getElementById("myInput");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
  </script>
@stop
