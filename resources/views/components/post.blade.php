@props(['post' => $post])

<div class="mb-4">

    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>
    <span class="text-gray-400 text-sm">{{ $post->created_at->diffForHumans() }}</span> {{-- $post->created_at->format('d-m-y') --}}
    <p class="mb-2">{{ $post->body }}</p>

    @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="post" class="mt-3 mb-1">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 rounded px-2.5 py-1  text-white mb-2"><i class="fa-regular fa-trash-can"></i> Delete</button>
        </form>
    @endcan

    <div class="flex item-center">  {{-- class="@guest hidden @endguest" --}}
        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="post" class="">
                    @csrf
                    <button type="submit" class="text-blue-600"><i class="fa-solid fa-thumbs-up"></i> Like</button>
                </form>
                @else
                <form action="{{ route('posts.likes', $post) }}" method="post" class="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-600"><i class="fa-solid fa-thumbs-down"></i> Dislike</button>
                </form>
            @endif

        @endauth
        <span class="ml-1 text-gray-500">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span> {{-- class="@guest hidden @endguest" --}}
    </div>
    <hr class="mt-4">
</div>
