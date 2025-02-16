<aside id="sidebar" class="animate__animated animate__slideInLeft">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <i class="lni lni-grid-alt"></i>
        </button>
        <div class="sidebar-logo">
            <a href="{{ route('admin.index') }}">BookNest Admin</a>
        </div>
    </div>
    <ul class="sidebar-nav">
        <!-- Dashboard Link -->
        <li class="sidebar-item">
            <a href="{{ route('admin.index') }}" class="sidebar-link">
                <i class="lni lni-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Profile Link -->
        <li class="sidebar-item">
            <a href="{{ route('admin.profile') }}" class="sidebar-link">
                <i class="lni lni-user"></i>
                <span>Profile</span>
            </a>
        </li>

        <!-- Manage Profiles Link -->
        <li class="sidebar-item">
            <a href="{{ route('admin.profiles') }}" class="sidebar-link">
                <i class="lni lni-users"></i>
                <span>Manage Profiles</span>
            </a>
        </li>

        <!-- Reservations Link -->
        <li class="sidebar-item">
            <a href="{{ route('admin.reservations') }}" class="sidebar-link">
                <i class="lni lni-calendar"></i>
                <span>Reservations</span>
            </a>
        </li>

        <!-- Categories Dropdown -->
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
               data-bs-target="#categories" aria-expanded="false" aria-controls="categories">
                <i class="lni lni-list"></i>
                <span>Catégories</span>
            </a>
            <ul id="categories" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="{{ route('categories.index') }}" class="sidebar-link">Liste des catégories</a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('categories.create') }}" class="sidebar-link">Créer une catégorie</a>
                </li>
            </ul>
        </li>

        <!-- Livres Dropdown -->
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
               data-bs-target="#livres" aria-expanded="false" aria-controls="livres">
                <i class="lni lni-library"></i>
                <span>Livres</span>
            </a>
            <ul id="livres" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="{{ route('livres.index') }}" class="sidebar-link">Liste des livres</a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('livres.create') }}" class="sidebar-link">Créer un livre</a>
                </li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse"
               data-bs-target="#utilisateur" aria-expanded="false" aria-controls="utilisateur">
                <i class="lni lni-eye"></i>
                <span>Exploration Utilisateur</span>
            </a>
            <ul id="utilisateur" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                <li class="sidebar-item">
                    <a href="{{ route('home') }}" class="sidebar-link">Home</a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('tousLivres') }}" class="sidebar-link">Livres</a>
                </li>
            </ul>
        </li>

    </ul>

    <!-- Logout Button -->
    <div class="sidebar-footer">
        <form action="{{ route('custom.logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="sidebar-link"> <i class="lni lni-exit"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>

</aside>
