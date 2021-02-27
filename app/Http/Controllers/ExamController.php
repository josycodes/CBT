<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Term;
use App\Models\Studentclass;
use App\Models\Exam;

class ExamController extends Controller
{
     
    function __construct()
    {
        $this->middleware('auth');
    }
    function unique_idd(){
        $first = 'EXAMID';
        $second = uniqid();

        return ($first.$second);
    }

    public function classClasses(){
        $arr = ['btn btn-shadow-primary btn-primary','btn btn-shadow-secondary btn-secondary','btn btn-shadow-success btn-success',' btn btn-shadow-info btn-info','btn btn-shadow-info btn-info','btn btn-shadow-warning btn-warning','btn btn-shadow-danger btn-danger','btn btn-shadow-focus btn-focus','btn btn-shadow-alternate btn-alternate','btn btn-shadow-light btn-light','btn btn-shadow-dark btn-dark','btn btn-shadow-link btn-link'];
        $rand = rand(0,12);
        return $arr[$rand];
    }

    public function viewCreateExam(){
        $subject = Subject::all();
        $term = Term::all();
        $class = Studentclass::all();
        $teacher = Teacher::all();
        $session = Session::all();
        return view('admin.create-exam', ['allsubjects' => $subject, 'allclasses' => $class,'allterms'=> $term, 'allteachers'=> $teacher,'allsessions'=> $session]);
    }
    public function createexam(Request $req){
        $req->validate([
            'subject' => 'required',
            'studentclass' => 'required',
            'teacher' => 'required',
            'term' => 'required',
            'session' => 'required',
            'numminutes' => 'required',
            'numquestion' => 'required',
            'examstatus' => 'required',
            'warnmin' => 'required',
            'resultstatus' => 'required',
        ]);
        $code = $this->unique_idd();
        $exam = new Exam;
        $exam->exam_id = $code;
        $exam->subject = $req->subject;
        $exam->class = $req->studentclass;
        $exam->teacher = $req->teacher;
        $exam->term = $req->term;
        $exam->session = $req->session;
        $exam->exam_minutes = $req->numminutes;
        $exam->warn_minutes = $req->warnmin;
        $exam->num_questions = $req->numquestion;
        $exam->exam_status = $req->examstatus;
        $exam->show_result = $req->resultstatus;

        if($exam->save()){
            return redirect()->route('CreateExam')->with('success','Exam Created!!!');
        }else{
            return redirect()->route('CreateExam')->with('error','Exam Not Created!!!');
        }


    }
}
