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
                        &middot;
                        <a href="#" class="text-emerald-500">Follow</a>
                    </x-follow-ctr>
                    <x-follow-ctr class="flex gap-2 text-sm text-gray-500">
                        {{ $post->readTime() }} min read
                        &middot;
                        {{ $post->created_at->format('M d, Y') }}
                    </x-follow-ctr>

                    <!-- Clap Section -->
                    <div class="mt-8 p-4 border-t border-b">
                        <x-clap-button />
                    </div>

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
                        <x-clap-button />
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
