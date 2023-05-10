@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{$player->imagePath}}" class="card-img-top" alt="{{$player->displayName}}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"> <img width="25" class="me-1" src="{{ $player->country->imagePath }}"  alt="{{ $player->country->name }} Flag"/> {{$player->displayName}}</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> Name: {{ "$player->firstName $player->lastName" }}</li>
                        <li class="list-group-item"> Country: {{ $player->country->name }} </li>
                        <li class="list-group-item"> Position: {{ $player->position }} </li>
                        <li class="list-group-item"> Age: {{ $player->age }} </li>
                        <li class="list-group-item"> Birthday: {{ $player->birthday }} </li>
                        <li class="list-group-item"> <a href="{{ url()->previous() }}" class="btn btn-secondary"> Back </a></li>
                    </ul>
                </div>
            </div>
        </div>
@endsection

