@extends('layout.app')

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@section('content')
<div class="container">
    <h1 class="mb-4">Gestion des Commerce</h1>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th></th>
                    <th class="text-center">
                        <form action="{{ route('commerce.clear') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-info" onclick="return confirm('Voulez-vous vraiment supprimer toutes les commerces  ?');">
                                <i class="fas fa-trash-alt"></i> Vider la liste
                            </button>
                        </form>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($commerces as $commerce)
                <tr>
                    <td>{{ $commerce->description }}</td>
                    <td>{{ $commerce->address }}</td>
                    <td>{{ $commerce->phone }}</td>
                    <td class="text-center">
                        <a href="{{ route('commerce.formModifyCommerce', $commerce->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Modifier
                        </a>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('commerce.delete', $commerce->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer ce commerce ?');">
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
        <h2 class="mb-3">Ajouter une nouveau commerce </h2>
        <form action="{{ route('commerce.add') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Description :</label>
                <input type="text" id="description" name="description" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="address">Adresse :</label>
                <input type="text" id="adress" name="adress" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="city">Phone :</label>
                <input type="text" id="phone" name="phone" class="form-control" required>
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