<x-app-layout>
    <a class="py-6 px-6" href="{{route('posts.index')}}">Volver</a>
    <div class="container">
        <h1 class="text-4xl font-bold leading-8">
            {{$post->name}}
        </h1>
        <div class="w-full h-full py-6 flex">
            <img src="@if($post->image){{Storage::url($post->image->url)}}@else {{Storage::url('posts/faker.png')}}@endif" alt="">
            <div class="px-6">
                {!!$post->extract!!}
            </div>
        </div>
        <div class="py-6">
            {!!$post->body!!}
        </div>
    </div>
</x-app-layout>