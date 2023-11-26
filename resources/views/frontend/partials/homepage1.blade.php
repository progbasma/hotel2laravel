<main class="main {{ $PageVariation['home_variation'] }}">
	<!-- Hero Section -->
	@if($slider_hero_section->is_publish == 1)
	<section class="hero-section">
		@foreach ($slider as $row)
		@php $aRow = json_decode($row->desc); @endphp
		<div class="hero-screen hero-overlay" style="background-image: url({{ $row->image ? asset('public/media/'.$row->image) : '' }});">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
						<div class="hero-content">
							<h1>{{ $row->title }}</h1>
							@if($aRow->sub_title != '')
							<p>{{ $aRow->sub_title }}</p>
							@endif
							@if($aRow->button_text != '')
							<a href="{{ $row->url }}" class="btn theme-btn" {{ $aRow->target =='' ? '' : "target=".$aRow->target }}>{{ $aRow->button_text }}</a>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		
		<div class="search-card">
			<div class="container">
				<div class="search-card-inner">
					<form method="GET" action="{{ route('frontend.search') }}">
						<div class="row g-2">
							<div class="col-sm-6 col-md-4 col-lg-2 col-xl-2 mb-3">
								<label for="checkin_date" class="form-label">{{ __('Check In') }}</label>
								<input name="checkin_date" id="checkin_date" type="text" class="form-control" placeholder="yyyy-mm-dd" required>
							</div>
							<div class="col-sm-6 col-md-4 col-lg-2 col-xl-2 mb-3">
								<label for="checkout_date" class="form-label">{{ __('Check Out') }}</label>
								<input name="checkout_date" id="checkout_date" type="text" class="form-control" placeholder="yyyy-mm-dd" required>
							</div>
							<div class="col-sm-6 col-md-4 col-lg-2 col-xl-2 mb-3">
								<label for="total_adult" class="form-label">{{ __('Adult') }}</label>
								<input name="total_adult" id="total_adult" type="number" class="form-control" value="1" min="1" required>
							</div>
							<div class="col-sm-6 col-md-4 col-lg-2 col-xl-2 mb-3">
								<label for="total_child" class="form-label">{{ __('Child') }}</label>
								<input name="total_child" id="total_child" type="number" class="form-control" value="0" min="0" required>
							</div>
							<div class="col-sm-6 col-md-4 col-lg-4 col-xl-4">
								<button type="submit" class="btn theme-btn search-btn">{{ __('Check Availability') }}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	@endif
	<!-- /Hero Section/ -->

	<!-- About Section/ -->
	@if($about_us_section->is_publish == 1)
	@foreach ($about_us as $row)
	@php $aRow = json_decode($row->desc); @endphp
	<section class="section about-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-5">
					@if($row->image != '')
					<div class="row">
						<div class="col-lg-12">
							<div class="about-img">
								<img src="{{ asset('public/media/'.$row->image) }}" alt="{{ $row->title }}">
							</div>
						</div>
					</div>
					@endif

					<div class="row">
						@if($aRow->image2 != '')
						<div class="col-12 col-md-6">
							<div class="about-img">
								<img src="{{ asset('public/media/'.$aRow->image2) }}" alt="{{ $row->title }}">
							</div>
						</div>
						@endif
						@if($aRow->image3 != '')
						<div class="col-12 col-md-6">
							<div class="about-img">
								<img src="{{ asset('public/media/'.$aRow->image3) }}" alt="{{ $row->title }}">
							</div>
						</div>
						@endif
					</div>
				</div>

				<div class="col-md-12 col-lg-7">
					<div class="about-card">
						<div class="about-title">
							<h5>{{ __('About Us') }}</h5>
							<h2>{{ $row->title }}</h2>
						</div>
						@if($aRow->description != '')
						<p class="mb20">{{ $aRow->description }}</p>
						@endif
						<div class="row mb40">
							@if($aRow->total_rooms != '')
							<div class="col-12 col-sm-3 col-lg-3">
								<div class="info-card mb15">
									<div class="icon">
										<i class="bi bi-buildings"></i>
									</div>
									<div class="content">
										<h4>{{ $aRow->total_rooms }}</h4>
										<p>{{ __('Rooms') }}</p>
									</div>
								</div>
							</div>
							@endif
							
							@if($aRow->total_customers != '')
							<div class="col-12 col-sm-3 col-lg-3">
								<div class="info-card mb15">
									<div class="icon">
										<i class="bi bi-emoji-smile"></i>
									</div>
									<div class="content">
										<h4>{{ $aRow->total_customers }}</h4>
										<p>{{ __('Customers') }}</p>
									</div>
								</div>
							</div>
							@endif
							
							@if($aRow->total_amenities != '')
							<div class="col-12 col-sm-3 col-lg-3">
								<div class="info-card mb15">
									<div class="icon">
										<i class="bi bi-pie-chart"></i>
									</div>
									<div class="content">
										<h4>{{ $aRow->total_amenities }}</h4>
										<p>{{ __('Amenities') }}</p>
									</div>
								</div>
							</div>
							@endif
							
							@if($aRow->total_packages != '')
							<div class="col-12 col-sm-3 col-lg-3">
								<div class="info-card mb15">
									<div class="icon">
										<i class="bi bi-percent"></i>
									</div>
									<div class="content">
										<h4>{{ $aRow->total_packages }}</h4>
										<p>{{ __('Packages') }}</p>
									</div>
								</div>
							</div>
							@endif
						</div>
						
						@if($aRow->button_text != '')
						<a href="{{ $row->url }}" class="btn theme-btn" {{ $aRow->target =='' ? '' : "target=".$aRow->target }}>{{ $aRow->button_text }}</a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	@endforeach
	@endif
	<!-- /About Section/ -->

	<!-- Offer Section -->
	@if($offer_ads_section->is_publish == 1)
	<section class="section offer-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-heading text-center">
						<h5>{{ $offer_ads_section->title }}</h5>
						@if($offer_ads_section->desc != '')
						<h2>{{ $offer_ads_section->desc }}</h2>
						@endif
					</div>
				</div>
			</div>
			<div class="row">
				@foreach ($OfferAds as $row)
				@php $aRow = json_decode($row->desc); @endphp
				<div class="col-lg-4">
					<div class="offer-card">
						<div class="offer-image">
							<img src="{{ asset('public/media/'.$row->image) }}" alt="{{ $row->title }}" />
						</div>
						<div class="offer-content">
							<h2>{{ $row->title }}</h2>
							@if($aRow->text_2 != '')
							<p>{{ $aRow->text_2 }}</p>
							@endif
							@if($aRow->button_text != '')
							<a href="{{ $row->url }}" class="btn theme-btn offer-btn" {{ $aRow->target =='' ? '' : "target=".$aRow->target }}>{{ $aRow->button_text }}</a>
							@endif
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	@endif
	<!-- /Offer Section/ -->	
	
	<!-- Featured Section/ -->
	@if($featured_rooms_section->is_publish == 1)
	<section class="section featured-section">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<div class="section-heading">
						<h5>{{ __('Choose Your Rooms') }}</h5>
						<h2>{{ $featured_rooms_section->title }}</h2>
						@if($featured_rooms_section->desc != '')
						<p>{{ $featured_rooms_section->desc }}</p>
						@endif
					</div>
				</div>
			</div>

			<div class="row">
				@foreach ($featured_rooms as $row)
				<div class="col-sm-12 col-md-6 col-lg-4">
					<div class="item-card">
						<div class="item-image">
							<a href="{{ route('frontend.room', [$row->id, $row->slug]) }}">
								<img src="{{ asset('public/media/'.$row->thumbnail) }}" alt="{{ $row->title }}" />
							</a>
							@if(($row->is_discount == 1) && ($row->old_price !=''))
								@php 
									$discount = number_format((($row->old_price - $row->price)*100)/$row->old_price);
								@endphp
							<span class="item-label">{{ $discount }}% {{ __('Off') }}</span>
							@endif
						</div>
						<div class="item-content">
							<div class="item-title">
								<a href="{{ route('frontend.room', [$row->id, $row->slug]) }}">{{ str_limit($row->title) }}</a>
							</div>
							<div class="pric-card">
								@if($row->price != '')
									@if($gtext['currency_position'] == 'left')
									<div class="new-price">{{ $gtext['currency_icon'] }}{{ NumberFormat($row->price) }}</div>
									@else
									<div class="new-price">{{ NumberFormat($row->price) }}{{ $gtext['currency_icon'] }}</div>
									@endif
								@endif
								@if(($row->is_discount == 1) && ($row->old_price !=''))
									@if($gtext['currency_position'] == 'left')
									<div class="old-price">{{ $gtext['currency_icon'] }}{{ NumberFormat($row->old_price) }}</div>
									@else
									<div class="old-price">{{ NumberFormat($row->old_price) }}{{ $gtext['currency_icon'] }}</div>
									@endif
								@endif
								<div class="per-day-night">/ {{ __('Night') }}</div>
							</div>
						</div>
						<a href="{{ route('frontend.room', [$row->id, $row->slug]) }}" class="btn theme-btn book-now-btn">{{ __('Details') }}</a>
						<ul class="item-meta">
							<li>{{ __('Adult') }} {{ $row->total_adult }}</li>
							<li>{{ __('Child') }} {{ $row->total_child }}</li>
						</ul>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	@endif
	<!-- /Featured Section/ -->

	<!-- Services Section/ -->
	@if($our_services_section->is_publish == 1)
	<section class="section service-section">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<div class="section-heading">
						<h5>{{ __('Our Services') }}</h5>
						<h2>{{ $our_services_section->title }}</h2>
						@if($our_services_section->desc != '')
						<p>{{ $our_services_section->desc }}</p>
						@endif
					</div>
				</div>
			</div>
			<div class="row">
				@foreach ($our_services as $row)
				<div class="col-12 col-md-6 col-lg-4">
					<div class="service-card">
						<div class="service-icon">
							<img src="{{ asset('public/media/'.$row->image) }}" alt="{{ $row->title }}" />
						</div>
						<h4>{{ $row->title }}</h4>
						<p>{{ $row->desc }}</p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	@endif
	<!-- /Services Section/ -->

	<!-- Preview Video Section-->
	@if($home_video['is_publish'] == 1)
	<section class="preview-section">
		<div class="row align-items-center justify-content-center g-0">
			<div class="col-12 col-md-12 col-lg-12 col-xl-6">
				<div class="preview-video">
					<img src="{{ asset('public/media/'.$home_video['image']) }}" alt="{{ $home_video['title'] }}">
					<div class="video-card">
						<a href="{{ $home_video['video_url'] }}" class="play-icon popup-video">
							<i class="bi bi-play-fill"></i>
						</a>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-12 col-lg-12 col-xl-6">
				<div class="preview-content">
					<h5>{{ __('Preview') }}</h5>
					<h2>{{ $home_video['title'] }}</h2>
					@if($home_video['short_desc'] !='')
					<p>{{ $home_video['short_desc'] }}</p>
					@endif
					<a href="{{ $home_video['url'] }}" {{ $home_video['target'] =='' ? '' : "target=".$home_video['target'] }} class="btn theme-btn">{{ $home_video['button_text'] }}</a>
				</div>
			</div>
		</div>
	</section>
	@endif
	<!-- /Preview Video Section/ -->

	<!-- Testimonial Section/ -->
	@if($testimonial_section->is_publish == 1)
	<section class="section testimonial-section">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<div class="section-heading">
						<h5>{{ __('Testimonial') }}</h5>
						<h2>{{ $testimonial_section->title }}</h2>
						@if($testimonial_section->desc != '')
						<p>{{ $testimonial_section->desc }}</p>
						@endif
					</div>
				</div>
			</div>
			<div class="row testimonial-slider">
				@foreach ($testimonial as $row)
				<div class="col-md-12">
					<div class="testimonial-card">
						<div class="client">
							<div class="img-card">
								<img src="{{ asset('public/media/'.$row->image) }}" alt="{{ $row->title }}" />
							</div>
							<div class="client-info">
								<h4>{{ $row->title }}</h4>
								<span>{{ __('Client') }}</span>
							</div>
						</div>
						<div class="quote"><i class="bi bi-quote"></i></div>
						<div class="comment">{{ $row->desc }}</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	@endif
	<!-- /Testimonial Section/ -->

	<!-- Blog Section/ -->
	@if($our_blogs_section->is_publish == 1)
	<section class="section blog-section">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<div class="section-heading">
						<h5>{{ __('Our Blogs') }}</h5>
						<h2>{{ $our_blogs_section->title }}</h2>
						@if($our_blogs_section->desc != '')
						<p>{{ $our_blogs_section->desc }}</p>
						@endif
					</div>
				</div>
			</div>
			<div class="row">
				@foreach ($blogs as $row)
				<div class="col-12 col-md-6 col-lg-4">
					<div class="blog-card">
						<div class="blog-img">
							<a href="{{ route('frontend.article', [$row->id, $row->slug]) }}">
								<img src="{{ asset('public/media/'.$row->thumbnail) }}" alt="{{ $row->title }}" />
							</a>
						</div>
						<div class="blog-content">
							<div class="blog-meta-card">
								<div class="blog-date"><i class="bi bi-alarm"></i>{{ date('d M , Y', strtotime($row->created_at)) }}</div>
								<div class="blog-meta"><i class="bi bi-person"></i>{{ __('By') }}, {{ $row->name }}</div>
							</div>
							<div class="blog-title">
								<h4><a href="{{ route('frontend.article', [$row->id, $row->slug]) }}">{{ $row->title }}</a></h4>
							</div>
							<div class="read-more-btn">
								<a href="{{ route('frontend.article', [$row->id, $row->slug]) }}">
									{{ __('Read More') }} <i class="bi bi-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	@endif
	<!-- /Blog Section/ -->
</main>