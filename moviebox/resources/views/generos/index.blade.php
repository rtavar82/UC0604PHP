@extends('layout.main')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="h3 mb-1">
                Atores
            </h1>

            <p class="text-secondary mb-0">
                Lista de atores disponíveis.
            </p>
        </div>

        @hasanyrole('admin|editor')
        <a href="{{ route($area . '.actors.create') }}"
           class="btn btn-primary">
            <i class="bi bi-plus-lg me-1"></i>
            Novo Ator
        </a>
        @endhasanyrole

    </div>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Nacionalidade</th>
                        <th>Data de nascimento</th>
                        <th>Filmes</th>
                        <th class="text-end table-actions">Ações</th>
                    </tr>
                    </thead>

                    <tbody>

                    @forelse($actors as $actor)

                        <tr>
                            <td>{{ $actor->id }}</td>

                            <td>{{ $actor->name }}</td>

                            <td>
                                {{ $actor->nationality ?? '-' }}
                            </td>

                            <td>
                                {{ $actor->birth_date?->format('d/m/Y') ?? '-' }}
                            </td>

                            <td>
                                {{ $actor->movies_count }}
                            </td>

                            <td class="text-end table-actions">

                                <a href="{{ route($area . '.actors.show', $actor) }}"
                                   class="btn btn-sm btn-outline-secondary"
                                   title="Ver">
                                    <i class="bi bi-eye"></i>
                                </a>

                                @hasanyrole('admin|editor')
                                <a href="{{ route($area . '.actors.edit', $actor) }}"
                                   class="btn btn-sm btn-outline-primary"
                                   title="Editar">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                @endhasanyrole

                                @role('admin')
                                <form action="{{ route('admin.actors.destroy', $actor) }}"
                                      method="POST"
                                      style="display: contents;">
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
                            <td colspan="6" class="text-center text-secondary py-4">
                                Não existem atores.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <div class="d-flex justify-content-between align-items-center mt-3">

        <div>
            {{ $actors->links() }}
        </div>

        @role('admin')
        <a href="{{ route('admin.actors.trashed') }}"
           class="btn btn-outline-secondary">
            <i class="bi bi-trash me-1"></i>
            Atores eliminados
        </a>
        @endrole

    </div>

@endsection
