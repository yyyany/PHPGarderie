@extends('layout.app')

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@section('content')
<div class="container">
    <h1 class="mb-4">Gestion des Catégories de dépense</h1>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Pourcentage</th>
                    <th></th>
                    <th class="text-center">
                        <form action="{{ route('categorieDepense.clear') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-info" onclick="return confirm('Voulez-vous vraiment supprimer toutes les catégories de dépense ?');">
                                <i class="fas fa-trash-alt"></i> Vider la liste
                            </button>
                        </form>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($categoriesDepense as $categorieDepense)
                <tr>
                    <td>{{ $categorieDepense->description }}</td>
                    <td>{{ $categorieDepense->pourcentage }}</td>
                    <td class="text-center">
                        <a href="{{ route('categorieDepense.formModifyCategorieDepense', $categorieDepense->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('categorieDepense.delete', $categorieDepense->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?');">
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
        <h2 class="mb-3">Ajouter une nouvelle catégorie de dépense</h2>
        <form action="{{ route('categorieDepense.add') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="pourcentage">Pourcentage</label>
                <input type="number" step="0.01" id="pourcentage" name="pourcentage" class="form-control" required>
            </div>
            
            <div class="form-group mt-4">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-plus-circle"></i> Créer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 