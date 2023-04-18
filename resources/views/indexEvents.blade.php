@extends('main')

@section('title')
    Perfil: {{$user->name}}
@endsection

@section('content')
<table  class="table w-full border border-gray-200 divide-y divide-gray-200">
    <thead>
        <tr class="bg-gray-50">
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Owner</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edit</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Delete</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">View</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Add attendee</th>

        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($events as $event)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $event->title }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $event->description }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $event->location }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $event->date }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $event->user->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('editEvent',['id'=>$event->id]) }}">EDIT</a>
                </td>
                
                <form action="{{ route('destroyEvent',['id'=>$event->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">DELETE</button>
                    </td>
                </form>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{ route('show',['id'=>$event->id]) }}">VIEW</a>
                </td>

                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    <a class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" href="{{ route('eventRegister',['id'=>$event->id]) }}">ADD</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="flex justify-between items-center">
    <div class="text-sm text-gray-700 mt-3">
        Mostrando {{ $events->firstItem() }} a {{ $events->lastItem() }} de {{ $events->total() }} usuarios
    </div>

    <div class="flex justify-end mt-3">
        <a href="{{ $events->previousPageUrl() }}" class="inline-flex items-center px-3 py-2 rounded-md border border-gray-300 shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
            Anterior
        </a>
        
        <a href="{{ $events->nextPageUrl() }}" class="inline-flex items-center px-3 py-2 rounded-md border border-gray-300 shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
            Siguiente
        </a>
    </div>
</div>

@endsection