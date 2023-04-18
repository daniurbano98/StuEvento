@extends('main')

@section('title')
    Crear Evento
@endsection

@section('content')


<form action="{{ route('store') }}" method="POST">
    @csrf

    <div class="mb-4">
        <label for="title" class="block text-gray-700 font-bold mb-2">Título:</label>
        <input type="text" name="title" id="title" class="form-input w-full @error('title') border-red-500 @enderror" value="{{ old('title') }}" required autofocus>
        @error('title')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-bold mb-2">Descripción:</label>
        <textarea name="description" id="description" class="form-textarea w-full @error('description') border-red-500 @enderror" required>{{ old('description') }}</textarea>
        @error('description')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="location" class="block text-gray-700 font-bold mb-2">Localización:</label>
        <input type="text" name="location" id="location" class="form-input w-full @error('location') border-red-500 @enderror" value="{{ old('location') }}" required>
        @error('location')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="date" class="block text-gray-700 font-bold mb-2">Fecha:</label>
        <input type="date" name="date" id="date" class="form-input w-full @error('date') border-red-500 @enderror" value="{{ old('date') }}" required>
        @error('date')
            <p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
        @enderror
    </div>

    <div class="mt-8 d-flex justify-content-between">
        <div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Crear evento
            </button>
        </div>
       
        <div>
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('index', ['user' => auth()->user()->name]) }}">Atrás</a>
        </div>
    </div>
</form>

@endsection