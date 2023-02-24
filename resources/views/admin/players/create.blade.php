@extends('layouts.front-layout')
@section('title', 'Create Player')
@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Player</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('players.store') }}"
                    class="needs-validation repeater-default needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="form-group">
                        <input type="text" name="team_id" hidden value="{{ $team->id }}" id="basic-addon-name"
                            class="form-control" placeholder="First Name" aria-label="First Name"
                            aria-describedby="basic-addon-name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>


                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">First Name</label>
                        <input type="text" name="first_name" id="basic-addon-name" class="form-control"
                            placeholder="First Name" aria-label="First Name" aria-describedby="basic-addon-name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Last Name</label>
                        <input type="text" name="last_name" id="basic-addon-name" class="form-control"
                            placeholder="Last Name" aria-label="Last Name" aria-describedby="basic-addon-name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Username</label>
                        <input type="text" name="username" id="basic-addon-name" class="form-control"
                            placeholder="Username" aria-label="Username" aria-describedby="basic-addon-name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Country</label>
                        <input type="text" name="country" id="basic-addon-name" class="form-control"
                            placeholder="Country" aria-label="Name" aria-describedby="basic-addon-name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>


                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Role</label>
                        <input type="text" name="role" id="basic-addon-name" class="form-control" placeholder="Role"
                            aria-label="Role" aria-describedby="basic-addon-name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Birth Date</label>
                        <input type="date" name="birth_date" id="basic-addon-name" class="form-control"
                            placeholder="Birth Date" aria-label="Birth Date" aria-describedby="basic-addon-name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Biography</label>
                        <textarea name="biography" class="form-control" id="" cols="30" rows="3"></textarea>
                    </div>


                    <hr>
                    <section class="form-control-repeater">
                        <div class="row">

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Top Heroes</h4>
                                    </div>

                                    <div data-repeater-list="heroes">
                                        <div data-repeater-item>
                                            <div class="row d-flex align-items-end">
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="itemname">Hero Name</label>
                                                        <input name="hero_name" type="text" class="form-control"
                                                            id="itemname" aria-describedby="itemname"
                                                            placeholder="Enter Name" />
                                                    </div>
                                                </div>

                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <label for="itemname">Percentage</label>
                                                        <input name="percentage" type="text" class="form-control"
                                                            id="itemname" aria-describedby="itemname"
                                                            placeholder="Enter Percentage" />
                                                    </div>
                                                </div>

                                                <div class="col-md-2 col-12">
                                                    <div class="form-group">
                                                        <button class="btn btn-outline-danger text-nowrap px-1"
                                                            data-repeater-delete type="button">
                                                            <i data-feather="x" class="mr-25"></i>
                                                            <span>Delete</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-icon btn-primary" type="button" data-repeater-create>
                                                <i data-feather="plus" class="mr-25"></i>
                                                <span>Add Hero</span>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </section>


                    <hr>
                    <br>
                    <h3>Social Networks:</h3>
                    <br>
                    @foreach ($social_networks as $network)
                        <div class="form-group">
                            <label class="form-label" for="basic-addon-name">{{ $network->network_name }}</label>
                            <input type="text" name="social_networks[{{ $network->id }}]" id="basic-addon-name"
                                class="form-control" placeholder="{{ $network->network_name }}"
                                aria-label="{{ $network->network_name }}" aria-describedby="basic-addon-name" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter name.</div>
                        </div>
                    @endforeach



                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@section('js')
    @parent

@endsection

@endsection
