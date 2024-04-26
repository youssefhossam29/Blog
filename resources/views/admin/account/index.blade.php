@extends('layouts.app')
@section('content')

<div class="jumbotron container">
    <a class="btn btn-primary btn-lg" href="{{ route('admin.create.account')}}" role="button">create new admin <i class="fa-solid fa-plus"></i></a>
  </div>


  <div class="container" >
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">email </th>
            <th scope="col"> </th>
          </tr>
        </thead>
        <tbody>
            @php
                $i=0;
            @endphp

            @foreach ($admins as $item)
               <tr>
                <th scope="row">{{++$i}}</th>
                <td> {{$item->name}} </td>
                <td> {{$item->email }} </td>

               </tr>
            @endforeach

        </tbody>
      </table>

  </div>

@endsection












