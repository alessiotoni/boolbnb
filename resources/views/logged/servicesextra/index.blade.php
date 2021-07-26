@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      <div class="d-flex justify-content-between align-items-center">
        <h1>Tutti i tag</h1>
      </div>
      <table class="table">
        <thead>
          <tr>
            
          </tr>
        </thead>
        <tbody>
          @foreach ($services as $service)
          <tr>
            <td>{{ $service->id }}</td>
            <td>{{ $service->name }}</td>
            <td>{{ $service->slug }}</td>
            <td class="text-center">
              <a href="{{ route('logged.accomodations.filter', ["services"=>$services->id]) }}">
                {{ count($service->accomodations) }}
              </a>
            </td>
            <td></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection