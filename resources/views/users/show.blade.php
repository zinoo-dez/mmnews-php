<x-app-layout>
    <div class="py-12 bg-white ">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-5">

            <div class=" p-5">
                {{-- <img src="{{ asset('storage/' . $post->photo) }}" width="300" alt="photo"> --}}
                <div class="md:flex g-3">
                    <div >
                        <h1 class="text-3xl text-gray-800 text-center">Details User</h1>
                        <p class="text-gray-500 mb-3">
                           Username : {{ $user->name }}
                        </p>
                        <p class="text-gray-500 mb-3">Email :{{ $user->email }} </p>

                        <p>
                        @foreach ($user->posts as $post)
                            <p><a href="{{route('newscategories.show',['newscategory' =>$post->newscategory->id, 'user' => $user->id])}}">{{$post->newscategory->name}}</a></p>
                        @endforeach
                        </p>
                    </div>
                    <div class="p-5">

                        @foreach ($user->posts as $post)
                           <div class="py-2">
                            <img src="{{ asset('storage/' . $post->photo) }}" width="300" alt="photo">
                            <div>
                                <h3 class="text-gray-500 text-xl mb-3">
                                    <a href="{{ route('posts.show', $post->id) }}">
                                        {{ $post->name }}
                                    </a>
                                </h3>
                                <p>{{ $post->description }} </p>
                                <p>{{ $post->created_at->diffForHumans() }}</p>
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
                           </div>

                                <hr>
                        @endforeach
                    </div>
                </div>

            </div>


        </div>
    </div>
</x-app-layout>
