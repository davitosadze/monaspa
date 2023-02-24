@extends('layouts.front-layout')
@section('title', 'Update Team')
@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Update Team</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('teams.update', $team->id) }}" class="needs-validation"
                    enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Name</label>
                        <input type="text" value="{{ $team->team_name }}" name="team_name" id="basic-addon-name"
                            class="form-control" placeholder="Name" aria-label="Name" aria-describedby="basic-addon-name"
                            required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Slug</label>
                        <input type="text" value={{ $team->slug }} name="slug" id="basic-addon-name"
                            class="form-control" placeholder="Slug" aria-label="Name" aria-describedby="basic-addon-name"
                            required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>


                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Team Logo</label>
                        <input type="file" name="image" id="basic-addon-name" class="form-control" aria-label="Image"
                            aria-describedby="basic-addon-name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter company code</div>
                    </div>

                    <center>
                        <img width="250px" src={{ $team->getFirstMediaUrl('teams') }}>
                    </center>

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
