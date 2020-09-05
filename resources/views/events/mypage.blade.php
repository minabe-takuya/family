@extends('layouts.app')
@section('content')
    {{--    検索機能の実装--}}
    <div class="container">
        <h3>開始日で検索</h3>
        <div class="row">
            <div class= "col-sm-12">
                <form action="{{ route('events.search')}}" method="GET">
                    <input type="date" name="from_date" placeholder="from_date">
                    <span class="mx-3 text-gray">~</span>
                    <input type="date" name="to_date" placeholder="to_date">
                    <button type="submit">検索</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a class="nav-link" href="{{ route('photos.index') }}" role="button">
                    <p class="text-right">>>写真一覧へ</p>
                </a>
            </div>
        </div>
    </div>

    {{--自分が登録したイベントリスト　降順--}}
    <div class="container">
        <h3>{{ __('My Event List') }}</h3>
        <div class="row">
            {{--            登録しているイベントが１つもなかった場合の処理--}}
            @if($events->isEmpty())
                <div class="col-sm-6">
                    <a href="{{ route('events.new') }}" role="button">
                        <h3>新規イベントを登録してください</h3>
                    </a>
                </div>
            @endif
            @foreach ($events as $val)
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p><b>カテゴリ:</b>{{ $val->category->type }}<br>
                                <b>開始日付</b>:{{ $val->from_date }}<br>
                                <b>終了日付:</b>{{ $val->to_date }}<br>
                                <b>コメント:</b>{{ $val->comment }}</p>
                            <a href="{{ route('events.edit',$val->id ) }}" class="btn btn-primary">{{ __('Event edit')  }}</a>
                            <form action="{{ route('events.delete',$val->id ) }}" method="post" class="d-inline">
                                @csrf
                                <button class="btn btn-danger" onclick='return confirm("削除しますか？");'>{{ __('Event Delete')  }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
            {{--            ページネーションの実装--}}
            <div class="d-flex justify-content-center" style="margin:0 auto">
                {{$events->links()}}
            </div>
        </div>
        <h3>{{ __('All Event List') }}</h3>
        <div class="row">
            @foreach ($all as $val)
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <p><b>カテゴリ:</b>
                                @switch( $val->category_id )
                                    @case(1)
                                    フリー
                                    @break
                                    @case(2)
                                    歯医者
                                    @break
                                    @case(3)
                                    内科
                                    @break
                                    @case(4)
                                    美容室
                                    @break
                                    @case(5)
                                    支払い
                                    @break
                                    @case(6)
                                    購入
                                    @break
                                    @case(7)
                                    申請
                                    @break
                                    @default
                                    フリー
                                    @break
                                @endswitch
                                <br>
                                <b>開始日付:</b>{{ $val->from_date }}<br>
                                <b>終了日付:</b>{{ $val->to_date }}<br>
                                <b>コメント:</b>{{ $val->comment }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center" style="margin:0 auto">
                {{$all->links()}}
            </div>
        </div>
    </div>
@endsection
