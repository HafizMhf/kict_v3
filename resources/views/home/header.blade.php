<div class="header_main">
    <div class="mobile_menu">
       <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="logo_mobile"><a href="{{ url('/home') }}"><img src="images/kictfs.png"></a></div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav">
                <li class="nav-item">
                   <a class="nav-link" href="{{ url('/home') }}">Home</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link " href="contact.html">Contact</a>
                </li>
             </ul>
          </div>
       </nav>
    </div>
    <div class="container-fluid">
       <div class="logo"><a href="{{ url('/home') }}"><img height="100px" width="200px" src="images/kictfs.png"></a></div>
       <div class="menu_main">
          <ul>
             <li class="active"><a href="{{ url('/home') }}">Home</a></li>
             <li><a href="about.html">About</a></li>

             @if (Route::has('login'))

             @auth
                <li><a href="{{ url('my_post') }}"> My Feedback</a></li>
                <li><a href="{{ url('create_post') }}"> Create Feedback</a></li>

                <li><x-app-layout>

                </x-app-layout>
                </li>


             @else
             <li><a href="{{ route('login') }}">Login</a></li>
             <li><a href="{{ route('register') }}">Register</a></li>

             @endauth
             @endif
          </ul>
       </div>
    </div>
 </div>
