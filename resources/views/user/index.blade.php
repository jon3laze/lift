@extends('layouts.app')

@section('title')
lift | users
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="well">
            	<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
					<input type="text" class="form-control" placeholder="user search">
				</div>
				<hr>
				<ul class="fa-ul">
					@foreach($users as $user) 
						<li><a href="{{ route('user.show', $user->id) }}"><i class="fa fa-fw fa-user"></i>{{ $user->name }}</a></li>
					@endforeach
					@if($users->links())
						<li> {{ $users->render() }} </li>
					@endif
				</ul>

            </div>
        </div>
    </div>
</div>
@endsection