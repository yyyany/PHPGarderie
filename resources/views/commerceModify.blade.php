@extends('layout.app')

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Modification du commerce</h1>
    
    <form action="{{ route('commerce.update', $commerce->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Description</label>
            <input type="text" id="description" name="description" class="form-control" value="{{$commerce->description}}" required>
        </div>
        
        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" id="adress" name="adress" class="form-control" value="{{$commerce->address}}" required>
        </div>
        <div class="form-group">
            <label for="city">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{$commerce->phone}}" required>
        </div>
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="{{ route('commerce.index') }}" class="btn btn-danger">Annuler</a>
        </div>
    </form>
</div>
<div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                <th><a href="#" class="text-decoration-none text-primary">Garderie</a></th>
                    <th><a href="#" class="text-decoration-none text-primary">DateTemps</a></th>
                    <th><a href="#" class="text-decoration-none text-primary">Montant</a></th>
                    <th><a href="#" class="text-decoration-none text-primary">Montant admissible</a></th>
                    <th><a href="#" class="text-decoration-none text-primary">Catégorie de dépense</a></th>
                    <th><a href="#" class="text-decoration-none text-primary">Commerce</a></th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $expense)
                <tr>
                <td>{{ $expense->nursery->name}}</td>
                    <td>{{ $expense->dateTime }}</td>
                    <td>${{ number_format($expense->amount, 2) }}</td>
                    <td>${{ number_format($expense->amount * ($expense->category->pourcentage ?? 1), 2) }}</td>
                    <td>{{ $expense->category->description }}</td>
                    <td>{{ $expense->commerce->description}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection 