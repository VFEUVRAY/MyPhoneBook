<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Entreprise;

class EntrepriseController extends Controller
{
    public function add_form () {
        return view('entreprises.add_entreprise');
    }

    public function list() 
    {
        $all_entre = new Entreprise();
        $list = $all_entre::all();
        return view('entreprises.list', ['list' => $list]);
    }

    public function delete_hub ()
    {
        $list = Entreprise::all();
        return view('entreprises.delete_hub', ['list' => $list]);
    }

    public function delete_fromid($id)
    {
        $to_delete = Entreprise::find($id);
        $collab_list = $to_delete->collaborateurs->all();
        foreach ($collab_list as $current_collab)
            $current_collab->delete();
        $to_delete->delete();
        return redirect('entreprise/delete');
    }

    public function modify_form($id)
    {
        $to_mod = Entreprise::find($id);
        if (!$to_mod)
            return redirect('entreprise/list');
        return view('entreprises.modify_entreprise', ['entreprise'=>$to_mod]);
    }

    public function modify_fromid($id, Request $request)
    {
        $to_mod = Entreprise::find($id);
        $data = $request->validate([
            'nom' => ['unique:App\Models\Entreprise,nom,'.$id, 'required'],
            'rue' => 'required',
            'code_postal' => 'min:5|max:5|required',
            'ville' => 'required',
            'telephone' => 'nullable|unique:App\Models\Entreprise,telephone,'.$id,
            'email' => 'email|required|unique:App\Models\Entreprise,email,'.$id,
        ]);
        
        $to_mod->nom = $request->nom;
        $to_mod->rue = $request->rue;
        $to_mod->ville = $request->ville;
        $to_mod->code_postal = $request->code_postal;
        if (isset($request->telephone))
            $to_mod->telephone = $request->telephone;
        else
            $to_mod->telephone = "null";
        $to_mod->email = $request->email;
        $to_mod->save();
        return view('entreprises.list', ['list' => Entreprise::all()]);
    }

    public function get_entreprise_form (Request $request) {
        $data = $request->validate([
            'nom' => 'unique:App\Models\Entreprise,nom|required',
            'rue' => 'required',
            'code_postal' => 'min:5|max:5|required',
            'ville' => 'required',
            'telephone' => 'nullable|unique:App\Models\Entreprise,telephone',
            'email' => 'email|required|unique:App\Models\Entreprise,email',
        ]);
        $new_entry = new Entreprise();
        $new_entry->nom = $request->nom;
        $new_entry->rue = $request->rue;
        $new_entry->ville = $request->ville;
        $new_entry->code_postal = $request->code_postal;
        if (isset($request->telephone))
            $new_entry->telephone = $request->telephone;
        else
            $new_entry->telephone = "null";
        $new_entry->email = $request->email;
        $new_entry->save();
        return redirect('/entreprise/list');
    }

    public function lookup($id)
    {
        $entreprise = Entreprise::find($id);
        if (!$entreprise)
            return redirect('/entreprise/list');
        return view('entreprises.lookup', ['entreprise' => $entreprise]);
    }
}
