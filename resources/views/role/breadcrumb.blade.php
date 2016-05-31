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
		    @if(Request::is('role*'))
		    <li class="{{ Request::path() == 'role' ? 'active text-muted' : '' }}">
		        @if(Request::path() == 'role')
		        	<i class="fa fa-user-secret fa-fw" aria-hidden="true"></i>
			    	roles
			    @else
			    	<a href="{{ route('role.index') }}">
			            <i class="fa fa-user-secret fa-fw" aria-hidden="true"></i>
			            roles
			        </a>
			    @endif
		    </li>
		    @endif
		    @if(Request::is('role/*'))
			    <li class="{{ Request::is('role/*/*') ? '' : 'active text-muted' }}">
			    @if(isset($role))
			    	@if(Request::is('role/*/*'))
			    		<a href="{{ route('role.show', $role->id) }}">
			        		<i class="fa fa-user-secret fa-fw" aria-hidden="true"></i>
			        		{{ $role->name }}
			        	</a>
			        @else
			        	<i class="fa fa-user-secret fa-fw" aria-hidden="true"></i>
			        	{{ $role->name }}
			        @endif
			    @endif
			    </li>
			@endif
			@if(Request::is('role/*/edit'))
				<li class="active text-muted">
					<i class="fa fa-fw fa-pencil fa-flip-horizontal" aria-hidden="true"></i><sub>...</sub>
				</li>
			@endif
		</ul>
	</div>
</div>
<!-- /Breadcrumbs -->