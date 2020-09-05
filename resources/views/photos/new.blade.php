@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Photo Register') }}</div>

                    <div class="card-body">
                        <p>4MB以下の写真を添付してください</p>
                        <form method="POST" action="{{ route('photos.create') }}" enctype="multipart/form-data">
                            @csrf
                            {{--写真１--}}
                            <div class="form-group row">
                                <label for="pic1" class="col-md-4 col-form-label text-md-right">{{ __('Pic1') }}<span class="badge badge-danger">必須</span></label>
                                <div class="col-md-6">
                                    <input id="pic1" type="file" class="form-control @error('pic1') is-invalid @enderror" name="pic1" value="{{ old('pic1') }}" autocomplete="pic1" autofocus style="border:none">
                                    @error('pic1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--写真2.--}}
                            <div class="form-group row">
                                <label for="pic2" class="col-md-4 col-form-label text-md-right">{{ __('Pic2') }}</label>
                                <div class="col-md-6">
                                    <input id="pic2" type="file" class="form-control @error('pic2') is-invalid @enderror" name="pic2" value="{{ old('pic2') }}" autocomplete="pic2" autofocus style="border:none">
                                    @error('pic2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--写真3--}}
                            <div class="form-group row">
                                <label for="pic3" class="col-md-4 col-form-label text-md-right">{{ __('Pic3') }}</label>
                                <div class="col-md-6">
                                    <input id="pic3" type="file" class="form-control @error('pic3') is-invalid @enderror" name="pic3" value="{{ old('pic3') }}" autocomplete="pic3" autofocus style="border:none">
                                    @error('pic3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{--コメント--}}
                            <div class="form-group row">
                                <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Photo_Comment') }}</label>
                                <div class="col-md-6">
                                    <textarea id="comment" type="text" class="form-control @error('comment') is-invalid @enderror" name="comment" autocomplete="comment" autofocus cols="60" rows="10"></textarea>
                                    @error('comment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Photo Register') }}
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
