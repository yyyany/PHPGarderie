
        <style>
            body {
                font-family: 'Figtree', sans-serif;
                margin: 0;
                padding: 0;
            }
            
            .logo {
                max-width: 150px;
                margin: 10px 0;
            }
            
            header {
                text-align: center;
                padding: 10px;
            }
            
            .navbar {
                background-color: #f0f8ff;
                display: flex;
                justify-content: space-around;
                padding: 10px 0;
                margin-bottom: 20px;
                border-top: 1px solid #ddd;
                border-bottom: 1px solid #ddd;
            }
            
            .navbar a {
                text-decoration: none;
                color: #333;
                font-weight: 600;
                padding: 8px 15px;
            }
            
            .navbar a:hover {
                color: #0078d7;
            }
            
            .container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 20px;
            }
            
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 20px 0;
                border: 1px solid #ddd;
            }
            
            th {
                background-color: #f5f5f5;
                text-align: left;
                padding: 12px;
                color: #0099cc;
                border-bottom: 1px solid #ddd;
            }
            
            td {
                padding: 12px;
                border-bottom: 1px solid #ddd;
            }
            
            .btn {
                padding: 8px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-weight: 600;
                margin: 5px;
            }
            
            .btn-primary {
                background-color: #ffc107;
                color: #333;
            }
            
            .btn-danger {
                background-color: #dc3545;
                color: white;
            }
            
            .btn-success {
                background-color: #28a745;
                color: white;
            }
            
            .btn-info {
                background-color: #17a2b8;
                color: white;
            }
            
            .form-group {
                margin-bottom: 15px;
            }
            
            .form-group label {
                display: inline-block;
                width: 100px;
                font-weight: 600;
                color: #0099cc;
            }
            
            .form-control {
                padding: 8px;
                border: 1px solid #ddd;
                border-radius: 4px;
                width: 250px;
            }
            
            .form-section {
                margin-top: 30px;
                margin-bottom: 30px;
                border-top: 1px solid #ddd;
                padding-top: 20px;
            }
            
            .actions {
                text-align: center;
            }
        </style>
   
        @extends('layout.app')
        @section('content')
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Ville</th>
                        <th>Province</th>
                        <th>Téléphone</th>
                        <th class="actions" colspan="2">
                            <form action="{{ route('nursery.clear') }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-info" onclick="return confirm('Voulez-vous vraiment supprimer toutes les garderies ?');">
                                    Vider la liste
                                </button>
                            </form>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nurseries as $nursery)
                    <tr>
                        <td>{{ $nursery->name }}</td>
                        <td>{{ $nursery->address }}</td>
                        <td>{{ $nursery->city }}</td>
                        <td>{{ $nursery->state->description}}</td>
                        <td>{{ $nursery->phone }}</td>
                        <td class="actions">
                            <td> <button><a href="{{ route('nursery.formModifyNursery', $nursery->id) }}">Modifier</a></button></td>
                       <td>
                        <form action="{{ route('nursery.delete', $nursery->id) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cette garderie ?');">Supprimer</button>
                                </form>
                        </td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="form-section">
                <form action="{{ route('nursery.add') }}" method="POST">
                    @csrf
                    <div >
                        <label for="name">Nom :</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    
                    <div >
                        <label for="address">Adresse :</label>
                        <input type="text" id="address" name="address" class="form-control" required>
                    </div>
                    
                    <div >
                        <label for="city">Ville :</label>
                        <input type="text" id="city" name="city" class="form-control" required>
                    </div>
                    
                    <div >
                        <label for="state_name">Province :</label>
                        <select id="state_name" name="state_name" class="form-control">
                            @foreach ($states as $state)
                                <option value="{{ $state->description }}">{{ $state->description }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label for="phone">Téléphone :</label>
                        <input type="tel" id="phone" name="phone" class="form-control" required>
                    </div>
                    
                    <div >
                        <button type="submit" class="btn btn-success">Créer</button>
                    </div>
                </form>
             
            </div>
        </div>
    
        @endsection('content') 