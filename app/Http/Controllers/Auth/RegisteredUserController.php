<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\imports\UsersImport;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }
    
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);
        
        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));
        
        event(new Registered($user));
        
        return redirect(RouteServiceProvider::HOME);
    }
    function unique_idd(){
        $first = 'STUDENTID';
        $second = uniqid();
        
        return ($first.$second);
    }
    public function passid(){
        $first = 'PASSID';
        $second = uniqid();
        
        return ($first.$second);
    }
    public function importExcel(Request $req){
     $data = Excel::toArray(new UsersImport,$req->file);
        $insertdata = 0;
        foreach($data as $student){
           
           foreach($student as $val){
            
            $user = new User;
            $user->user_type = 'student';
            $user->name = $val['full_name'];
            $user->email = $val['email'];
            $user->unique_id = $this->unique_idd();
            $user->regno = $val['reg_no'];
            $user->picture = 'avatar.png';
            $user->sex = $val['sex'];
            $user->dob = $val['birth_day']."/".$val['birth_month']."/".$val['birth_year'];
            $user->state_of_origin = $val['state_of_origin'];
            $user->class_id = $req['class_id'];
            $user->login = 0; 
            $user->blocked_status = 'active'; 
            $user->password = Hash::make($val['reg_no']);
            if($user->save()){
                $insertdata = 1;
            }
            }
           
        }
        if($insertdata == 1){
           
           return redirect()->route('UploadStudent')->with('success', 'Upload Created!!!');
            }else{
                return redirect()->route('UploadStudent')->with('error', 'upload Failed!!!');
            
        }       
            
        
    }
}
