@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">Exame de {{ $exame->paciente }}</h1>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-4">
                <h5><strong>Número do Exame:</strong></h5>
                <p>{{ $exame->exame_id }}</p>
            </div>
            <div class="col-md-4">
                <h5><strong>Tipo:</strong></h5>
                <p>{{ $exame->tipo }}</p>
            </div>
            <div class="col-md-4">
                <h5><strong>Data de Coleta:</strong></h5>
                <p>{{ date('d/m/Y', strtotime($exame->data_coleta)) }}</p>
            </div>
        </div>
        
        @if($exame->laudo)
        <div class="mb-3">
            <h5><strong>Laudo:</strong></h5>
            <div class="border p-3 rounded" style="background-color: rgba(248, 244, 227, 0.5);">
                {!! nl2br(e($exame->laudo)) !!}
            </div>
        </div>
        @endif
        
        <div class="d-flex justify-content-between">
            <a href="{{ route('exames.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
            <div class="btn-group">
                <a href="{{ route('exames.edit', $exame) }}" class="btn btn-warning">
                    <i class="bi bi-pencil"></i> Editar
                </a>
                <form action="{{ route('exames.destroy', $exame) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este exame?')">
                        <i class="bi bi-trash"></i> Excluir
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection