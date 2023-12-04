<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 bg-white py-5">
            <h1 class="text-3xl text-gray-800 text-center">Create Post</h1>

            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Post Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="postname" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                 <!-- Post Category -->
                 <div>
                    <x-input-label for="category" :value="__('Category')" />
                    <select name="news_category_id" id="">
                        @foreach ($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>

                </div>
                 <!-- Post Photo -->
                 <div>
                    <x-input-label for="name" :value="__('Photo')" />
                    <input type="file" name="photo" id="photo">
                    <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                </div>
                 <!-- Post Description -->
                 <div>
                    <x-input-label for="description" :value="__('Decription')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus autocomplete="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                {{-- feature --}}
                <div class="mb-2">
                    <x-input-label for="feature" :value="__('Featured')" />
                    <input type="checkbox" name="featured" value="1" id="">

                </div>
                <x-primary-button>
                    {{ __('Create Post') }}
                </x-primary-button>



            </form>

        </div>
    </div>
</x-app-layout>
