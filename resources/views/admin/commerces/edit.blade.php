@extends('adminlte::page')

@section('title', 'Administración')

@section('content_header')
    <h1>Editar comercio</h1>
@stop

@section('content')

    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($commerce,['route' => ['admin.commerces.update', $commerce], 'autocomplete' => 'off', 'files' => 'true', 'method' => 'put']) !!}

            {!! Form::hidden('user_id', auth()->user()->id) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el nombre del comercio']) !!}

                @error('name')
                <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug del comercio', 'readonly']) !!}
                @error('slug')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col">
                    <div class="image-wrapper">
                        @if($commerce->image)
                            <img id="picture" src="{{Storage::url($commerce->image->url)}}">
                        @else
                            <img id="picture" src="https://pixabay.com/get/g5276675afc4b508f5b54f39c9f8c89292d2c9139fa26d00e349ea3ee34490ce1caeaa6f720d22ea0cd610353686ea1758bf1cf729795d946dbd4b561bb1bb9fb078ce357801a58bb4b1e410af2691aef_640.jpg">
                        @endif
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('file', 'Imagen del comercio') !!}
                        {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Descripción') !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                @error('description')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('address', 'Dirección') !!}
                {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Ingresa la dirección del comercio']) !!}
                @error('address')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('phone', 'Telfono') !!}
                {!! Form::number('phone', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el telefono del comercio']) !!}
                @error('phone')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Correo') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el correo del comercio']) !!}
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('website', 'Pagina web') !!}
                {!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => 'Ingresa la pagina web del comercio']) !!}
                @error('website')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('capacity', 'Aforo total') !!}
                {!! Form::number('capacity', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el aforo del comercio']) !!}
                @error('capacity')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('available_capacity', 'Aforo permitido') !!}
                {!! Form::number('available_capacity', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el aforo actual del comercio']) !!}
                @error('available-capacity')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('services', 'Servicios') !!}
                {!! Form::textarea('services', null, ['class' => 'form-control']) !!}
                @error('services')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Categoria') !!}
                {!! Form::select('category_id', $categories , null, ['class' => 'form-control']) !!}
                @error('category_id')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            {!! Form::submit('Editar comercio', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 50%;
        }
        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: "-"
            });
        });
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );

        ClassicEditor
            .create( document.querySelector( '#services' ) )
            .catch( error => {
                console.error( error );
            } );

        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }

    </script>
@endsection
