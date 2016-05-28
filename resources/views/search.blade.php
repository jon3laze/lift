<!-- Universal Search -->
<div class="row">
    <div class="col-md-10 col-md-offset-1">
    {!! Form::open([ 'route' => 'settings.search', 'method' => 'GET']) !!}
	    <div class="input-group form-group-lg">
	        <span class="input-group-addon"><i class="fa fa-lg fa-fw fa-cogs"></i></span>
	        {!! Form::input('search', 's', null, ['class' => 'form-control', 'placeholder' => 'settings search' ]) !!}
	    </div>
		<hr>
	{!! Form::close() !!}
	</div>
</div>
<!-- /Universal Search -->