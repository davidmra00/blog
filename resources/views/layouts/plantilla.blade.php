<x-app-layout>
    <div class="container mx-auto">
        @yield('section')
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-6 py-6">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center" style="background-image: url(@if($post->image){{Storage::url($post->image->url)}}@else {{Storage::url('posts/faker.png')}}@endif)">
                    <div class="w-full h-full flex flex-col justify-center">
                        <div>
                            @foreach ($post->tags as $tag)
                                <a class="rounded-full bg-gray-600" href="{{route('posts.tag',$tag)}}">{{$tag->name}}</a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl font-bold leading-8">
                            <a href="{{route('posts.show',$post)}}">{{$post->name}}</a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
    <div class="my-4">
        {{$posts->links()}}
    </div>
</x-app-layout>