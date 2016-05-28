@extends('layouts.app')

@section('title')
lift | users
@endsection

@section('content')
<div class="container">
    @include('user.search')
    @include('user.breadcrumb')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @foreach($users as $user) 
                <div class="row tb-hover">
                    <a href="{{ route('user.show', $user->id) }}">
                        <div class="col-md-1 col-md-offset-1">
                        	@if($user->photos->count() < 1) 
    							<i class="fa fa-lg fa-fw fa-user"></i>
    						@else
    							<img src="{{ $user->photos()->where('active', 1)->get()[0]->thumb_path }}" class="img-circle img-small" />
    						@endif
    					</div>
    					<div class="col-md-8">	
    						{{ $user->name }}
    					</div>
                        <div class="col-md-2 text-right">
                            <span class="label label-primary tb-label">{{ $user->roles()->get()[0]->name }}</span>
                        </div>
                    </a>
                </div>
            @endforeach
            @if($users->links())
            	<div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
            		  {{ $users->render() }}
                    </div>
            	</div>
			@endif
        </div>
    </div>
    @include('user.breadcrumb')
</div>
@endsection