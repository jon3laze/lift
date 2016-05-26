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
            <div class="table-responsive">
                {!! Form::model($user, array('route' => array('profile.update', $user->id), 'files' => true, 'class' => 'form-horizontal')) !!}
                {!! method_field('PATCH') !!}
                <table class="table table-condensed table-hover">
                    <tr class="form-group">
                        <td class="text-center" colspan="3">
                            @if($user->photos->count() < 1) 
                                <img src="/uploads/default.jpg" class="img-circle" />
                            @else
                                <img src="{{ $user->photos()->where('active', 1)->get()[0]->full_path }}" class="img-circle" />
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <hr>
                        </td>
                    </tr>
                    <tr class="form-group">
                        <td>picture</td>
                        <td colspan="2">{!! Form::file('photo') !!}</td>
                    </tr>
                    <tr class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <td>name</td>
                        <td colspan="2">{!! Form::text('name', $user->name, ['class' => 'form-control']) !!}</td>
                    </tr>
                    <tr class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <td>email</td>
                        <td colspan="2">{!! Form::email('email', $user->email, ['class' => 'form-control']) !!}</td>
                    </tr>
                    <tr class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <td>password</td>
                        <td colspan="2"><input type="password" class="form-control" name="password"></td>
                    </tr>
                    <tr class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <td>confirm password</td>
                        <td colspan="2"><input type="password" class="form-control" name="password_confirmation"></td>
                    </tr>
                    <tr class="form-group">
                        <td>role</td>
                        <td colspan="2"><input type="text" class="form-control" placeholder="{{ $role->label }}" readonly></td>
                    </tr>
                    <tr>
                        <td>
                            <hr>
                        </td>
                    </tr>
                    <tr class="form-group">
                        <td colspan="3" class="text-center">
                            <button type="submit" class="btn btn-success-light btn-lg">
                                <i class="fa fa-fw fa-floppy-o fa-2x"></i><br><small>save</small>
                            </button>  

                            <a class="btn btn-danger-light btn-lg" href="{{ route('profile.index') }}">
                                <i class="fa fa-fw fa-ban fa-2x"></i><br><small>cancel</small>
                            </a>
                        </td>
                    </tr>
                </table>
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
