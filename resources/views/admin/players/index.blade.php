@extends('layouts.front-layout')
@section('title', 'Players')
@section('content')

    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Players</h2>
                <a class="float-right btn btn-success" href="{{ route('players.create', $team->id) }}">Create</a>

            </div>
        </div>
    </div>

    <section id="ajax-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Players Table</h4>
                    </div>
                    <div class="card-datatable">
                        <table id="PlayersTable" class="datatables-ajax table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Birth Date</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                    <th>Show</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($team->players as $player)
                                    <tr>
                                        <td>{{ $player->id }}</td>
                                        <td>{{ $player->username }}</td>

                                        <td>{{ $player->birth_date }}</td>
                                        <td>{{ $player->role }}</td>

                                        <td>{{ $player->created_at }} UTC</td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{ route('players.show', $player->id) }}">Show</a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('players.delete', $player->id) }}">
                                                @csrf
                                                @method('delete')
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-danger delete-Player"
                                                        value="Delete">
                                                </div>
                                            </form>

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@section('js')
    @parent
    <script>
        $('.delete-Player').click(function(e) {
            e.preventDefault()
            if (confirm('Are you sure?')) {
                $(e.target).closest('form').submit() // Post the surrounding form
            }
        });
    </script>
    <script>
        $("#PlayersTable").DataTable();
    </script>
@endsection

@endsection
