@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row justify-content-center align-items-center">
        <div class="wrap col-md-9">


            <h1 class="title">{{ $accomodation->title }}</h1>
            <p class="city">{{ $accomodation->city }} - {{ $accomodation->street_name }} - {{ $accomodation->zip }}
            </p>

            <h2 class="description">{{ $accomodation->description }}</h2>
            

            {{-- @if(isset(Auth::user()->id) && $accomodation->user_id != Auth::user()->id) --}}
            <a href="{{ route('message.create',['id' => $accomodation->id]) }}">Contatta il proprietario</a>
            {{-- @endif --}}

            
            <slider-images
            :id='{{$accomodation->id}}'
            ></slider-images>
        </div>
    </div>


</div>

@endsection
