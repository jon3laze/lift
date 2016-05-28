<!-- User Search -->
<div class="row">
    <div class="col-md-10 col-md-offset-1">
    {!! Form::open([ 'route' => 'user.search', 'method' => 'GET']) !!}
	    <div class="input-group form-group-lg">
	        <span class="input-group-addon"><i class="fa fa-lg fa-fw fa-user"></i></span>
	        {!! Form::input('search', 'u', null, ['class' => 'form-control', 'placeholder' => 'user search']) !!}
	    </div>
		<hr>
	{!! Form::close() !!}
	</div>
</div>
<!-- /User Search -->