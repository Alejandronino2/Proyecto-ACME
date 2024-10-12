<!-- resources/views/partials/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            ACME S.A.
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                    @if(Auth::user()->role->name === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('owners.index') }}">Propietarios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('drivers.index') }}">Conductores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vehicles.index') }}">Vehículos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('assignments.index') }}">Asignaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vehicles.report') }}">Informe Vehículos</a>
                        </li>
                    @endif
                @endauth
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(2).jpg" class="rounded-circle" height="25" width="25" alt="Perfil">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li class="my-2 d-flex align-items-center">
                                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(4).jpg" class="rounded-circle me-1" height='25' width='25'>
                                <span> {{ Auth::user()->name }} </span>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Tu Cuenta</a></li>
                            <li><a class="dropdown-item" href="#">Ayuda</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Cerrar Sesión</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
