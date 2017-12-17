@if (count($errors))
	<div class="row">
		<div class="col s12 m3 offset-m9">
			<ul class="collection">
				@foreach ($errors->all() as $error)
		            <li class="collection-item red-text">* {{ $error }}</li>
		        @endforeach
			</ul>
		</div>
	</div>
@endif
