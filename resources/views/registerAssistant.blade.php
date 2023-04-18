@extends('main')

@section('title')
    {{ $event->title }}
@endsection

@section('error')

    @if (session('error'))
    <div class="alert alert-danger mt-5">
        {{ session('error') }}
    </div>
    @endif
    
@endsection

@section('content')
    @include('show')
    
@endsection


@section('form')
    
    <div class="container md:w-7/12 bg-white p-6 rounded-lg shadow-xl mt-5">
        <form method="POST" action="{{ route('storeAttendee', ['id' => $event->id]) }}" novalidate>
            @csrf
            <label for="users" class="block font-medium text-sm text-gray-700 mb-2">Usuarios</label>
            <div class="relative">
                <select name="users" id="users"
                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M14.95 7.95l-3.95 4-3.95-4a.999.999 0 1 0-1.41 1.41l4.24 4.24a.999.999 0 0 0 1.41 0l4.24-4.24a.999.999 0 1 0-1.41-1.41z" />
                    </svg>
                </div>
            </div>
            <button type="submit"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
                uppercase font-bold w-full p-3 text-white rounded-lg mt-5">Registrar
                asistente</button>
        </form>
    </div>

@endsection
