<nav class="navbar navbar-expand-lg p-3">
    <div class="container">
        <a class="navbar-brand" href="#">Resep<span>Kita</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('search.index') }}">Search</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="mainDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Menu
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="mainDropdown">
                        <li><a class="dropdown-item" href="{{ route('collection.index') }}">Collection</a></li>
                        <li><a class="dropdown-item" href="{{ route('account.index') }}">Account</a></li>
                        @if(auth()->check() && auth()->user()->id === 6)
                            <li><a class="dropdown-item" href="{{ route('admin.users.index') }}">View Users</a></li>
                            <li><a class="dropdown-item" href="{{ route('admin.recipes.index') }}">View Recipes</a></li>
                        @endif
                        <li>
                            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>