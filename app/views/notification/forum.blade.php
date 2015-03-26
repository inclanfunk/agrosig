<ul id="forum" class="notification-body">
	@foreach($notifications as $notification)
		<li>
			<span id="whole" class="padding-10 {{ $notification->read ? '' : 'unread'}}">

				<em class="badge padding-5 no-border-radius bg-color-blueLight pull-left margin-right-5">
					<i class="fa fa-user fa-fw fa-2x"></i>
				</em>
				
				<span id="body">
					{{ $notification->body }}
					<br>
					<span id="time" class="pull-right font-xs text-muted"><i>{{ $notification->created_at->diffForHumans() }}</i></span>
				</span>
				
			</span>
		</li>
	@endforeach
</ul>