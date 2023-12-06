<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 bg-white py-5">
            <h1 class="text-3xl text-gray-800 text-center">Details Posts</h1>

            <div class=" p-5">
                <img src="{{ asset('storage/' . $post->photo) }}" width="300" alt="photo">
                <div>
                    <h3 class="text-gray-500 text-xl mb-3">
                        {{ $post->name }}
                    </h3>
                    <p>{{ $post->description }} </p>
                    <p>{{ $post->created_at->diffForHumans() }}</p>
                </div>
                @if (auth()->user()->id === $post->user->id)


                @auth
                    <div class="flex">
                        <a href="{{ route('posts.edit', $post->id) }}"
                            class="bg-yellow-500 text-white py-2 px-4 rounded-md mr-2">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post"
                            onsubmit="return confirm('are you sure want to delete?')">
                            @csrf
                            @method('delete')
                            <button class="bg-red-500 text-white py-2 px-4 rounded-md">Delete</button>
                        </form>
                    </div>
                @endauth
                @endif
            </div>


        </div>
    </div>
</x-app-layout>
