<?php

namespace App\Http\Controllers;
use App\Models\Studentclass;

use Illuminate\Http\Request;

class StudentclassController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        
    }
    public function viewClass(){
            $data = studentclass::all();
            return view('admin.uploadStudent' ,['allclasses'=>$data]);
        }
    
    public function unique_idd(){
        $first = 'CLASSID';
        $second = uniqid();
        
        return ($first.$second);
    }
    
    public function createclass(Request $req){
        $req->validate([
            'classname' => 'required',
            'classcode' => 'required',
        ]);
        
        $code = $this->unique_idd();
        $studClass = new Studentclass;
        $studClass->unique_id = $code;
        $studClass->class_name = $req->classname;
        $studClass->class_code = $req->classcode;
        
        if($studClass->save()){
            return redirect()->route('CreateBasic')->with('success', 'Class Created!!!');
        }else{
            return redirect()->route('CreateBasic')->with('error', 'Class not Created!!!');
        }
    }
    public function Vieweditclass($id){
        $postedit = Studentclass::where('unique_id',$id)->first();
        $data = studentclass::all();
    
        return view('admin.edit-class',['postedit' => $postedit, 'allclasses'=>$data]);
    }
    public function editclass(Request $req, $unique_id){
        $req->validate([
            'classname' => 'required',
            'classcode' => 'required'
        ]);
        
        $condition = [
            ['unique_id', $unique_id],
        ];
        
        $class = Studentclass::where($condition)->first();
    
        $class->class_name = $req->classname;
        $class->class_code = $req->classcode;
        
        $data = studentclass::all();
        
        if($class->save()){
            return redirect()->route('EditClass', $unique_id)->with('success','Class Updated!!!');
        }else{
            return redirect()->route('EditClass', $unique_id)->with('toast_error','Class Not Updated!!!');
        }
    }

    public function viewallclasses(){
        $data = studentclass::all();
        return view('admin.allclasses' , ['allclasses'=>$data]);
    }

   
}
