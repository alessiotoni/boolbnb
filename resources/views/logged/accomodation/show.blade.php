@extends('layouts.app')

@section('content')

<div class="container">
    <slider-images :id='{{$accomodation->id}}'></slider-images>


    {{-- <img class="card-img" src="{{ $accomodation->placeholder ? asset('storage/' . $accomodation->placeholder) : asset('placeholder/house-placeholder.jpeg') }}" alt="..." class="img-thumbnail"> --}}
    <h1>{{ $accomodation->title }}</h1>
    <h2>{{ $accomodation->description }}</h2>
    <h2>{{ $accomodation->city }} - {{ $accomodation->streat_name }} - {{ $accomodation->zip }}</h2>
    <a href="{{ route('logged.edit', $accomodation->id) }}" class="card-link btn btn-primary">Modifica</a><br>
    <form action="{{ route('logged.visibility', $accomodation->id) }}" method="post" id="visibility-form">
        @csrf
        @method('PATCH')

        <label for="true">Visibile
            <input onclick="send()" name="visibility" type="radio" value="1" id="true" {{ $accomodation->visibility == true ? 'checked' : "" }}>
        </label>

        <label for="false">Non visibile
            <input onclick="send()" name="visibility" type="radio" value="0" id="false" {{ $accomodation->visibility == false ? 'checked' : "" }}>
        </label>
    </form>
    <form class="delete_form" action="{{ route('logged.destroy', $accomodation->id) }}" method="post">
        @csrf
        @method('DELETE')

        <input id="ciao" class="log" type="submit" value="Elimina">
    </form>
    <a href="{{ route('logged.stat', $accomodation->id) }}">Statistiche</a>
    <p>Visualizzazioni: {{ count($accomodation->views) }}</p>
    @if(count($accomodation->messages) > 0)
    @foreach($messages as $message)
    <p>{{ $message->object_email }}</p>
    <a href="{{ route('message.show', $message->id) }}" class="card-link btn btn-primary">Visualizza messaggio</a><br>

    @endforeach
    @else
    <p>Non hai nessun messaggio</p>
    @endif


</div>

@endsection
<script>

function send() {

document.getElementById('visibility-form').submit()
}



                                  // or '.your_radio_class_name'


</script>