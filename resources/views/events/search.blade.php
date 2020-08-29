@extends('layouts.app')
@section('content')
{{--    検索機能の実装--}}
    <div class="container">
        <h3>検索</h3>
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
{{--検索結果表示--}}
        @if(!empty($date))
        <h3>検索結果</h3>
        <div class="row">
        @foreach ($date as $val)
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
        @endif
    </div>
</div>
@endsection
