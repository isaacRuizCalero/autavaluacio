<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a href="{{ url('/') }}" style="text-decoration: none; color: black;">
            <div id="title-container" 
            style="display: flex;flex-wrap: wrap;align-items: center;justify-content: center;height: 50px;width: 300px;">
                {{-- <img src="../resources/images/centre_destudis_politcnics_logo.jpg" alt="Logo" id="logo" id="navbar-logo" style="height: 100%"> --}}
                <h3 id="navbar-title" style="font-size: 20px; margin: 0;">Autoavaluació</h3>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                @if (Auth::check() && Auth::user()->tipus_usuaris_id==1)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dades mestres
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item disabled" href="#">Tipus usuaris</a></li>
                            <li><a class="dropdown-item" href="{{ url('/usuaris') }}">Usuaris </a></li>
                            <li><a class="dropdown-item disabled" href="#">Cicles</a></li>
                            <li><a class="dropdown-item disabled" href="#">Mòduls</a></li>
                            <li><a class="dropdown-item disabled" href="#">Assignar Professors</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item disabled" href="#">Assignar alumnes</a></li>
                            <li><a class="dropdown-item disabled" href="#">Resultats aprenentatge</a></li>
                            <li><a class="dropdown-item disabled" href="#">Criteris avaluació</a></li>
                        </ul>
                    </li>
                @endif

                @if (Auth::check() && Auth::user()->tipus_usuaris_id==2)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Professors
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item disabled" href="#">Assignar alumnes</a></li>
                            <li><a class="dropdown-item disabled" href="#">Resultats aprenentatge</a></li>
                            <li><a class="dropdown-item disabled" href="#">Criteris avaluació</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('professors.index') }}">Autoavaluació alumnes</a></li>
                        </ul>
                    </li>
                @endif

                @if (Auth::check() && Auth::user()->tipus_usuaris_id==3)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Alumnes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{ route('alumnes.autoavaluacio') }}">Autoavaluació</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
            <span class="navbar-text ms-auto">
               @if (Auth::check())
                    <li class="nav-item drop-down">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->nom }} {{ Auth::user()->cognom }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('logout') }}">Tancar sessió</a>
                        </div>
                    </li>

                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login')}}">
                            <i class="fa fa-sign-in" aria-hidden="true">Login</i>
                        </a>
                    </li>
                @endif
            </span>
        </div>
    </div>
</nav>

<style>
    a.disabled {
    pointer-events: none;
    color: gray; /* Cambia el color para que se vea deshabilitado */
    text-decoration: none; /* Opcional: elimina el subrayado */
}
</style>