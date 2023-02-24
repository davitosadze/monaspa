@extends('layouts.front-layout')
@section('title', 'Update Player')
@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Player</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('players.update', $player->id) }}"
                    class="repeater-default needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Username</label>
                        <input type="text" value="{{ $player->username }}" name="username" id="basic-addon-name"
                            class="form-control" placeholder="Username" aria-label="Username"
                            aria-describedby="basic-addon-name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Country</label>
                        <input type="text" value={{ $player->country }} name="country" id="basic-addon-name"
                            class="form-control" placeholder="Country" aria-label="Name" aria-describedby="basic-addon-name"
                            required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>


                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Role</label>
                        <input type="text" value={{ $player->role }} name="role" id="basic-addon-name"
                            class="form-control" placeholder="Role" aria-label="Role" aria-describedby="basic-addon-name"
                            required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>


                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Birth Date</label>
                        <input type="date" value={{ $player->birth_date }} name="birth_date" id="basic-addon-name"
                            class="form-control" placeholder="Birth Date" aria-label="Birth Date"
                            aria-describedby="basic-addon-name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Biography</label>
                        <textarea name="biography" class="form-control" id="" cols="30" rows="3">{{ $player->biography }}</textarea>
                    </div>


                    <section class="form-control-repeater">
                        <div class="row">

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Top Heroes</h4>
                                    </div>

                                    <div data-repeater-list="heroes">
                                        @if (!count($player->heroes))
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
                                        @endif

                                        @foreach ($player->heroes as $hero)
                                            <div data-repeater-item>
                                                <div class="row d-flex align-items-end">
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="itemname">Hero Name</label>
                                                            <input value="{{ $hero->hero_name }}" name="hero_name"
                                                                type="text" class="form-control" id="itemname"
                                                                aria-describedby="itemname" placeholder="Enter Name" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <label for="itemname">Percentage</label>
                                                            <input value="{{ $hero->percentage }}" name="percentage"
                                                                type="text" class="form-control" id="itemname"
                                                                aria-describedby="itemname"
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
                                        @endforeach

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
                            <input
                                @if ($player->hasSocial($network->id)) value="{{ $player->getSocialLink($network->id) }}" @endif
                                name="social_networks[{{ $network->id }}]" id="basic-addon-name" class="form-control"
                                placeholder="{{ $network->network_name }}" aria-label="{{ $network->network_name }}"
                                aria-describedby="basic-addon-name" required />
                            <div class="valid-feedback">Looks good!</div>
                            <div class="invalid-feedback">Please enter name.</div>
                        </div>
                    @endforeach


                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@section('js')
    @parent
    <script>
        CKEDITOR.replace('Team_description');
    </script>
@endsection

@endsection
