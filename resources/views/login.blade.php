@extends('main')

@section('content')



<div class="container md:w-7/12 bg-white p-6 rounded-lg shadow-xl">

    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        @if(session('message'))
                    <p class="bg-red-500 text-white my-2 rounded-lg 
                    text-sm p-2 text-center">
                        {{ session('message') }}
                    </p>
        @endif
        <div>
            <label for="email">Correo Electrónico</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" 
            class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" required autofocus>
            
            @error('email')
            <p class="bg-red-500 text-white my-2 rounded-lg 
            text-sm p-2 text-center">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" 
            class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" required>
            
            @error('password')
            <p class="bg-red-500 text-white my-2 rounded-lg 
            text-sm p-2 text-center">{{ $message }}</p>
            @enderror
        </div>  

        <div class="mt-3">
            <button type="submit" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer 
            uppercase font-bold w-full p-3 text-white rounded-lg">Iniciar sesión</button>
        </div>
        
    </form>
</div>
@endsection