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
    function createterm(Request $req){
         
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
            return redirect()->route('EditTerm', $unique_id)->with('toast_error','Term Not Updated!!!');
        }
    }

    public function activateTerm($id){
        $condition = [
            ['status','active'],
        ];
        //Deactivate the Active Term first
        $deactivateActiveTerm = Term::where($condition)->first();
        
        if($deactivateActiveTerm){
            
            if($deactivateActiveTerm->id === $id){
                return redirect()->route('allTerms')->with('success','Term is already Active!!!');
            }else{
                
                //Deactivate the Active Term first
                $deactivateActiveTerm->status = 'inactive';
                if($deactivateActiveTerm->save()){
                     //Activate the Desired Term
                $ActivateTerm = Term::where('id',$id)->first();
                $ActivateTerm->status = 'active';
    
                    if($ActivateTerm->save()){
                        return redirect()->route('allTerms')->with('toast_success','Term Activated!!!');
                    }else{
                        return redirect()->route('allTerms')->with('toast_error','Term Not A!!!');
                    }
                }else{
                    return redirect()->route('allTerms')->with('toast_error','Unexpected Error, Try again');
                }
            }    
        }else{
            //Activate the Desired Term
            $ActivateTerm = Term::where('id',$id)->first();
            
            $ActivateTerm->status = 'active';

            if($ActivateTerm->save()){
                return redirect()->route('allTerms')->with('toast_success','Term Activated!!!');
            }else{
                return redirect()->route('allTerms')->with('toast_error','Term Not A!!!');
            }
        }
        
    }

    public function deactivateterm($id){
        $condition = [
            ['status','inactive'],
        ];
        //Check if the term is already deactivated...
        $deactivatedterm = Term::where($condition)->first();

        if($deactivatedterm){
            if($deactivatedterm->id === $id ){
                return redirect()->route('allTerms')->with('toast_error','Term is already Deactivated');
            }else{
                //Deactivate the Term...
                $deactivateTerm = Term::find($id);
                $deactivateTerm->status = 'inactive';
                if($deactivateTerm->save()){
                    return redirect()->route('allTerms')->with('success','Term Deactivated');
                }else{
                    return redirect()->route('allTerms')->with('error','Term Not Deactivated');
                }
            }
        }else{
            //Deactivate the Term...
            $deactivateTerm = Term::find($id);
            $deactivateTerm->status = 'inactive';
            if($deactivateTerm->save()){
                return redirect()->route('allTerms')->with('success','Term Deactivated');
            }else{
                return redirect()->route('allTerms')->with('error','Term Not Deactivated');
            }
        }

    }
}
