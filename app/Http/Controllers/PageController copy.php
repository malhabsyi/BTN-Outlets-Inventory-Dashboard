<?php

namespace App\Http\Controllers;
use App\Models\KantorCabang;
use App\Models\User;
use App\Models\OutletBtn;
use Illuminate\Http\Request;
use App\Models\Atm;
use App\Models\ItemAtm;
use App\Models\ItemOutlet;
use Illuminate\Support\Facades\Auth;
use \DateTime;
use Illuminate\Support\Facades\File;


class PageController extends Controller
{

    public function overview()
    {

        
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
        $atmnotif = Atm::where('atm_deadline_bulan', '>=', $userlogin->last_login_bulan)
        ->where('atm_deadline_bulan', '<=', $userlogin->last_login_bulan+3)
        ->where('atm_status', 'sewa')
        ->orderBy('atm_deadline_bulan')
        ->get();

        $persenbelumdibayar = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa');
        $persenbelumdibayar = ($persenbelumdibayar->count()/$nalloutlet)*100;
        $persenbelumdibayar = round($persenbelumdibayar);
        $persensudahdibayar = 100-$persenbelumdibayar;

        $title = "Overview";

        $breadcrumb = [
            'page-title' => 'Overview',
            'sub-title' => 'Informasi Mengenai Kantor Wilayah III'
        ];

        return view('pages.overview', compact(
            'atmnotif','outletnotif','nalloutlet','persensudahdibayar','persenbelumdibayar','persensewaoutlet','persenmilikoutlet','alloutlet','natmbiasa','natmcrm','natmmkk','noutlet','nkantorcabang','userlogin','title','breadcrumb'
        ));
    }

    public function profile()
    {
        $userlogin = Auth::user();
        
        //NOTIFICATION
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $atmnotif = Atm::where('atm_deadline_bulan', '>=', $userlogin->last_login_bulan)
        ->where('atm_deadline_bulan', '<=', $userlogin->last_login_bulan+3)
        ->where('atm_status', 'sewa')
        ->orderBy('atm_deadline_bulan')
        ->get();
        $title = "Profile";

        $breadcrumb = [
            'page-title' => 'Profile',
            'sub-title' => 'Profil User Kantor Cabang Mulyosari'
        ];

        return view('pages.profile', compact('title','breadcrumb','userlogin','atmnotif','outletnotif'));
    }

    public function editProfile()
    {
        $userlogin = Auth::user();
        
        //NOTIFICATION
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $atmnotif = Atm::where('atm_deadline_bulan', '>=', $userlogin->last_login_bulan)
        ->where('atm_deadline_bulan', '<=', $userlogin->last_login_bulan+3)
        ->where('atm_status', 'sewa')
        ->orderBy('atm_deadline_bulan')
        ->get();

        $title = "Profile";

        $breadcrumb = [
            'page-title' => 'Profile',
            'sub-title' => 'Profil User Kantor Cabang Mulyosari'
        ];

        return view('pages.profile', compact('title','breadcrumb','userlogin','atmnotif','outletnotif'));
    }

    public function createOutlet()
    {
        $userlogin = Auth::user();
        
        //NOTIFICATION
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $atmnotif = Atm::where('atm_deadline_bulan', '>=', $userlogin->last_login_bulan)
        ->where('atm_deadline_bulan', '<=', $userlogin->last_login_bulan+3)
        ->where('atm_status', 'sewa')
        ->orderBy('atm_deadline_bulan')
        ->get();

        $kantorcabang = kantorCabang::all();
        
        $status = ['sewa','milik perusahaan'];
        
        
        $title = "Create Outlet";

        $breadcrumb = [
            'page-title' => 'Create Outlet',
            'sub-title' => 'Form Pembuatan Outlet Kantor Cabang Mulyosari'
        ];

        return view('pages.create-outlet', compact('kantorcabang','status','title','breadcrumb','userlogin','atmnotif','outletnotif'));
    }

    public function editOutlet($id)
    {
        $userlogin = Auth::user();
        
        //NOTIFICATION
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $atmnotif = Atm::where('atm_deadline_bulan', '>=', $userlogin->last_login_bulan)
        ->where('atm_deadline_bulan', '<=', $userlogin->last_login_bulan+3)
        ->where('atm_status', 'sewa')
        ->orderBy('atm_deadline_bulan')
        ->get();
        $title = "Edit Outlet";

        $breadcrumb = [
            'page-title' => 'Edit Outlet',
            'sub-title' => 'Form Perubahan Outlet Kantor Cabang Mulyosari'
        ];
        $outlet = OutletBtn::find($id);
            $oldDate = new DateTime("$outlet->outlet_deadline_tahun-$outlet->outlet_deadline_bulan-$outlet->outlet_deadline_tanggal");
            $outletdeadline = $oldDate->format('Y-m-d');
        $status = ['sewa','milik perusahaan'];

        return view('pages.edit-outlet', compact('status','outletdeadline','outlet','title','breadcrumb','userlogin','atmnotif','outletnotif'));
    }

    public function overviewOutlet($id)
    {
        $userlogin = Auth::user();
        $outlet = OutletBtn::find($id);
        //NOTIFICATION
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $atmnotif = Atm::where('atm_deadline_bulan', '>=', $userlogin->last_login_bulan)
        ->where('atm_deadline_bulan', '<=', $userlogin->last_login_bulan+3)
        ->where('atm_status', 'sewa')
        ->orderBy('atm_deadline_bulan')
        ->get();
        $userlogin = Auth::user();
        $title = "Overview Outlet";

        $breadcrumb = [
            'page-title' => 'Overview Outlet',
            'sub-title' => 'Overview Outlet Nginden Semolo'
        ];
        $atm = Atm::where('outlet_id',$outlet->id)->get();
        $countatm = $atm->count();
        $itemoutlet = ItemOutlet::where('outlet_id',$outlet->id)->get();



        return view('pages.overview-outlet', compact('itemoutlet','atm','countatm','outlet','title','breadcrumb','userlogin','atmnotif','outletnotif'));

    }
    public function updateOutlet(Request $request,$id){
        $outlet = OutletBtn::find($id);
        $outlet-> outlet_name = $request->input('outlet_name');
        $outlet-> outlet_location = $request->input('outlet_location');
        $outlet-> outlet_note = $request->input('outlet_note');
        $outlet-> outlet_sbh = $request->input('outlet_sbh');
        
        $date = $request->input('date');
        
        $dateParts = explode('-', $date);
        $outlet->outlet_deadline_tahun = $dateParts[0];
        $outlet->outlet_deadline_bulan = $dateParts[1];
        $outlet->outlet_deadline_tanggal = $dateParts[2];


        if ($request->hasfile('outlet_image')){
            $destination = 'uploads/outlet/'.$outlet->outlet_image;
            if (File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('outlet_image');
            $extension = $file->getClientOriginalExtension();
            $filename = $outlet->outlet_name.'.'.$extension;
            $file-> move('uploads/outlet/',$filename);
            $outlet->outlet_image = $filename;
        }
        else{
            $outlet->outlet_image = "C:\Users\muhammad\btnapp-master\public\img\upload-image.svg";
        }

        $outlet->save();
        return redirect('/');
    }
    public function storeOutlet(Request $request){
        
        $outlet = new OutletBtn;
        $outlet-> outlet_name = $request->input('outlet_name');
        $outlet-> outlet_location = $request->input('outlet_location');
        $outlet-> outlet_note = $request->input('outlet_note');
        
        $outlet-> outlet_note = " ";
        if($request->input('outlet_note')==NULL){
            $outlet-> outlet_note = $request->input('outlet_note');
        }
        $outlet->outlet_status = $request->input('outlet_status');

            
        $outlet->kantor_cabang_id = $request->input('kantor_cabang_id'); 
        if($request->input('date')==NULL){
            
            $outlet->outlet_deadline_tahun = 0;
            $outlet->outlet_deadline_bulan = 0;
            $outlet->outlet_deadline_tanggal = 0;
    
        }
        else{
            $date = $request->input('date');
        
            $dateParts = explode('-', $date);
            $outlet->outlet_deadline_tahun = $dateParts[0];
            $outlet->outlet_deadline_bulan = $dateParts[1];
            $outlet->outlet_deadline_tanggal = $dateParts[2];

        }


        $outlet->outlet_image = "C:\Users\muhammad\btnapp-master\public\img\upload-image.svg";
        $outlet->save();
        dd($outlet);
        if ($request->hasfile('outlet_image')){
            $destination = 'uploads/outlet/'.$outlet->outlet_image;
            if (File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('outlet_image');
            $extension = $file->getClientOriginalExtension();
            $filename = $outlet->outlet_name.'.'.$extension;
            $file-> move('uploads/outlet/',$filename);
            $outlet->outlet_image = $filename;
        }

        
        $outlet->save();
        return redirect('/');
    }

    public function kantorCabang()
    {

        $userlogin = Auth::user();
        
        //NOTIFICATION
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $atmnotif = Atm::where('atm_deadline_bulan', '>=', $userlogin->last_login_bulan)
        ->where('atm_deadline_bulan', '<=', $userlogin->last_login_bulan+3)
        ->where('atm_status', 'sewa')
        ->orderBy('atm_deadline_bulan')
        ->get();
        $title = "Kantor Cabang";

        $breadcrumb = [
            'page-title' => 'Kantor Cabang',
            'sub-title' => 'Daftar Kantor Cabang dari Kantor Wilayah III'
        ];

        $kantorcabang = KantorCabang::all();

        return view('pages.kantor-cabang',compact(
            'kantorcabang','atmnotif','outletnotif','title','breadcrumb','userlogin'
        ));
    }

    public function overviewKantorCabang($id)
    {

        $userlogin = Auth::user();
        
        //NOTIFICATION
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $atmnotif = Atm::where('atm_deadline_bulan', '>=', $userlogin->last_login_bulan)
        ->where('atm_deadline_bulan', '<=', $userlogin->last_login_bulan+3)
        ->where('atm_status', 'sewa')
        ->orderBy('atm_deadline_bulan')
        ->get();
        $userlogin = Auth::user();
        $kantorcabang = KantorCabang::find($id);
        $title = "Overview Kantor Cabang";

        $breadcrumb = [
            'page-title' => 'Overview Kantor Cabang',
            'sub-title' => 'Overview'.' '.$kantorcabang->kantor_cabang_name,
        ];
        $atm = Atm::where('kantor_cabang_id',$kantorcabang->id)->get();
        $atmcount = $atm->count();
        $atmdeadline =[];
        for ($i=0; $i<$atmcount; $i++) {
            $deadline = $atm[$i]->atm_deadline_tanggal." - ".$atm[$i]->atm_deadline_bulan." - ".$atm[$i]->atm_deadline_tahun;
            if ($atm[$i]->outlet != NULL){
                $deadline = $atm[$i]->outlet->outlet_deadline_tanggal." - ".$atm[$i]->outlet->outlet_deadline_bulan." - ".$atm[$i]->outlet->outlet_deadline_tahun;
            };
            if ($atm[$i]->atm_status == "milik perusahaan"){
                $deadline = " milik perusahaan ";
            }
            $atmdeadline[$i]=$deadline;
            

        }
        
        $outlets = $kantorcabang->outlet;
        



        return view('pages.overview-cabang',compact('atmdeadline','outletnotif','atmnotif','userlogin','outlets','title','breadcrumb','kantorcabang'));
    }

    public function editKantorCabang($id)
    {
        if (Auth::user()->role == 'superadmin') {
            $userlogin = Auth::user();
        
            //NOTIFICATION
            $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
            $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
            $atmnotif = Atm::where('atm_deadline_bulan', '>=', $userlogin->last_login_bulan)
            ->where('atm_deadline_bulan', '<=', $userlogin->last_login_bulan+3)
            ->where('atm_status', 'sewa')
            ->orderBy('atm_deadline_bulan')
            ->get();
            $userlogin = Auth::user();
            $title = "Edit Kantor Cabang";
            $kantorcabang = KantorCabang::find($id);
            $breadcrumb = [
                'page-title' => 'Edit Kantor Cabang',
                'sub-title' => 'Form Perubahan Detail '.$kantorcabang->kantor_cabang_name
            ];
            return view('pages.edit-kantor-cabang',compact('outletnotif','atmnotif','userlogin','kantorcabang','title','breadcrumb'));
        } else {
            return view('page.overview-cabang');
        }

    }

    public function updateKantorCabang(Request $request,$id){
        $kantorcabang = KantorCabang::find($id);
        $kantorcabang-> kantor_cabang_name = $request->input('kantor_cabang_name');
        $kantorcabang-> kantor_cabang_location = $request->input('kantor_cabang_location');
        $kantorcabang-> kantor_cabang_sbh = $request->input('kantor_cabang_sbh');
        $kantorcabang-> kantor_cabang_note = $request->input('kantor_cabang_note');
        if ($request->hasfile('kantor_cabang_image')){
            
            $destination = '../uploads/kantorcabang/'.$kantorcabang->kantor_cabang_image;
            if (File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('kantor_cabang_image');
            $extension = $file->getClientOriginalExtension();
            $filename = $kantorcabang->kantor_cabang_name.'.'.$extension;
            $file-> move('uploads/kantorcabang/',$filename);
            $kantorcabang->kantor_cabang_image = $filename;
        }

        
        $kantorcabang->save();
        return redirect('kantor-cabang');
    }
    public function destroyKantorCabang(){
        $userlogin = Auth::user();
        $kantorcabangdestroy = KantorCabang::find($id);
    
        $kantorcabangdestroy->delete();

        return redirect('/akun');
    }
    
    public function overviewAtm($id)
    {
        $title = "Overview ATM/CRM";
        $userlogin = Auth::user();
        
        //NOTIFICATION
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
        $atmnotif = Atm::where('atm_deadline_bulan', '>=', $userlogin->last_login_bulan)
        ->where('atm_deadline_bulan', '<=', $userlogin->last_login_bulan+3)
        ->where('atm_status', 'sewa')
        ->orderBy('atm_deadline_bulan')
        ->get();

        $breadcrumb = [
            'page-title' => 'Overview ATM/CRM',
            'sub-title' => 'Overview ATM pada Outlet Unair'
        ];

        $atm = Atm::find($id);
        
        $oldDate = new DateTime("$atm->atm_deadline_tahun-$atm->atm_deadline_bulan-$atm->atm_deadline_tanggal");


        if ($atm->outlet != NULL){
            $outlettahun = $atm->outlet->outlet_deadline_tahun;
            $outletbulan = $atm->outlet->outlet_deadline_bulan;
            $outlettanggal = $atm->outlet->outlet_deadline_tanggal;
            $oldDate = new DateTime("$outlettanggal-$outletbulan-$outlettahun");

        };
        $atmdeadline = $oldDate->format('Y-m-d');
         
        $outletname = "Atm Offsite";
        if ($atm->outlet != NULL){
            $outletname = $atm->outlet->outlet_name;
        };

        $itematm = ItemAtm::where('atm_id',$atm->id)->get();



        return view('pages.overview-atm', compact('itematm','outletname','atmdeadline','atm','title','atmnotif','breadcrumb','outletnotif','userlogin'));
    }

    public function createAtm()
    {
        {
            if (Auth::user()->role == 'superadmin') {
                $title = "Create ATM/CRM";
                $userlogin = Auth::user();
                
                //NOTIFICATION
                $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
                $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
                $atmnotif = Atm::where('atm_deadline_bulan', '>=', $userlogin->last_login_bulan)
                ->where('atm_deadline_bulan', '<=', $userlogin->last_login_bulan+3)
                ->where('atm_status', 'sewa')
                ->orderBy('atm_deadline_bulan')
                ->get();
        
                $breadcrumb = [
                    'page-title' => 'Create ATM/CRM',
                    'sub-title' => 'Form Pembuatan ATM Kantor Cabang Mulyosari'
                ];
        
                $kantorcabang = kantorCabang::all();
                $outlet = OutletBtn::all();
                $status = ['sewa','milik perusahaan'];
                $jenis = ['mkk','atm','crm'];
                
                return view('pages.create-atm', compact('jenis','status','outlet','kantorcabang','title','breadcrumb','atmnotif','outletnotif','userlogin'));
    
            } else {
                return view('/');
            }
    
        }
    }

    public function editAtm($id)
    {

        if (Auth::user()->role == 'superadmin') {

            $userlogin = Auth::user();
        
            $title = "Edit ATM/CRM";
            $userlogin = Auth::user();
            
            //NOTIFICATION
            $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
            $outletnotif = OutletBtn::where('outlet_deadline_tahun',$userlogin->last_login_tahun)->where('outlet_status', 'sewa')->get();
            $atmnotif = Atm::where('atm_deadline_bulan', '>=', $userlogin->last_login_bulan)
            ->where('atm_deadline_bulan', '<=', $userlogin->last_login_bulan+3)
            ->where('atm_status', 'sewa')
            ->orderBy('atm_deadline_bulan')
            ->get();
            $breadcrumb = [
                'page-title' => 'Edit ATM/CRM',
                'sub-title' => 'Form Perubahan Detail ATM Kantor Cabang Mulyosari'
            ];
            $atm = Atm::find($id);
            $oldDate = new DateTime("$atm->atm_deadline_tahun-$atm->atm_deadline_bulan-$atm->atm_deadline_tanggal");
            $atmdeadline = $oldDate->format('Y-m-d');
             
            if ($atm->outlet != NULL){
                
                $outlettahun = $atm->outlet->outlet_deadline_tahun;
                $outletbulan = $atm->outlet->outlet_deadline_bulan;
                $outlettanggal = $atm->outlet->outlet_deadline_tanggal;
                $oldDate = new DateTime("$outlettanggal-$outletbulan-$outlettahun");

            };
            $atmdeadline = $oldDate->format('Y-m-d');
            $outletname = "Atm Offsite";
            if ($atm->outlet != NULL){
                $outletname = $atm->outlet->outlet_name;
                
            };
            
            return view('pages.edit-atm', compact('outletname','atmdeadline','atm','title','breadcrumb','atmnotif','outletnotif','userlogin'));    
        } else {
            return view('page.overview');
        }

    }
    public function updateAtm(Request $request,$id){
        $atm = Atm::find($id);
        $atm-> atm_name = $request->input('atm_name');
        $atm-> atm_location = $request->input('atm_location');
        $atm-> atm_note = $request->input('atm_note');;
        $atm-> atm_machine_id= $request->input('atm_machine_id');

        $date = $request->input('date');
        
        $dateParts = explode('-', $date);
        $atm->atm_deadline_tahun = $dateParts[0];
        $atm->atm_deadline_bulan = $dateParts[1];
        $atm->atm_deadline_tanggal = $dateParts[2];


        if ($request->hasfile('atm_image')){
            $destination = 'uploads/atm/'.$atm->atm_image;
            if (File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('atm_image');
            $extension = $file->getClientOriginalExtension();
            $filename = $atm->atm_name.'.'.$extension;
            $file-> move('uploads/atm/',$filename);
            $atm->atm_image = $filename;
        }
        else{
            $atm->atm_image = "C:\Users\muhammad\btnapp-master\public\img\upload-image.svg";
        }

        $atm->save();
        return redirect('/');
    }
    public function storeAtm(Request $request){
        $atm = new Atm;
        $atm-> atm_name = $request->input('atm_name');
        $atm-> atm_location = $request->input('atm_location');
        $atm-> atm_note = $request->input('atm_note');
        $atm-> atm_machine_id= $request->input('atm_machine_id');

        $atm-> atm_note = " ";
        if($request->input('atm_note')==NULL){
            $atm-> atm_note = $request->input('atm_note');
        }
        $atm->atm_jenis = $request->input('atm_jenis');
        $atm->atm_status = $request->input('atm_status');

            
        $atm->kantor_cabang_id = $request->input('kantor_cabang_id'); 
        $atm->outlet_id = $request->input('outlet_id'); 
        if($request->input('date')==NULL){
            
            $atm->atm_deadline_tahun = 0;
            $atm->atm_deadline_bulan = 0;
            $atm->atm_deadline_tanggal = 0;
    
        }
        else{
            $date = $request->input('date');
        
            $dateParts = explode('-', $date);
            $atm->atm_deadline_tahun = $dateParts[0];
            $atm->atm_deadline_bulan = $dateParts[1];
            $atm->atm_deadline_tanggal = $dateParts[2];

        }
        if($request->input('date')==NULL && $atm->outlet_id!=NULL){
            $outlet = OutletBtn::find($atm->outlet_id);
            $atm->atm_deadline_tahun = $outlet->outlet_deadline_tahun;
            $atm->atm_deadline_bulan = $outlet->outlet_deadline_bulan;
            $atm->atm_deadline_tanggal = $outlet->outlet_deadline_tanggal;
    
        }
        
        $atm->atm_image = "C:\Users\muhammad\btnapp-master\public\img\upload-image.svg";
        
        if ($request->hasfile('atm_image')){
            $destination = 'uploads/atm/'.$atm->atm_image;
            if (File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('atm_image');
            $extension = $file->getClientOriginalExtension();
            $filename = $atm->atm_name.'.'.$extension;
            $file-> move('uploads/atm/',$filename);
            $atm->atm_image = $filename;
        }

        
        $atm->save();
        return redirect('/');
    }

    public function createItemAtm($id)
    {
        $atm= Atm::find($id);
        if (Auth::user()->role == 'superadmin') {
            $title = "Create Item ATM/CRM";
            $userlogin = Auth::user();
            

            $breadcrumb = [
                'page-title' => 'Create Item ATM/CRM',
                'sub-title' => 'Form Pembuatan Item Atm'
            ];
            
            return view('pages.create-item-atm', compact('atm','title','breadcrumb','userlogin'));

        } else {
            return view('/');
        }

        
    }
    public function storeItemAtm(Request $request,$id)
    {   
        $atm= Atm::find($id);
        
        $request->validate([
            'itematm_name' => 'required|string|max:255',
            'itematm_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $itematm = new ItemAtm;
        $itematm->itematm_name = $request->itematm_name;
        $itematm->atm_id = $atm->id;
        
        // Upload the file and store the file path in the database
        if ($request->hasFile('itematm_image')) {
            $image = $request->file('itematm_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/uploads/itematm', $filename);
            $itematm->itematm_image = $filename;
        }
         
        $itematm->save();
        return redirect('/overview-cabang/overview-atm/'.$atm->id)->with('success', 'Item ATM has been added!');

        
    }
    public function updateItemAtm(Request $request,$id)
    {
        
        $itematm = ItemAtm::find($id);
        $itematm-> itematm_name = $request->input('itematm_name');
        if ($request->hasfile('itematm_image')){
            $destination = 'uploads/itematm/'.$itematm->itematm_image;
            if (File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('itematm_image');
            $extension = $file->getClientOriginalExtension();
            $filename = $itematm->itematm_name.'.'.$extension;
            $file-> move('uploads/itematm/',$filename);
            $itematm->itematm_image = $filename;
        }

        $itematm->save();
        return redirect('/');

        
    }

    public function editItemAtm($id)
    {
        $userlogin = Auth::user();
        
        $itematm = ItemAtm::find($id);
        $title = "Edit Item";

        $breadcrumb = [
            'page-title' => 'Edit Item',
            'sub-title' => 'Form Perubahan Item Outlet Unair'
        ];

        return view('pages.edit-item-atm', compact('itematm','title','breadcrumb','userlogin'));
    }



    public function createItemOutlet($id)
    {
        $outlet= OutletBtn::find($id);
        if (Auth::user()->role == 'superadmin') {
            $title = "Create Item Outlet";
            $userlogin = Auth::user();
            

            $breadcrumb = [
                'page-title' => 'Create Item Outlet',
                'sub-title' => 'Form Pembuatan Item Outlet'
            ];
            
            return view('pages.create-item-outlet', compact('outlet','title','breadcrumb','userlogin'));

        } else {
            return view('/');
        }

        
    }
    public function storeItemOutlet(Request $request,$id)
    {   
        $outlet= OutletBtn::find($id);
        
        $request->validate([
            'itemoutlet_name' => 'required|string|max:255',
            'itemoutlet_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $itemoutlet = new ItemOutlet;
        $itemoutlet->itemoutlet_name = $request->itemoutlet_name;
        $itemoutlet->outlet_id = $outlet->id;
        
        // Upload the file and store the file path in the database
        if ($request->hasFile('itemoutlet_image')) {
            $image = $request->file('itemoutlet_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/uploads/itemoutlet', $filename);
            $itemoutlet->itemoutlet_image = $filename;
        }
         
        $itemoutlet->save();
        return redirect('/overview-cabang/overview-outlet/'.$outlet->id)->with('success', 'Item ATM has been added!');

        
    }
    public function updateItemOutlet(Request $request,$id)
    {
        
        $itemoutlet = ItemOutlet::find($id);
        $itemoutlet-> itemoutlet_name = $request->input('itemoutlet_name');
        if ($request->hasfile('itemoutlet_image')){
            $destination = 'uploads/itemoutlet/'.$itemoutlet->itemoutlet_image;
            if (File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('itemoutlet_image');
            $extension = $file->getClientOriginalExtension();
            $filename = $itemoutlet->itemoutlet_name.'.'.$extension;
            $file-> move('uploads/itemoutlet/',$filename);
            $itemoutlet->itemoutlet_image = $filename;
        }

        $itemoutlet->save();
        return redirect('/');

        
    }

    public function editItemOutlet($id)
    {
        $userlogin = Auth::user();
        
        $itemoutlet = ItemOutlet::find($id);
        $title = "Edit Item";

        $breadcrumb = [
            'page-title' => 'Edit Item',
            'sub-title' => 'Form Perubahan Item Outlet Unair'
        ];

        return view('pages.edit-item-outlet', compact('itemoutlet','title','breadcrumb','userlogin'));
    }



    public function indikatorPenilaian()
    {
        $title = "Indikator Penilaian";

        $breadcrumb = [
            'page-title' => 'Indikator Penilaian',
            'sub-title' => 'List Penilaian Item ATM pada Outlet Unair'
        ];

        return view('pages.indikator-penilaian', ['title' => $title, 'breadcrumb' => $breadcrumb]);
    }

    public function editIndikatorPenilaian()
    {
        $title = "Indikator Penilaian";

        $breadcrumb = [
            'page-title' => 'Indikator Penilaian',
            'sub-title' => 'List Penilaian Item ATM pada Outlet Unair'
        ];

        return view('pages.edit-indikator-penilaian', ['title' => $title, 'breadcrumb' => $breadcrumb]);
    }
}