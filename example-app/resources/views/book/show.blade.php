  @extends('layout')
  
  @section('container')
        <div>
        <p>Book title: {{$book->name}}</p>
        <p>Book price: {{$book->price}}</p>
        <p>Book description: {{$book->description}}</p>
        <p>Author name: {{$author->name}}</p>
        
        </div>

        <a href={{route('books.edit' , $book->id)}} class="btn btn-primary">Edit book</a>

        <form action="{{route('books.destroy' , $book->id)}}" method="post">
            @csrf
            @method("delete")
            <button class="btn btn-primary">Delete book</button>
        </form>
  @endsection


  