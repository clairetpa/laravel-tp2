<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::select(
            'documents.*',
            'etudiants.nom as etudiant_nom'
        )
        ->join('etudiants', 'documents.userid', '=', 'etudiants.userId')
        ->orderBy('documents.date', 'DESC')
        ->paginate(10); //récupérer tous les documents de la DB */

        return  view('document.index', ['documents' => $documents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file'=>'required'
        ]);

        

        $fileName = $request->file->getClientOriginalName();
        $request->file->storeAs('public', $fileName);

        $document = new Document();
        $document->nom = $fileName;
        $document->langue = $request->langue;
        $document->userId = session()->get('etudiant')->userId;
        $document->date = Carbon::now()->format('Y-m-d');
        $document->save();

        return redirect(route('document.index')); 
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {

        return view('document.edit', ['document' => $document]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        if(session()->get('etudiant')->userId == $document->userId){
            $request->validate([
                'file'=>'required'
            ]);

            $fileName = $request->file->getClientOriginalName();
            $request->file->storeAs('public', $fileName);
            $document->update([
                'nom'=>$fileName,
                'langue'=>$request->langue,
                'date'=> Carbon::now()->format('Y-m-d')
            ]);
        }
        return redirect(route('document.index'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function download(Document $document)
    {
        $path = Storage::disk('public')->path($document->nom);
        return Response::download($path);
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $document->delete();
        return redirect(route('document.index'));
    }
}
