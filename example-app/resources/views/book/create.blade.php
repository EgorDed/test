@extends('layout')

<link rel="stylesheet" href="{{ url('css/formStyle.css') }}"> 


@section('container')
    
      <form action="{{route('books.store' )}}" method="POST" enctype="multipart/form-data">
         @csrf
         

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" 
             placeholder="Введите название ">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            

            <select name="author" class="form-select" aria-label="Default select example">
                <option selected> Выберите автора</option>
                @foreach ($authors as $key => $item)
                    <option value= {{ $item->id }} >{{$item->name}}</option>
                @endforeach
               
            </select>

           
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Price</label>
            <input type="text" name="price" class="form-control" id="exampleInputPassword1" 
            placeholder="Введите цену">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="exampleInputPassword1" 
            placeholder="Введите описание">
        </div>
        
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

  
@endsection