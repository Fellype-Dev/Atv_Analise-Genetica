@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h1 class="card-title">Novo Exame</h1>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Ocorreram erros:</strong>
                <ul>
                    @foreach($errors->all() as $erro)
                        <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('exames.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="paciente" class="form-label">Paciente</label>
                <input type="text" class="form-control" id="paciente" name="paciente" 
                    placeholder="Nome do paciente" value="{{ old('paciente') }}" required>
            </div>
            
            <div class="mb-3">
                <label for="exame_id" class="form-label">Número do Exame</label>
                <input type="text" class="form-control" id="exame_id" name="exame_id" 
                    placeholder="Número do exame" value="{{ old('exame_id') }}" required>
            </div>
            
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo de Exame</label>
                <select class="form-select" id="tipo" name="tipo" required>
                    <option value="">Selecione o tipo</option>
                    <option value="Sequenciamento" {{ old('tipo') == 'Sequenciamento' ? 'selected' : '' }}>Sequenciamento</option>
                    <option value="PCR" {{ old('tipo') == 'PCR' ? 'selected' : '' }}>PCR</option>
                    <option value="Microarray" {{ old('tipo') == 'Microarray' ? 'selected' : '' }}>Microarray</option>
                </select>
            </div>
            
            <div class="mb-3">
                <label for="data_coleta" class="form-label">Data de Coleta</label>
                <input type="date" class="form-control" id="data_coleta" name="data_coleta" 
                    value="{{ old('data_coleta') }}" required>
            </div>
            
            <div class="mb-3">
                <label for="laudo" class="form-label">Laudo (opcional)</label>
                <textarea class="form-control" id="laudo" name="laudo" rows="3">{{ old('laudo') }}</textarea>
            </div>
            
            <div class="d-flex justify-content-between">
                <a href="{{ route('exames.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Voltar
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Salvar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection