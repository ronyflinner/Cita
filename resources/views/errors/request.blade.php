@if(count($errors) > 0)
	<div class="errors" >
			<div class="alert alert-danger">
				 <h4 class="alert-heading">Uy!!! Debemos revisar lo siguientes items:</h4>
					<button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
					</button>
				<ul>
				@foreach($errors->all() as $error)

						<li><i class="ace-icon fa fa-times"></i>  {{ $error }}</li>

				@endforeach
				</ul>
		</div>
	</div>
@endif