@extends('layout.main')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="h3 mb-1">
                Editar Filme
            </h1>

            <p class="text-secondary mb-0">
                Alterar os dados de {{ $movie->title }}.
            </p>
        </div>

        <a href="{{ route($area . '.movies.index') }}"
           class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Voltar
        </a>

    </div>


    <div class="card shadow-sm">

        <div class="card-body">

            <form
                method="POST"
                action="{{ route($area . '.movies.update', $movie) }}"
            >

                @csrf
                @method('PUT')

                @include('filmes.partials.form')

                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg me-1"></i>
                        Guardar
                    </button>

                    <a href="{{ route($area . '.movies.index') }}"
                       class="btn btn-outline-secondary">
                        Cancelar
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection
