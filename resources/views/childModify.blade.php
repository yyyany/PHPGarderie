@extends('layout.app')

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Modification de l'enfant</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Informations personnelles</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('child.update', $child->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" id="nom" name="nom" class="form-control" value="{{ $child->nom }}" readonly>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" id="prenom" name="prenom" class="form-control" value="{{ $child->prenom }}" readonly>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="date_naissance" class="form-label">Date de naissance</label>
                            <input type="date" id="date_naissance" name="date_naissance" class="form-control" value="{{ $child->date_naissance->format('Y-m-d') }}" readonly>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" id="adresse" name="adresse" class="form-control" value="{{ $child->adresse }}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" id="ville" name="ville" class="form-control" value="{{ $child->ville }}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="province" class="form-label">Province</label>
                            <select id="province" name="province" class="form-control">
                                <option value="Alberta" {{ $child->province == 'Alberta' ? 'selected' : '' }}>Alberta</option>
                                <option value="Colombie-Britannique" {{ $child->province == 'Colombie-Britannique' ? 'selected' : '' }}>Colombie-Britannique</option>
                                <option value="Manitoba" {{ $child->province == 'Manitoba' ? 'selected' : '' }}>Manitoba</option>
                                <option value="Nouveau-Brunswick" {{ $child->province == 'Nouveau-Brunswick' ? 'selected' : '' }}>Nouveau-Brunswick</option>
                                <option value="Nouvelle-Écosse" {{ $child->province == 'Nouvelle-Écosse' ? 'selected' : '' }}>Nouvelle-Écosse</option>
                                <option value="Ontario" {{ $child->province == 'Ontario' ? 'selected' : '' }}>Ontario</option>
                                <option value="Québec" {{ $child->province == 'Québec' ? 'selected' : '' }}>Québec</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="tel" id="telephone" name="telephone" class="form-control" value="{{ $child->telephone }}" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-group mt-4 text-end">
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    <a href="{{ route('child.index') }}" class="btn btn-danger">Annuler</a>
                </div>
            </form>
        </div>
    </div>
    
    <!-- Tableau des présences -->
    <div class="card shadow mt-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Liste des présences</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Garderie</th>
                            <th>Date</th>
                            <th>Nom enfant</th>
                            <th>Prénom enfant</th>
                            <th>Date naissance enfant</th>
                            <th>Nom éducateur</th>
                            <th>Prénom éducateur</th>
                            <th>Date naissance éducateur</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($presences as $presence)
                        <tr>
                            <td>{{ $presence->Nursery->name }}</td>
                            <td>{{ $presence->dateTime }}</td>
                            <td>{{ $presence->Child->nom }}</td>
                            <td>{{ $presence->Child->prenom }}</td>
                            <td>{{ $presence->Child->date_naissance }}</td>
                            <td>{{ $presence->Educators->LastName }}</td>
                            <td>{{ $presence->Educators->FirstName }}</td>
                            <td>{{ $presence->Educators->BirthDayDate }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 