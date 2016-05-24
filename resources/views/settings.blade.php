@extends('layouts.app')

@section('title')
lift | settings
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-4 well">
                <a href="{{ route('user.index') }}" class="btn btn-link btn-lg btn-block">
                    <i class="fa fa-fw fa-user"></i><br>users
                </a>
                <hr>
                <ul class="fa-ul">
                    @foreach($users as $user)
                        <li><a href="user/{{ $user->id }}"><i class="fa fa-fw fa-user"></i> {{ $user->name }}</a></li>
                    @endforeach
                    <hr>
                    <li class="pull-right"><a href="{{ route('user.index') }}"><small><i class="fa fa-fw fa-users"></i> view all users</small></a></li>
                </ul>
            </div>
            <div class="col-md-4 well">
                <button type="button" class="btn btn-link btn-lg btn-block">
                    <i class="fa fa-fw fa-user-secret"></i><br>roles
                </button>
                <hr>
                <ul class="fa-ul">
                    @foreach($roles as $role)
                        <li><a href="role/{{ $role->id }}"><i class="fa fa-fw fa-user-secret"></i> {{ $role->name }}</a></li>
                    @endforeach
                    <li>&nbsp;</li>
                    <hr>
                    <li class="pull-right"><a href="role/"><small><i class="fa fa-fw fa-users"></i> view all roles</small></a></li>
                </ul>
            </div>
            <div class="col-md-4 well">
                <button type="button" class="btn btn-link btn-lg btn-block">
                    <i class="fa fa-fw fa-lock"></i><br>permissions
                </button>
                <hr>
                <ul class="fa-ul">
                    @foreach($permissions as $permission)
                        <li><a href="permission/{{ $permission->id }}"><i class="fa fa-fw fa-lock"></i> {{ $permission->name }}</a></li>
                    @endforeach
                    <hr>
                    <li class="pull-right"><a href="permission/"><small><i class="fa fa-fw fa-lock"></i> view all permisions</small></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
