@extends('layout.app')
@section('content')
<h1>Formulaire Modification</h1>
<form action="{{ route('nursery.update', $nursery->id) }}" method="POST">
@csrf
    <label>Nom</label>
    <input type="text" id="name" name="name" value="{{$nursery->name  }}">
    <label>Adresse</label>
    <input type="text" id="address" name="address" value="{{$nursery->address  }}">
    <label>ville</label>
    <input type="text" id="city" name="city"value="{{$nursery->city  }}" >
    <label>Province</label>
    <select id="state_name" name="state_name">
    @foreach ($states as $state)
        <option value="{{ $state->description }}">{{$state->description}}</option>
    @endforeach
    </select>
    <label>Telephone</label>
    <input type="text" id="phone" name="phone" value="{{$nursery->phone  }}">
    <input type="submit" value="Button">
</form>
@endsection('content') 