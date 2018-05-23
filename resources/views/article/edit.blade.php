@extends('layouts.home')

@section('title', $title)

@section('content')
    <body>
    <form action="{{ url('view/update', $article->id) }}" method="post">
        {{ csrf_field() }}
        <input type="text" name="title" value="{{ $article->title }}" /><br>
        <input type="text" name="content" value="{{ $article->content }}" /><br>
        <button type="submit">提交</button>
    </form>
@endsection