@extends('compornents.layout')

@section('title')
    Add New Post - My BBS
@endsection

@section('content')
        <div class="back-link">
            &laquo;<a href="{{ route('posts.index') }}">Back</a>

        </div>
    <h1>Add New Post</h1>



    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
        <label for="">
            Title
            <input type="text" name="title" value="{{ old('title') }}">
        </label>
        @error('title')
        <div class="error">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group">
        <label for="">
            Body
            <textarea name="body">{{ old('body') }}</textarea>
        </label>
        @error('body')
        <div class="error">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-button">
            <button >Add</button>
        </div>
    </form>
@endsection

{{-- <x-layout>
        <div class="back-link">
            &laquo;<a href="{{ route('posts.index') }}">Back</a>

        </div>
    <h1>{{ $post }}</h1>
</x-layout> --}}

