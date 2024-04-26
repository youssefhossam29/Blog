@extends('layouts.app')

@section('content')

<div class="container" style="padding-top: 3%">

    @if (count($errors)>0)
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger" role="alert">
                {{$item}}
            </div>
        @endforeach
    @endif


    <form method="POST" action="{{route('admin.update.account')}}" enctype= "multipart/form-data">
        @csrf
        @method('PUT')



        <div class="form-group">
            <label for="exampleFormControlInput1"> Name </label>
            <input type="text" name="name" class="form-control"  value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1"> email </label>
            <input type="email" name="email" class="form-control"  value="{{$user->email}}">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1"> password </label>
            <input type="password" name="password" class="form-control" >
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1"> confirm password </label>
            <input type="password" name="password_confirmation" class="form-control"  >
        </div>

        <div class="form-group">
            <button class="btn btn-success  btn-lg" type="submit"> update <i class="fa-solid fa-pen-to-square"></i></button>
        </div>

    </form>
</div>







@endsection
