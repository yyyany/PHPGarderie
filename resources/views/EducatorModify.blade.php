@extends('layout.app')

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Modification de l'éducateur</h1>
    
    <form action="{{ route('educator.update', $educator->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" class="form-control" value="{{ $educator->LastName }}" readonly>
        </div>
        
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" class="form-control" value="{{ $educator->FirstName }}" readonly>
        </div>
        
        <div class="form-group">
            <label for="date_naissance">Date de naissance</label>
            <input type="date" id="date_naissance" name="date_naissance" class="form-control" value="{{ $educator->BirthDayDate }}" >
        </div>
        
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" id="adresse" name="adresse" class="form-control" value="{{ $educator->Adress }}" required>
        </div>
        
        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" id="ville" name="ville" class="form-control" value="{{ $educator->City }}" required>
        </div>
        
                <div class="form-group">
            <label for="province">Province :</label>
            <select id="province" name="province" class="form-control">
                @foreach ($states as $state)
                    <option value="{{ $state->description }}"
                        @if ($state->description == $educator->State) selected @endif>
                        {{ $state->description }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="tel" id="telephone" name="telephone" class="form-control" value="{{ $educator->Phone }}" required>
        </div>
        
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="{{ route('educator.index') }}" class="btn btn-danger">Annuler</a>
        </div>
    </form>
</div>
@endsection 