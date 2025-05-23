@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 style="color: var(--color-primary);">Lista de Exames</h1>
    <a href="{{ route('exames.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Novo Exame
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Paciente</th>
                        <th>Número do Exame</th>
                        <th>Tipo</th>
                        <th>Data de Coleta</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exames as $exame)
                    <tr>
                        <td>{{ $exame->paciente }}</td>
                        <td>{{ $exame->exame_id }}</td>
                        <td>{{ $exame->tipo }}</td>
                        <td>{{ date('d/m/Y', strtotime($exame->data_coleta)) }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('exames.show', $exame) }}" class="btn btn-sm btn-info text-white" style="background-color: var(--color-gray); border-color: var(--color-gray);">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('exames.edit', $exame) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('exames.destroy', $exame) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este exame?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection