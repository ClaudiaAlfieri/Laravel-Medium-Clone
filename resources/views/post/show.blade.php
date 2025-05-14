<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-2x1 mb-4">{{ $post->title }}</h1>
                <!-- User avatar -->
                <div class="flex gap-4">
                    <x-user-avatar :user="$post->user" />
                </div>
                <div>

                    <x-follow-ctr :user="$post->user" class="flex gap-2">
                        <a href="{{ route('profile.show', $post->user) }}"
                            class="hover:underline">{{ $post->user->name }}</a>
                        @auth
                            &middot;
                            <button href="#" x-text="following ? 'Unfollow' : 'Follow'"
                                :class="following ? 'text-red-600' : 'text-emerald-600'" @click="follow()">
                            </button>
                        @endauth
                    </x-follow-ctr>
                    <x-follow-ctr class="flex gap-2 text-sm text-gray-500">
                        {{ $post->readTime() }} min read
                        &middot;
                        {{ $post->created_at->format('M d, Y') }}
                    </x-follow-ctr>

                    <!-- Edit post Section -->

                    @if ($post->user_id === Auth::id())
                        <div class="py-4 mt-8 border-t border-b border-gray-200">
                            <x-primary-button href="{{ route('post.edit', $post) }}">
                                Edit Post
                            </x-primary-button>

                            <form class="inline-block" action="{{ route('post.destroy', $post) }}" method="post">
                                @csrf
                                @method('delete')
                            </form>

                            <x-danger-button>
                                Delete Post
                            </x-danger-button>
                        </div>
                    @endif

                    <!-- Clap Section -->
                    <x-clap-button :post="$post" />

                    <!-- Content Section -->
                    <div class="mt-4">
                        <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-full">
                        <div class="mt-4">
                            {{ $post->content }}
                        </div>
                    </div>

                    <!-- Category -->

                    <div class="mt-8">
                        <span class="px-4 py-2 bg-gray-200 rounded-2xl">
                            {{ $post->category->name }}
                        </span>
                    </div>

                    <!-- Clap Section -->
                    <div class="mt-8 p-4 border-t border-b">
                        <x-clap-button :post="$post" />
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
