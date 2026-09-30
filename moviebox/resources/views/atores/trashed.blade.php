@extends('layout.main')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="h3 mb-1">
                Atores eliminados
            </h1>

            <p class="text-secondary mb-0">
                Lista de atores eliminados.
            </p>
        </div>

        <a href="{{ route('admin.actors.index') }}"
           class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i>
            Voltar
        </a>

    </div>


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
                        <th>Eliminado em</th>
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
                                {{ $actor->deleted_at->format('d/m/Y H:i') }}
                            </td>

                            <td class="text-end table-actions">

                                <form
                                    action="{{ route('admin.actors.restore', $actor->id) }}"
                                    method="POST"
                                    style="display: contents;"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-success"
                                        title="Restaurar"
                                    >
                                        <i class="bi bi-arrow-counterclockwise"></i>
                                    </button>

                                </form>


                                <form
                                    action="{{ route('admin.actors.force-delete', $actor->id) }}"
                                    method="POST"
                                    style="display: contents;"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        title="Eliminar definitivamente"
                                    >
                                        <i class="bi bi-file-earmark-x"></i>
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6"
                                class="text-center text-secondary py-4">
                                Não existem atores eliminados.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <div class="mt-3">
        {{ $actors->links() }}
    </div>

@endsection
