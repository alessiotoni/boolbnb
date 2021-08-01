@extends('layouts.app')


@section('content')
<div class="container ">
    <slider-images :id='{{$accomodation->id}}'></slider-images>

    <div class="row justify-content-center align-items-center">
        <div class="wrap col-md-9">

            <h1 class="title">{{ $accomodation->title }}</h1> 
            <p class="city">{{ $accomodation->city }} - {{ $accomodation->zip }} - {{ $accomodation->number_rooms }} stanza/e - {{ $accomodation->number_beds }} camera/e da letto - 
                {{ $accomodation->number_bathrooms }} bagno/i
            </p>

            <p class="description">{{ $accomodation->description }}</p>
            <div class="line"></div>

        </div>


                {{-- <div>
                    <label for="tue">Visibile
                        <input name="visibility" type="radio" value="1" id="true" {{ $accomodation->visibility == true ? 'checked' : "" }}>
                    </label>
                
                </div>
                <div>
                    <label for="false">Non visibile
                        <input name="visibility" type="radio" value="0" id="false" {{ $accomodation->visibility == false ? 'checked' : "" }}>
                    </label>
                
                </div> --}}
        
        <div class=" col-sm-4 col-md-3">
            <div class="my-panel panel-default">
                
                <div>
                <i class="far fa-edit my-edit"></i>
                {{-- card-link btn btn-primary --}}
                <a href="{{ route('logged.edit', $accomodation->id) }}">Modifica</a>

            </div>
            

            <form class="delete_form " action="{{ route('logged.destroy', $accomodation->id) }}" method="post">
                @csrf
                @method('DELETE')
                
                <button class="log btn btn-primary card-link" type="submit">
                    <i class="far fa-trash-alt my-delete"></i>
                </button>
            </form>

            <a href="{{ route('logged.statviews', $accomodation->id) }}">Statistiche</a>
            <p>Visualizzazioni: {{ count($accomodation->views) }}</p>
            
            @if(count($accomodation->messages) > 0)
                
                <a href="{{ route('message.index', $accomodation->id) }}" class="btn btn-primary">
                <i class="fas fa-envelope"></i>
                </a>
                <br>

            
            @else
            
            <a href="#">Non hai nessun messaggio
            
                <i class="fas fa-envelope"></i>
                <i class="fas fa-times"></i>
            </a>

            @endif

            </div>
            {{-- @foreach($messages as $message)
            <p>{{ $message->object_email }}</p>
            <a href="{{ route('message.show', $message->id) }}" class="card-link btn btn-primary">Visualizza messaggio</a><br>

            @endforeach --}}
        </div>
    </div>

    <div class="row">
        <div class="col-md-9 py-4">
            
            <div class="padding-left">
                <i class="fas fa-home my_home"></i>
                <span class="padding-left">
                    Casa intera. 
                    Appartamento: sarà a tua completa disposizione.
                </span>
            </div>
            

        </div>
        <div class="line"></div>
    </div>

    <div class="row">
        <div class="col-sm-4 col-md-3">
            <h3 class="text-font">Dove dormirai</h3>

            <div class="card">
                <div>
                    <i class=" my-beds fas fa-bed"></i>
                    <p>Camera da letto: {{ $accomodation->number_beds }}</p>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-4 col-md-3 actions" >
            {{-- <h3>Azioni:</h3> --}}

            

        </div>
    
    </div>
    
    


    <div>

        @foreach($accomodation->services as $service)
                <span class="badge bg-primary my-badge">{{ $service->title }}</span>
        @endforeach
    </div>
    


</div>
@endsection
