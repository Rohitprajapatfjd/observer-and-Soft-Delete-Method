  @extends('layout')

  @section('title')
   form page
  @endsection

  @section('heading')
       User Form
  @endsection

  @section('content')
    <div class="row justify-content-center mx-auto mt-1">
        <form action="{{route('form.store')}}" class="col-5" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label class="form-label" for="name">Name</label>
                <input class="form-control @error('names')  is-invalid   @enderror" type="text"  value="{{old('names')}}" name="names" id="name" placeholder="Enter your Name">
                @error('names')
               <span class="text-danger">  {{$message}} </span> 
                @enderror
            </div>
            <div>
                <label class="form-label" for="email">Email Address</label>
                <input class="form-control @error('email')  is-invalid   @enderror" type="email" value="{{old('email')}}" name="email" id="email" placeholder="Enter your Email">
                @error('email')
                <span class="text-danger">  {{$message}} </span> 
                @enderror
            </div>
            <div>
                <label class="form-label" for="photo">Upload Image</label>
                <input class="form-control @error('photo')  is-invalid   @enderror" type="file" name="photo" id="photo">
                @error('photo')
                <span class="text-danger">  {{$message}} </span> 
                                    
                @enderror
            </div>
           @if(session('status'))
           <div>
            <div class="text-success"> {{session('status')}} </div>
        </div>
           @endif 
            <div>
                <button  class="mt-3 btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
    @endsection
