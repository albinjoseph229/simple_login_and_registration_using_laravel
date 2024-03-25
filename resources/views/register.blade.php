@extends('layout')
@section('title', 'Registration')
@section('content')
    <div class="mt=5">
        @if($errors->any())
            <div class="col-12">
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{$error}}
                </div>
                @endforeach
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session('sucess')}}
            </div>
        @endif
    </div>
    <div class="container">
        <form action ="{{route('register.post')}}" method="POST" style="width:500px" class="ms-auto me-auto mt-auto">
            @csrf
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" class="form-control" name="name" >
            </div>
            <div class="mb-3">
                <label  class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
              <label  class="form-label">Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection
