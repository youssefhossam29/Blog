@extends('layouts.app')

@section('content')

<div class="jumbotron container">
    <h2 >create new admin </h2>
</div>

<div class="container" style="padding-top: 1%">

    @if (count($errors)>0)
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger" role="alert">
                {{$item}}
            </div>
        @endforeach
    @endif


    <form method="POST" action="{{route('admin.store.account')}}">
        @csrf

        <div class="form-group">
            <label for="exampleFormControlInput1"> Name </label>
            <input type="text" name="name" class="form-control" >
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1"> email </label>
            <input type="email" name="email" class="form-control" >
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1"> password </label>
            <input type="password" class="form-control" name="password">

        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1"> confirm password </label>
            <input  type="password" class="form-control" name="password_confirmation" >
        </div>

        <div class="form-group">
            <button class="btn btn-success  btn-lg" type="submit"> create <i class="fa-solid fa-plus"></i></button>
        </div>

    </form>
</div>







@endsection
