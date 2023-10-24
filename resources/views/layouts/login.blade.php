<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <!-- 適用されるCSSの優先順位は下>上 -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
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
</head>
<body>
    <header>
        <h1><a href="/top"><img class="atlas_img" src="images/atlas.png" alt="Atlas"></a></h1>
        <div class="login_user">
            <p class="username">{{ Auth::user()->username }} さん</p>
            <!-- アコーディオンメニュー -->
            <nav class="menu_outer">
                <!-- クリック部分 -->
                <div class="toggle_btn"></div>
                <!-- 中身 -->
                <ul class="menu_container">
                    <li><a href="/top">ホーム</a></li>
                    <li><a href="/profile">プロフィール編集</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
            </nav>
            <img class="image" src="{{ asset('storage/'.Auth::user()->images) }}" alt="image">
        <div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="count_confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div class="follow_count">
                    <p class="follow_count_title">フォロー数</p>
                    <p class="follow_count_result">{{ Auth::user()->follows()->count() }}名</p>
                    <button type="submit" class="btn btn-primary btn_follow_list"><a href="/follow-list">フォローリスト</a></button>
                </div>
                <div class="follower_count">
                    <p class="follow_count_title">フォロワー数</p>
                    <p class="follow_count_result">{{ Auth::user()->followers()->count() }}名</p>
                    <button type="submit" class="btn btn-primary btn_follow_list"><a href="/follower-list">フォロワーリスト</a></button>
                </div>
            </div>
            <div id="search_confirm">
                <button type="submit" class="btn btn-primary search_btn"><a href="/search">ユーザー検索</a></button>
            </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
