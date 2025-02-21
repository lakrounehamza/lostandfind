<script src="https://cdn.tailwindcss.com"></script>
<div class="flex flex-1 flex-col justify-center space-y-5 max-w-md mx-auto mt-24">
    <div class="flex flex-col space-y-2 text-center">
        <h2 class="text-3xl md:text-4xl font-bold">Modifier le commentaire</h2>
        <p class="text-md md:text-xl">Entrez votre modification.</p>
    </div>
    <div class="flex flex-col max-w-md space-y-5">
        <form method="POST" action="/commentaire/update/{{$commentaire->id}}">
            @csrf
            <input type="text" name="content" placeholder="Modifier votre commentaire"
                class="flex px-3 py-2 md:px-4 md:py-3 border-2 border-black rounded-lg font-medium placeholder:font-normal"
                value="{{ $commentaire->content }}" />
            <button type="submit"
                class="flex items-center justify-center flex-none px-3 py-2 md:px-4 md:py-3 border-2 rounded-lg font-medium border-black bg-black text-white">
                save
            </button>
        </form>
    </div>
</div>
