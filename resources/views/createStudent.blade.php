@extends('layout')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-5">
			<h1>Add Image</h1>
			<form action="/student/create" enctype="multipart/form-data" method="post">
				{{csrf_field()}}
				<div class="form-control">
					<label for="name">name</label>
					<input type="text" name="name">
					<label for="email">email</label>
					<input type="text" name="email">
					<label for="class_id">class_id</label>
					<input type="number" name="class_id">
				</div>
				
				<button type="submit" class="btn btn-success">Submit</button>
			</form>
		</div>
	</div>
</div>
@endsection