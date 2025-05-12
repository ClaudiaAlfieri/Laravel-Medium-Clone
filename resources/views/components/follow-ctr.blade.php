@props(['user' => null])

<div {{  $attributes }} x-data="{
    following: {{ $user && auth()->user() ? $user->isFollowedBy(auth()->user()) ? 'true' : 'false' : 'false' }},
    followersCount: {{ $user ? $user->followers()->count() : 0 }},
    follow() {
        this.following = !this.following
        axios.post('/follow/{{ $user ? $user->id : 0 }}')
            .then(res => {
                console.log(res.data)
                this.followersCount = res.data.followersCount;
            })
            .catch(err => {
                console.log(err)
            })

    }
}" class="w-[320px] border-l px-8">
{{ $slot }}
</div>
