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
            <div class="well center-block">
                <div class="table-responsive center-block">
                    @foreach($users as $user)
                        <span>
                            <i class="fa fa-user fa-fw"></i>
                            {{ $user->name }}
                            @can('user_edit')
                                    <a class="btn btn-default" href="#">
                                        <i class="fa fa-pencil" title="Edit" aria-hidden="true"></i>
                                        <span class="sr-only">Edit</span>
                                    </a>
                            @endcan
                        </span>
                    @endforeach
                    <hr>
                    @can('user_create')
                        <span>
                            <a class="btn btn-default" href="#">
                                <i class="fa fa-plus" title="Add User" aria-hidden="true"></i>
                                <span class="sr-only">Add User</span>
                            </a>
                        </span>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
