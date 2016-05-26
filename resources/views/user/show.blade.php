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
            <div class="table-responsive col-md-4 col-md-offset-4">
                <table class="table table-condensed table-hover">
                    <tr>
                        <td class="text-center">
                            @if($user->photos->count() < 1) 
                                <img src="/uploads/default.jpg" class="img-circle" />
                            @else
                                <img src="{{ $user->photos()->where('active', 1)->get()[0]->full_path }}" class="img-circle" />
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-lg fa-fw fa-user"></i> {{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-lg fa-fw fa-envelope"></i> {{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted"><i class="fa fa-lg fa-fw fa-user-secret"></i> {{ $role->label }}</td>
                    </tr>
                    <tr>
                        <td class="text-center">
                            <span class="text-muted"><a class="btn btn-link btn-sm" href="{{ route('user.edit', $user->id) }}"><i class="fa fa-pencil fa-2x"></i></a><br><small>edit</small></span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    @include('user.breadcrumb')
</div>
@endsection