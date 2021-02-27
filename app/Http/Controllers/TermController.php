<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Term;

class TermController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    function unique_idd(){
        $first = 'TERMID';
        $second = uniqid();

        return ($first.$second);
    }
    function createteRM(Request $req){
         
        $req->validate([
            'termname' => 'required',
        ]);
        $code = $this->unique_idd();
        $term = new Term;
        $term->unique_id = $code;
        $term->term_name = $req->termname;

        if($term->save()){
            return redirect()->route('CreateBasic')->with('success','Term Created!!!');
        }else{
            return redirect()->route('CreateBasic')->with('error','Term Not Created!!!');
        }
    }
    public function viewallterms(){
        $data = Term::all();
        return view('admin.allterms' , ['allterms'=>$data]);
    }
    public function Vieweditterm($id){
        $postedit = Term::where('unique_id',$id)->first();
        $data = Term::all();
    
        return view('admin.edit-term',['postedit' => $postedit, 'allterms'=>$data]);
    }
    public function editterm(Request $req,$unique_id){
        $req->validate([
            'termname' => 'required',
        ]);
        
        $condition = [
            ['unique_id', $unique_id],
        ];
        
        $term = Term::where($condition)->first();
    
        $term->term_name = $req->termname;

        
        if($term->save()){
            return redirect()->route('EditTerm', $unique_id)->with('success','Term Updated!!!');
        }else{
            return redirect()->route('EditTeacher', $unique_id)->with('toast_error','Term Not Updated!!!');
        }
    }
}
