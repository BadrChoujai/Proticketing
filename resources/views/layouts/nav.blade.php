
<nav class="sb-topnav navbar navbar-expand navbar-light" style=" background-color:white; ">
    <a class="navbar-brand" href="{{url('home')}}"><h2 style="padding: 10px 10px; display:inline-block; color: black;" class="mt-2"> Proticketing</h3></a>
        <button  class="btn btn-outline-dark btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-exchange-alt" ></i>
        </button>
    <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        </div>
    <div class="dropdown" style="outline: none;">
        <button style="background-color: white!important; outline: none; border: none;" class="btn bg-light dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @if(Auth::user()->avatar)
                <img class="image rounded-circle" src="{{asset('/assets/img/'.Auth::user()->avatar)}}" alt="profile_image"
                style="width: 40px;height: 40px; padding: 5px; margin-left: 10px;">
            @endif
                {{ Auth::user()->name }}
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">    
            <a class="dropdown-item" href="{{ url('my-profile') }}"><i class="fa fa-user-cog fa-fw"></i>  My Profile </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); 
                    document.getElementById('logout-form').submit();"
                >
                <i class="fa fa-sign-out-alt"></i>  {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</nav>
