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
    
    public function activatesession($id){
        $condition = [
            ['status','active'],
        ];
        //Deactivate the Active Session first
        $deactivateActiveSession = Session::where($condition)->first();
        
        if($deactivateActiveSession){
            
            if($deactivateActiveSession->id === $id){
                return redirect()->route('allSessions')->with('success','Session is already Active!!!');
            }else{
                
                //Deactivate the Active Session first
                $deactivateActiveSession->status = 'inactive';
                if($deactivateActiveSession->save()){
                     //Activate the Desired Session
                $ActivateSession = Session::where('id',$id)->first();
                $ActivateSession->status = 'active';
    
                    if($ActivateSession->save()){
                        return redirect()->route('allSessions')->with('toast_success','Session Activated!!!');
                    }else{
                        return redirect()->route('allSessions')->with('toast_error','Session Not A!!!');
                    }
                }else{
                    return redirect()->route('allSessions')->with('toast_error','Unexpected Error, Try again');
                }
            }    
        }else{
            //Activate the Desired Session
            $ActivateSession = Session::where('id',$id)->first();
            
            $ActivateSession->status = 'active';

            if($ActivateSession->save()){
                return redirect()->route('allSessions')->with('toast_success','Session Activated!!!');
            }else{
                return redirect()->route('allSessions')->with('toast_error','Session Not A!!!');
            }
        }
    }
    public function deactivatesession($id){
        $condition = [
            ['status','inactive'],
        ];
        //Check if the session is already deactivated...
        $deactivatedsession = Session::where($condition)->first();

        if($deactivatedsession){
            if($deactivatedsession->id === $id ){
                return redirect()->route('allSessions')->with('toast_error','Session is already Deactivated');
            }else{
                //Deactivate the Session...
                $deactivateSession = Session::find($id);
                $deactivateSession->status = 'inactive';
                if($deactivateSession->save()){
                    return redirect()->route('allSessions')->with('success','Session Deactivated');
                }else{
                    return redirect()->route('allSessions')->with('error','Session Not Deactivated');
                }
            }
        }else{
            //Deactivate the Session...
            $deactivateSession = Session::find($id);
            $deactivateSession->status = 'inactive';
            if($deactivateSession->save()){
                return redirect()->route('allSessions')->with('success','Session Deactivated');
            }else{
                return redirect()->route('allSessions')->with('error','Session Not Deactivated');
            }
        }

    }

}
