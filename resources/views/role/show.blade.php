@extends('layouts.app')

@section('title')
lift | {{ $role->name }}
@endsection

@section('content')
<div class="container">
    @include('role.search')
    @include('role.breadcrumb')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-4 col-md-offset-4">
                <div class="form-group text-center">
                    <i class="fa fa-lg fa-fw fa-5x fa-user-secret"></i>
                </div>
                <hr>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lg fa-fw fa-user-secret"></i></div>
                        <div class="form-control" readonly>{{ $role->name }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lg fa-fw fa-tag"></i></div>
                        <div class="form-control" readonly>{{ $role->label }}</div>
                    </div>
                </div>
                <hr>
                <h4>permissions</h4>
                <hr>
                @if($role->permissions()->get()->isEmpty())
                    <blockquote>No permissions defined</blockquote>
                @else
                    @foreach($role->permissions()->get()->unique('module_id') as $module)
                        <ul class="fa-ul">
                            <li>
                                <i class="fa fa-li {{ $module->module()->get()[0]->icon }}"></i>
                                {{ $module->module()->get()[0]->name }}
                                <ul class="fa-ul">
                                    @foreach($role->permissions()->where('module_id', $module->module_id)->get() as $permission)
                                        <li>
                                            <i class="fa fa-li {{ $permission->icon }}"></i>
                                            {{ $permission->name }}
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    @endforeach
                @endif
                <hr>
                <div class="form-group text-center">
                    <a class="btn thumbton-primary btn-lg" href="{{ route('role.edit', $role->id) }}">
                        <i class="fa fa-fw fa-pencil fa-2x"></i>
                        <br><small>edit</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('role.breadcrumb')
</div>
@endsection