<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collaborateur;
use App\Models\Entreprise;

class CollaborateurController extends Controller
{
    public function add_form ()
    {
        return view('collaborateurs.add_collaborateur');
    }

    public function list() 
    {
        $all_entre = new Collaborateur();
        $list = $all_entre::all();
        return view('collaborateurs.list', ['list' => $list]);
    }

    public function delete_hub ()
    {
        $list = Collaborateur::all();
        return view('collaborateurs.delete_hub', ['list' => $list]);
    }

    public function delete_fromid($id)
    {
        $to_delete = Collaborateur::find($id);
        $to_delete->delete();
        return redirect('collaborateur/delete');
    }

    public function modify_form($id)
    {
        $to_mod = Collaborateur::find($id);
        if (!$to_mod)
            return redirect('collaborateur/list');
        return view('collaborateurs.modify_collaborateur', ['collab'=>$to_mod]);
    }

    public function visualise($id)
    {
        $collab = Collaborateur::find($id);
        if (!$collab)
            return redirect('/collaborateur/list');
        return view('collaborateurs.lookup', ['collaborateur' => $collab]);
    }

    public function modify_fromid($id, Request $request)
    {
        $to_mod = Collaborateur::find($id);
        $data = $request->validate([
            'nom' => 'required',
            'prenom'=> 'required',
            'civilite' => 'required',
            'email' => ['email', 'required', 'unique:App\Models\Collaborateur,email,'.$id],
            'code_postal' => 'min:5|max:5|required',
            'ville' => 'required',
            'telephone' => ['nullable', 'unique:App\Models\Collaborateur,telephone,'.$id],
            'entreprise' => 'exists:App\Models\Entreprise,nom',
        ]);
        $to_mod->nom = $request->nom;
        $to_mod->prenom = $request->prenom;
        $to_mod->code_postal = $request->code_postal;
        $to_mod->ville = $request->ville;
        if (isset($request->telephone))
            $to_mod->telephone = $request->telephone;
        else
            $to_mod->telephone = "null";
        $to_mod->email = $request->email;
        $to_mod->entreprise = $request->entreprise;
        $to_mod->save();
        return view('collaborateurs.list', ['list' => Collaborateur::all()]);
    }

    public function get_collab_info (Request $request)
    {
        $data = $request->validate([
            'nom' => 'required',
            'prenom'=> 'required',
            'civilite' => 'required',
            'email' => 'email|unique:App\Models\Collaborateur,email|required',
            'code_postal' => 'min:5|max:5|required',
            'ville' => 'required',
            'telephone' => 'nullable|unique:App\Models\Collaborateur,telephone',
            'entreprise' => 'exists:App\Models\Entreprise,nom',
        ]);
        $new_entry = new Collaborateur();
        $new_entry->civilite = $request->civilite;
        $new_entry->nom = $request->nom;
        $new_entry->prenom = $request->prenom;
        $new_entry->code_postal = $request->code_postal;
        $new_entry->ville = $request->ville;
        if (isset($request->telephone))
            $new_entry->telephone = $request->telephone;
        else
            $new_entry->telephone = "null";
        $new_entry->email = $request->email;
        $new_entry->entreprise = $request->entreprise;
        $new_entry->entreprise = $new_entry->company()->first()->nom;
        $new_entry->save();
        return redirect('/collaborateur/list');
    }
}
