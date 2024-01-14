<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="admincss/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Admin</h1>
        <p>KICT IIUM </p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main Menu</span>
    <ul class="list-unstyled">

            <li class="{{ Request::is('home')? 'active' : '' }}"><a href="{{ url('/home') }}">
                <i class="icon-home"></i>Home </a>
            </li>
            <li class="{{ Request::is('feedback_page')? 'active' : '' }}">
                <a href="{{ url('feedback_page') }}"> <i class="icon-grid"></i>Add Feedback</a>
            </li>

            <li class="{{ Request::is('show_post')? 'active' : '' }}">
                <a href="{{ url('show_post') }}"> <i class="fa fa-bar-chart"></i>Show Feedback</a>
            </li>
            <li>
                <a href="{{ url('home') }}"> <i class="icon-padnote"></i>Note</a>
            </li>

            <li><a href="{{ url('login') }}"> <i class="icon-logout"></i>Exit</a></li>

  </nav>
