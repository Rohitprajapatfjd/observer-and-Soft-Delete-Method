@extends('layout')

@section('title')
 Restore page
@endsection

@section('heading')
     User Trash Information
@endsection

@section('content')
    <div class="container">
        <h1 class="heading">Images</h1>
        <div class="row justify-content-end align-item-center">
        @if (session('status'))
        <div class="row justify-content-center">
          <div class="col-4  alert alert-success">
            {{session('status')}}
          </div>
        </div>
        @endif
        @if (session('delete'))
        <div class="row justify-content-center">
          <div class="col-4  alert alert-danger">
            {{session('delete')}}
          </div>
        </div>         
        @endif
            <div class="col-3 items-end">
                <a href="{{route('form.create')}}" class="btn-sm text-decoration-none btn-success my-2"> Back </a>
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
                    <th scope="col">Delete </th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($user as $values )
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$values->name}}</td>
                        <td>{{$values->email}}</td>
                        <td><img class="img-fluid img-thumbnail" width="140px" src={{ asset('/storage/'. $values->image_path) }} alt="images"></td>
                        <td><a href="{{route('form.dataRestore',$values->id)}}" class="text-decoration-none btn-sm btn-success">Restore</a></td>
                        <td><a href="{{route('form.delete',$values->id)}}" class="text-decoration-none btn-sm btn-danger">Delete</a></td>
                       
                        
                      </tr>
                    @empty
                    
                    <tr>
                     <td class="text-center" colspan="6">
                      <span class="heading">No Data Available</span>
                     </td>
                   </tr>
                    
                       
                    @endforelse
                  
                  
                </tbody>
              </table>

        
    </div>
@endsection