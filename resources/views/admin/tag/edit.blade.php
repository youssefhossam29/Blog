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

   <form action="{{ route('admin.tag.update', ['id'=>$tag->id])}}" method="POST" >
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleFormControlInput1">tag name</label>
            <input type="text" name="tag" value="{{  $tag->tag }}" class="form-control"  >
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg">update <i class="fa-solid fa-pen-to-square"></i></button>
        </div>


    </form>
</div>

@endsection
