@extends('layouts.app')

@section('title')
lift | profile
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="table-responsive col-md-4 col-md-offset-4">
                <table class="table table-condensed table-hover">
                    <tr>
                        <td class="text-center" colspan="2">
                            @if($user->photos->count() < 1) 
                                <img src="/uploads/default.jpg" class="img-circle" />
                            @else
                                <img src="{{ $user->photos()->where('active', 1)->get()[0]->full_path }}" class="img-circle" />
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-lg fa-fw fa-user"></i></td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-lg fa-fw fa-envelope"></i></td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td class="text-muted"><i class="fa fa-lg fa-fw fa-user-secret"></i></td>
                        <td>{{ $role->label }}</td>
                    </tr>
                    <tr>
                        <td class="text-center" colspan="2">
                            <span class="text-muted"><a class="btn btn-primary-light btn-lg" href="{{ route('profile.edit', $user->id) }}"><i class="fa fa-fw fa-pencil fa-2x"></i></a><br><small>edit</small></span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
