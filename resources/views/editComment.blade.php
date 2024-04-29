@extends('personal.persolayout')

@section('title', 'Edit Comments')

@section('content')

<div class="blog-container">
    <div class="blog-post">
        <form action="{{ route('comments.update', $comment->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="body">Your Comment:</label>
                <textarea name="body" id="body" class="form-control" rows="5" required>{{ old('body', $comment->body) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Comment</button>
        </form>
    </div>
</div>
@endsection