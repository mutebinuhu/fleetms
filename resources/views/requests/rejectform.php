	  	<!-- reject/approve repair request -->
						
                  				
							  		  
  									 @if($show->status == 1)
  									  <div class="form-group">
										  <button class="btn btn-success">Repair Request Approved</button>
										  <a href="{{'#'}}" class="btn btn-info">Download</a>
										</div>
									</div>
  									 @else
  									 <div class="form-group">
    									<div class="form-check form-check-inline">
										  <input class="form-check-input" type="radio" name="status" id="status" value="1" onclick="this.form.submit()">
										  <label class="form-check-label text-success" for="status">Approve</label>
										</div>
										<div class="form-check form-check-inline">
										  <input class="form-check-input reject" type="radio" name="status" id="status" value="2">
										  <label class="form-check-label text-danger" for="status">Reject</label>
										</div>
										<div class="form-group reject-section" style="display: none">
										 <label for="email" class="">Reason:</label>
    										<textarea class="form-control @error('description') is-invalid @enderror" id="Textarea1" rows="3" name="reason" placeholder="write something"></textarea> 
			                                @error('reason')
			                                    <span class="invalid-feedback" role="alert">
			                                        <strong>{{ $message }}</strong>
			                                    </span>
			                                @enderror
			                                <input type="hidden" name="status_by" value="{{Auth::id()}}">
                            			<button class="btn btn-danger my-2">Submit</button>

                            			</div>
  									 </div>
  									 </div>

  									 @endif
<!-- form -->						  	</form>
<form action="{{route('requests.update', $show->id)}}" method="POST">
	{{ method_field('PATCH')}}
	@csrf
	<div class="form-group">
		<textarea class="form-control" id="Textarea1" rows="3" readonly="">{{$show->description}}</textarea>
	</div>
	 @if($show->status == 1)
	 <div class="form-group">
	 	<button class="btn btn-success">Repair Request Approved</button>
	 	<a href="{{'#'}}" class="btn btn-info">Download</a>
	</div>
	 @else
	 <div class="form-group">
		<div class="form-check form-check-inline">
		  <input class="form-check-input" type="radio" name="status" id="status" value="1" onclick="this.form.submit()">
		  <label class="form-check-label text-success" for="status">Approve</label>
	   </div>
		<div class="form-check form-check-inline">
		  <input class="form-check-input reject" type="radio" name="status" id="status" value="2">
		  <label class="form-check-label text-danger" for="status">Reject</label>
		</div>
		<div class="form-group reject-section" style="display: none">
		 	<label for="email" class="">Reason:</label>
		 	<textarea class="form-control @error('description') is-invalid @enderror" id="Textarea1" rows="3" name="reason" placeholder="write something"></textarea> 
            @error('reason')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="hidden" name="status_by" value="{{Auth::id()}}">
		<button class="btn btn-danger my-2">Submit</button>
		</div>
  </div>
  @endif
</form>
<!-- /form -->
