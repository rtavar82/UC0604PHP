@extends('layout.main')


@section('content')


        <!-- Boas-vindas -->
        <section class="hero shadow-sm p-5 mb-5">

            <div class="row align-items-center">

                <div class="col-lg-8">

                        <span class="badge bg-dark mb-3">
                            Gestão de Cinema
                        </span>

                    <h1 class="display-5 fw-semibold mb-3">
                        Bem-vindo ao MovieBox
                    </h1>

                    <p class="lead text-secondary mb-4">
                        Uma aplicação simples para organizar filmes
                        e os respetivos géneros.
                    </p>

                    <p class="text-secondary mb-4">
                        Consulte a coleção, adicione novos filmes,
                        atualize informações e organize todo o catálogo
                        de forma rápida e intuitiva.
                    </p>

                    <div class="d-flex flex-wrap gap-2">
                        @role('admin')
                        <a href="{{route('admin.movies.index')}}" class="btn btn-dark">
                            <i class="bi bi-camera-reels me-2"></i>
                            Ver Filmes
                        </a>
                        <a href="{{route('admin.genres.index')}}" class="btn btn-outline-dark">
                            <i class="bi bi-tags me-2"></i>
                            Ver Géneros
                        </a>
                        @endrole
                        @role('editor')
                        <a href="{{route('editor.movies.index')}}" class="btn btn-dark">
                            <i class="bi bi-camera-reels me-2"></i>
                            Ver Filmes
                        </a>
                        <a href="{{route('editor.genres.index')}}" class="btn btn-outline-dark">
                            <i class="bi bi-tags me-2"></i>
                            Ver Géneros
                        </a>
                        @endrole
                        @role('user')
                        <a href="{{route('user.movies.index')}}" class="btn btn-dark">
                            <i class="bi bi-camera-reels me-2"></i>
                            Ver Filmes
                        </a>
                        <a href="{{route('user.genres.index')}}" class="btn btn-outline-dark">
                            <i class="bi bi-tags me-2"></i>
                            Ver Géneros
                        </a>
                        @endrole




                    </div>

                </div>


                <div class="col-lg-4 text-center mt-4 mt-lg-0">

                    <i
                        class="bi bi-film"
                        style="font-size: 8rem;">
                    </i>

                </div>

            </div>

        </section>


        <!-- Acessos rápidos -->
        @role('admin')
        <div class="row g-4">

            <!-- Filmes -->
            <div class="col-md-6">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="card-body p-4">

                        <div class="feature-icon bg-dark text-white mb-3">
                            <i class="bi bi-camera-reels"></i>
                        </div>

                        <h2 class="h4">
                            Filmes
                        </h2>

                        <p class="text-secondary">
                            Consulte todos os filmes disponíveis,
                            veja os seus detalhes e faça a gestão
                            do catálogo.
                        </p>

                        <a
                            href="{{route('admin.movies.create')}}"
                            class="btn btn-outline-dark"
                        >
                            Inserir Filme
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>

                    </div>

                </div>

            </div>


            <!-- Géneros -->
            <div class="col-md-6">

                <div class="card h-100 border-0 shadow-sm">

                    <div class="card-body p-4">

                        <div class="feature-icon bg-dark text-white mb-3">
                            <i class="bi bi-tags"></i>
                        </div>

                        <h2 class="h4">
                            Géneros
                        </h2>

                        <p class="text-secondary">
                            Organize os filmes por género
                            e mantenha as categorias do catálogo
                            sempre atualizadas.
                        </p>

                        <a
                            href="{{route('admin.genres.create')}}"
                            class="btn btn-outline-dark"
                        >
                            Novo Género
                            <i class="bi bi-arrow-right ms-1"></i>
                        </a>

                    </div>

                </div>

            </div>

        </div>
        @endrole

@endsection
