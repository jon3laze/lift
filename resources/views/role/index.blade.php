@extends('layouts.app')

@section('title')
lift | roles
@endsection

@section('content')
<div class="container">
    @include('role.search')
    @include('role.breadcrumb')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if($roles->isEmpty())
                <div class="row">
                        <div class="col-md-10 col-md-offset-1">  
                            <blockquote>No roles found.</blockquote>
                        </div>
                </div>
            @else
                @foreach($roles as $role) 
                    <div class="row tb-hover">
                        <a href="{{ route('role.show', $role->id) }}">
                            <div class="col-md-1 col-md-offset-1">
        						<i class="fa fa-lg fa-fw fa-user-secret"></i>
        					</div>
        					<div class="col-md-8">	
        						<h5>{{ $role->label }}</h5>
        					</div>
                            <div class="col-md-2 text-right">
                                @foreach($role->permissions()->orderBy('module_id', 'asc')->get()->unique('module_id') as $module)
                                    <i class="fa fa-fw {{ $module->module()->get()[0]->icon }}"></i>
                                @endforeach
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
            @if($roles->links())
            	<div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
            		  {{ $roles->render() }}
                    </div>
            	</div>
			@endif
        </div>
    </div>
    @include('role.breadcrumb')
</div>
@endsection