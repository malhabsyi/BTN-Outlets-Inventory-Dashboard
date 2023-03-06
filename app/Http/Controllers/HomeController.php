<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OutletBtn;
use App\Models\KantorCabang;
use App\Models\Atm;
use App\Models\User;

class HomeController extends Controller
{
    public function index(){
        //BUAT NAMPILIN JUMLAH USER DALAM KCB YANG SAMA

        $nkantorcabang = KantorCabang::count();
        $noutlet = OutletBtn::count();

        $natmbiasa = Atm::where('atm_jenis','atm')->get();
        $natmbiasa = $natmbiasa->count();
        $natmcrm = Atm::where('atm_jenis','crm')->get();
        $natmcrm = $natmcrm->count();
        $natmmkk = Atm::where('atm_jenis','mkk')->get();
        $natmmkk = $natmmkk->count();

        $alloutlet = OutletBtn::where('outlet_status','sewa')->get();
        $alloutlet = $alloutlet->sortBy('outlet_deadline')->values()->all();
        $nalloutlet = OutletBtn::where('outlet_status','sewa')->get();
        $nalloutlet = $nalloutlet->count();

        $persensewaoutlet = OutletBtn::where('outlet_status','sewa')->get();
        $persensewaoutlet = ($persensewaoutlet->count()/$noutlet)*100;
        $persensewaoutlet = round($persensewaoutlet);
        $persenmilikoutlet = OutletBtn::where('outlet_status','milik perusahaan')->get();
        $persenmilikoutlet = ($persenmilikoutlet->count()/$noutlet)*100;
        $persenmilikoutlet = round($persenmilikoutlet);

        $userlogin = Auth::user();
        
        
        //NOTIFICATION
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $atmnotif = Atm::where('atm_deadline_bulan',$userlogin->last_login_bulan+3)->where('atm_status', 'sewa')->get();
        $atmnotif = Atm::where('atm_deadline_bulan',$userlogin->last_login_bulan+2)->where('atm_status', 'sewa')->get();
        $atmnotif = Atm::where('atm_deadline_bulan',$userlogin->last_login_bulan+1)->where('atm_status', 'sewa')->get();
        $atmnotif = Atm::where('atm_deadline_bulan',$userlogin->last_login_bulan)->where('atm_status', 'sewa')->get();


        $persenbelumdibayar = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa');
        $persenbelumdibayar = ($persenbelumdibayar->count()/$nalloutlet)*100;
        $persenbelumdibayar = round($persenbelumdibayar);
        $persensudahdibayar = 100-$persenbelumdibayar;

        
        return view ('homepage.index',compact('atmnotif','outletnotif','nalloutlet','persensudahdibayar','persenbelumdibayar','persensewaoutlet','persenmilikoutlet','alloutlet','natmbiasa','natmcrm','natmmkk','noutlet','nkantorcabang','userlogin'));

    }
}
