<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    function unique_idd(){
        $first = 'SUBJECTID';
        $second = uniqid();

        return ($first.$second);
    }
    public function createsubject(Request $req){
          
        $req->validate([
            'subjectname' => 'required',
            'subjectcode' => 'required',
        ]);
        $code = $this->unique_idd();
        $subject = new Subject;
        $subject->unique_id = $code;
        $subject->subject_name = $req->subjectname;
        $subject->subject_code = $req->subjectcode;

        if($subject->save()){
            return redirect()->route('CreateBasic')->with('success','Subject Created!!!');
        }else{
            return redirect()->route('CreateBasic')->with('error','Subject Not Created!!!');
        }
    }
    public function viewallsubjects(){
        $data = Subject::all();
        return view('admin.allsubjects' , ['allsubjects'=>$data]);
    }
    public function Vieweditsubject($id){
        $postedit = Subject::where('unique_id',$id)->first();
        $data = Subject::all();
    
        return view('admin.edit-subject',['postedit' => $postedit, 'allsubjects'=>$data]);
    }
    public function editsubject(Request $req, $unique_id){
        $req->validate([
            'subjectname' => 'required',
            'subjectcode' => 'required'
        ]);
        
        $condition = [
            ['unique_id', $unique_id],
        ];
        
        $subject = Subject::where($condition)->first();
    
        $subject->subject_name = $req->subjectname;
        $subject->subject_code = $req->subjectcode;

        
        if($subject->save()){
            return redirect()->route('EditSubject', $unique_id)->with('success','Subject Updated!!!');
        }else{
            return redirect()->route('EditSubject', $unique_id)->with('toast_error','Subject Not Updated!!!');
        }
    }
}
