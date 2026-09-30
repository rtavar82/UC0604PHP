@extends('layout.main')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="h3 mb-1">
                Novo Ator
            </h1>

            <p class="text-secondary mb-0">
                Adicionar um novo ator.
            </p>
        </div>

        <a href="{{ route($area . '.actors.index') }}"
           class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Voltar
        </a>

    </div>


    <div class="card shadow-sm">

        <div class="card-body">

            <form method="POST"
                  action="{{ route($area . '.actors.store') }}">

                @csrf

                @include('atores.partials.form')

                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg me-1"></i>
                        Guardar
                    </button>

                    <a href="{{ route($area . '.actors.index') }}"
                       class="btn btn-outline-secondary">
                        Cancelar
                    </a>

                </div>

            </form>

        </div>

    </div>

@endsection
