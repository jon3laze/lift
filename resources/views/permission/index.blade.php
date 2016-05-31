@extends('layouts.app')

@section('title')
lift | permissions
@endsection

@section('content')
<div class="container">
    @include('permission.search')
    @include('permission.breadcrumb')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if($permissions->isEmpty())
                <div class="row">
                        <div class="col-md-10 col-md-offset-1">  
                            <blockquote>No permissions found.</blockquote>
                        </div>
                </div>
            @else
                @foreach($permissions as $permission) 
                    <div class="row tb-hover">
                        <a href="{{ route('permission.show', $permission->id) }}">
                            <div class="col-md-1 col-md-offset-1">
        						<i class="fa fa-lg fa-fw fa-lock"></i>
        					</div>
        					<div class="col-md-8">	
        						<h5>{{ $permission->name }}</h5>
        					</div>
                            <div class="col-md-2 text-right">
                                <span class="label label-primary tb-label">{{ $permission->label }}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endif
            @if($permissions->links())
            	<div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
            		  {{ $permissions->render() }}
                    </div>
            	</div>
			@endif
        </div>
    </div>
    @include('permission.breadcrumb')
</div>
@endsection