@extends('layouts.app')

@section('title')
lift | profile
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('profile.index') }}">
                        <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                        profile
                    </a>
                </li>
                <li class="active text-muted">
                    <sub><i class="fa fa-fw fa-ellipsis-h" aria-hidden="true"></i></sub><i class="fa fa-fw fa-pencil" aria-hidden="true"></i>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-4 col-md-offset-4">
                {!! Form::model($user, array('route' => array('profile.update', $user->id), 'files' => true, 'class' => 'form-horizontal')) !!}
                {!! method_field('PATCH') !!}
                <div class="form-group text-center">
                    @if($user->photos->count() < 1) 
                        <img src="/uploads/default.jpg" class="img-circle" />
                    @else
                        <img src="{{ $user->photos()->where('active', 1)->get()[0]->full_path }}" class="img-circle" />
                    @endif
                </div>
                <hr>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-fw fa-camera"></i></div>
                        {!! Form::file('photo', ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-fw fa-user"></i></div>
                        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-fw fa-envelope"></i></div>
                        {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-fw fa-lock"></i></div>
                        <input type="password" class="form-control" placeholder="password" name="password">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-fw fa-lock"></i></div>
                        <input type="password" class="form-control" placeholder="confirm password" name="password_confirmation">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-fw fa-user-secret"></i></div>
                        <input type="text" class="form-control" placeholder="{{ $role->label }}" readonly>
                    </div>
                </div>
                <hr>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success-light btn-lg">
                        <i class="fa fa-fw fa-floppy-o fa-2x"></i><br><small>save</small>
                    </button>  

                    <a class="btn btn-danger-light btn-lg" href="{{ route('profile.index') }}">
                        <i class="fa fa-fw fa-ban fa-2x"></i><br><small>cancel</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <ul class="breadcrumb">
                <li>
                    <a href="{{ route('profile.index') }}">
                        <i class="fa fa-user fa-fw" aria-hidden="true"></i>
                        profile
                    </a>
                </li>
                <li class="active text-muted">
                    <sub><i class="fa fa-fw fa-ellipsis-h" aria-hidden="true"></i></sub><i class="fa fa-fw fa-pencil" aria-hidden="true"></i>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
