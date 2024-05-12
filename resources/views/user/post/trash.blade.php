@extends('layouts.app')
@section('content')


@if ( count($trashedpost) == 0)
    <div class=" m-auto col-lg-6 col-md-12 alert alert-danger text-center d-flex justify-content-center">There is no posts in trash </div>
@else
  <div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">created at</th>
            <th scope="col">deleted at</th>
            <th scope="col">photo</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp

            @foreach ($trashedpost as $item)
               <tr>
                <th scope="row">{{++$i}}</th>
                <td> {{$item->title}} </td>
                <td> {{$item->created_at->diffForhumans() }} </td>
                <td> {{$item->deleted_at->diffForhumans() }} </td>
                <td> <img src="{{URL::asset($item->photo)}}" class="img-tumbnail" width="100" height="100">  </td>
                <td>
                    <div class="row">

                        <div class="col-sm">
                            <a class="btn btn-success" href="{{ route('user.post.restore',$item->id)}}"> restore <i class="fa-solid fa-arrow-rotate-left"></i></a>
                        </div>

                        <div class="col-sm">
                            <form action="{{ route('user.delete.trash',$item->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">delete <i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>

                    </div>

                </td>
               </tr>
            @endforeach

        </tbody>
      </table>

    {{$trashedpost->links('pagination::bootstrap-4') }}

  </div>
  @endif

@endsection












