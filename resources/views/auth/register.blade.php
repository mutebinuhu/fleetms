@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{ __('Register') }}</div>
            <div class="card-body">
               <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <div class="form-group row">
                     <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                     <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                     <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                     <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group row">
                     <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                     <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                     </div>
                  </div>
                  <div class="form-group row mb-0">
                     <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!--end of the first>
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{ __('Register') }}</div>
            <div class="card-body">
               <form method="POST" action="{{ route('register') }}">
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="first name">First Name</label>
                        <input type="text" class="form-control" id="first-name" placeholder="first name">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="sur-name">Sur Name</label>
                        <input type="text" class="form-control" id="sur-name" placeholder="sur name">
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="email">
                     </div>
                     <div class="form-group col-md-4">
                        <label for="department">Department</label>
                        <select id="department" class="form-control">
                           <option selected>Choose...</option>
                           <option>...</option>
                        </select>
                     </div>
                     <div class="form-group col-md-2">
                        <label for="role">Role</label>
                        <select id="role" class="form-control">
                           <option selected>Choose...</option>
                           <option>to</option>
                           <option>driver</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="password">Password</label>
                     <input type="text" class="form-control" id="password" placeholder="password">
                  </div>
                  <div class="form-group">
                     <label for="password-confirm">confirm password</label>
                     <input type="text" class="form-control" id="password-confirm" placeholder="confirm password">
                  </div>
                   <div class="form-group">
                      <label for="image-upload">upload image</label>
                      <input type="file" class="form-control-file" id="image-upload">
                     </div>
                  <button type="submit" class="btn btn-primary">Register</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>-->
@endsection