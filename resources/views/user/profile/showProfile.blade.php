@extends('layouts.app')

@section('content')

    <div class="jumbotron container" style="height:320px">
        <div class="container" >
            <img class="img-lg rounded-circle" width="130px" height="130px" src="{{ URL::asset($profile->photo) }}" alt="user_image">
            <h2> {{ $profile->user->name }}</h2>
            @if ($profile->user_id == Auth::id())
                <a class="btn btn-primary btn-lg" href="{{ route('user.post.create')}}" role="button">Create post <i class="fa-solid fa-plus"></i></a>
                <a class="btn btn-primary btn-lg" href="{{ route('user.myProfile.edit')}}"> edit profile <i class="fa-solid fa-pen-to-square"></i> </a>
                <a class="btn btn-primary btn-lg" href="{{ route('user.trashed.posts')}}" role="button">Trash <i class="fa-solid fa-trash"></i></a>
            @endif
        </div>
    </div>

    <div class="container" >

            <div class="ml-3 m-auto">
                <div class="table-responsive">
                    <div class="p-2 mt-2  d-flex justify-content-between rounded text stats">


                    </div>
                </div>

                    <div class="row m-auto">
                        <div class="col-lg-3 col-sm-6">
                            <div class="m-auto mb-2 text-center col-4 rounded alert-secondary">bio</div>
                            <textarea class="btn btn-sm btn-outline-dark m-2" cols="25" rows="auto" style="font-weight: bold;font-size: 20px;"> {{ $profile->bio }}</textarea>
                        </div>



                        <div class="col-lg-3 col-sm-6">
                            <div class="m-auto mb-2 text-center col-4 rounded alert-secondary">city</div>
                            <a class="btn btn-sm btn-outline-dark w-100 m-2" href="">{{ $profile->city }}</a>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="m-auto mb-2 text-center col-4 rounded alert-secondary">gender</div>
                            <a class="btn btn-sm btn-outline-dark w-100 m-2" href="">{{ $profile->gender }}</a>
                        </div>

                        <div class="col-lg-3 col-sm-6">
                            <div class="m-auto mb-2 text-center col-4 rounded alert-secondary">facebook</div>
                            <a class="btn btn-sm btn-outline-dark w-100 m-2" href="">{{ $profile->facebook }}</a>
                        </div>



                    </div>

        </div>
        <hr class="mb-2">

        {{-- Start Posts --}}


    </div>
    <div class="row">
        @if ($posts->count() == 0)
            <div class=" m-auto col-lg-6 col-md-12 alert alert-danger text-center d-flex justify-content-center">There is no posts in
                "{{ $profile->user->name }}" Account!! </div>
        @else
            <div class="row">
                <div class="col-10 content m-auto">
                    <div class=" m-auto col-lg-6 col-md-12 alert alert-dark text-center d-flex justify-content-center">
                        "Number of posts: {{ $posts->count()  }}"  </div>
                    <br>
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-3 4 mb-4">
                                <div class="card bg-light h-100">
                                    <img src="{{ URL::asset($post->photo) }}" class="card-img-top">
                                    <div class="card-body">
                                        <h3 class="m-t-0 m-b-5">{{$post->title}}</h3>
                                        <hr>

                                        <p class="card-text">{{ $post->content }}</p>
                                    </div>
                                    <a href="{{route('user.post.show' , $post->slug)}}" title="read more" class="btn btn-round btn-sm btn-secondary">Read More <i class="fa-solid fa-eye"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $posts->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        @endif

    </div>


@endsection
