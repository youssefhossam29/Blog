@extends('layouts.app')

@section('content')


<div class="container" style="padding-top: 1%; padding-left: 5%" >


    <div class="form-group">
        <label for="exampleFormControlInput1"> <img src="{{URL::asset($post->photo)}}" alt="" class="img-tumbnail" style="width:860px;height:360px;"></label>
   </div>

    <div class="">

            <div class="mb-2  rounded alert-secondary" style="padding-top: 2%">
                <ul style="display:inline-flex; list-style-type: none">
                    <li style="width: 110px"> <h2> author: </h2></li>
                    <li style="width: auto"><a  class="btn btn-sm btn-outline-dark m-2 " href="{{ route('admin.show.user', $post->user_id)}}" ><h5> {{ $post->user->name }}</h5></a></li>
                </ul>
            </div>


            <div class="mb-2  rounded alert-secondary" style="padding-top: 2%">
                <ul style="display:inline-flex; list-style-type: none">
                    <li style="width: 80px"> <h2> title: </h2></li>
                    <li style="width: auto"> <a  class="btn btn-sm btn-outline-dark m-2" href="#" > <h4> {{ $post->title }}</h4> </a></li>
                </ul>
            </div>

            <div class="mb-2  rounded alert-secondary" style="padding-top: 2%">
                <ul style="display:inline-flex; list-style-type: none">
                    <li style="width: 120px"> <h2> content: </h2></li>
                    <li style="width: auto"> <textarea class="btn btn-sm btn-outline-dark m-2" cols="80" rows="auto" style="font-weight: bold;font-size: 20px;"> {{ $post->content }}</textarea> </li>
                </ul>
            </div>


            <div class="mb-2  rounded alert-secondary">
                <ul style="display:inline-flex; list-style-type: none">
                    <li style="width: 160px"> <h2> created at: </h2></li>
                    <li style="width: auto"> <a  class="btn btn-sm btn-outline-dark m-2" href="#" > <h4> {{ $post->created_at->diffForhumans() }}</h4> </a></li>
                </ul>
            </div>


            <div class="mb-2  rounded alert-secondary">
                <ul style="display:inline-flex; list-style-type: none">
                    <li style="width: 168px"> <h2> updated at: </h2></li>
                    <li style="width: auto"> <a  class="btn btn-sm btn-outline-dark m-2" href="#" > <h4> {{ $post->updated_at->diffForhumans() }}</h4> </a></li>
                </ul>
            </div>


            <div class="mb-2  rounded alert-secondary" >
                <ul style="display:inline-flex; list-style-type: none">
                    <li style="width: 80px"> <h2> tags: </h2></li>
                    @foreach ($post->tag as $item)
                        <li style="width: auto"><a  class="btn btn-sm btn-outline-dark m-2" href="#" > <h4> {{ $item->tag }}</h4> </a></li>
                    @endforeach
                </ul>
            </div>

    </div>

    <div class="card-body" style="float: left;padding-bottom: 5%">
        @if ($post->deleted_at == null)
            <a class="btn btn-warning btn-lg" href="{{ route('admin.post.delete',$post->id)}}"> delete <i class="fa-solid fa-trash"></i></a>
        @endif

    </div>


</div>

@endsection
