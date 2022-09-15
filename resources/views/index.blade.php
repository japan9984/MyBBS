@extends('compornents.layout')

@section('title')
My BBS
@endsection

@section('content')
    <h1>
        <span>MyBBS</span>
        <a href="{{ route('posts.create') }}">[add]</a>
    </h1>
    <ul>
        @forelse($posts as $index => $post)
        <li><a href="{{ route('posts.show', $post) }}">{{$post->title}}</a></li>
        @empty
        <li>No post</li>
        @endforelse
    </ul>
@endsection

{{-- <x-layout>
    <h1>MyBBS</h1>
    <ul>
        @forelse($posts as $index => $post)
        <li><a href="{{ route('posts.show', $index) }}">{{$post}}</a></li>
        @empty
        <li>No post</li>
        @endforelse
    </ul>
</x-layout> --}}

