<?php
	$reviews = \App\Review::where('tree_id', $tree->id)->join('users', 'users.id', '=', 'reviews.user_id')->select('reviews.*', 'users.first_name', 'users.last_name', 'users.avatar', 'users.unique_id')->orderBy('created_at', 'DESC')->get();
?>
@if ($reviews)
	@foreach ($reviews as $review)
		<div class="m-widget3__item">
			<div class="m-widget3__header">
				<div class="m-widget3__user-img">
					@if($review->avatar == "default.jpg")
						<img src="/uploads/avatars/default.png" class="m-widget3__img" alt=""/>
					@else
						@if (file_exists('uploads/avatars/'.$review->unique_id.'/'.$review->avatar))
							<img src="{{asset('uploads/avatars/'.$review->unique_id.'/'.$review->avatar)}}" class="m-widget3__img" alt="author">
						@else
							<img src="/uploads/avatars/default.png" class="m-widget3__img" alt="">
						@endif
					@endif
				</div>
				<div class="m-widget3__info">
					<span class="m-widget3__username">
						{{$review->first_name}} {{$review->last_name}}
					</span>
					<br>
					<span class="m-widget3__time">
						{{$review->created_at->diffForHumans()}}
					</span>
				</div>
			</div>
			<div class="m-widget3__body">
				<p class="m-widget3__text">
					{{$review->review}}
				</p>
			</div>
		</div>
	@endforeach
@endif
