@extends('layouts.app')

@section('title')
lift | {{ $role->name }}
@endsection

@section('content')
<div class="container">
    @include('role.search')
    @include('role.breadcrumb')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">    
            <div class="col-md-4 col-md-offset-4">
                {!! Form::model($role, 
                    array('route' => 
                        array('role.update', $role->id), 
                        'files' => true, 
                        'class' => 'form-horizontal'
                    )) !!}
                {!! method_field('PATCH') !!}
                <div class="form-group text-center">
                    <i class="fa fa-lg fa-fw fa-5x fa-user-secret"></i>
                </div>
                <hr>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lg fa-fw fa-user-secret"></i></div>
                        {!! Form::text('name', $role->name, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('label') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lg fa-fw fa-tag"></i></div>
                        {!! Form::text('label', $role->label, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <hr>
                <h4>permissions</h4>
                <hr>
                <div class="form-group">
                	<div class="input-group">
	                	@foreach($permissions->unique('module_id') as $module)
	                		<ul class="fa-ul">
	                			<li>
	                				<i class="fa fa-li {{ $module->module()->get()[0]->icon }}"></i>
	                				{{ $module->module()->get()[0]->name }}
	                				<ul class="fa-ul">
		                				@foreach($permissions->where('module_id', $module->module_id) as $permission)
		                					<li>
		                						@if($role->permissions()->where('id', $permission->id)->get()->isEmpty())
		                							{!! Form::checkbox('permissions[]', $permission->id) !!}
		                						@else
		                							{!! Form::checkbox('permissions[]', $permission->id, true) !!}
		                						@endif
		                						<i class="fa fa-li {{ $permission->icon }}"></i>
		                						{{ $permission->name }}
		                					</li>
		                				@endforeach
	                				</ul>
	                			</li>
	                		</ul>
	                	@endforeach
                	</div>
                </div>
                <hr>
                <div class="form-group text-center">
                    <button type="submit" class="btn thumbton-success btn-lg">
                        <i class="fa fa-floppy-o fa-fw fa-2x"></i><br><small>save</small>
                    </button>

                    <a class="btn thumbton-danger btn-lg" href="{{ route('role.show', $role->id) }}">
                        <i class="fa fa-ban fa-fw fa-2x"></i><br><small>cancel</small>
                    </a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @include('role.breadcrumb')    
</div>
@endsection