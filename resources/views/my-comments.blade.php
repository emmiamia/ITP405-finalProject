@extends('personal.persolayout')

@section('title', 'My Comments')


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
        <form action="{{ route('comments') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary">Go Back to Forum</button>
        </form>
        
<div class="container">
    <div class = "blog-container">
        @if($comments->isEmpty())
            <p>No comments found.</p>
        @else
            
                @foreach($comments as $comment)
                <div class="blog-post">
                    {{ $comment->body }}
                    <div class="blog-footer">
                        <span class="comment-time">{{ $comment->created_at->format('F j, Y \a\t h:i A') }}</span>                
                    </div>
                </div>
                <a href="{{ route('comments.edit', $comment->id) }}" class="edit-link">Edit</a>
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this comment?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-link">Delete</button>
                </form>
                <br>
                @endforeach
            
        @endif
    </div>
</div>
@endsection
