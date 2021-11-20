{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.admin')


{{-- admin.blade.phpの@yield('title')に'スターバックス'を埋め込む --}}
@section('title', 'スターバックスのレビュー')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>starbucks</h2>
                <ul>
                    <li><a herf="https://bed9a5c44fc44d45bdb65db94b618847.vfs.cloud9.us-east-2.amazonaws.com/admin/starbucks/home">ホーム</a></li>
                </ul>
                
                
            </div>
        </div>
    </div>
@endsection