@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>{{ __('My Photo List') }}</h2>
        <div class="row">
        {{--            登録しているイベントが１つもなかった場合の処理--}}
        @if($photos->isEmpty())
            <div class="col-sm-6">
                <a href="{{ route('photos.new') }}" role="button">
                    <h3>新規写真を登録してください</h3>
                </a>
            </div>
        @endif
        @foreach ($photos as $val)
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <br>登録者：{{ $val->user->name }}<br>
                            登録日付：{{ $val->created_at }}<br>
                            コメント：{{ $val->comment }}</p>
                            <div style="margin: 10px">
                            <img src="/storage/temp/{{$val->pic1}}" width="30%" height="130">
                            @if(!empty($val->pic2))
                                <img src="/storage/temp/{{$val->pic2}}" width="30%" height="130">
                            @else
                                <img src="/storage/temp/noimage.jpg" width="30%" height="130">
                            @endif
                            @if(!empty($val->pic3))
                            <img src="/storage/temp/{{$val->pic3}}" width="30%" height="130">
                            @else
                                <img src="/storage/temp/noimage.jpg" width="30%" height="130">
                            @endif
                            </div>
                            <form action="{{ route('photos.delete',$val->id ) }}" method="post" class="d-inline">
                                @csrf
                                <button class="btn btn-danger" onclick='return confirm("削除しますか？");'>{{ __('Photo Delete')  }}</button>
                                <input type="hidden" value="{{$val->pic1}}" name="pic1" >
                                <input type="hidden" value="{{$val->pic2}}" name="pic2" >
                                <input type="hidden" value="{{$val->pic3}}" name="pic3" >
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="d-flex justify-content-center" style="margin:0 auto">
                    {{$photos->links()}}
                </div>
        </div>
        <h2>{{ __('All Photo List') }}</h2>
        <div class="row">
            @foreach ($all as $val)
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
{{--                            <br>登録者：{{ $val->user->name }}<br>--}}
                            登録日付：{{ $val->created_at }}<br>
                            コメント：{{ $val->comment }}</p>
                            <div style="margin: 10px">
                                <img src="/storage/temp/{{$val->pic1}}" width="30%" height="130">
                                @if(!empty($val->pic2))
                                    <img src="/storage/temp/{{$val->pic2}}" width="30%" height="130">
                                @else
                                    <img src="/storage/temp/noimage.jpg" width="30%" height="130">
                                @endif
                                @if(!empty($val->pic3))
                                    <img src="/storage/temp/{{$val->pic3}}" width="30%" height="130">
                                @else
                                    <img src="/storage/temp/noimage.jpg" width="30%" height="130">
                                @endif
                            </div>
                            <form action="{{ route('photos.delete',$val->id) }}" method="post" class="d-inline">
                                @csrf
                                <button class="btn btn-danger" onclick='return confirm("削除しますか？");'>{{ __('Photo Delete')  }}</button>
                                <input type="hidden" value="{{$val->pic1}}" name="pic1" >
                                <input type="hidden" value="{{$val->pic2}}" name="pic2" >
                                <input type="hidden" value="{{$val->pic3}}" name="pic3" >
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="d-flex justify-content-center" style="margin:0 auto">
                    {{$all->links()}}
                </div>
        </div>
        <div class="row">
            <div class="col12">
                <ExampleComponent></ExampleComponent>
            </div>

        </div>
    </div>
@endsection
