@extends('layouts.admin')
@section('title', 'おすすめドリンクの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>ドリンク一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ action('Admin\StarbucksController@index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">ドリンク名</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value={{ $cond_title }}>
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="admin-starbucks col-md-12 mx-auto">
                 <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="title">
                                    {{ str_limit($post->title, 150) }}
                                </div>
                                <div class="body mt-3">
                                    {{ str_limit($post->body, 1500) }}
                                </div>
                            </div>
                            <div class="image col-md-6 text-right mt-4">
                                @if ($post->image_path)
                                    <img src="{{ asset('storage/image/' . $post->image_path) }}">
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
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
                                            <a href="{{ action('Admin\StarbucksController@editdrink', ['id' => $starbucksdrink->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{ action('Admin\StarbucksController@deletedrink', ['id' => $starbucksdrink->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection