@extends('layout')
@section('container')
<a href={{route('authors.create' )}} class="btn btn-primary mt-3">Create author</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Avatar</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($authors as $key => $item)
        <tr>
            <th scope="row">{{$key + 1}}</th>
            <td><a href="{{route('authors.show' , $item->id)}}">{{$item->name}}</a></td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone}}</td>
            <td><img src="{{ asset('storage/authors/'.$item->avatar) }}" alt="" title="" style="width: 150px; height:150px "> </td>
        </tr>
   @endforeach
   
  </tbody>
</table>

{{ $authors->links() }}

@endsection