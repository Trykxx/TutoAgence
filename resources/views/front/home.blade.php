@extends('base')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Mon Agence</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum quibusdam natus doloremque voluptate odit
                minus amet saepe debitis fugit harum ratione iste consectetur veritatis, velit ipsa quos unde. Doloribus,
                ullam!</p>
        </div>
    </div>

    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">
            @foreach ($properties as $property)
                <div class="col">
                    @include('front.property.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection
