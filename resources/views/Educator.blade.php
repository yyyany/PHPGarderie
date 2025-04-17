@extends('layout.app')

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@section('content')
<div class="container">
    <h1 class="mb-4">Gestion des éducateurs</h1>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Province</th>
                    <th>Téléphone</th>
                    <th></th>
                    <th class="text-center">
                        <form action="{{ route('educator.clear') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-info" onclick="return confirm('Voulez-vous vraiment supprimer tous les éducateurs ?');">
                                <i class="fas fa-trash-alt"></i> Vider la liste
                            </button>
                        </form>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($educators as $educator)
                <tr>
                    <td>{{ $educator->LastName }}</td>
                    <td>{{ $educator->FirstName }}</td>
                    <td>{{ $educator->BirthDayDate }}</td>
                    <td>{{ $educator->Adress }}</td>
                    <td>{{ $educator->City }}</td>
                    <td>{{ $educator->State }}</td>
                    <td>{{ $educator->Phone }}</td>
                    <td class="text-center">
                        <a href="{{route('educator.formModifyEducator', $educator->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('educator.delete', $educator->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cet éducateur ?');">
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
        <h2 class="mb-3">Ajouter un nouvel éducateur</h2>
        <form action="{{ route('educator.add') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="date_naissance">Date de naissance :</label>
                <input type="date" id="date_naissance" name="date_naissance" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="ville">Ville :</label>
                <input type="text" id="ville" name="ville" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="province">Province :</label>
                <select id="province" name="province" class="form-control">
                    @foreach ($states as $state)
                        <option value="{{ $state->description }}">{{ $state->description }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="telephone">Téléphone :</label>
                <input type="tel" id="telephone" name="telephone" class="form-control" required>
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