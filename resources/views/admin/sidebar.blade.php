<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="admincss/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Admin</h1>
        <p>IIUM</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="active"><a href="index.html">
                <i class="icon-home"></i>Home </a>
            </li>
            <li>
                <a href="{{ url('feedback_page') }}"> <i class="icon-grid"></i>Add Feedback</a>
            </li>

            <li>
                <a href="{{ url('show_post') }}"> <i class="fa fa-bar-chart"></i>Show Feedback</a>
            </li>
            <li>
                <a href="forms.html"> <i class="icon-padnote"></i>Forms</a>
            </li>

            <li><a href="{{ url('login') }}"> <i class="icon-logout"></i>Logout page </a></li>
  
  </nav>
