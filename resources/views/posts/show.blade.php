@extends('compornents.layout')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
        <div class="back-link">
            &laquo;<a href="{{ route('posts.index') }}">Back</a>

        </div>
    <h1>
        <span>{{ $post->title }}</span>
        <a href="{{ route('posts.edit' , $post) }}">[edit]</a>
        <form method="post" action="{{ route('posts.destroy', $post) }}" id="delete_post">
            @method('DELETE')
            @csrf
            <button class="btn"🇲>[x]</button>
        </form>
    </h1>
    <p>{!! nl2br(e($post->body)) !!}</p>
    <h2>Comments</h2>
    <ul>
        <li>
            <form method="post" action="{{ route('comments.store', $post) }}" class="comment-form">
                @csrf
                <input type="text" name="body">
                <button>add</button>
            </form>
        </li>
        @foreach( $post->comments()->latest()->get() as $comment )
        <li>
            {{ $comment->body }}
            <form action="{{ route('comments.destroy', $comment) }}" method="post" class="delete-comment">
                @method('DELETE')
                @csrf
                <button class="btn">
                    [X]
                </button>
            </form>
        </li>
        @endforeach
    </ul>
    <script>
        'use strict';
        {
            document.getElementById('delete_post').addEventListener('submit', e=>{
                e.preventDefault();

                if(!confirm('Sure to delete?')){
                    return;
                }
                e.target.submit();
            })
        }
    </script>
@endsection

{{-- <x-layout>
        <div class="back-link">
            &laquo;<a href="{{ route('posts.index') }}">Back</a>

        </div>
    <h1>{{ $post }}</h1>
</x-layout> --}}

