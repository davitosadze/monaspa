@extends('layouts.front-layout')
@section('title', 'Create Player')
@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Player</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('games.store') }}"
                    class="needs-validation repeater-default needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Game Date</label>
                        <input type="datetime-local" name="game_date" id="basic-addon-name" class="form-control"
                            placeholder="Game Date" aria-label="Game Date" aria-describedby="basic-addon-name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Opponent Name</label>
                        <input type="text" name="opponent_name" id="basic-addon-name" class="form-control"
                            placeholder="Opponent Name" aria-label="Opponent Name" aria-describedby="basic-addon-name"
                            required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Opponent Link</label>
                        <input type="text" name="opponent_link" id="basic-addon-name" class="form-control"
                            placeholder="Opponent Link" aria-label="Last Name" aria-describedby="basic-addon-name"
                            required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>


                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Opponent Point</label>
                        <input type="number" name="opponent_point" id="basic-addon-name" class="form-control"
                            placeholder="Opponent Point" aria-label="Opponent Point" aria-describedby="basic-addon-name"
                            required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Opponent Logo</label>
                        <input type="file" name="opponent_logo" id="basic-addon-name" class="form-control"
                            aria-label="Image" aria-describedby="basic-addon-name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter company code</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Our Point</label>
                        <input type="number" name="our_point" id="basic-addon-name" class="form-control"
                            placeholder="Our Point" aria-label="Our Point" aria-describedby="basic-addon-name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Team</label>
                        <select name="team_id" class="form-control" id="">
                            <option selected disabled value="">Select Team</option>
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                            @endforeach

                        </select>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>




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
