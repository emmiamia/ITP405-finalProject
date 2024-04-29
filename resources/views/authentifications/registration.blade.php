@extends('authentifications/authlayout')

@section('title', 'Thank you for your interest in joining!')

@section('content')
<div class="text-center"> 
    <h4>Fill in the info below to register.</h4>
    <br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('register') }}" class="text-center">
        @csrf

        <div class="form-group row"> 
            <label for="name" class="col-sm-3 col-form-label text-right">Username:</label>
            <div class="col-sm-9"> 
                <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control" required>
            </div>
        </div>
                
        <div class="form-group row"> 
            <label for="email" class="col-sm-3 col-form-label text-right">Email:</label>
            <div class="col-sm-9"> 
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
            </div>
        </div>

        <div class="form-group row"> 
            <label for="password" class="col-sm-3 col-form-label text-right">Password:</label>
            <div class="col-sm-9"> 
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
        </div>

        <div class="form-group row"> 
            <label for="password_confirmation" class="col-sm-3 col-form-label text-right">Confirm Password:</label>
            <div class="col-sm-9"> 
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>
        </div>

        <div class="form-group text-center"> 
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
</div>
@endsection
