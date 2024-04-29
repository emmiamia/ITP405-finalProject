@extends('personal.persolayout')

@section('title', 'Create Diary Entry')

@section('content')
    <div class="blog-container">
        <div class="blog-post">
            <form action="{{ route('diaries.store') }}" method="POST">
                @csrf 
                <div class="form-group">
                    <textarea class="form-control" name="content" rows="12" cols="100" placeholder="Enter your diary entry here"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
