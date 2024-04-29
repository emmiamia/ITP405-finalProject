@extends('authentifications/authlayout')

@section('title', 'Welcome back!')

@section('content')

<div class="text-center"> 
    <h4>
        Fill in the info below to log in.
    </h4>
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

    <form method="POST" class="text-center">
        @csrf

        <div class="form-group row"> 
            <label for="name" class="col-sm-3 col-form-label text-right">Username:</label> <!-- Added col classes -->
            <div class="col-sm-9"> 
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required>
            </div>
        </div>

        <div class="form-group row"> 
            <label for="password" class="col-sm-3 col-form-label text-right">Password:</label> <!-- Added col classes -->
            <div class="col-sm-9"> 
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
        </div>

        <div class="form-group text-center"> 
            <button type="submit" class="btn btn-primary">login</button>
        </div>
    </form>
</div>
@endsection
