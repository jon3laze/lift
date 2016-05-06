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
                    <div class="center-block">
                        @can('user_view')
                            <ul class="list-group">
                                @foreach($users as $user)
                                    <li class="list-group-item clearfix">
                                        <i class="fa fa-user fa-fw"></i>
                                        {{ $user->name }}

                                        @can('user_edit')
                                            <button class="btn btn-default pull-right" href="#">
                                                <i class="fa fa-pencil fa-fw" title="Edit" aria-hidden="true"></i>
                                            </button>
                                        @endcan
                                    </li>
                                @endforeach
                                <li class="list-group-item well clearfix">
                                    <i class="fa fa-user-plus fa-fw"></i>
                                    New User

                                    @can('user_create')
                                        <button class="btn btn-default pull-right" href="#">
                                            <i class="fa fa-plus fa-fw" title="Add" aria-hidden="true"></i>
                                        </button>
                                    @endcan
                                </li>
                            </ul>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
