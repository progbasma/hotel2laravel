<ul class="tabs-nav">
	<li><a href="{{ route('backend.room', [$datalist['id']]) }}"><i class="fa fa-compass"></i>{{ __('Room Type') }}</a></li>
	<li><a href="{{ route('backend.rooms', [$datalist['id']]) }}"><i class="fa fa-bed"></i>{{ __('Rooms') }}</a></li>
	<li><a href="{{ route('backend.price', [$datalist['id']]) }}"><i class="fa fa-money"></i>{{ __('Discount Manage') }}</a></li>
	<li><a href="{{ route('backend.room-images', [$datalist['id']]) }}"><i class="fa fa-picture-o"></i>{{ __('Multiple Images') }}</a></li>
	<li><a href="{{ route('backend.room-seo', [$datalist['id']]) }}"><i class="fa fa-rocket"></i>{{ __('SEO') }}</a></li>
</ul>