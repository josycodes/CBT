<?php

namespace App\Http\Controllers;
use App\Models\Basic;
use App\Models\Session;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Term;
use App\Models\Studentclass;
use App\Models\Exam;
use Illuminate\Http\Request;


class BasicController extends Controller
{
   
    function __construct()
    {
        $this->middleware('auth');
    }
    
    function uploadLogo(Request $req){
     
        $req->validate([
            'filelogo'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'schoolname'   =>  'required',
            'schoolabv'    =>   'required',
            'regnoinitial' =>   'required',
            'generalinstr' =>   'required'
                      ]);
             if($req->allowreg == 1){
                $allowReg = 'yes';
             }else{
                 $allowReg = 'no';
             }    
        
        $filePath = $req->file('filelogo')->store('public/schoollogo');
        $imgName = explode('/' , $filePath);
        

        $basic = new Basic;
        $basic->logo = end($imgName);
        $basic->school_name = $req->schoolname;
        $basic->school_abv = $req->schoolabv;
        $basic->reg_no_initial = $req->regnoinitial;
        $basic->general_instru = $req->generalinstr;
        $basic->allow_reg = $allowReg;
        if($basic->save()){
            return redirect()->route('BasicSetting')->with('success','Uploaded Successfully!!!');
        }else{
            return redirect()->route('BasicSetting')->with('error','Upload Failed!!!');
        }
    }

    public function viewCreateBasics(){
        $subject = Subject::all();
        $term = Term::all();
        $class = Studentclass::all();
        $teacher = Teacher::all();
        $session = Session::all();
        return view('admin.create-basic', ['allsubjects' => $subject, 'allclasses' => $class,'allterms'=> $term, 'allteachers'=> $teacher,'allsessions'=> $session]);
    }




}
