@extends('layouts.app')
@section('content')


  <div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">tag name</th>
            <th scope="col">actions</th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp

            @foreach ($tags as $item)
               <tr>
                <th scope="row">{{++$i}}</th>
                <td> {{$item->tag}} </td>
                <td>
                    <div class="row">
                        <div class="col-sm">
                            <a class="btn btn-primary" href="{{ route('user.tag.posts', $item->id)}}"> show posts <i class="fa-solid fa-eye"></i></a>
                        </div>
                    </div>
                </td>
               </tr>
            @endforeach

        </tbody>
      </table>

    {{$tags->links() }}
  </div>

@endsection












