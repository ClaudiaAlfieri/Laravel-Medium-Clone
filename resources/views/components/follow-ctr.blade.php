@props(['user' => null])

<div {{ $attributes }} x-data="{
    following: {{ $user && auth()->user() ? ($user->isFollowedBy(auth()->user()) ? 'true' : 'false') : 'false' }},
    followersCount: {{ $user ? $user->followers()->count() : 0 }},
    follow() {
        axios.post('/follow/{{ $user ? $user->id : 0 }}')
            .then(res => {
                this.following = !this.following
                this.followersCount = res.data.followersCount;
            })
            .catch(err => {
                console.log(err)
            })

    }
}" class="w-[320px] border-l px-8">
    {{ $slot }}
</div>
