@extends('layout.main')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="h3 mb-1">
                {{ $movie->title }}
            </h1>

            <p class="text-secondary mb-0">
                Informação do filme.
            </p>
        </div>


        <div>

            @hasanyrole('admin|editor')
            <a href="{{ route($area . '.movies.edit', $movie) }}"
               class="btn btn-outline-primary">
                <i class="bi bi-pencil me-1"></i>
                Editar
            </a>
            @endhasanyrole

            <a href="{{ route($area . '.movies.index') }}"
               class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i>
                Voltar
            </a>

        </div>

    </div>


    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <dl class="row mb-0">

                <dt class="col-md-3">Título</dt>
                <dd class="col-md-9">
                    {{ $movie->title }}
                </dd>

                <dt class="col-md-3">Realizador</dt>
                <dd class="col-md-9">
                    {{ $movie->director }}
                </dd>

                <dt class="col-md-3">Ano</dt>
                <dd class="col-md-9">
                    {{ $movie->year ?? '-' }}
                </dd>

                <dt class="col-md-3">Duração</dt>
                <dd class="col-md-9">
                    {{ $movie->duration }} minutos
                </dd>

                <dt class="col-md-3">Género</dt>
                <dd class="col-md-9">
                    {{ $movie->genre->name }}
                </dd>

            </dl>

        </div>

    </div>


    <div class="card shadow-sm">

        <div class="card-header">
            <strong>Atores</strong>
        </div>

        <div class="card-body">

            @forelse($movie->actors as $actor)

                <div class="mb-2">
                    <i class="bi bi-person me-2"></i>
                    {{ $actor->name }}
                </div>

            @empty

                <p class="text-secondary mb-0">
                    Este filme não tem atores associados.
                </p>

            @endforelse

        </div>

    </div>

@endsection
