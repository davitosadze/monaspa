@extends('layouts.admin-layout')
@section('title', 'Users')
@section('content')

    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">Users</h2>
            </div>
        </div>
    </div>

    <section id="ajax-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h4 class="card-title">Users Table</h4>
                    </div>
                    <div class="card-datatable">
                        <table id="usersTable" class="datatables-ajax table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Coins</th>
                                    <th>Joined At</th>
                                    <th>Show</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->coin_amount }}</td>
                                        <td>{{ $user->created_at }} UTC</td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.users.show', $user->id) }}">Show</a>
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
        $("#usersTable").DataTable();
    </script>
@endsection

@endsection
