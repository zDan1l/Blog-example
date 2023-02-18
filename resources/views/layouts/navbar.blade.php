<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container py-2">
      <a class="navbar-brand" href="/"><h5 class="text-bold text-uppercase">MyDaily</h5></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{  Request::is('about') ? 'active' : '' }}" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('blog') ? 'active' : '' }}" href="/blog">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="/categories">Categories</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          @guest
            <li class="nav-item">
              <a href="/login" class=" btn bg-white text-black btn-outline-light">Sign In</a>
            </li>
          @else
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome, {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
              <li><hr class="dropdown-divider" href="#"></li>
              <form action="/logout" method="post">
                @csrf
                <button class="dropdown-item" type="submit" href="#">Logout</button>
              </form>
            </ul>
          </li>
            
          @endguest
          
        </ul>
      </div>
    </div>
  </nav>

  