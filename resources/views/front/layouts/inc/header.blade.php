<header class="navigation fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-white">
            <a class="navbar-brand order-1" href="/">
                <img class="img-fluid" width="100px" src="/assets/fashion/logo.png"
                     alt="BlogManagementSystem" style="max-width: 100px">
            </a>
            <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Homepage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about-us') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact_us.index') }}">Contact</a>
                    </li>

                </ul>
            </div>
            @if(auth()->user() != null)
                <div class="order-2 order-lg-3 d-flex align-items-center">
                    <a href="{{ route('filament.admin.auth.logout') }}" class="btn btn-primary" style="margin-left: 10px;" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                    <form action="{{ route('filament.admin.auth.logout') }}" id="logout-form" method="post">@csrf</form>
                    <a href="#" target="_blank">
                        <img class="avatar me-3" width="50px" style="border-radius: 50%; margin-left: 10px;" src="/assets/fashion/default-user.webp" alt="{{ auth()->user()->name }}">
                    </a>
                </div>
            @else
                <div class="order-2 order-lg-3 d-flex align-items-center">
                    <a href="{{ route('filament.admin.auth.show.login') }}" class="btn btn-primary" style="margin-left: 10px;" target="_blank">Login</a>
                    <a href="{{ route('admin.register') }}" class="btn btn-primary" style="margin-left: 10px;" target="_blank">Register</a>
                </div>
            @endif
        </nav>
    </div>
</header>
