@extends('layouts.front-layout')
@section('title', 'Teams')
@section('content')

    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Teams</h2>
                <a class="float-right btn btn-success" href="{{ route('teams.create') }}">Create</a>

            </div>
        </div>
    </div>

    <section id="ajax-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Teams Table</h4>
                    </div>
                    <div class="card-datatable">
                        <table id="teamsTable" class="datatables-ajax table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Team Name</th>
                                    <th>Logo</th>
                                    <th>Players</th>
                                    <th>Created At</th>
                                    <th>Show</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    <tr>
                                        <td>{{ $team->id }}</td>
                                        <td>{{ $team->team_name }}</td>
                                        <td><img width="80px" src={{ $team->getFirstMediaUrl('teams') }}></td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{ route('team.players', $team->id) }}">Players</a>
                                        </td>
                                        <td>{{ $team->created_at }} UTC</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('teams.show', $team->id) }}">Show</a>
                                        </td>
                                        <td>
                                            <form method="POST" action="/teams/{{ $team->id }}">
                                                @csrf
                                                @method('delete')
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-danger delete-team" value="Delete">
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
        $('.delete-team').click(function(e) {
            e.preventDefault()
            if (confirm('Are you sure?')) {
                $(e.target).closest('form').submit() // Post the surrounding form
            }
        });
    </script>
    <script>
        $("#teamsTable").DataTable();
    </script>
@endsection

@endsection
