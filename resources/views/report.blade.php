@extends('layout.app')

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@section('content')
<div class="container">
    <h1 class="mb-4">Rapport statistique par garderie</h1>
    
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <div class="card mb-4">
        <div class="card-header">
            <h3>Sélectionner une garderie</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('rapport.generate') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nursery_id">Garderie :</label>
                    <select id="nursery_id" name="nursery_id" class="form-control" required>
                        <option value="">Sélectionner une garderie</option>
                        @foreach($nurseries as $nursery)
                            <option value="{{ $nursery->id }}" {{ $selectedNursery && $selectedNursery->id == $nursery->id ? 'selected' : '' }}>
                                {{ $nursery->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Générer le rapport</button>
            </form>
        </div>
    </div>
    
    @if($selectedNursery)
        <div class="card">
            <div class="card-header">
                <h3>Rapport pour : {{ $selectedNursery->name }}</h3>
            </div>
            <div class="card-body">
                <div class="report-box">
                    <div class="report-item">
                        <h4>Total des revenus : {{ $presenceCount }} présences X {{ number_format(48, 2) }}$ = {{ number_format($revenues, 2) }}$</h4>
                    </div>
                    
                    <div class="report-item">
                        <h4>Total des dépenses : Dépenses admissibles : {{ number_format($expenses, 2) }}$ + Total des salaires : {{ number_format($salaries, 2) }}$ = {{ number_format($expenses + $salaries, 2) }}$</h4>
                    </div>
                    
                    <div class="report-item">
                        <h4>Profit = Revenus({{ number_format($revenues, 2) }}$) - Dépenses ({{ number_format($expenses + $salaries, 2) }}$) = {{ number_format($profit, 2) }}$</h4>
                    </div>
                    
                    <div class="report-note mt-4">
                        <p><em>*Total des salaires = nombre de présence d'éducatrice ({{ $educatorPresenceCount }}) × 8h × 18$/heure</em></p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<style>
    .report-box {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
    }
    
    .report-item {
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #dee2e6;
    }
    
    .report-item:last-child {
        border-bottom: none;
    }
    
    .report-note {
        font-size: 0.9rem;
        color: #17a2b8;
    }
</style>
@endsection 