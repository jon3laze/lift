<!-- Breadcrumbs -->
<div class="row">
    <div class="col-md-10 col-md-offset-1">
		<ul class="breadcrumb">
		    <li class="{{ Request::path() == '/settings' ? 'active' : '' }}">
		        <a href="{{ route('settings') }}">
		            <i class="fa fa-cog fa-fw" aria-hidden="true"></i>
		            settings
		        </a>
		    </li>
		    @if(Request::is('user*'))
		    <li class="{{ Request::path() == 'user' ? 'active text-muted' : '' }}">
		        @if(Request::path() == 'user')
		        	<i class="fa fa-users fa-fw" aria-hidden="true"></i>
			    	users
			    @else
			    	<a href="{{ route('user.index') }}">
			            <i class="fa fa-users fa-fw" aria-hidden="true"></i>
			            users
			        </a>
			    @endif
		    </li>
		    @endif
		    @if(Request::is('user/*'))
			    <li class="{{ Request::is('user/*/*') ? '' : 'active text-muted' }}">
			    	@if(Request::is('user/*/*'))
			    		<a href="{{ route('user.show', $user->id) }}">
			        		<i class="fa fa-user fa-fw" aria-hidden="true"></i>
			        		{{ $user->name }}
			        	</a>
			        @else
			        	<i class="fa fa-user fa-fw" aria-hidden="true"></i>
			        	{{ $user->name }}
			        @endif
			    </li>
			@endif
			@if(Request::is('user/*/edit'))
				<li class="active text-muted">
					<sub>
						<i class="fa fa-fw fa-ellipsis-h" aria-hidden="true"></i>
					</sub>
					<i class="fa fa-fw fa-pencil" aria-hidden="true"></i>
				</li>
			@endif
		</ul>
	</div>
</div>
<!-- /Breadcrumbs -->