@extends('layout.app')

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Modification de la garderie</h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary">Informations de la garderie</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('nursery.update', $nursery->id) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nom</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{$nursery->name}}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">Téléphone</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{$nursery->phone}}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label for="state_name" class="form-label">Province</label>
                            <select id="state_name" name="state_name" class="form-control">
                                @foreach ($states as $state)
                                    <option value="{{ $state->description }}" {{ $nursery->state->description == $state->description ? 'selected' : '' }}>
                                        {{$state->description}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="address" class="form-label">Adresse</label>
                            <input type="text" id="address" name="address" class="form-control" value="{{$nursery->address}}" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="city" class="form-label">Ville</label>
                            <input type="text" id="city" name="city" class="form-control" value="{{$nursery->city}}" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-group mt-4 text-end">
                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    <a href="{{ route('nursery.index') }}" class="btn btn-danger">Annuler</a>
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