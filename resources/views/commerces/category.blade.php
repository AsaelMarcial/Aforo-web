<x-app-layout>

    <div class="max-w-6xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">Categoría: {{ $category->name }}</h1>

        @foreach($commerces as $commerce)
            <article class="mb-6 bg-white shadow-lg rounded-lg overflow-hidden">
                @if($commerce->image)
                    <img class="w-full h-80 object-cover object-center" src="{{Storage::url($commerce->image->url)}}" alt="">
                @else
                    <img class="w-full h-80 object-cover object-center" src="https://pixabay.com/get/g5276675afc4b508f5b54f39c9f8c89292d2c9139fa26d00e349ea3ee34490ce1caeaa6f720d22ea0cd610353686ea1758bf1cf729795d946dbd4b561bb1bb9fb078ce357801a58bb4b1e410af2691aef_640.jpg" alt="">
                @endif

                <div class="px-6 py-4">
                    <h1 class="font-bold text-xl mb-2">
                        <a href="{{route('commerces.show', $commerce)}}">{{$commerce->name}}</a>
                    </h1>

                    <div class="text-gray-700 text-base">
                        {!! $commerce->description !!}
                    </div>
                </div>

            </article>
        @endforeach

        <div class="mt-4">
            {{$commerces->links()}}
        </div>

    </div>
</x-app-layout>
