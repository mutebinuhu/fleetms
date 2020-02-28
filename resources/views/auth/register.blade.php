@extends('layouts.app')
@section('content')

<!--end of the first-->
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{ __('Register') }}</div>
            <div class="card-body">
               <form method="POST" action="{{ route('register') }}" autocomplete="off">
                  @csrf
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="first name">First Name</label>
                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first-name" placeholder="first name" autofocus value="{{old('first_name')}}">
                         @error('first_name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-6">
                        <label for="sur name">Sur Name</label>
                         <input type="text" name="sur_name" class="form-control @error('sur_name') is-invalid @enderror" id="sur-name" placeholder="sur name" value="{{old('sur_name')}}">
                        @error('sur_name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email" value="{{old('email')}}" >
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-3">
                         <label for="password">Password</label>
                         <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                     <div class="form-group col-md-3">
                         <label for="password-confirm">Confirm Password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" required>
                     </div>
                  </div>
                   <div class="form-group">
                      <label for="image-upload">upload image</label>
                      <input type="file" class="form-control-file" id="image-upload" name="picture">
                     </div>
                  <button type="submit" name="submit" class="btn btn-primary">Register</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection