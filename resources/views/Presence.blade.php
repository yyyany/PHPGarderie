@extends('layout.app')

@push('styles')
    @vite(['resources/css/app.css'])
@endpush

@section('content')
<div class="container">
    <h1 class="mb-4">Gestion des présences</h1>
<div class="form-group mb-4">
    <form method="GET" action="{{ route('expense.index') }}">
        <select class="form-control" id="name_nursery" name="name_nursery" onchange="this.form.submit()">
            @foreach($nurseries as $nursery)    
                <option value="{{ $nursery->name }}" {{ isset($nurseryName) && $nurseryName == $nursery->name ? 'selected' : '' }}>
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
                    <th><a href="#" class="text-decoration-none text-primary">Date</a></th>
                    <th><a href="#" class="text-decoration-none text-primary">Nom Enfant</a></th>
                    <th><a href="#" class="text-decoration-none text-primary">Prenom Enfant</a></th>
                    <th><a href="#" class="text-decoration-none text-primary">Date de naissance enfant </a></th>
                    <th><a href="#" class="text-decoration-none text-primary">Nom Educateur</a></th>
                    <th><a href="#" class="text-decoration-none text-primary">Prenom Educateur</a></th>
                    <th><a href="#" class="text-decoration-none text-primary">Date de naissance Educateur </a></th>
                    <th colspan="2"></th>
                    <th class="text-center">
                        <form action="{{ route('presence.clear') }}" method="POST">
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
                @foreach($presences as $presence)
                <tr>
                    <td>{{ $presence->dateTime }}</td>  
                    <td>{{ $presence->Child->nom }}</td>
                    <td>{{ $presence->Child->prenom }}</td>
                    <td>{{ $presence->Child->date_naissance }}</td>
                    <td>{{ $presence->educators->LastName }}</td>
                    <td>{{ $presence->educators->FirstName }}</td>
                    <td>{{ $presence->Educators->BirthDayDate }}</td>
                    <td class="text-center">
                        <form action="{{ route('presence.delete', $presence->id_presence) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette présence ?');">
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
        <h2 class="mb-3">Ajouter une nouvelle présence</h2>
        <form action="{{ route('presence.add') }}" method="POST">
            @csrf
            <input type="hidden" name="nursery_name" value="{{ $nurseryName }}">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="dateTime">Date :</label>
                        <input type="date" id="dateTime" name="dateTime" class="form-control" required>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="child_description">Enfant :</label>
                        <select id="child_description" name="child_description" class="form-control">
                            @foreach ($children as $child)
                                <option value="{{ $child->nom }}">{{ $child->nom }}{{ $child->nom }} {{ $child->prenom }} {{ $child->date_naissance }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="educator_description">Enseignant :</label>
                        <select id="educator_description" name="educator_description" class="form-control">
                            @foreach ($educators as $educator)
                                <option value="{{ $educator->LastName }}">{{ $educator->LastName }} {{ $educator->FirstName }} {{ $educator->BirthDayDate }}</option>
                            @endforeach
                                    </select>
                                </div>
                            </div>
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