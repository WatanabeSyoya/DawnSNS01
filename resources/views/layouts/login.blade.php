<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title>DAWN SNS</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/logout.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/script.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
</head>
<?php
$user = Auth::user();
$id = Auth::user()->id;
$follow_list = \DB::table('users')
    ->where('follows.follower', $id)
    ->leftjoin('follows', 'follows.follow', 'users.id')
    ->get();
$follower_list = \DB::table('users')
    ->where('follows.follow', $id)
    ->leftjoin('follows', 'follows.follow', 'users.id')
    ->get();
?>

<body>
    <header>
        <div class="head">
            <h1 class="head-left"><a href="/"><img class="logo" src="images/main_logo.png"></a></h1>
            <div class="head-right">
                <dl class="ac">
                    <dt class="ac-parent">{{$user->username }}<span>さん</span>

                    </dt>

                    <dd class="ac-child">
                        <ul>
                            <li class="nav-item"><a href="/">ホーム</a></li>
                            <li class="nav-item"><a href="/profile">プロフィール</a></li>
                            <li class="nav-item"><a href="{{ route('logout') }}">ログアウト</a></li>
                        </ul>
                    </dd>
                </dl>
            </div>
            @if($user->images == "dawn.png")
            <img class="image" src="{{ asset('images/'.$user->images) }}">
            @else
            <img class="image" src="{{ asset('storage/image/'.$user->images) }}">
            @endif
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div>
        <div id="side-bar">
            <div id="confirm">
                <p>{{$user->username }}さんの</p>
                <div>
                    <p>フォロー数</p>
                    <p>{{count($follow_list)}}名</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div>
                    <p>フォロワー数</p>
                    <p>{{count($follower_list)}}名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>

</html>
