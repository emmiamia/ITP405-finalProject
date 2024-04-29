@extends('personal/persolayout')

@section('title', 'Favorite Diary Posts')

@section('content')
<form action="{{ route('user.diary', ['userId' => auth()->id()]) }}" method="GET">
    @csrf
    <input type="hidden" name="userId" value="{{ auth()->id() }}">
    <button type="submit" class="btn btn-primary">Go Back to Diary</button>
</form>
    <div class="container">
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

            <div class="blog-container">
            @if ($favorites->isEmpty())
                    <h4>Favorites empty, view you diary and add new ones!</h4>
            @else
                @foreach($favorites as $favorite)
                    <div class="blog-post">
                    <div class="blog-header">
                        <span class="blog-date">Added to favorites at: {{ $favorite->created_at }}</span> <!-- Displaying the created_at timestamp of the favorite -->
                    </div>
                        <div class="blog-header">
                            <span class="blog-date">Created at: {{ $favorite->diary->created_at }}</span>
                        </div>
                        <p class="blog-content">{{ $favorite->diary->content }}</p>
                    </div>
                <form action="{{ route('favorites.destroy', $favorite->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Remove from Favorites</button>
                </form>
            <br>
                @endforeach
            @endif
        </div>
    </div>
@endsection
