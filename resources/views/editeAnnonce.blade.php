@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>

<form action="{{route('annonce.update',$annonce->id)}}" method="POST">
    @csrf
    <div class="mx-14 mt-10 border-2 border-blue-400 rounded-lg shadow-lg bg-white">
        <div class="mt-10 text-center font-bold text-xl text-gray-700">Contact Us</div>
        <div class="mt-3 text-center text-4xl font-bold text-blue-700">entrey le modification</div>
        <div class="p-8">
            <div class="mt-6">
                <input type="text" value="{{$annonce->titre}}" name="titre" class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-4 py-3 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 sm:text-sm" placeholder="Titre *" required />
            </div>

            <div class="mt-6">
                <select name="type" class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-4 py-3 placeholder-slate-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 sm:text-sm" required>
                    <option  value="{{$annonce->type}}">{{$annonce->type}}</option>
                    <option value="found">Found</option>
                    <option value="lost">Lost</option>
                </select>
            </div>
            <input value="5" name="id_auteur" class="hidden" />
            <div class="mt-6">
                <textarea name="description" id="description" cols="30" rows="4" class="mb-6 w-full rounded-md border border-slate-300 px-4 py-3 font-semibold text-gray-700 placeholder-slate-400 placeholder:font-semibold placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 sm:text-sm" placeholder="Description *" required>{{$annonce->description}}</textarea>
            </div>

            <div class="mt-6">
                <input type="file"  value="{{$annonce->phto}}" name="photo" accept="image/*" class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-4 py-3 placeholder-slate-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 sm:text-sm" />
            </div>

            <select name="categorie"  class="mt-1 block w-full rounded-md border border-slate-300">
                <option value="{{$annonce->categorie}}">{{$annonce->categorie}}</option>
                <option value="Immobilier">Immobilier</option>
                <option value="Véhicule">Véhicule</option>
                <option value="Electronique">Electronique</option>
            </select>

            <div class="mt-6">
                <input type="date" value="{{$annonce->date_found}}" name="date_found" class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-4 py-3 placeholder-slate-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 sm:text-sm" />
            </div>

            <div class="mt-6">
                <input type="text" value="{{$annonce->lieu}}" name="lieu" class="mt-1 block w-full rounded-md border border-slate-300 bg-white px-4 py-3 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 sm:text-sm" placeholder="Lieu *" required />
            </div>

            <div class="text-center mt-6">
                <button type="submit" class="cursor-pointer rounded-lg bg-blue-700 px-8 py-4 text-sm font-semibold text-white hover:bg-blue-800 transition-colors duration-300">Modify annonce</button>
            </div>
        </div>
    </div>
</form>

@endsection