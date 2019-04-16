@extends('welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a User</div>
                <div class="card-body">
                    <form method="POST" action="{{ action('AdminController@addUser') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name-input">Name</label>
                            <input id="name-input" name="name" type="text" class="form-control"
                                placeholder="Enter Name" />
                        </div>

                        <div class="form-group">
                            <label for="email-input">E-mail</label>
                            <input id="email-input" name="email" type="email" class="form-control"
                                placeholder="Enter E-mail Address" />
                        </div>

                        <div class="form-group">
                            <label for="password-input">Password</label>
                            <input id="password-input" name="password" type="password" class="form-control"
                                placeholder="Enter Password" />
                        </div>

                        <div class="form-group">
                            <label for="confirm-password-input">Confirm Password</label>
                            <input id="confirm-password-input" name="password_confirmation" type="password" class="form-control"
                                placeholder="Confirm Password" />
                        </div>

                        <div class="form-group">
                            <label for="is-admin-input">Admin</label>
                            <input id="is-admin-input" name="is_admin" type="checkbox"
                                class="form-control" />
                        </div>

                        <button type="submit" class="btn btn-success">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
