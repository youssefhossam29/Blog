@extends('layouts.app')
@section('content')

  <div class="jumbotron container">
    <a class="btn btn-primary btn-lg" href="{{ route('user.post.create')}}" role="button">Create post <i class="fa-solid fa-plus"></i></a>
    <a class="btn btn-primary btn-lg" href="{{ route('user.trashed.posts')}}" role="button">Trash <i class="fa-solid fa-trash"></i></a>

  </div>

@if ( count($all_post) == 0)
    <div class=" m-auto col-lg-6 col-md-12 alert alert-danger text-center d-flex justify-content-center">There is no posts </div>
@else

  <div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">user</th>
            <th scope="col">date </th>
            <th scope="col">photo</th>
            <th scope="col">actions</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp

            @foreach ($all_post as $item)
               <tr>
                <th scope="row">{{++$i}}</th>
                <td> {{$item->title}} </td>
                <td>
                <a href="{{ route('user.profile.show', $item->user_id)}}"> {{$item->user->name}}</a>
                </td>
                <td> {{$item->created_at->diffForhumans() }} </td>
                <td> <img src="{{URL::asset($item->photo)}}" alt="" class="img-tumbnail" width="100" height="100"> </td>
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <a class="btn btn-success" href="{{ route('user.post.show',$item->slug)}}"><i class="fa-solid fa-eye"></i> show</a>
                        </div>
                    </div>
                </td>
               </tr>
            @endforeach

        </tbody>
      </table>

    {{$all_post->links() }}
  </div>
  @endif

@endsection












