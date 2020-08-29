@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Event Register') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('events.create') }}">
                            @csrf
                            {{--イベントカテゴリー--}}
                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}<span class="badge badge-danger">必須</span></label>

                                <div class="col-md-6">
                                    <select id="category_id" class="form-control @error('category_id') is-invalid @enderror" name="category_id" autocomplete="category_id" autofocus>
                                        @foreach($events as $recode)
                                            <option value="{{$recode->id}}">{{$recode->type}}</option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--開始日--}}
                            <div class="form-group row">
                                <label for="from_date" class="col-md-4 col-form-label text-md-right">{{ __('From_date') }}<span class="badge badge-danger">必須</span></label>

                                <div class="col-md-6">
                                    <input id="from_date" type="date" class="form-control @error('from_date') is-invalid @enderror" name="from_date" value="{{ old('from_date') }}" autocomplete="from_date" autofocus>

                                    @error('from_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--終了日--}}
                            <div class="form-group row">
                                <label for="to_date" class="col-md-4 col-form-label text-md-right">{{ __('To_date') }}</label>

                                <div class="col-md-6">
                                    <input id="to_date" type="date" class="form-control @error('to_date') is-invalid @enderror" name="to_date" value="{{ old('to_date') }}" autocomplete="to_date" autofocus>

                                    @error('to_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--コメント--}}
                            <div class="form-group row">
                                <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('Comment') }}<span class="badge badge-danger">必須</span></label>

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
                                        {{ __('Event Register') }}
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
