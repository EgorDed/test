@extends('layout')

<link rel="stylesheet" href="{{ url('css/formStyle.css') }}"> 

@section('container')
    
      <form action="{{route('books.update' , $book->id)}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method("patch")

         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value={{$book->name}}>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Price</label>
            <input type="text" name="price" class="form-control" id="exampleInputPassword1" value={{$book->price}}>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="exampleInputPassword1" value={{$book->description}}>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Author</label>
           
            <select name="author" class="form-select" aria-label="Default select example">
                    <option value= {{ $current_author->id }} selected> {{$current_author->name}}</option>
                @foreach ($authors_list as $key => $item)
                    <option value= {{ $item->id }} >{{$item->name}}</option>
                @endforeach
               
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

  @endsection