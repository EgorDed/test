  @extends('layout')
  
  @section('container')
        <div>
        <p>Author name: {{$author->name}}</p>
        <p>Author email: {{$author->email}}</p>
        <p>Author phone: {{$author->phone}}</p>
        <p>Author avatar: {{$author->avatar}}</p>
        
        </div>

        <a href={{route('authors.edit' , $author->id)}} class="btn btn-primary">Edit author</a>

        <form action="{{route('authors.destroy' , $author->id)}}" method="post">
            @csrf
            @method("delete")
            <button class="btn btn-primary">Delete author</button>
        </form>
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($books as $key => $item)
            <tr>
                <th scope="row">{{$key + 1}}</th>
                <td><a href="{{route('authors.show' , $item->id)}}">{{$item->name}}</a></td>
                <td><textarea name="" class="border-0" style="resize: none" id="" cols="100" rows="3" readonly>{{$item->description}}</textarea></td>
                <td>{{$item->price}}</td>
            
            </tr>
    @endforeach
            
    </tbody>
    </table>

    
  @endsection


  