<!-- Breadcrumbs -->
<div class="row">
    <div class="col-md-10 col-md-offset-1">
		<ul class="breadcrumb">
			<li class="{{ Request::path() == 'profile' ? 'active text-muted' : '' }}">
				@if(Request::path() == 'profile')
		    		<i class="fa fa-user fa-fw" aria-hidden="true"></i>
		    		profile
		    	@else
			        <a href="{{ route('profile.index') }}">
			            <i class="fa fa-user fa-fw" aria-hidden="true"></i>
			            profile
			        </a>
			    @endif
		    </li>
			@if(Request::is('profile/*/edit'))
				<li class="active text-muted">
					<i class="fa fa-fw fa-pencil fa-flip-horizontal" aria-hidden="true"></i><sub>...</sub>
				</li>
			@endif
		</ul>
	</div>
</div>
<!-- /Breadcrumbs -->