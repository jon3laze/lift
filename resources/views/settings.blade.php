@extends('layouts.app')

@section('title')
lift | settings
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        	<ul class="nav nav-tabs">
			  <li role="presentation" class="active"><a href="#">Users</a></li>
			  <li role="presentation"><a href="#">Roles</a></li>
			  <li role="presentation"><a href="#">Permissions</a></li>
			</ul>
            <div class="well">
            	<ul>
            	@foreach($users as $user)
            		<li> {{ $user->name }} </li>
            	@endforeach
            	</ul>
            </div>
        </div>
    </div>
</div>
@endsection
