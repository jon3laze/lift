@extends('layouts.app')

@section('title')
lift | settings
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('search')
            <div class="col-md-4 table-responsive">
                <table class="table table-condensed table-hover">
                    <tr>
                        <th colspan="2">
                            <a href="{{ route('user.index') }}" class="btn btn-link btn-lg btn-block">
                                <i class="fa fa-2x fa-fw fa-users"></i><br>users
                            </a>
                        </th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td><img src="{{ $user->photos()->where('active', 1)->get()[0]->thumb_path }}" class="img-circle img-small" /></td>
                            <td>{{ $user->name }}</a></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" class="text-right"><a href="{{ route('user.index') }}"><small><br><i class="fa fa-fw fa-users"></i> view all users</small></a></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4 table-responsive">
                <table class="table table-condensed table-hover">
                    <tr>
                        <th colspan="2">
                            <a href="#role" class="btn btn-link btn-lg btn-block">
                                <i class="fa fa-2x fa-fw fa-user-secret"></i><br>roles
                            </a>
                        </th>
                    </tr>
                    @foreach($roles as $role)
                        <tr>
                            <td><i class="fa fa-lg fa-fw fa-user-secret"></i></td>
                            <td><a href="role/{{ $role->id }}">{{ $role->name }}</a></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" class="text-right"><a href="#roles"><small><br><i class="fa fa-fw fa-user-secret"></i> view all roles</small></a></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-4 table-responsive">
                <table class="table table-condensed table-hover">
                    <tr>
                        <th colspan="2">
                            <a href="#permission" class="btn btn-link btn-lg btn-block">
                                <i class="fa fa-2x fa-fw fa-lock"></i><br>permissions
                            </a>
                        </th>
                    </tr>
                    @foreach($permissions as $permission)
                        <tr>
                            <td><i class="fa fa-lg fa-fw fa-lock"></i></td>
                            <td><a href="permission/{{ $permission->id }}">{{ $permission->name }}</a></td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2" class="text-right"><a href="#permissions"><small><br><i class="fa fa-fw fa-lock"></i> view all permissions</small></a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
