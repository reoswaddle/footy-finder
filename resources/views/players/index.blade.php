@extends('layouts.app')
@section('content')
    <h2 class="mb-4">Players</h2>

    <form class="row g-3" method="get" action="/players" enctype="multipart/form-data">
        <div class="col-sm-4">
            <select class="form-select" aria-label="Default select example" name="country">
                <option value="">Country</option>
                @foreach($countries as $country)
                    <option value="{{$country->id}}" @if($country->id == request('country')) selected @endif> {{ $country->name }} </option>
                @endforeach

            </select>
        </div>
        <div class="col-sm-4">
            <input type="text" class="form-control" name="last_name" placeholder="Player Last Name" aria-label="Play Name" value="{{ request('last_name') }}">
        </div>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="first_name" placeholder="Player First Name" aria-label="Play Name" value="{{ request('first_name') }}">
        </div>

        <div class="col-sm">
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </div>
    </form>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Age</th>
            <th scope="col">Position</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($players as $player)
            <tr>
                <td class="text-center"> <img width="25" src="{{ $player->country->imagePath }}"  alt="{{ $player->country->name }} Flag"/></td>
                <td> <a href="/players/{{$player->id}}" > {{ $player->displayName }} </a> </td>
                <td>{{ $player->gender}}</td>
                <td>{{ $player->age }}</td>
                <td>{{ $player->position }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $players->appends($_GET)->links() }}
    </div>
@endsection

