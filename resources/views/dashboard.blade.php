@extends('layouts.app')

@section('content')

<script src="https://cdn.tailwindcss.com"></script>
 
<form method="POST" action="{{ route('search') }}">
    @csrf
    <input type="text" name="q" id="query" placeholder="titre, auteur, categorie"
        class="w-[400px] p-3 rounded-md border-2 border-r-white rounded-r-none border-gray-300 placeholder-gray-500 dark:placeholder-gray-300 dark:bg-gray-500 dark:text-gray-300 dark:border-none" />
    <button type="submit"
        class="inline-flex items-center gap-2 bg-violet-700 text-white text-lg font-semibold py-3 px-6 rounded-r-md">
        <span>Search</span>
        <span class="hidden md:block">
            <svg class="text-gray-200 h-5 w-5 p-0 fill-current" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 56.966 56.966" width="512px" height="512px">
                <path
                    d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  
                    s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  
                    c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  
                    s-17-7.626-17-17S14.61,6,23.984,6z" />
            </svg>
        </span>
    </button>
</form>

 



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