@extends('layouts.app')

@section('content')




<div class="container" style="padding-top: 4%">

    @if (count($errors)>0)
        @foreach ($errors->all() as $item)
            <div class="alert alert-danger" role="alert">
                {{$item}}
            </div>
        @endforeach
    @endif

   <form action="{{ route('user.post.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">title</label>
            <input type="text" name="title" class="form-control" >
        </div>


        <div class="form-group">

            @foreach ($tags as $item)
                <input type="checkbox" name="tags[]"  value="{{$item->id}}" >
                <label for="exampleFormControlInput1"> {{$item->tag}}</label>
            @endforeach

        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">content</label>
            <textarea class="form-control" name="content" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">photo</label>
            <input type="file" name="photo" class="form-control" >
          </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg">  save <i class="fa-solid fa-plus"></i></button>
        </div>


    </form>
</div>

@endsection
