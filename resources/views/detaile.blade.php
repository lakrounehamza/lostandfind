@extends('layouts.app')

@section('content')
<script src="https://cdn.tailwindcss.com"></script>
<div class="bg-gray-100 dark:bg-gray-800 py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                    <img class="w-full h-full object-cover" src="https://cdn.pixabay.com/photo/2020/05/22/17/53/mockup-5206355_960_720.jpg" alt="Product Image">
                </div>
                <div class="flex -mx-2 mb-4">
                    <div class="w-1/2 px-2">
                        <a  href="{{route('annonce.destroy',$annonce->id)}}"  class="w-full bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700">delate</a>
                    </div>
                    <div class="w-1/2 px-2">
                        <a  href="{{route('annonce.edit',$annonce->id)}}" class="w-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-300 dark:hover:bg-gray-600">edit</a>
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">{{$annonce->titre}}</h2>
                <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                    {{$annonce->description }}
                </p>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class="font-bold text-gray-700 dark:text-gray-300">Type:</span>
                        <span class="text-gray-600 dark:text-gray-300"> {{$annonce->type }}</span>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700 dark:text-gray-300">Categorie:</span>
                        <span class="text-gray-600 dark:text-gray-300"> {{$annonce->user->name}} </span>
                    </div>
                </div>
                <div class="mb-4">
                    <span class="font-bold text-gray-700 dark:text-gray-300">date {{$annonce->type }}</span>
                    <span class="text-gray-600 dark:text-gray-300">{{$annonce->date_found }}</span>
                </div>
                <div class="mb-4">
                    <span class="font-bold text-gray-700 dark:text-gray-300"> lieu   </span>
                    <span class="text-gray-600 dark:text-gray-300">{{$annonce-> lieu  }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="bg-gray-100 p-6">
    <h2 class="text-lg font-bold mb-4">Comments</h2>
    <div class="flex flex-col space-y-4">
    @foreach($annonce->commentaires as $commentaire)
    <div class="bg-white p-4 rounded-lg shadow-md">
    <h3 class="text-lg font-bold">
        {{ $commentaire->user->name . " " . $commentaire->user->prenom }}
    </h3>
    <p class="text-gray-700 text-sm mb-2">{{ $commentaire->created_at }}</p>
    <p class="text-gray-700">{{ $commentaire->content }}</p> 
    <a href="{{ route('commentaire.edit',$commentaire->id)}}"> edit</a>
    <a href="{{ route('commentaire.delete',$commentaire->id)}}"> delete</a>
</div>

@endforeach

        <form class="bg-white p-4 rounded-lg shadow-md" action="{{ route('commentaire.create')}}" method="POST">
            @csrf
            <h3 class="text-lg font-bold mb-2">Add a comment</h3> 
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="comment">
                    Comment
                </label>
                <textarea
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="content" rows="3" placeholder="Enter your comment"></textarea>
            </div>
            <button
                class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection