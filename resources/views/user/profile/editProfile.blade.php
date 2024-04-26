@extends('layouts.app')

@section('content')

@php
    $genderArray = ['Male','Female'];
    $cityArray = ['alexandria','cairo','aswan','portsaid','luxor'];
@endphp


<div class="container" style="padding-top: 3%">

    @if (count($errors)>0)
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger" role="alert">
                {{$item}}
            </div>
        @endforeach
    @endif


    <form method="POST" action="{{route('user.myProfile.update')}}" enctype= "multipart/form-data">
        @csrf
        @method('PUT')



        <div class="form-group">
            <label for="exampleFormControlInput1"> Name </label>
            <input type="text" name="name" class="form-control"  value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1"> photo </label>
            <input type="file" name="photo" class="form-control"  >
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1"> facebook </label>
            <input type="text" name="facebook" class="form-control"  value="{{$user->profile->facebook}}">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1"> Gender </label>
          <select class="form-control" name="gender" >
              @foreach ($genderArray  as $item)
              <option value="{{$item}}" {{($user->profile->gender == $item) ? 'selected':''}}>{{$item}}</option>
              @endforeach
          </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1"> city </label>
            <select class="form-control" name="city" >
                @foreach ($cityArray  as $item)
                <option value="{{$item}}" {{($user->profile->city == $item) ? 'selected':''}}>{{$item}}</option>
                @endforeach
            </select>
          </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">Bio  </label>
                <textarea class="form-control" name="bio" rows="3">
                    {!! $user->profile->bio !!}
                </textarea>
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
