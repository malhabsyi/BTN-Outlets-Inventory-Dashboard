<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItematmController extends Controller
{
    //
    public function index($id){
        $itematm = ItemAtm::where('atm_id',$id)->get();
        return view('ItemAtm.index',compact('itematm'));
    }
    public function create(){
        return view('ItemAtm.create');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'itematm_name'=> 'required',
            'atm_id'=> 'required',
            'itematm_note'=> 'required',
            'itematm_image'=> 'required',
        ]);
        $itematm = new itematm;
        $itematm-> itematm_name = $request->input('itematm_name');
        $itematm-> atm_id = $request->input('atm_id');
        $itematm-> itematm_note = $request->input('itematm_note');
        if ($request->hasfile('itematm_image')){
            $file = $request->file('itematm_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file-> move('uploads/itematm/',$filename);
            $itematm->itematm_image = $filename;
        }
        $itematm->save();
        return redirect()->back()->with('status','Pesan : itematm telah ditambahkan');
    }

    public function edit($id){
        $itematm = itematm::find($id);
        return view('ItemAtm.edit',compact('itematm'));
    }
    public function update(Request $request,$id){
        $itematm = ItemAtm::find($id);
        $itematm-> itematm_name = $request->input('itematm_name');
        $itematm-> atm_id = $request->input('atm_id');
        $itematm-> itematm_note = $request->input('itematm_note');
        if ($request->hasfile('itematm_image')){
            $destination = 'uploads/itematm/'.$itematm->itematm_image;
            if (File::exists($destination)){
                File::delete($destination);

            }
            $file = $request->file('itematm_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file-> move('uploads/itematm/',$filename);
            $itematm->itematm_image = $filename;
        }
        $itematm->save();
        return redirect()->back()->with('status','Pesan : itematm telah diperbarui');
    }
}
