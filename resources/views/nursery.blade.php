@extends('layout.app')
@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Liste des garderies</h5>
                <form action="{{ route('nursery.clear') }}" method="POST" class="m-0">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer toutes les garderies ?');">
                        <i class="fas fa-trash"></i> Vider la liste
                    </button>
                </form>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>Nom</th>
                                <th>Adresse</th>
                                <th>Ville</th>
                                <th>Province</th>
                                <th>Téléphone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nurseries ?? [] as $nursery)
                            <tr>
                                <td>{{ $nursery->name }}</td>
                                <td>{{ $nursery->address }}</td>
                                <td>{{ $nursery->city }}</td>
                                <td>{{ $nursery->state_name }}</td>
                                <td>{{ $nursery->phone }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-warning btn-sm">Modifier</button>
                                        <button class="btn btn-danger btn-sm">Supprimer</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Ajouter une garderie</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('nursery.add') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="address" class="form-label">Adresse</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="city" class="form-label">Ville</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="state_name" class="form-label">Province</label>
                                <select class="form-select" id="state_name" name="state_name" required>
                                    <option value="">Sélectionnez une province</option>
                                    <option value="Québec">Québec</option>
                                    <option value="Ontario">Ontario</option>
                                    <option value="Alberta">Alberta</option>
                                    <option value="Colombie-Britannique">Colombie-Britannique</option>
                                    <option value="Manitoba">Manitoba</option>
                                    <option value="Nouveau-Brunswick">Nouveau-Brunswick</option>
                                    <option value="Nouvelle-Écosse">Nouvelle-Écosse</option>
                                    <option value="Saskatchewan">Saskatchewan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="phone" class="form-label">Téléphone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success w-100">
                                 Créer
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 