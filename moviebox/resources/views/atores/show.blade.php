@extends('layout.main')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="h3 mb-1">
                {{ $actor->name }}
            </h1>

            <p class="text-secondary mb-0">
                Informação do ator.
            </p>
        </div>

        <div>

            @hasanyrole('admin|editor')
            <a href="{{ route($area . '.actors.edit', $actor) }}"
               class="btn btn-outline-primary">
                <i class="bi bi-pencil me-1"></i>
                Editar
            </a>
            @endhasanyrole

            <a href="{{ route($area . '.actors.index') }}"
               class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i>
                Voltar
            </a>

        </div>

    </div>


    <div class="card shadow-sm mb-4">

        <div class="card-body">

            <dl class="row mb-0">

                <dt class="col-md-3">Nome</dt>
                <dd class="col-md-9">
                    {{ $actor->name }}
                </dd>

                <dt class="col-md-3">Data de nascimento</dt>
                <dd class="col-md-9">
                    {{ $actor->birth_date?->format('d/m/Y') ?? '-' }}
                </dd>

                <dt class="col-md-3">Nacionalidade</dt>
                <dd class="col-md-9">
                    {{ $actor->nationality ?? '-' }}
                </dd>

                <dt class="col-md-3">Biografia</dt>
                <dd class="col-md-9">
                    {{ $actor->biography ?? '-' }}
                </dd>

            </dl>

        </div>

    </div>


    <div class="card shadow-sm">

        <div class="card-header">
            <strong>Filmes</strong>
        </div>

        <div class="card-body">

            @forelse($actor->movies as $movie)

                <div class="mb-2">
                    <i class="bi bi-film me-2"></i>
                    {{ $movie->title }}
                </div>

            @empty

                <p class="text-secondary mb-0">
                    Este ator não está associado a nenhum filme.
                </p>

            @endforelse

        </div>

    </div>

@endsection
