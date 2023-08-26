@extends('layout')

@section('container')

<table class="table">
  
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($books as $key => $item)
        <tr>
            <th scope="row">{{$key + 1}}</th>
            <td> <a href="{{route('books.show' , $item->id)}}">{{$item->name}}</a> </td>
            <td>{{$item->price}}</td>
            <td><textarea style="resize: none; border: none;"  readonly name="" id="" cols="100" rows="2">{{$item->description}}</textarea></td>
        </tr>
   @endforeach
   
  </tbody>
</table>
<a  href={{route('books.create' )}} class="btn btn-primary mb-3">Create book</a>

{{ $books->links() }}
@endsection