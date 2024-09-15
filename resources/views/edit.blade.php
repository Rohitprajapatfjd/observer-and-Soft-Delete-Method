@extends('layout')

@section('title')
 Edit page
@endsection

@section('heading')
     Edit Form
@endsection

@section('content')
<div class="row justify-content-center mt-1">
    <form action="{{route('form.update', $user->id )}}" class="col-5" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label class="form-label" for="name">Name</label>
            <input class="form-control" type="text"  value="{{$user->name}}" name="names" id="name" placeholder="Enter your Name">
            @error('names')
            <span class="text-danger">  {{$message}} </span> 
            @enderror
        </div>
        <div>
            <label class="form-label" for="email">Email Address</label>
            <input class="form-control" type="email" value="{{$user->email}}" name="email" id="email" placeholder="Enter your Email">
            @error('email')
            <span class="text-danger">  {{$message}} </span> 
            @enderror
        </div>
        <div class="row justify-content-center  mt-3 gap-2">
            <div class="col-3 p-1">
                <img class="img-fluid img-thumbnail" id="imageUpdate" src="{{asset('/storage/' . $user->image_path)}}" alt="">
            </div>
            <div class="col-9">
                <label class="form-label" for="photo">Upload Image</label>            
                <input id='inputImg' class="form-control" type="file" name="photo" id="photo">
            </div>            
            @error('photo')
            <span class="text-danger">  {{$message}} </span> 
                                
            @enderror
        </div>
       @if(session('status'))
       <div>
        <div> {{session('status')}} </div>
    </div>
       @endif 
        <div>
            <button  class="mt-3 btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
@endsection

@push('script')
    <script>
    
     let img = document.getElementById('inputImg');
     img.addEventListener('change', function(){
         document.getElementById('imageUpdate').src = window.URL.createObjectURL(this.files[0]);
     })
    </script>
@endpush