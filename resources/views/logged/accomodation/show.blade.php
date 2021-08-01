@extends('layouts.app')


@section('content')
<div class="container ">
    <slider-images :id='{{$accomodation->id}}'>
           
    </slider-images>
   

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
        
        <div class="">
        {{-- col-sm-5 col-md-3 --}}
            <div class="my-panel panel-default">
                
                <div class="my_actions">
                   
                    {{-- card-link btn btn-primary --}}
                    <a href="{{ route('logged.edit', $accomodation->id) }}"> <i class="far fa-edit my-edit"></i></a>
                
                </div>

                <form class="delete_form  " action="{{ route('logged.destroy', $accomodation->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    
                    <button class="log btn btn-primary card-link my_actions" type="submit">
                        <i class="far fa-trash-alt my-delete"></i>
                    </button>
                </form>

                <div class="my_actions">
                    <a href="{{ route('logged.statviews', $accomodation->id) }}">
                        <i class="far fa-chart-bar"></i>
                    </a>
                </div>

                

    
                @if(count($accomodation->messages) > 0)
                    <div class="my_actions">
                        <a href="{{ route('message.index', $accomodation->id) }}" class="btn btn-primary">
                            <i class="fas fa-envelope"></i>
                        </a>
                    </div>
 
                @else
                <div class="my_actions">
                    <a href="#">
                        <i class="fas fa-comment-slash"></i>
                    </a>
                
                </div>

                @endif

                <div class="my_actions">
                    <a href="#">
                        <i class="fas fa-eye ">{{ count($accomodation->views) }}</i> 
                        {{-- <p>Hai {{ count($accomodation->views) }} visualizzazioni </p>  --}}
                    </a>
                </div>

                

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
        <div class="col-sm-12 " >
            <h3>Cosa troverai</h3>
            <div class="row">
                @foreach($accomodation->services as $service)
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <h4 class="my_badge">   
                            <i class="far fa-star"></i>
                        {{ $service->title }}</h4>
                    
                    </div>
                    
                   
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
