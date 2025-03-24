<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>L'Univers de la Garderie</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
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
    </head>
    <body>
        <header>
            <img src="{{ asset('images/logo.png') }}" alt="L'Univers de la Garderie" class="logo">
        </header>
        
        <nav class="navbar">
            <a href="{{ route('garderies.index') }}">Garderies</a>
            <a href="{{ route('depenses.index') }}">Dépenses</a>
            <a href="{{ route('commerces.index') }}">Commerces</a>
            <a href="{{ route('categories.index') }}">Catégories de dépense</a>
            <a href="{{ route('enfants.index') }}">Enfants</a>
            <a href="{{ route('educateurs.index') }}">Éducateurs</a>
            <a href="{{ route('presences.index') }}">Présences</a>
            <a href="{{ route('rapport.index') }}">Rapport</a>
        </nav>
        
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
                            <button class="btn btn-info">Vider la liste</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            
            <div class="form-section">
                <form action="{{ route('garderies.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="adresse">Adresse :</label>
                        <input type="text" id="adresse" name="adresse" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="ville">Ville :</label>
                        <input type="text" id="ville" name="ville" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="province">Province :</label>
                        <select id="province" name="province" class="form-control">
                            <option value="Alberta">Alberta</option>
                            <option value="Colombie-Britannique">Colombie-Britannique</option>
                            <option value="Manitoba">Manitoba</option>
                            <option value="Nouveau-Brunswick">Nouveau-Brunswick</option>
                            <option value="Terre-Neuve-et-Labrador">Terre-Neuve-et-Labrador</option>
                            <option value="Nouvelle-Écosse">Nouvelle-Écosse</option>
                            <option value="Ontario">Ontario</option>
                            <option value="Île-du-Prince-Édouard">Île-du-Prince-Édouard</option>
                            <option value="Québec">Québec</option>
                            <option value="Saskatchewan">Saskatchewan</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="telephone">Téléphone :</label>
                        <input type="text" id="telephone" name="telephone" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
