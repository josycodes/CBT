<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SessionController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    function unique_idd(){
        $first = 'SESSIONID';
        $second = uniqid();

        return ($first.$second);
    }
    public function createsession(Request $req){
      
        $req->validate([
            'startyear' => 'required',
            'endyear' => 'required',
        ]);
        $start = $req->startyear;
        $end = $req->endyear;
        
        if($start >= $end){
            return redirect()->route('CreateBasic')->with('toast_error','Invalid Session, Make Sure the Start year is initial/Lesser to/than the End year!!!');
            
        }else{
            
            $code = $this->unique_idd();
            
                    $session = new Session;
                    $session->unique_id = $code;
                    $session->session = $req->startyear."/".$req->endyear;
                   

                    if($session->save()){
                        return redirect()->route('CreateBasic')->with('success','Session Created!!!');
                    }else{
                        return redirect()->route('CreateBasic')->with('error','Session Not Created!!!');
                    }
        }

       
    }
    public function viewallsessions(){
        $data = Session::all();
        return view('admin.allsessions' , ['allsessions'=>$data]);
    }

    public function Vieweditsession($id){
        $postedit = Session::where('unique_id',$id)->first();
        $data = Session::all();
    
        return view('admin.edit-session',['postedit' => $postedit, 'allsessions'=>$data]);
    }
    public function editsession(Request $req,$unique_id){
        $req->validate([
            'startyear' => 'required',
            'endyear' => 'required',
        ]);
       
        
        if($req->startyear >= $req->endyear){
            return redirect()->route('EditSession', $unique_id)->with('toast_error','Invalid Session, Make Sure the Start year is initial/Lesser to/than the End year!!!');

        }else{
           $condition = [
            ['unique_id', $unique_id],
        ];
        
        $session = Session::where($condition)->first();
    
        $session->session = $req->startyear."/".$req->endyear;

        if($session->save()){
            return redirect()->route('EditSession', $unique_id)->with('success','Session Updated!!!');
        }else{
            return redirect()->route('EditSession', $unique_id)->with('toast_error','Session Not Updated!!!');
        } 
        }
        

        
    }

}
