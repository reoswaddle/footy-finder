@extends('layouts.app')
@section('content')
    <h2 class="mb-4">Players</h2>
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
    {{ $players->links() }}
    </div>
@endsection

