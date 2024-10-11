<!-- resources/views/partials/navbar.blade.php -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">Transportes ACME S.A.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
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
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>
                @else
                    <li class="nav-item">
                        <span class="nav-link">Hola, {{ Auth::user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">Cerrar Sesión</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
