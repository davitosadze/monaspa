@extends('layouts.front-layout')
@section('title', 'Games')
@section('content')

    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Games</h2>
                <a class="float-right btn btn-success" href="{{ route('games.create') }}">Create</a>

            </div>
        </div>
    </div>

    <section id="ajax-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Games Table</h4>
                    </div>
                    <div class="card-datatable">
                        <table id="PlayersTable" class="datatables-ajax table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Game Date</th>
                                    <th>Team</th>
                                    <th>Created At</th>
                                    <th>Show</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($games as $game)
                                    <tr>
                                        <td>{{ $game->id }}</td>
                                        <td>{{ $game->game_date }}</td>
                                        <td>Teamm</td>
                                        <td>{{ $game->created_at }} UTC</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('games.show', $game->id) }}">Show</a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('games.destroy', $game->id) }}">
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
