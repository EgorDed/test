@extends('layout')

<link rel="stylesheet" href="{{ url('css/formStyle.css') }}"> 

@section('container')
    
      <form action="{{route('authors.store' )}}" method="POST" enctype="multipart/form-data">
         @csrf
         

         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
             placeholder="Введите имя ">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputPassword1" 
            placeholder="Введите email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" id="exampleInputPassword1" 
            placeholder="Введите номер телефонов">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Avatar</label>
            <input type="file" name="avatar" class="form-control" id="exampleInputPassword1">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

  
@endsection