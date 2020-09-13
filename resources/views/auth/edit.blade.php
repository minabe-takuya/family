@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User_Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('auth.edit',$user->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}<span class="badge badge-danger">必須</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}<span class="badge badge-danger">必須</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{$user->password}}" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}<span class="badge badge-danger">必須</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{$user->password}}" required autocomplete="new-password">
                            </div>
                        </div>

                        <!--アレルギー-->
                        <div class="form-group row">
                            <label for="allergies" class="col-md-4 col-form-label text-md-right">{{ __('allergies') }}</label>

                            <div class="col-md-6">
                                <input id="allergies" type="text" class="form-control @error('allergies') is-invalid @enderror" name="allergies" value="{{$user->allergies}}" autocomplete="allergies" autofocus>

                                @error('allergies')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--花粉-->
                        <div class="form-group row">
                            <label for="pollen" class="col-md-4 col-form-label text-md-right">{{ __('pollen') }}</label>

                            <div class="col-md-6">
                                <input id="pollen" type="text" class="form-control @error('pollen') is-invalid @enderror" name="pollen" value="{{$user->pollen}}" autocomplete="pollen" autofocus>

                                @error('pollen')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--趣味-->
                        <div class="form-group row">
                            <label for="hobby" class="col-md-4 col-form-label text-md-right">{{ __('hobby') }}</label>

                            <div class="col-md-6">
                                <input id="hobby" type="text" class="form-control @error('hobby') is-invalid @enderror" name="hobby" value="{{$user->hobby}}" autocomplete="hobby" autofocus>

                                @error('hobby')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--緯度-->
                        <div class="form-group row">
                            <label for="latitude" class="col-md-4 col-form-label text-md-right">{{ __('latitude') }}</label>

                            <div class="col-md-6">
                                <input id="latitude" type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" value="{{$user->latitude}}" autocomplete="latitude" autofocus>

                                @error('latitude')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!--経緯-->
                        <div class="form-group row">
                            <label for="longitude" class="col-md-4 col-form-label text-md-right">{{ __('longitude') }}</label>

                            <div class="col-md-6">
                                <input id="longitude" type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" value="{{$user->longitude}}" autocomplete="longitude" autofocus>

                                @error('longitude')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('User_Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
