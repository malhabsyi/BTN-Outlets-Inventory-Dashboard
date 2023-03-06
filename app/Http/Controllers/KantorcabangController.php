<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OutletBtn;
use App\Models\KantorCabang;
use Illuminate\Support\Facades\Auth;

class KantorcabangController extends Controller
{
    //
    public function index(){
        $kantorcabang = KantorCabang::all();
        return view('kantorcabang.index',compact('kantorcabang'));
    }
    public function create(){
    
        $kantorcabang = KantorCabang::all();
        return view('kantorcabang.create');
    }
    public function edit($id){
        if (Auth::user()->role == 'superadmin') {
            $kantorcabang = KantorCabang::find($id);
            return view('kantorcabang.edit',compact('kantorcabang'));
        } else {
            return view('kantorcabang.index');
        }
    }
    public function overview($id){
       
            $kantorcabang = KantorCabang::find($id);
            return view('kantorcabang.overview',compact('kantorcabang'));
    }
    public function update(Request $request,$id){
        $kantorcabang = KantorCabang::find($id);
        $kantorcabang-> kantor_cabang_name = $request->input('kantorcabang_name');
        $kantorcabang-> kantor_cabang_location = $request->input('kantorcabang_location');
        $kantorcabang-> kantor_cabang_sbh = $request->input('kantor_cabang_sbh');
        $kantorcabang-> kantor_cabang_note = $request->input('kantor_cabang_note');;
        if ($request->hasfile('image')){
            $destination = 'uploads/kantorcabang/'.$kantorcabang->kantor_cabang_image;
            if (File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file-> move('uploads/kantorcabang/',$filename);
            $kantorcabang->kantor_cabang_image = $filename;
        }

        
        $kantorcabang->save();
        return redirect('/kantorcabang');
    }
    public function destroy($id)
    {
        $kantorcabangdestroy = KantorCabang::find($id);
    
        $kantorcabangdestroy->delete();

        return redirect('/akun');
    }
}
