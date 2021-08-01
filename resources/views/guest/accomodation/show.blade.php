@extends('layouts.app')

@section('content')

<div class="container">
    
    <div>
        <h1 class="title">{{ $accomodation->title }}</h1>

        <h2>{{ $accomodation->description }}</h2>
        <h2>{{ $accomodation->city }} - {{ $accomodation->streat_name }} - {{ $accomodation->zip }}</h2>

        {{-- @if(isset(Auth::user()->id) && $accomodation->user_id != Auth::user()->id) --}}
        <a href="{{ route('message.create',['id' => $accomodation->id]) }}">Contatta il proprietario</a>
        {{-- @endif --}}

        
        <slider-images
        :id='{{$accomodation->id}}'
        ></slider-images>
    </div>


</div>

@endsection
