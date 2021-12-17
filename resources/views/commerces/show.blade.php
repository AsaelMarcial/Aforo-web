<x-app-layout>

    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$commerce->name}}</h1>

        <div class="text-lg text-gray-500 mb-2">
            {!!$commerce->description!!}
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">

                <figure>
                    @if($commerce->image)
                        <img class="w-full h-80 object-cover object-center" src="{{Storage::url($commerce->image->url)}}" alt="">
                    @else
                        <img class="w-full h-80 object-cover object-center" src="https://pixabay.com/get/g5276675afc4b508f5b54f39c9f8c89292d2c9139fa26d00e349ea3ee34490ce1caeaa6f720d22ea0cd610353686ea1758bf1cf729795d946dbd4b561bb1bb9fb078ce357801a58bb4b1e410af2691aef_640.jpg" alt="">
                    @endif
                </figure>
                <div class="text-base text-black-500 mt-4">
                    <p>
                        <span class="text-3xl font-bold">Dirección:</span>
                        <br>
                        {!! $commerce->address !!}
                    </p>
                </div>
                <div class="text-base text-black-500 mt-4">
                    <p>
                        <span class="text-3xl font-bold">Correo:</span>
                        <br>
                        {!! $commerce->email !!}
                    </p>
                </div>
                <div class="text-base text-black-500 mt-4">
                    <p>
                        <span class="text-3xl font-bold">Pagina web:</span>
                        <br>
                        {!! $commerce->website !!}
                    </p>
                </div>
                <div class="text-base text-black-500 mt-4">
                    <p>
                        <span class="text-3xl font-bold">Telfono:</span>
                        <br>
                        {!! $commerce->phone !!}
                    </p>
                </div>

                <div class="text-base text-black-500 mt-4">
                    <p>
                        <span class="text-3xl font-bold">Aforo total:</span>
                        <br>
                        {!! $commerce->capacity !!}
                    </p>
                </div>

                <div class="text-base text-black-500 mt-4">
                    <p>
                        <span class="text-3xl font-bold">Aforo permitido:</span>
                        <br>
                        {!! $commerce->available_capacity !!}
                    </p>
                </div>

                <div class="text-base text-black-500 mt-4">
                    <p>
                        <span class="text-3xl font-bold">Servicios:</span>
                        <br>
                        {!! $commerce->services !!}
                    </p>
                </div>

            </div>
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-1">Mas en {{$commerce->category->name}}</h1>

                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{route('commerces.show',$similar)}}">
                                @if($similar->image)
                                    <img class="w-25 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="">
                                @else
                                    <img class="w-full h-80 object-cover object-center" src="https://pixabay.com/get/g5276675afc4b508f5b54f39c9f8c89292d2c9139fa26d00e349ea3ee34490ce1caeaa6f720d22ea0cd610353686ea1758bf1cf729795d946dbd4b561bb1bb9fb078ce357801a58bb4b1e410af2691aef_640.jpg" alt="">
                                @endif
                                <span class="ml-2 text-gray-600">{{$similar->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>
