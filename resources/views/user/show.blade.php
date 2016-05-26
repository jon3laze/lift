@extends('layouts.app')

@section('title')
lift | {{ $user->name }}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('user.search')
            @include('user.breadcrumb')
            <div class="well text-center">
				<p>
                    @if($user->photos->count() < 1) 
                        <img src="/uploads/default.jpg" class="img-circle" />
                    @else
                        <img src="{{ $user->photos()->where('active', 1)->get()[0]->full_path }}" class="img-circle" />
                    @endif
            	</p>
                <hr>
            	<div>
            		<p>{{ $user->name }}</p> 
                </div>
                <hr>
                <div>
                	<p>{{ $user->email }}</p>
                </div>
                <hr>
                <div>
                	<p class="text-muted">{{ $role->label }}</p>
                </div>
                <hr>
                <div>
                	<span class="text-muted"><a class="btn btn-link btn-sm" href="{{ route('user.edit', $user->id) }}"><i class="fa fa-pencil fa-2x"></i></a><br><small>edit</small></span>
                </div>
            </div>
            @include('user.breadcrumb')
        </div>
    </div>
</div>
@endsection