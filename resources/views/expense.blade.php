@extends('layout.app')

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@section('content')
<div class="container">
    <h1 class="mb-4">Gestion des dépenses</h1>
<div class="form-group mb-4">
    <form method="GET" action="{{ route('expense.index') }}">
        <label for="nursery_id">Sélectionner une garderie :</label>
        <select class="form-control" id="nursery_id" name="nursery_id" onchange="this.form.submit()">
            @foreach($nurseries as $nursery)    
                <option value="{{ $nursery->id }}" {{ isset($selectedNursery) && $selectedNursery->id == $nursery->id ? 'selected' : '' }}>
                    {{ $nursery->name }}
                </option>
            @endforeach
        </select>
    </form>
</div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><a href="#" class="text-decoration-none text-primary">DateTemps</a></th>
                    <th><a href="#" class="text-decoration-none text-primary">Montant</a></th>
                    <th><a href="#" class="text-decoration-none text-primary">Montant admissible</a></th>
                    <th><a href="#" class="text-decoration-none text-primary">Catégorie de dépense</a></th>
                    <th><a href="#" class="text-decoration-none text-primary">Commerce</a></th>
                    <th colspan="2"></th>
                    <th class="text-center">
                        <form action="{{ route('expense.clear') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment vider la liste des dépenses ?');">
                                <i class="fas fa-trash-alt"></i> Vider la liste
                            </button>
                        </form>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $expense)
                <tr>
                    <td>{{ $expense->dateTime }}</td>
                    <td>${{ number_format($expense->amount, 2) }}</td>
                    <td>${{ number_format($expense->amount * ($expense->category->pourcentage ?? 1), 2) }}</td>
                    <td>{{ $expense->category->description }}</td>
                    <td>{{ $expense->commerce->description}}</td>
                    <td class="text-center">
                        <a href="{{ route('expense.formModifyExpense', $expense->id) }}" class="btn btn-warning">
                            Modifier
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('expense.delete', $expense->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette dépense ?');">
                                Supprimer
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="form-section">
        <h2 class="mb-3">Ajouter une nouvelle dépense</h2>
        <form action="{{ route('expense.add') }}" method="POST">
            @csrf
            <input type="hidden" name="nursery_id" value="{{ $selectedNursery ? $selectedNursery->id : '' }}">
            
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="amount">Montant :</label>
                        <input type="number" step="0.01" id="amount" name="amount" class="form-control" required>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="category_name">Catégorie de dépense :</label>
                        <select id="category_name" name="category_name" class="form-control">
                            @foreach ($categoriesExpenses as $category)
                                <option value="{{ $category->description }}">{{ $category->description }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Commerce :</label>
                        <div>
                            @foreach($commerces as $index => $commerce)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="expense_commerce_name" id="commerce_{{ $commerce->id }}" value="{{ $commerce->description }}" {{ $index == 0 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="commerce_{{ $commerce->id }}">{{ $commerce->description }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-success">
                    Créer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 