@extends('layouts.front-layout')
@section('title', 'Create Team')
@section('content')

    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Team</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('teams.store') }}" class="needs-validation" enctype="multipart/form-data"
                    novalidate>
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Name</label>
                        <input type="text" name="name" id="basic-addon-name" class="form-control" placeholder="Name"
                            aria-label="Name" aria-describedby="basic-addon-name" required />
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please enter name.</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="basic-addon-name">Slug</label>
                        <input type="text" name="slug" id="basic-addon-name" class="form-control" placeholder="Slug"
                            aria-label="Name" aria-describedby="basic-addon-name" required />
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
    <script>
        CKEDITOR.replace('Team_description');
    </script>
@endsection

@endsection
