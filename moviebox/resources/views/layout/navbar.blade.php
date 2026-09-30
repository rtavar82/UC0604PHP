<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

    <div class="container">

        <a class="navbar-brand" href="{{route('home')}}">
            <i class="bi bi-film me-2"></i>
            MovieBox
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNavbar"
            aria-controls="mainNavbar"
            aria-expanded="false"
            aria-label="Abrir navegação"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('home')}}">
                        <i class="bi bi-house me-1"></i>
                        Início
                    </a>
                </li>
                @guest
                    <li class="nav-item">
                        <a
                            href="{{route('login.show')}}"
                            class="nav-link"
                        >
                            <i class="bi bi-box-arrow-in-right me-1"></i>
                            Login
                        </a>
                    </li>

                @endguest

                @auth
                    @role('admin')
                    {{--Movies--}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.movies.index')}}">
                                <i class="bi bi-camera-reels me-1"></i>
                                Filmes
                            </a>
                        </li>
                        {{--Autores--}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.actors.index')}}">
                                <i class="bi bi-file-earmark-person"></i>
                                Atores
                            </a>
                        </li>
                        {{--Generos--}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.genres.index')}}">
                                <i class="bi bi-tags me-1"></i>
                                Géneros
                            </a>
                        </li>
                    @endrole
                    @role('editor')
                    {{--Movies--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('editor.movies.index')}}">
                            <i class="bi bi-camera-reels me-1"></i>
                            Filmes
                        </a>
                    </li>
                    {{--Autores--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('editor.actors.index')}}">
                            <i class="bi bi-file-earmark-person"></i>
                            Atores
                        </a>
                    </li>
                        {{--Generos--}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('editor.genres.index')}}">
                                <i class="bi bi-tags me-1"></i>
                                Géneros
                            </a>
                        </li>
                    @endrole
                    @role('user')
                    {{--Movies--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.movies.index')}}">
                            <i class="bi bi-camera-reels me-1"></i>
                            Filmes
                        </a>
                    </li>
                    {{--Autores--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.actors.index')}}">
                            <i class="bi bi-file-earmark-person"></i>
                            Atores
                        </a>
                    </li>
                        {{--Generos--}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.genres.index')}}">
                                <i class="bi bi-tags me-1"></i>
                                Géneros
                            </a>
                        </li>
                    @endrole


                    {{--Logout--}}
                    <li class="nav-item">
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link">
                                <i class="bi bi-box-arrow-in-right me-1"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                    {{--Nome--}}
                    <li class="nav-item">
                        <span class="nav-link">
                            <i class="bi bi-person me-1"></i>
                            {{auth()->user()->name}}
                        </span>
                    </li>
                @endauth


            </ul>

        </div>

    </div>

</nav>
