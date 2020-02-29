@extends('layouts.application')
@section('content')
	@section('sidebar')
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	@endsection
	@section('info')
		
		<form method="POST" action="" autocomplete="off" >
				  @csrf
                  @method('PATCH')

                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="first name">First Name</label>
                        <input type="text" name="first_name" class="form-control" id="first-name" placeholder="first name" autofocus value="{{$user->first_name}}" readonly="">
                     </div>
                     <div class="form-group col-md-6">
                        <label for="sur name">Sur Name</label>
                         <input type="text" name="sur_name" class="form-control" id="sur-name" placeholder="sur name" value="{{$user->sur_name}}" readonly="">
                     </div>
                  </div>
                  <div class="form-row">
                     <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="email" value="{{$user->email}}" readonly="">
                     </div>
                        <div class="form-group col-md-6">
                         <label for="inputState">Role</label>
      						<select id="inputState" name="role" class="form-control @error('role') is-invalid @enderror " >
        						<option selected>{{$user->role}}</option>
        						<option >ot</option>
        						<option >driver</option>
        						<option >admin</option>
        						<option >default</option>
        					</select>
        					@error('role')
        						<span class="invalid-feedback" role="alert">
        							<strong>{{$message}}</strong>
        						</span>
        					@enderror

        				</div>

                  </div>
                  	<button type="submit" name="submit" class="btn btn-primary">submit</button>

               </form>


	@endsection

@endsection