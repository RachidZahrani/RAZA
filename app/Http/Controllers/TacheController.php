<?php

namespace App\Http\Controllers;

use App\Mail\TacheReached;
use App\Events\modifyTach;
use App\Models\Tache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class TacheController extends Controller
{
    public function index(Request $request)
    {

        $taches = Tache::query();

        if ($request->has('status') && !empty($request->status)) {
            $taches = $taches->where('statut', $request->status);
        }
        
        if ($request->has('trier') && !empty($request->trier)) {
            $trier = $request->trier;
            if ($trier == 'date') {
                $taches->orderBy('date');
            } elseif ($trier == 'alpha') {
                $taches->orderBy('titre');
            }
        }

        $t = $taches->paginate(10);
        return view('home', ['taches' => $t]);

    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'titre' => 'required',
            'description' => 'required',
            'date' => 'required',
            'statut' => 'required',

        ]);

        $tache = new Tache;
        $tache->titre = $request->titre;
        $tache->description = $request->description;
        $tache->date = $request->date;
        $tache->statut = $request->statut;  

        $tache->save();

        Mail::to($request->user())->send(new TacheReached($tache));

        return redirect()->route('tache.index');
    }
    public function edit($id)
    {
        $t = Tache::where('id',$id)->get();
        return view('edit',['tache'=> $t]);
    }

    public function update(Request $request, $id)
    {
        if($request->zahrani){
            $tache = Tache::find($id);
            $tache->statut = 'terminee';
            $tache->save();
            return redirect()->route('tache.index'); 
        }
        else{
            $validate = $request->validate([
                'titre' => 'required',
                'description' => 'required',
                'date' => 'required',
                'statut' => 'required',
    
            ]);
            $tache = Tache::find($id);
            $tache->titre = $request->titre;
            $tache->description = $request->description;
            $tache->date = $request->date;
            $tache->statut = $request->statut;
            $tache->save();
            modifyTach::dispatch($tache);
           return redirect()->route('tache.index');
    
        }
    }
    public function destroy($id)
    {

       $t =  Tache::find($id)->delete();

       return redirect()->route('tache.index');
    }

    public function search(Request $request)
    {
        $request->validate([
            'value' => 'required'
        ]);
        $v = $request->input('value');
        $taches = Tache::where('titre', 'LIKE', "%$v%")
                        ->orWhere('description', 'LIKE', "%$v%")
                        ->paginate(10);

        return view('home', ['taches' => $taches]);
    }

}
