<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"> Profile</i>
        </a>
        <div class="dropdown-menu dropdown-menu dropdown-menu-right">
          @auth
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="dropdown-item" ><i class="fas fa-sign-out-alt"></i> Logout</button>
          </a>
          </form>
          <div class="dropdown-divider"></div>
            <a href="/user/edit" class="dropdown-item">
              <i class="fas fa-user-cog"></i> Setting
            </a>
          @endauth
          @guest
          <a href="/login" class="dropdown-item">
            <i class="fas fa-sign-in-alt"></i> Login
          </a>
          <div class="dropdown-divider"></div>
          <a href="/register" class="dropdown-item">
            <i class="fas fa-user-plus"></i> Register
          </a>
          @endguest
      </li>
    </ul>
  </nav>