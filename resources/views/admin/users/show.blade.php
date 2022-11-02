@extends('layouts.admin-layout')
@section('title', 'User')
@section('content')

    <div class="content-header-left col-md-12 col-12 mb-2">
        <div class="row breadcrumbs-top">
            <div class="col-12">
                <h2 class="content-header-title float-left mb-0">User</h2>

            </div>
        </div>
    </div>

    <section class="app-user-edit">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab"
                            href="#account" aria-controls="account" role="tab" aria-selected="true">
                            <i data-feather="user"></i><span class="d-none d-sm-block">Account</span>
                        </a>
                    </li>

                </ul>
                <div class="tab-content">
                    <!-- Account Tab starts -->
                    <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                        <!-- users edit media object start -->
                        <div class="media mb-2">

                            <div class="media-body mt-50">
                                <h4>{{ $user->name }}</h4>


                            </div>
                        </div>
                        <!-- users edit media object ends -->
                        <!-- users edit account form start -->
                        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="form-validate">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">First Name</label>
                                        <input type="text" class="form-control" placeholder="First Name"
                                            value="{{ $user->name }}" name="name" id="name" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Coins</label>
                                        <input type="text" class="form-control" placeholder="Coins"
                                            value="{{ $user->coin_amount }}" name="coin_amount" id="coin_amount" />
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">E-mail

                                        </label>
                                        <input disabled type="email" class="form-control" placeholder="No Email"
                                            value="{{ $user->email }}" name="email" id="email" />
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="email">Joined At
                                        </label>
                                        <input disabled type="email" class="form-control" placeholder="No Email"
                                            value="{{ $user->created_at }}" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <input type="submit" name="submit" value="Update" class="btn btn-primary"
                                        id="">
                                </div>
                        </form>

                    </div>

                </div>

                <div class="col-md-4">
                    <form action="{{ route('admin.users.delete', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" name="submit" value="Delete" id="">
                    </form>
                </div>
                <!-- users edit account form ends -->
            </div>
            <!-- Account Tab ends -->


            <!-- Social Tab ends -->
        </div>
        </div>
        </div>
    </section>

@endsection
