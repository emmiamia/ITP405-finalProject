@extends('personal/persolayout')

@section('title', 'Comment Forum')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if(session('error'))
    <div class="alert alert-error" style="color: red;">
        {{ session('error') }}
    </div>
@endif
<div class="container">
    <form action="{{ route('user.diary', ['userId' => auth()->id()]) }}" method="GET">
        @csrf
        <input type="hidden" name="userId" value="{{ auth()->id() }}">
        <button type="submit" class="btn btn-primary">Go Back to Diary</button>
    </form>
    
    <div class = "blog-container">
        @guest
        <p>Please <a href="{{ route('login') }}">log in</a> to post a comment.</p>
    @else
        <h5>Post a Comment</h5>
        <form action="{{ url('/comments') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="body">Your Comment:</label>
                <textarea name="body" id="body" class="form-control" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Post Comment</button>
            <a href="{{ route('my-comments') }}" class="btn btn-secondary">Show My Comments</a>
        </form>
    @endguest


    <br>
        @foreach ($comments as $comment)
        <div class = 'blog-post'>
            <div class="comment">
                <p><strong>{{ $comment->name }}</strong> : {{ $comment->body }}</p>
                <div class="blog-footer">
                <span class="comment-time">{{ $comment->created_at->format('F j, Y \a\t h:i A') }}</span>
                </div>
            </div>
        </div>
        <br>
    @endforeach
</div>


@endsection