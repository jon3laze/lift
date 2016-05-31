<!-- Role Search -->
<div class="row">
    <div class="col-md-10 col-md-offset-1">
    {!! Form::open([ 'route' => 'role.search', 'method' => 'GET']) !!}
	    <div class="input-group form-group-lg">
	        <span class="input-group-addon"><i class="fa fa-lg fa-fw fa-user-secret"></i></span>
	        {!! Form::input('search', 'r', null, ['class' => 'form-control', 'placeholder' => 'role search' ]) !!}
	    </div>
		<hr>
	{!! Form::close() !!}
	</div>
</div>
<!-- /Role Search -->