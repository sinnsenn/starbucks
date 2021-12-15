{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'スターバックス'を埋め込む --}}
@section('title', 'starbucks')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container home">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>starbucks</h1>
                <h2>新作のフラペチーノ</h2>
                <img src={{ secure_asset('images/sinnsaku.jpg') }}>
                <ul>
                    <div class="itirann">
                        <li><a href={{ action('General\StarbucksController@index') }}>店舗のレビュー一覧</a></li>
                        <li><a href={{ action('General\StarbucksController@indexdrink') }}>ドリンクのレビュー一覧</li>
                    </div>
                    <div class="sinnki">
                        <li><a href={{ action('Admin\StarbucksController@review') }}>店舗のレビュー新規作成</li>
                        <li><a href={{ action('Admin\StarbucksController@reviewdrink') }}>ドリンクのレビュー新規作成</li>
                    </div>
                    <div class="hennsyuu">
                        <li><a href={{ action('Admin\StarbucksController@index') }}>店舗のレビュー編集画面</li>
                        <li><a href={{ action('Admin\StarbucksController@indexdrink') }}>ドリンクのレビュー編集画面</li>
                    </div>
                </ul>
            </div>
        </div>
    </div>
@endsection