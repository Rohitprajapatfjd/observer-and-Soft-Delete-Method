@extends('layout')

@section('title')
 Edit page
@endsection

@section('heading')
     User Information
@endsection

@section('content')
    <div class="container">
        <h1 class="heading">Images</h1>
        @if (session('delete'))
        <div class="row justify-content-center">
          <div class="col-6  alert alert-danger">
            {{session('delete')}}
          </div>
        </div>         
        @endif
        @if (session('status'))
        <div class="row justify-content-center">
          <div class="col-6  alert alert-success">
            {{session('status')}}
          </div>
        </div>         
        @endif
        
        <div class="row justify-content-end align-item-center">
            <div class="col-3 items-end">
                <a href="{{route('form.restore')}}" class="btn-sm text-decoration-none btn-success my-2"> Restore Data</a>
                <a href="{{route('form.index')}}" class="btn-sm text-decoration-none btn-secondary my-2">Back</a>
            </div>
           
        </div>
            <table class="table table-secondar table-hover table-striped">
                <thead>
                  <tr>
                    <th scope="col">Sno</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Images</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Trash</th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($user as $values )
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$values->name}}</td>
                        <td>{{$values->email}}</td>
                        <td><img class="img-fluid img-thumbnail" width="140px" src={{ asset('/storage/'. $values->image_path) }} alt="images"></td>
                        <td><a href="{{route('form.edit',$values->id)}}" class="text-decoration-none py-1 btn-sm btn-primary"> Update </a></td>
                        <td>
                          <form action="{{route('form.destroy',$values->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-decoration-none btn-sm btn-danger">Delete</button>
                          </form>
                        
                        </td>
                       
                        
                      </tr>
                    @empty
                        <h1 class="heading">Does not have Data</h1>
                    @endforelse
                  
                  
                </tbody>
              </table>

        
    </div>
@endsection