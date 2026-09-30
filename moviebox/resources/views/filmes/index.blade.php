@extends('layout.main')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="h3 mb-1">
                Filmes
            </h1>

            <p class="text-secondary mb-0">
                Lista de filmes disponíveis.
            </p>
        </div>

        @hasanyrole('admin|editor')
        <a href="{{ route($area . '.movies.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Novo Filme
        </a>
        @endhasanyrole

    </div>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    {{-- Área reservada para implementar posteriormente a pesquisa --}}


    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Realizador</th>
                        <th>Ano</th>
                        <th>Duração</th>
                        <th>Género</th>
                        <th>Atores</th>
                        <th class="text-end table-actions">Ações</th>
                    </tr>
                    </thead>

                    <tbody>

                    @forelse($movies as $movie)

                        <tr>

                            <td>{{ $movie->id }}</td>

                            <td>{{ $movie->title }}</td>

                            <td>{{ $movie->director }}</td>

                            <td>{{ $movie->year ?? '-' }}</td>

                            <td>
                                {{ $movie->duration }} min
                            </td>

                            <td>
                                {{ $movie->genre->name }}
                            </td>

                            <td>
                                {{ $movie->actors_count }}
                            </td>

                            <td class="text-end table-actions">

                                <a href="{{ route($area . '.movies.show', $movie) }}"
                                   class="btn btn-sm btn-outline-secondary"
                                   title="Ver">
                                    <i class="bi bi-eye"></i>
                                </a>

                                @hasanyrole('admin|editor')
                                <a href="{{ route($area . '.movies.edit', $movie) }}"
                                   class="btn btn-sm btn-outline-primary"
                                   title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @endhasanyrole

                                @role('admin')
                                <form
                                    action="{{ route('admin.movies.destroy', $movie) }}"
                                    method="POST"
                                    style="display: contents;"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-warning"
                                        title="Eliminar"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                @endrole

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="8"
                                class="text-center text-secondary py-4">
                                Não existem filmes.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <div class="mt-3">
        {{ $movies->links() }}
    </div>

@endsection
