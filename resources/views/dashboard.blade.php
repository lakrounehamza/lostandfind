@extends('layouts.app')

@section('content')

<script src="https://cdn.tailwindcss.com"></script>
<table class="min-w-full divide-y divide-gray-200">
    <thead>
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titre</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Found</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lieu</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">categorie</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($annonces as $annonce)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">{{$annonce->titre}}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{$annonce->type}}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{$annonce->description}}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{$annonce->date_found}}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{$annonce->lieu}}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{$annonce->categorie}}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <a href="{{route('annonce.show',$annonce->id)}}" class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Détails</a>
                <a href="{{route('annonce.edit',$annonce->id) }}" class="ml-2 px-4 py-2 font-medium text-white bg-green-600 rounded-md hover:bg-green-500 focus:outline-none focus:shadow-outline-red active:bg-green-600 transition duration-150 ease-in-out">edit</a>
                <a href="{{route('annonce.destroy',$annonce->id)}} " class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Supprimer</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection