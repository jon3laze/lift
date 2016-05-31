<!-- Permission Search -->
<div class="row">
    <div class="col-md-10 col-md-offset-1">
    {!! Form::open([ 'route' => 'permission.search', 'method' => 'GET']) !!}
	    <div class="input-group form-group-lg">
	        <span class="input-group-addon"><i class="fa fa-lg fa-fw fa-lock"></i></span>
	        {!! Form::input('search', 'p', null, ['class' => 'form-control', 'placeholder' => 'permission search' ]) !!}
	    </div>
		<hr>
	{!! Form::close() !!}
	</div>
</div>
<!-- /Permission Search -->