<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{route('home')}}" class="logo d-flex align-items-center">
        <h1 class="sitename">Blog Platformu</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a class="{{request()->is('/') ? 'active' : '' }}" href="{{route('home')}}">Platformlar</a></li>
          <li><a class="{{request()->is('user-platform') ? 'active' : '' }}" href="{{route('user.platform')}}">Platformlarım</a></li>
          <li><a class="{{request()->is('create-platform') ? 'active' : '' }}" href="{{route('create.platform')}}">Yeni Platform</a></li>
          <li><a class="{{request()->is('about') ? 'active' : '' }}" href="{{route('about')}}">Hakkımızda</a></li>
          <li><a class="{{request()->is('contact') ? 'active' : '' }}" href="{{route('contact')}}">İletişim</a></li>
          @if(Auth::check())
            <li> <a href="{{route('profile',Auth::id())}}">Profile</a></li>
            <li><a href="{{route('Userlogout')}}">Çıkış Yap</a></l>
          @elseif(!Auth::check())
            <li><a href="{{route('login.show')}}">Giriş Yap</a></l>
            <li><a href="{{route('register.show')}}">Kayıt Ol</a></l>
          @endif
          @if (Auth::check() && Auth::user()->is_admin == 1)
            <li><a href="{{route('admin.index')}}">Admin Ol</a></l>
          @endif
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>