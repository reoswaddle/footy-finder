@extends('layouts.app')
@section('content')
    <h2 class="mb-4">Players</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Display Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Age</th>
            <th scope="col">Position</th>
            <th scope="col">Country</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($players as $player)
            <tr>
                <td>{{ $player->display_name }}</td>
                <td>{{ $player->gender}}</td>
                <td>{{ $player->date_of_birth }}</td>
                <td>{{ $player->position }}</td>
                <td>{{ $player->country->name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
    {{ $players->links() }}
    </div>
@endsection

