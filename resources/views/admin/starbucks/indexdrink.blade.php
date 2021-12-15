@extends('layouts.admin')
@section('title', '登録済みドリンクの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>ドリンク一覧</h2>
        </div>
        <div class="row">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th width="10%">ID</th>
                        <th width="20%">ドリンク名</th>
                        <th width="50%">感想</th>
                        <th width="10%">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $starbucksdrink)
                        <tr>
                            <th>{{ $starbucksdrink->id }}</th>
                            <td>{{ str_limit($starbucksdrink->title, 100) }}</td>
                            <td>{{ str_limit($starbucksdrink->body, 250) }}</td>
                            <td>
                                <div>
                                    <a href="{{ action('Admin\StarbucksController@edit', ['id' => $starbucksdrink->id]) }}">編集</a>
                                </div>
                                <div>
                                    <a href="{{ action('Admin\StarbucksController@delete', ['id' => $starbucksdrink->id]) }}">削除</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection