<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 bg-white py-5">
            <h1 class="text-3xl text-gray-800 text-center">All Posts</h1>
            @foreach ($posts as $post)
                <div class="shadow-lg p-5 md:flex justify-between">
                    <div>
                        <h3 class="text-gray-500 text-xl mb-3">
                             <a href="{{route('posts.show',$post->id)}}">
                                {{ $post->name }}
                            </a>
                        </h3>
                        <p>{{ $post->description }} </p>
                        <p>{{ $post->created_at->diffForHumans() }}</p>
                        <p>Post By: <a href="{{route('users.show',$post->user->id)}}">{{$post->user->name}}</a> </p>
                    </div>
                    <img src="{{ asset('storage/'.$post->photo) }}" width="100" alt="photo">

                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
