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
		    @if(Request::is('permission*'))
		    <li class="{{ Request::path() == 'permission' ? 'active text-muted' : '' }}">
		        @if(Request::path() == 'permission')
		        	<i class="fa fa-lock fa-fw" aria-hidden="true"></i>
			    	permissions
			    @else
			    	<a href="{{ route('permission.index') }}">
			            <i class="fa fa-lock fa-fw" aria-hidden="true"></i>
			            permissions
			        </a>
			    @endif
		    </li>
		    @endif
		    @if(Request::is('permission/*'))
			    <li class="{{ Request::is('permission/*/*') ? '' : 'active text-muted' }}">
			    @if(isset($permission))
			    	@if(Request::is('permission/*/*'))
			    		<a href="{{ route('permission.show', $permission->id) }}">
			        		<i class="fa fa-lock fa-fw" aria-hidden="true"></i>
			        		{{ $permission->name }}
			        	</a>
			        @else
			        	<i class="fa fa-lock fa-fw" aria-hidden="true"></i>
			        	{{ $permission->name }}
			        @endif
			    @endif
			    </li>
			@endif
			@if(Request::is('permission/*/edit'))
				<li class="active text-muted">
					<i class="fa fa-fw fa-pencil fa-flip-horizontal" aria-hidden="true"></i><sub>...</sub>
				</li>
			@endif
		</ul>
	</div>
</div>
<!-- /Breadcrumbs -->