<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">BookNest</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('tousLivres') }}">Livres</a>
                    </li>

                    @if (Auth::check())
                        @if (Auth::user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.index') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.profiles') }}">Profiles</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Catégories
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('categories.index') }}">Liste des catégories</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('categories.create') }}">Créer une catégorie</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="livresDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Livres
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('livres.index') }}">Liste des livres</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('livres.create') }}">Créer un livre</a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">User</a>
                            </li>
                        @endif
                        <!-- Logout Form -->
                        <li class="nav-item">
                            <form action="{{ route('custom.logout') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Disconnect</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('custom.login') }}">Connect</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
