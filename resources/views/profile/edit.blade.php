@extends('layouts.app')

@section('title')
lift | profile
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="well">
                {!! Form::model($user, array('route' => array('profile.update', $user->id), 'files' => true, 'class' => 'form-horizontal')) !!}
                {!! method_field('PATCH') !!}

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-5">
                        @foreach($photos as $photo)
                            @if($photo->active)
                                <img src="{{ URL::to('/').$photo->thumb_path }}" class="img-thumbnail pull-left" />
                            @else
                                <img src="{{ URL::to('/').$photo->thumb_path }}" class="img-circle" />
                            @endif

                        @endforeach
                    </div>
                </div>

            	<div class="form-group">
                    @if($photos->count() <= 4)
                        <label class="col-md-4 control-label">Picture</label>
                        <div class="col-md-6">
                		  {!! Form::file('photo') !!}
                        </div>
                    @else
                        <label class="col-md-4 control-label">Picture</label>
                        <div class="col-md-6">
                            <span class="text-danger">Please select from the images above or delete one to upload more.</span>
                        </div>
                    @endif
            	</div>

            	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Name</label>
                    <div class="col-md-6">
            		  {!! Form::text('name', $user->name, ['class' => 'form-control']) !!} 
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">E-Mail Address</label>
                    <div class="col-md-6">
                	   {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Confirm Password</label>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4 control-label">Role:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="{{ $role->label }}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-6 text-muted">
                        <button type="submit" class="btn btn-link btn-sm">
                            <i class="fa fa-floppy-o fa-2x"></i><br><small>save</small>
                        </button>
                        <button type="cancel" class="btn btn-link btn-sm">
                            <i class="fa fa-ban fa-2x"></i><br><small>cancel</small>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
