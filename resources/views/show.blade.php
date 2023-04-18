@extends('main')

@section('content')
<table class="table-auto w-full">
    <thead>
      <tr class="bg-gray-200">
        <th class="px-4 py-2">Título</th>
        <th class="px-4 py-2">Descripción</th>
        <th class="px-4 py-2">Fecha</th>
        <th class="px-4 py-2">Localización</th>
      </tr>
    </thead>
    <tbody>
      
      <tr class="border-b border-gray-200">
        <td class="px-4 py-2">{{$event->title}}</td>
        <td class="px-4 py-2">{{$event->description}}</td>
        <td class="px-4 py-2">{{$event->date}}</td>
        <td class="px-4 py-2">{{$event->location}}</td>
      </tr>
    </tbody>
  </table>


  <table>
    <thead>
      <h1 class="font-black text-3xl mb-10 mt-10">ASISTENTES</h1>
        <tr class="bg-gray-200">
            <th class="px-4 py-2">Nombre</th>
            <th class="px-4 py-2">Email</th>
        </tr>
    </thead>
    <tbody>
     
      @if (!empty($attendees))
        @foreach ($attendees as $assistant)
        <tr>
            <td>{{ $assistant->name }}</td>
            <td>{{ $assistant->email }}</td>
        </tr>
        @endforeach
      
      @endif
        
    </tbody>
</table>

<div class="mt-8">
  <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('index', ['user' => auth()->user()->name]) }}">Atrás</a>
</div>
  
@endsection