@extends('layouts.app')

@section('content')
	<div class="container">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Oh snap!</strong>
                    {{ $error }}
                </div>
            @endforeach
        @endif
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Add New Student</h3>
			</div>
			<div class="panel-body">


<form class="form-horizontal" method="POST" action="{{ route('update', $student->id) }}">
    {{ csrf_field() }}
    <fieldset>
        <div class="form-group">
            <label for="firstName" class="col-md-2 control-label">First Name</label>
            <div class="col-md-10">
                <input type="text" value="{{ $student->first_name }}" class="form-control" id="firstName" name="firstName" placeholder="Your first name"/>
          </div>
        </div>

        <div class="form-group">
            <label for="lastName" class="col-md-2 control-label">Last Name</label>
            <div class="col-md-10">
                <input type="text" value="{{ $student->last_name }}" class="form-control" id="lastName" name="lastName" placeholder="Your last name"/>
          </div>
        </div>
        
        <div class="form-group">
            <label for="email" class="col-md-2 control-label">Email</label>
            <div class="col-md-10">
                <input type="email" value="{{ $student->email }}" class="form-control" id="email" name="email" placeholder="Your email"/>
          </div>
        </div>
        
        <div class="form-group">
            <label for="phoneNumber" class="col-md-2 control-label">Phone number</label>
            <div class="col-md-10">
                <input type="text" value="{{ $student->phone }}" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Your phone number"/>
          </div>
        </div>
        
        
        <div class="form-group">
            <div class="col-md-10 col-md-offset-2">
                <button type="button" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </fieldset>
</form>


			</div>
		</div>
	</div>
@endsection()