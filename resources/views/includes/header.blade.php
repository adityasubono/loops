<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <span class="text-muted">Wellcome <br>{{Session::get('name')}} </span>
        </div>
        <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">Blog Loops</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="text-muted" href="#" aria-label="Search">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
            </a>

            @if(Session::get('login'))
                <button class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#logout">Logout</button>
                @include('logout.logout')
            @else
                <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#login">Login</button>
                <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#register">Register</button>
                @include('login.login')
                @include('register.register')
            @endif
        </div>
    </div>
</header>

<!-- Modal -->

