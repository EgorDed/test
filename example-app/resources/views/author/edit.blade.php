@extends('layout')

<link rel="stylesheet" href="{{ url('css/formStyle.css') }}"> 

@section('container')
    
      <form action="{{route('authors.update' , $author->id)}}" method="POST" enctype="multipart/form-data">
         @csrf
         @method("patch")

         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value={{$author->name}}>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputPassword1" value={{$author->email}}>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="exampleInputPassword1" value={{$author->phone}}>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Avatar</label>
            <input type="file" name="avatar" class="form-control" id="exampleInputPassword1" value={{$author->avatar}}>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

  
@endsection