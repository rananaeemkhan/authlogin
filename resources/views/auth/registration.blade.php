@extends('layout.header')
@extends('layout.footer')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <h4>Registration</h4>

        <hr>
        <form action="{{ asset('registeruser') }}" method="POST">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" class="form-control" name="name" placeholder="Write yor Name" value="{{ old('name') }}">
                <span class="text-danger">@error('name') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Write yor Email" value="{{ old('email') }}">
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="name">password</label>
                <input type="password" class="form-control" name="password" placeholder="Write yor password" value="{{ old('password') }}">
                <span class="text-danger">@error('password') {{$message}} @enderror</span>
            </div>
            <!-- <div class="form-group">
                <label for="name">Conferm password</label>
                <input type="password" class="form-control" name="conferm_password" placeholder="Write yor password" value="">
            </div> -->
            <div class="form-group mt-4">
                <button class="btn btn-primary btn-block">register</button>
            </div>
            <br>
            <h5><a href="login" class="text-decoration: none;">Already Register !! Login Here.</a></h5>
        </form>
        </div>
    </div>
</div>
@endsection
