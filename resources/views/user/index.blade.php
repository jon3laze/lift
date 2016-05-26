@extends('layouts.app')

@section('title')
lift | users
@endsection

@section('content')
<div class="container">
    @include('user.search')
    @include('user.breadcrumb')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        	<div class="table-responsive">
                <table class="table table-condensed table-hover">
                    @foreach($users as $user) 
                        <tr>
                            <td>
                            	@if($user->photos->count() < 1) 
									<i class="fa fa-lg fa-fw fa-user"></i>
								@else
									<img src="{{ $user->photos()->where('active', 1)->get()[0]->thumb_path }}" class="img-circle img-small" />
								@endif
							</td>
							<td>
								<a href="{{ route('user.show', $user->id) }}">	
									{{ $user->name }}
								</a>
							</td>
                            <td>
                            	<span class="label label-primary pull-right">{{ $user->roles()->get()[0]->label }}</span>
                            </td>
                        </tr>
                    @endforeach
                    @if($users->links())
                    	<tr>
                    		<td colspan="3">
                    			{{ $users->render() }}
                    		</td>
                    	</tr>
					@endif
                </table>
            </div>
        </div>
    </div>
    @include('user.breadcrumb')
</div>
@endsection