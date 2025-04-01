@extends('layout.app')

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@section('content')
<div class="container">
    <h1 class="mb-4">Gestion des garderies</h1>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Province</th>
                    <th>Téléphone</th>
                    <th></th>
                    <th class="text-center">
                        <form action="{{ route('nursery.clear') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-info" onclick="return confirm('Voulez-vous vraiment supprimer toutes les garderies ?');">
                                <i class="fas fa-trash-alt"></i> Vider la liste
                            </button>
                        </form>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($nurseries as $nursery)
                <tr>
                    <td>{{ $nursery->name }}</td>
                    <td>{{ $nursery->address }}</td>
                    <td>{{ $nursery->city }}</td>
                    <td>{{ $nursery->state->description }}</td>
                    <td>{{ $nursery->phone }}</td>
                    <td class="text-center">
                        <a href="{{ route('nursery.formModifyNursery', $nursery->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('nursery.delete', $nursery->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette garderie ?');">
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
        <h2 class="mb-3">Ajouter une nouvelle garderie</h2>
        <form action="{{ route('nursery.add') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="address">Adresse :</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="city">Ville :</label>
                <input type="text" id="city" name="city" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="state_name">Province :</label>
                <select id="state_name" name="state_name" class="form-control">
                    @foreach ($states as $state)
                        <option value="{{ $state->description }}">{{ $state->description }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="phone">Téléphone :</label>
                <input type="tel" id="phone" name="phone" class="form-control" required>
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