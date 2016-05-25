@extends('layouts.app')

@section('title')
lift | users
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="well">
            	<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-fw fa-user"></i></span>
					<input type="text" class="form-control" placeholder="user search">
				</div>
				<hr>
				<ul class="fa-ul">
					@foreach($users as $user) 
						<li>
							<a href="{{ route('user.show', $user->id) }}">
								@if($user->photos->count() < 1) 
									<img src="/uploads/default_thumbnail.jpg" class="img-circle img-small" />
								@else
									<img src="{{ $user->photos()->where('active', 1)->get()[0]->thumb_path }}" class="img-circle img-small" />
								@endif
								{{ $user->name }}
								<span class="label label-primary pull-right"> {{ $user->roles()->get()[0]->label }} </span>
							</a>
						</li>
					@endforeach
					@if($users->links())
						<li> {{ $users->render() }} </li>
					@endif
				</ul>

            </div>
        </div>
    </div>
</div>
@endsection