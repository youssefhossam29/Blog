@extends('layouts.app')
@section('content')

    @if ( count($posts) == 0)
        <div class=" m-auto col-lg-6 col-md-12 alert alert-danger text-center d-flex justify-content-center">There is no posts for this tag </div>
    @else

    <div class="jumbotron container">
        <h3> <i class="fa-solid fa-tag"></i> {{$tag->tag}}'s posts </h3>
    </div>

    <div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">user name</th>
            <th scope="col">date </th>
            <th scope="col">statues </th>
            <th scope="col">photo</th>
            <th scope="col">actions</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp

            @foreach ($posts as $item)
               <tr>
                <th scope="row">{{++$i}}</th>
                <td> {{$item->title}} </td>
                <td>
                 {{$item->user->name}}
                </td>
                <td> {{$item->created_at->diffForhumans() }} </td>
                <td>
                    @if($item->deleted_at == null)
                        <h5 class="badge bg-danger text-decoration-none link-red" href="">soft deleted</h5>
                    @else
                        <h5 class="badge bg-primary text-decoration-none link-red" href="">available</h5>
                    @endif
                </td>
                <td> <img src="{{URL::asset($item->photo)}}" alt="" class="img-tumbnail" width="100" height="100"> </td>
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <a class="btn btn-success" href="{{ route('admin.post.show',$item->slug)}}"><i class="fa-solid fa-eye"></i> show</a>
                        </div>
                    </div>
                </td>
               </tr>
            @endforeach

        </tbody>
      </table>
      {{$posts->links('pagination::bootstrap-4') }}

  </div>
  @endif

@endsection












