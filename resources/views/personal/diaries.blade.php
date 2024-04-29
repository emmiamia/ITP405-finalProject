@extends('personal/persolayout')

@section('title', 'Eating Diaries')

<form action="{{ route('comments') }}" method="GET" style='padding: 20px'>
    <button type="submit" class="btn btn-primary">Help Forum click here</button>
</form>

@section('content')
<div class="container">
    <div id = "p1_img" style = "text-align: center; margin-top: 3%;">
        <img src="{{ asset('images/p3_illus1.jpg') }}" alt="Example Image" style="width: 100%; height: auto; border-radius: 10px;">
    </div>
    <br>

    <h2>Hi, {{ Auth::user()->name }}, how do you feel today?</h2>
    <br>
    <form action="{{ route('diaries.create') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary">Create New Diary Entry</button>
    </form>
    <br>

    <form action="{{ route('user.favorite', ['userId' => auth()->id()]) }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary">View My Favorites</button>
    </form>
    <br>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Logout</button>
    </form>
    <br>    

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
        @if ($diaries->isEmpty())
            <h4>Record empty, write some new!</h4>
        @else
            @foreach ($diaries as $diary)
                <div class="blog-post">
                    <div class="blog-header">
                        <span class="blog-date">{{ $diary->created_at->format('M d, Y') }}</span>
                    </div>
                    <p class="blog-content" >{{ $diary->content }}</p>
                    <!-- Add any additional fields you want to display -->
                </div>

                <div class="d-inline">
                <form action="{{ route('diaries.add_to_favorites', $diary->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-link" style="font-size: 20px; color: red;">&#10084;</button>
                </form>
                <form action="{{ route('diaries.destroy', $diary->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this diary entry?')">Delete</button>
                </form>
                </div>
                <br>
                <br>
                <br>

            @endforeach
        @endif
    </div>

</div>
@endsection
