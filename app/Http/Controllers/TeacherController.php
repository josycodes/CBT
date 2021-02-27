<?php

namespace App\Http\Controllers;
use App\Models\Teacher;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    public function unique_idd(){
        $first = 'TEACHERID';
        $second = uniqid();

        return ($first.$second);
    }
    public function createteacher(Request $req){
         
        $req->validate([
            'teachername' => 'required',
        ]);
        $code = $this->unique_idd();
        $teacher = new Teacher;
        $teacher->unique_id = $code;
        $teacher->teacher_name = $req->teachername;

        if($teacher->save()){
            return redirect()->route('CreateBasic')->with('success','Teacher Created!!!');
        }else{
            return redirect()->route('CreateBasic')->with('error','Teacher Not Created!!!');
        }
    }
    public function viewallteachers(){
        $data = Teacher::all();
        return view('admin.allteachers' , ['allteachers'=>$data]);
    }
    public function Vieweditteacher($id){
        $postedit = Teacher::where('unique_id',$id)->first();
        $data = Teacher::all();
    
        return view('admin.edit-teacher',['postedit' => $postedit, 'allteachers'=>$data]);
    }

    public function editteacher(Request $req,$unique_id){
        $req->validate([
            'teachername' => 'required',
        ]);
        
        $condition = [
            ['unique_id', $unique_id],
        ];
        
        $teacher = Teacher::where($condition)->first();
    
        $teacher->teacher_name = $req->teachername;

        $data = Teacher::all();
        
        if($teacher->save()){
            return redirect()->route('EditTeacher', $unique_id)->with('success','Teacher Updated!!!');
        }else{
            return redirect()->route('EditTeacher', $unique_id)->with('toast_error','Teacher Not Updated!!!');
        }
    }
}
