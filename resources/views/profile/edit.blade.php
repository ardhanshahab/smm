@extends('layouts.app', ['activePage' => 'user', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'User Profile', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="row">

                    <div class="card col-md-8">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3 class="mb-0">{{ __('Edit Profile') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>

                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

                                <div class="pl-lg-4">
                                    <!-- Existing form inputs for name and email -->
                                    <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input type="text" name="nama" id="input-name"
                                            class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Name') }}"
                                            value="{{ old('nama', auth()->user()->nama) }}" required autofocus>
                                        @include('alerts.feedback', ['field' => 'nama'])
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="input-email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Email') }}"
                                            value="{{ old('email', auth()->user()->email) }}" required>
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>

                                    <!-- New form inputs -->
                                    <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-role">{{ __('Role') }}</label>
                                        <input type="text" name="role" id="input-role"
                                            class="form-control{{ $errors->has('role') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Role') }}"
                                            value="{{ old('role', auth()->user()->role) }}" required>
                                        @include('alerts.feedback', ['field' => 'role'])
                                    </div>
                                    <div class="form-group{{ $errors->has('nohp') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-no-hp">{{ __('Nomor HP') }}</label>
                                        <input type="text" name="nohp" id="input-no-hp"
                                            class="form-control{{ $errors->has('nohp') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Nomor HP') }}"
                                            value="{{ old('nohp', auth()->user()->nohp) }}" required>
                                        @include('alerts.feedback', ['field' => 'nohp'])
                                    </div>
                                    <div class="form-group{{ $errors->has('jenis_kelamin') ? ' has-danger' : '' }}">
                                        <label class="form-control-label"
                                            for="input-jenis-kelamin">{{ __('Jenis Kelamin') }}</label>
                                        <input type="text" name="jenis_kelamin" id="input-jenis-kelamin"
                                            class="form-control{{ $errors->has('jenis_kelamin') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Jenis Kelamin') }}"
                                            value="{{ old('jenis_kelamin', auth()->user()->jenis_kelamin) }}" required>
                                        @include('alerts.feedback', ['field' => 'jenis_kelamin'])
                                    </div>
                                    <div class="form-group{{ $errors->has('tanggal_lahir') ? ' has-danger' : '' }}">
                                        <label class="form-control-label"
                                            for="input-tanggal-lahir">{{ __('Tanggal Lahir') }}</label>
                                        <input type="date" name="tanggal_lahir" id="input-tanggal-lahir"
                                            class="form-control{{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Tanggal Lahir') }}"
                                            value="{{ old('tanggal_lahir', auth()->user()->tanggal_lahir) }}" required>
                                        @include('alerts.feedback', ['field' => 'tanggal_lahir'])
                                    </div>
                                    <div class="form-group{{ $errors->has('alamat') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-alamat">{{ __('Alamat') }}</label>
                                        <textarea name="alamat" id="input-alamat" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Alamat') }}" required>{{ old('alamat', auth()->user()->alamat) }}</textarea>
                                        @include('alerts.feedback', ['field' => 'alamat'])
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('Save') }}</button>
                                    </div>
                                </div>

                            </form>
                            <hr class="my-4" />
                            <form method="post" action="{{ route('profile.password') }}">
                                @csrf
                                @method('patch')

                                <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                                @include('alerts.success', ['key' => 'password_status'])
                                @include('alerts.error_self_update', ['key' => 'not_allow_password'])

                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-current-password">
                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Current Password') }}
                                        </label>
                                        <input type="password" name="old_password" id="input-current-password"
                                            class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('Current Password') }}" value="" required>

                                        @include('alerts.feedback', ['field' => 'old_password'])
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-password">
                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('New Password') }}
                                        </label>
                                        <input type="password" name="password" id="input-password"
                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            placeholder="{{ __('New Password') }}" value="" required>

                                        @include('alerts.feedback', ['field' => 'password'])
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-password-confirmation">
                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Confirm New Password') }}
                                        </label>
                                        <input type="password" name="password_confirmation"
                                            id="input-password-confirmation" class="form-control"
                                            placeholder="{{ __('Confirm New Password') }}" value="" required>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit"
                                            class="btn btn-default mt-4">{{ __('Change password') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400"
                                    alt="...">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray"
                                            src="{{ asset('light-bootstrap/img/faces/face-3.jpg') }}" alt="...">
                                        <h5 class="title">{{ auth()->user()->nama }}</h5>
                                    </a>
                                    <p class="description">
                                        {{ auth()->user()->role }}
                                    </p>
                                </div>
                                <p class="description text-center">
                                    {{ auth()->user()->nik }}
                                    <br> {{ auth()->user()->nohp }}
                                    <br> {{ auth()->user()->email }}
                                </p>
                            </div>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
