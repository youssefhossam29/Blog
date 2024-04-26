@extends('layouts.app')
@section('content')

@if ( count($users) == 0)
    <div class=" m-auto col-lg-6 col-md-12 alert alert-danger text-center d-flex justify-content-center">There is no users </div>
@else

  <div class="container" >
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">user name</th>
            <th scope="col">user email </th>
            <th scope="col">user photo</th>
            <th scope="col"> </th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp

            @foreach ($users as $item)
               <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{$item->name}}</td>
                <td> {{$item->email }} </td>
                <td> <img class="img-lg rounded-circle"  src="{{URL::asset($item->profile->photo)}}" alt="" class="img-tumbnail" width="100" height="100"> </td>
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <a class="btn btn-success" href="{{ route('admin.show.user',$item->id)}}"><i class="fa-solid fa-eye"></i> show profile</a>
                        </div>
                    </div>
                </td>
               </tr>
            @endforeach

        </tbody>
      </table>

    {{$users->links() }}
  </div>
  @endif

@endsection












