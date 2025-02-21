<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commentaire;
class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'create';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comm = Commentaire::find($id);
        return view('editeCommentaire',['commentaire'=>$comm]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comm = Commentaire::find($id);
        $commentaire = Commentaire::find($id);
        $validatedData = $request->validate(['content' => 'required|string|max:1000',]);
        $commentaire->update(['content' => $validatedData['content']]);
        return redirect('/annonce/'.$commentaire->id_annonce);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $conm = Commentaire::find($id);
    
        if ($conm) {
            $conm->delete();
        }

        return redirect('/annonce/'.$conm->id_annonce);
    }
}
