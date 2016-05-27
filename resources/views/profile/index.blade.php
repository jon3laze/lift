@extends('layouts.app')

@section('title')
lift | profile
@endsection

@section('content')
<div class="container">
    @include('profile.breadcrumb')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-4 col-md-offset-4">
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
                        <div class="input-group-addon"><i class="fa fa-lg fa-fw fa-user"></i></div>
                        <div class="form-control" readonly>{{ $user->name }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lg fa-fw fa-envelope"></i></div>
                        <div class="form-control" readonly>{{ $user->email }}</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-lg fa-fw fa-user-secret"></i></div>
                        <div class="form-control" readonly>{{  $user->roles()->get()[0]->label }}</div>
                    </div>
                </div>
                <hr>
                <div class="form-group text-center">
                    <a class="btn thumbton-primary btn-lg" href="{{ route('profile.edit', $user->id) }}">
                        <i class="fa fa-fw fa-pencil fa-2x"></i>
                        <br><small>edit</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('profile.breadcrumb')
</div>
@endsection
