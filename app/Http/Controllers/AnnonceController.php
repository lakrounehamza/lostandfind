<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annonces  = Annonce::paginate(8);
        return view('home', ['annonces' => $annonces]);
        // return 'index';
    }

    public function dashboard()
    {
        // .blade

        $annonces  = Annonce::all();
        return view('dashboard', ['annonces' => $annonces]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ajouteAnnonce');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|string',
            'date_found' => 'nullable|date',
            'lieu' => 'nullable|string|max:255',
            'type' => 'required|string|max:50',
            'categorie' => 'required|string|max:255',  // Validation pour une chaîne de caractères
            'id_auteur' => 'string|max:255',  // Validation pour une chaîne de caractères
        ]);
        // dd(Auth::user()->id);
        // Création de l'annonce avec la catégorie incluse
        Annonce::create($validatedData);

        return redirect('/home');
    }

    public function  statistic()
    {
        return view('statistic');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $annonce = Annonce::with('commentaires')->findOrFail($id);
        return view('detaile', compact('annonce'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $annonce  = Annonce::find($id);
        return view('editeAnnonce', ['annonce' => $annonce]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $annonce = Annonce::find($id);
        $validatedData = $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|string',
            'date_found' => 'nullable|date',
            'lieu' => 'nullable|string|max:255',
            'type' => 'required|string|max:50',
            'categorie' => 'required|string|max:255',
            'id_auteur' => 'string|max:255',
        ]);
        $annonce->update([$validatedData]);
        return redirect('/dashboard');
    }

    public function  search(Request $request)
    {
        $se =  $request->search;
        $annonces = Annonce::where(function ($query) use ($se) {
            $query->where('titre', 'like', "%$se%")
                ->orWhere('description', 'like', "%$se%")
                ->orWhere('categorie', 'like', "%$se%");
        })->orWhereHas('users', function ($query) use ($se) {
            $query->where('name', 'like', "%$se%")
                ->orWhere('prenom', 'like', "%$se%");
        })->get();
        return view('dashboard', ['annonces' => $annonces]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $annonce  = Annonce::find($id);

        if ($annonce) {
            $annonce->delete();
        }
        return redirect('/article.index');
    }
}
