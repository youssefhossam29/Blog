@extends('layouts.app')
@section('content')


<div class="jumbotron container">
    <a class="btn btn-primary btn-lg" href="{{ route('admin.tag.create')}}" role="button">Create tag <i class="fa-solid fa-plus"></i></a>
</div>

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

            @foreach ($all_tag as $item)
               <tr>
                <th scope="row">{{++$i}}</th>
                <td> {{$item->tag}} </td>
                <td>
                    <div class="row">

                        <div class="col-sm">
                            <a class="btn btn-primary" href="{{ route('admin.post.tags', $item->id)}}"> show posts <i class="fa-solid fa-eye"></i></a>
                        </div>

                        <div class="col-sm">
                            <a class="btn btn-success" href="{{ route('admin.tag.edit', $item->id)}}"> update <i class="fa-solid fa-pen-to-square"></i></a>
                        </div>

                        <div class="col-sm">
                            <a class="btn btn-warning" href="{{ route('admin.tag.destroy',$item->id)}}"> delete <i class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>

                </td>
               </tr>
            @endforeach

        </tbody>
      </table>

    {{$all_tag->links() }}
  </div>

@endsection












