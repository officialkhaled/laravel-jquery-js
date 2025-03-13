<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container d-flex justify-content-end">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('user/list') ? 'active' : '' }} btn btn-sm btn-primary waves-effect bg-gradient" href="{{ route('user.index') }}">
                        <i class="fa-solid fa-bars opacity-75"></i>&nbsp;&nbsp;Users List
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('user/create') ? 'active' : '' }} btn btn-sm btn-success waves-effect bg-gradient" href="{{ route('user.create') }}">
                        <i class="fa-solid fa-plus opacity-75"></i>&nbsp;&nbsp;Create User
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
