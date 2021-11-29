{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'スターバックス'を埋め込む --}}
@section('title', 'スターバックス')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h1>starbucks</h1>
                <h2>新作のフラペチーノ</h2>
                <img src={{ secure_asset('images/sinnsaku.jpg') }}>
            </div>
        </div>
    </div>
@endsection