@extends('layouts.app')

@section('title')
lift | settings
@endsection

@section('content')
<div class="container">
    @include('search')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <a href="{{ route('user.index') }}">
                            <i class="fa fa-fw fa-users"></i>users
                        </a>
                    </div>
                    <div class="panel-body">
                        @foreach($users as $user)
                            <div class="row tb-hover">
                                <a href="{{ route('user.show', $user->id) }}">
                                    <img src="{{ $user->photos()->where('active', 1)->get()[0]->thumb_path }}" class="img-circle img-small" />
                                    {{ str_limit($user->name, 15) }}
                                    <span class="label label-primary tb-label pull-right">{{ $user->roles()->get()[0]->name }}</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="panel-footer text-right">
                        <a href="{{ route('user.index') }}">
                            <span class="small">
                                <i class="fa fa-fw fa-users"></i> view all users
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <a href="{{ route('role.index') }}">
                            <i class="fa fa-fw fa-user-secret"></i>roles
                        </a>
                    </div>
                    <div class="panel-body">
                        @foreach($roles as $role)
                            <div class="row tb-hover">
                                <a href="{{ route('role.show', $role->id) }}">
                                    <i class="fa fa-lg fa-fw fa-user-secret"></i>
                                    {{ $role->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="panel-footer text-right">
                        <a href="{{ route('role.index') }}">
                            <span class="small">
                                <i class="fa fa-fw fa-user-secret"></i> view all roles
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <a href="{{ route('permission.index') }}">
                            <i class="fa fa-fw fa-lock"></i>permissions
                        </a>
                    </div>
                    <div class="panel-body">
                        @foreach($permissions as $permission)
                            <div class="row tb-hover">
                                <a href="permission/{{ $permission->id }}">
                                    <i class="fa fa-lg fa-fw fa-lock"></i>
                                    {{ $permission->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="panel-footer text-right">
                        <a href="{{ route('permission.index') }}">
                            <span class="small">
                                <i class="fa fa-fw fa-lock"></i> view all permissions
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
