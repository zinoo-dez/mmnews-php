<x-app-layout>

    <div class="container">
        <h1>Posts in {{ $newscategory->name }} category by {{ $user->name }}</h1>

        @if ($posts->count() > 0)
            <ul>
                @foreach ($posts as $post)
                <img src="{{ asset('storage/' . $post->photo) }}" width="300" alt="photo">
                <div>
                    <h3 class="text-gray-500 text-xl mb-3">
                        {{ $post->name }}
                    </h3>
                    <p>{{ $post->description }} </p>
                    <p>{{ $post->created_at->diffForHumans() }}</p>
                </div>
                @endforeach
            </ul>
        @else
            <p>No posts available in this category by {{ $user->name }}.</p>
        @endif
    </div>

</x-app-layout>
