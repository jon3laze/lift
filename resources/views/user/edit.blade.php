@extends('layouts.app')

@section('title')
lift | {{ $user->name }}
@endsection

@section('content')
<div class="container">
    @include('user.search')
    @include('user.breadcrumb')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">    
            <div class="col-md-4 col-md-offset-4">
                {!! Form::model($user, array('route' => array('user.update', $user->id), 'files' => true, 'class' => 'form-horizontal')) !!}
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
                        <div class="input-group-addon"><i class="fa fa-lg fa-fw fa-camera"></i></div>
                        {!! Form::file('photo', ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lg fa-fw fa-user"></i></div>
                        {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lg fa-fw fa-envelope"></i></div>
                        {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lg fa-fw fa-lock"></i></div>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lg fa-fw fa-lock"></i></div>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lg fa-fw fa-user-secret"></i></div>
                        {!! Form::select('role', $roles, $user->roles()->get()[0]->id, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <hr>
                <div class="form-group text-center">
                    <button type="submit" class="btn thumbton-success btn-lg">
                        <i class="fa fa-floppy-o fa-fw fa-2x"></i><br><small>save</small>
                    </button>

                    <a class="btn thumbton-danger btn-lg" href="{{ route('user.show', $user->id) }}">
                        <i class="fa fa-ban fa-fw fa-2x"></i><br><small>cancel</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('user.breadcrumb')    
</div>
@endsection
