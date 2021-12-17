<x-app-layout>
    <div class="container py-8">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($commerces as $commerce)
                <article class="w-full h-80 bg-cover bg-center bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($commerce->image){{Storage::url($commerce->image->url)}}@else https://pixabay.com/get/g5276675afc4b508f5b54f39c9f8c89292d2c9139fa26d00e349ea3ee34490ce1caeaa6f720d22ea0cd610353686ea1758bf1cf729795d946dbd4b561bb1bb9fb078ce357801a58bb4b1e410af2691aef_640.jpg @endif">

                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="{{route('commerces.show', $commerce)}}">
                                {{$commerce->name}}
                            </a>
                        </h1>
                    </div>

                </article>
            @endforeach
        </div>

        <div class="mt-2">
            {{$commerces->links()}}
        </div>
    </div>
</x-app-layout>

