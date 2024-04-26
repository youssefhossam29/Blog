@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="jumbotron" style="align-items: center;text-align: center;">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if(Auth::user()->is_admin == '1')
                    <h1> welcome to admin Dashboard You are logged in!<h1>
                    <br>
                    <a href="{{ route('admin.post.index')}}" class="btn btn-success"> <h2> Get Started <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </h2></a>
                @else
                    <h1> welcome to user Home You are logged in!<h1>
                    <br>
                    <a href="{{ route('user.post.index')}}" class="btn btn-success"> <h2> Get Started <i class="fa fa-arrow-circle-right" aria-hidden="true"></i> </h2></a>
                @endif

            </div>
    </div>
    </div>
</div>
@endsection
