@extends('layouts.app')

@section('title')
lift | settings
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="well center-block">
            	<ul class="nav nav-pills" role="tablist">
    			  <li role="presentation" class="active"><a href="#users" aria-controls="users" role="tab" data-toggle="tab">Users</a></li>
    			  <li role="presentation"><a href="#roles" aria-controls="roles" role="tab" data-toggle="tab">Roles</a></li>
    			  <li role="presentation"><a href="#permissions" aria-controls="permissions" role="tab" data-toggle="tab">Permissions</a></li>
    			</ul>
            </div>
            <div class="well center-block">
                <div class="table-responsive center-block">
                    <div class="center-block tab-content">
                        <!-- USERS -->
                        @can('user_view')
                            <div role="tabpanel" id="users" class="tab-pane fade in active">
                                <ul class="list-group">
                                    @foreach($users as $user)
                                        <li class="list-group-item clearfix">
                                            <i class="fa fa-user fa-fw"></i>
                                            {{ $user->name }}

                                            @can('user_edit')
                                                <button type="button" class="btn btn-default pull-right" data-toggle="tooltip" data-placement="left" title="Edit {{$user->name}}">
                                                    <i class="fa fa-pencil fa-fw" title="Edit" aria-hidden="true"></i>
                                                </button>
                                            @endcan
                                        </li>
                                    @endforeach
                                    @if($users->links())
                                        <li class="list-group-item well clearfix">
                                            {{ $users->links() }}
                                        </li>
                                    @endif
                                    @can('user_create')
                                        <li class="list-group-item clearfix">
                                            <i class="fa fa-user-plus fa-fw"></i>
                                            New User
                                            <button class="btn btn-primary pull-right">
                                                <i class="fa fa-plus fa-fw" title="Add" aria-hidden="true"></i>
                                            </button>
                                        </li>
                                    @endcan
                                </ul>
                                <hr>
                            </div>
                        @endcan
                        <!-- /USERS -->
                        <!-- ROLES -->
                        @can('role_view')
                            <div role="tabpanel" id="roles" class="tab-pane fade">
                                <ul class="list-group">
                                    @foreach($roles as $role)
                                        <li class="list-group-item clearfix">
                                            <i class="fa fa-user-secret fa-fw"></i>
                                            {{ $role->name }}

                                            @can('role_edit')
                                                <button class="btn btn-default pull-right">
                                                    <i class="fa fa-pencil fa-fw" title="Edit" aria-hidden="true"></i>
                                                </button>
                                            @endcan
                                        </li>
                                    @endforeach
                                    @if($roles->links())
                                        <li class="list-group-item well clearfix">
                                            {{ $roles->links() }}
                                        </li>
                                    @endif
                                    @can('role_create')
                                        <li class="list-group-item clearfix">
                                            <i class="fa fa-user-secret fa-fw"></i>
                                            New Role
                                            <button class="btn btn-primary pull-right">
                                                <i class="fa fa-plus fa-fw" title="Add" aria-hidden="true"></i>
                                            </button>
                                        </li>
                                    @endcan
                                </ul>
                                <hr>
                            </div>
                        @endcan
                        <!-- /ROLES -->
                        <!-- PERMISSIONS -->
                        @can('permission_view')
                            <div role="tabpanel" id="permissions" class="tab-pane fade">
                                 <ul class="list-group">
                                    @foreach($permissions as $permission)
                                        @if(explode('_', $permission->name)[1] == 'create')
                                            <li class="list-group-item clearfix list-group-item-success">
                                        @elseif(explode('_', $permission->name)[1] == 'delete')
                                            <li class="list-group-item clearfix list-group-item-danger">
                                        @elseif(explode('_', $permission->name)[1] == 'edit')
                                            <li class="list-group-item clearfix list-group-item-warning">
                                        @else
                                            <li class="list-group-item clearfix list-group-item-info">
                                        @endif
                                            <i class="fa fa-lock fa-fw"></i>
                                            {{ $permission->name }}

                                            @can('permission_edit')
                                                <button class="btn btn-default pull-right">
                                                    <i class="fa fa-pencil fa-fw" title="Edit" aria-hidden="true"></i>
                                                </button>
                                            @endcan
                                        </li>
                                    @endforeach
                                    @if($permissions->links())
                                        <li class="list-group-item well clearfix">
                                            {{ $permissions->links() }}
                                        </li>
                                    @endif
                                    @can('permission_create')
                                        <li class="list-group-item clearfix">
                                            <i class="fa fa-lock fa-fw"></i>
                                            New Permission
                                            <button class="btn btn-primary pull-right">
                                                <i class="fa fa-plus fa-fw" title="Add" aria-hidden="true"></i>
                                            </button>
                                        </li>
                                    @endcan
                                </ul>
                                <hr>
                            </div>
                        @endcan
                        <!-- /PERMISSIONS -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
