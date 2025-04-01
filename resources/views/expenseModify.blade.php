@extends('layout.app')

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Modification de la garderie</h1>
    
    <form action="{{ route('nursery.update', $nursery->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" class="form-control" value="{{$nursery->name}}" required>
        </div>
        
        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" id="address" name="address" class="form-control" value="{{$nursery->address}}" required>
        </div>
        
        <div class="form-group">
            <label for="city">Ville</label>
            <input type="text" id="city" name="city" class="form-control" value="{{$nursery->city}}" required>
        </div>
        
        <div class="form-group">
            <label for="state_name">Province</label>
            <select id="state_name" name="state_name" class="form-control">
                @foreach ($states as $state)
                    <option value="{{ $state->description }}" {{ $nursery->state->description == $state->description ? 'selected' : '' }}>
                        {{$state->description}}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{$nursery->phone}}" required>
        </div>
        
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="{{ route('nursery.index') }}" class="btn btn-danger">Annuler</a>
        </div>
    </form>
</div>
@endsection 