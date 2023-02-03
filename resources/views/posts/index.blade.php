<x-app-layout>
    <div class=" max-w-7xl mx-auto px-2 sm:px-6 lg:px-8"> 
        <div class=" py-8 {{-- bg-red-100 --}}">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-x-8 gap-y-10"> 
                @foreach ($posts as $post)
                <div class="flex flex-col shadow-md hover:shadow-2xl  @if($loop->first) md:col-span-2 @endif">
                    <article class=" w-full h-80  bg-cover bg-center border-b-2 border-blue-600 borde-opacity-10 hover:border-opacity-25" style="background-image: url(@if($post->image){{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2022/11/29/14/16/sheep-7624635_960_720.jpg @endif )"> {{-- Esto es consultar la relacion entre posts e image --}}
                            <div class="w-full h-full{{-- px-8 flex flex-col justify-center --}}">
                                <div class="py-4 px-4">
                                    @foreach ($tags as $tag)
                                        <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-500 hover:bg-opacity-25 text-white rounded-full">{{$tag->name}}</a>
                                    @endforeach
                                </div>
                                <h1 class=" px-4 text-4xl text-white leading-6 font-bold mt-2">  
                                    <a href="{{route('posts.show', $post)}}">
                                        {{$post->name}} 
                                    </a>
                                </h1>
                                
                            </div>
                    </article>
                    <a href="{{route('posts.show', $post)}}">
                        <div class="h-30 hover:bg-gray-200">
                            <h1 class=" px-4 text-base text-gray-900 font-bold pt-2">  
                                    {{$post->name}} 
                            </h1>
                            <h1 class="px-4 pb-2 text-base text-gray-700 leading-4">
                                {!!$post->extract!!}
                            </h1>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        <div class="mt-4">
            {{$posts->links()}}
        </div>
        
    </div>
</x-app-layout>