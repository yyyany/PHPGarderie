@extends('layout.app')

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@section('content')
<div class="container">
    <h1 class="mb-4">Gestion des Provinces</h1>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Province</th>
                    <th></th>
                    <th class="text-center">
                        <form action="{{ route('states.clear') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-info" onclick="return confirm('Êtes-vous sûr de vouloir supprimer toutes les provinces non utilisées ?');">
                                <i class="fas fa-trash-alt"></i> Vider les provinces non utilisées
                            </button>
                        </form>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($states as $state)
                <tr>
                    <td>{{ $state->description }}</td>
                    <td></td>
                    <td class="text-center">
                        <form action="{{ route('states.destroy', $state->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette province ?');">
                                <i class="fas fa-trash"></i> Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="form-section">
        <h2 class="mb-3">Ajouter une nouvelle province</h2>
        <form action="{{ route('states.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="description">Nom de la province :</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" 
                       id="description" name="description" required>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-plus-circle"></i> Créer
                </button>
            </div>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif
</div>
@endsection 