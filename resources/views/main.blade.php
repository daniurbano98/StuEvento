<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="../css/app.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        @vite('resources/css/app.css')
    </head>
    <body class="container mt-5">
        <header class="p-5 border-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-3xl font-black">StuEvento</h1>
                @auth
                {{--  Con esta directiva comprobamos si el user esta logueado --}}
                    <nav class="flex gap-2 items-center">
                        <a href="{{ route('create') }}" class="flex items-center gap-2 bg-green-500 border p-2 text-white rounded text-sm
                        uppercase font-bold cursor-pointer">Create Event</a>
                        
                        <form method="POST" action="{{route('logout')}}">
                            @csrf <!-- directiva que sirve para proteger los datos contra ataques -->
                            <button type="submit" class="font-bold uppercase text-gray-600 text-sm">Logout</button>
                        </form>
                    </nav>
                    
                @endauth
                
                @guest <!--con esta directiva comprobamos si el user NO esta autenticado y si es asi imprimimos lo siguiente-->
                <nav class="flex gap-2 items-center">
                    <a href="{{ route('login') }}" class="font-bold uppercase text-gray-600 text-sm">Login</a>
                    <a href="{{route('register')}}" class="font-bold uppercase text-gray-600 text-sm">Crear cuenta</a>
                </nav>
                @endguest
            </div>
        </header>

        
        <main class="container mx-auto mt-10">
            <h1 class="font-black text-center text-3xl mb-10">@yield('title')</h1>
            @yield('error')
            @yield('content')
        </main>

        <section>
            @yield('form')
        </section>


        <footer class="mt-10 text-center p-5 text-gray-500 font-bold uppercase">
            <p class="mt-5">Copyright &copy; {{ date('Y') }} Daniel Urbano</p>
        </footer>
    </body>
</html>