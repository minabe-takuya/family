<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FamilyEvent</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <header class="header js-float-menu">
                <h1 class="title">Famly Event</h1>

                <div class="menu-trigger js-toggle-sp-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <nav class="nav-menu js-toggle-sp-menu-target">
                    <ul class="menu">
                        <li class="menu-item"><a class="menu-link" href="">TOP</a></li>
                        <li class="menu-item"><a class="menu-link" href="{{ route('register') }}">REGISTER</a></li>
                        <li class="menu-item"><a class="menu-link" href="{{ route('login') }}">LOGIN</a></li>
                    </ul>
                </nav>
            </header>
        </div>
    </div>
</div>
<main>
    <section class="hero container-fluid js-float-menu-target">
        <h3 class="hero-title">家族のイベントを<br> 共有しよう</h3>
    </section>

    <section class="bgColor-lightGray" id="about">
        <div class="container section-top">
            <div class="row">
                <div class="col">
                    <h2 class="section-top-title"><span>お父さんお母さんこんな悩みはありませんか？</span></h2>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <ul>
                        <li>・つい子供の行事を忘れてしまう。</li>
                        <li>・子供のイベントがあるのは知っているが何日にあるか思い出せない。</li>
                        <li>・LINEを使って家族間で写真を送り合うけど管理が大変</li>
                        <li>・ケータイで撮影した写真を見てもどこで撮影した写真か思い出せない。</li>
                        <li>・家族とのコミュニケーションが少なくなっていると感じる。</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="container section-top section-top-ornament" id="staff">
        <div class="row">
            <div class="col">
                <h2 class="section-top-title"><span>上記に一つでも当てはまった<b>あなた！！</b></span></h2>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p>私が作った<span class="badge badge-danger">無料</span>のシステムを使うと家庭内の課題を解決できるかもしれません。<br>
                    一度使って見てください。</p>
            </div>
        </div>
        <h2>使い方</h2>
        <div class="row">
            <div class="col-sm-10 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <p>ユーザー登録</p>
                    </div>
                    <div class="card-body">
                        <video width="100%" height="130" controls>
                            <source src="{{asset('img/登録.mov')}}">
                        </video>
                    </div>
                </div>
            </div>
            <div class="col-2" style="text-align:center;line-height:200px;">
                <i class="fas fa-arrow-alt-circle-right fa-2x"></i>
            </div>
            <div class="col-sm-10 col-lg-5">
                <div class="card">
                    <div class="card-header">
                        <p>イベント/写真投稿</p>
                    </div>
                    <div class="card-body">
                        <video width="100%" height="130" controls>
                            <source src="{{asset('img/マイページ.mov')}}">
                        </video>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('register') }}" target=”_blank” class="btn btn-primary">ユーザー登録へ進む</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('login') }}" target=”_blank” class="btn btn-secondary">既に登録済の方はこちら(ログイン)</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>他のサービスとの違い</h3>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>・<b>Googleカレンダー</b></li>
                            <p>→ログインにメールアドレスを必要としないため子供でもできる</p>
                            <p>→Googleカレンダーは仕事の予定など知られたくない情報まで共有されてしまうがこのサービスはその心配が不要</p>
                            <li>・<b>Appleのファミリー写真共有サービス</b></li>
                            <p>→写真共有サービスはコメントが入れられないがこのサービスだと可能</p>
                            <p>→写真共有サービスは１枚１枚写真を共有しないといけないがこのサービスだと１回に最大３枚まで共有可能</p>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>使用している技術</h3>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>・<b>Laravel（バックエンド）</b></li>
                            <p>　MVC使ってのクラッド処理</p>
                            <p>　bladeを使った条件分岐</p>
                            <p>　マイグレーションでテーブル作成</p>
                            <p>　Mysqlを使ってのテーブル操作</p>
                            <p>　phpStormを使ってのnpm操作及びgit管理</p>
                            <li>・<b>HTML＋CSS（フロントエンド）</b></li>
                            <p>　Bootstrapの活用</p>
                            <p>　laravel mixを使ってのビルド</p>
                            <p>　Scssの活用</p>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>ログイン済ダミー情報</h3>
                    </div>
                    <div class="card-body">
                        <p>（父親役）名前:ファザー</p>
                        <p>　　パスワード:1234</p>
                        <p>　　イベント:10個投稿、写真３回投稿</p><br>
                        <p>（母親役）名前:マザー</p>
                        <p>　　パスワード:1234</p>
                        <p>　　イベント:0個投稿、写真15回投稿</p><br>
                        <p>（子供役）名前:チャイルド</p>
                        <p>　　パスワード:1234</p>
                        <p>　　イベント:0個投稿、写真0回投稿</p><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('register') }}" target=”_blank” class="btn btn-primary">ユーザー登録へ進む</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('login') }}" target=”_blank” class="btn btn-secondary">既に登録済の方はこちら(ログイン)</a>
            </div>
        </div>

    </section>

</main>
</body>
</html>
