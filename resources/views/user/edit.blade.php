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
            <div class="table-responsive col-md-8 col-md-offset-2">
                {!! Form::model($user, array('route' => array('user.update', $user->id), 'files' => true, 'class' => 'form-horizontal')) !!}
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
                    <tr class="form-group">
                        <td></td>
                        <td class="text-center">
                            <a class="btn btn-link btn-sm" href="{{ route('user.show', $user->id) }}">
                                <i class="fa fa-ban fa-2x"></i><br><small>cancel</small>
                            </a>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-link btn-sm">
                                <i class="fa fa-floppy-o fa-2x"></i><br><small>save</small>
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @include('user.breadcrumb')    
</div>
@endsection
