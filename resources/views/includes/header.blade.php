<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('homePage')}}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{route('profiles.index')}}">Profiles</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="/profile">Profile</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('profiles.create')}}">Ajouter profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('settings.index')}}">Settings </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
