@props(['user', 'size => 'w-12 h-12'])

@if ($user->image)
<img src="{{ $user->imageUrl() }}" alt="{{ $user->name }}"
    class="{{ $size}} rounded-full">
@else
<img src="https://liccar.com/wp-content/uploads/png-transparent-head-the-dummy-avatar-man-tie-jacket-user.png"
    alt="Dummy avatar" class="{{ $size }} rounded-full">
@endif
