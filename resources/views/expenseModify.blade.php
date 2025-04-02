@extends('layout.app')

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@section('content')
<div class="container-fluid">
    <h1 class="mb-4">Modification de la dépense</h1>
    
    <form action="{{ route('expense.update', $expense->id) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nursery_id">Garderie</label>
                    <select id="nursery_id" name="nursery_id" class="form-control">
                        @foreach ($nurseries as $nursery)
                            <option value="{{ $nursery->id }}" {{ $expense->nursery_id == $nursery->id ? 'selected' : '' }}>
                                {{ $nursery->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="amount">Montant</label>
                    <input type="number" step="0.01" id="amount" name="amount" class="form-control" value="{{ $expense->amount }}" required>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="dateTime">Date et heure</label>
                    <input type="datetime-local" id="dateTime" name="dateTime" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($expense->dateTime)) }}" required>
                </div>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="category_name">Catégorie de dépense</label>
                    <select id="category_name" name="category_name" class="form-control">
                        @foreach ($categoriesExpenses as $category)
                            <option value="{{ $category->description }}" {{ $expense->category->description == $category->description ? 'selected' : '' }}>
                                {{ $category->description }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label>Commerce</label>
                    <div>
                        @foreach($commerces as $commerce)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="expense_commerce_name" id="commerce_{{ $commerce->id }}" value="{{ $commerce->description }}" {{  $expense->commerce->description == $commerce->description ? 'checked' : '' }}>
                                <label class="form-check-label" for="commerce_{{ $commerce->id }}">{{ $commerce->description }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="{{ route('expense.index', ['nursery_id' => $expense->nursery_id]) }}" class="btn btn-danger">Annuler</a>
        </div>
    </form>
</div>
@endsection 