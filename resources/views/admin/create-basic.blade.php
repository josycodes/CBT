@include('layout.head')
@include('layout.header')
@include('layout.sidebar')
     
<div class="app-main__outer">
    <div class="app-main__inner">




             <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                            <li class="nav-item">
                                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                    <span>CLASS</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                                    <span>TEACHER</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#tab-content-2">
                                    <span>TERM</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a role="tab" class="nav-link" id="tab-3" data-toggle="tab" href="#tab-content-3">
                                    <span>SESSION</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a role="tab" class="nav-link" id="tab-4" data-toggle="tab" href="#tab-content-4">
                                    <span>SUBJECT</span>
                                </a>
                            </li>
             </ul>
            <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-8">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                    <h5 class="card-title">Create Class</h5>
                                    <form action="{{ route('createClass') }}" method="post">
                                    @csrf
                                        <div class="position-relative row form-group">
                                            <label for="exampleEmail" class="col-sm-2 col-form-label">Class Name</label>
                                            <div class="col-sm-10">
                                                <input name="classname" placeholder="Enter Class Name" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label class="col-sm-2 col-form-label">Class Code</label>
                                            <div class="col-sm-10">
                                                <input name="classcode" type="text" placeholder="Enter Class Code" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="position-relative row form-check">
                                            <div class="col-md-12">
                                            <center>
                                                       <button type="submit" class="ladda-button mb-2 mr-2 btn btn-shadow btn-warning" data-style="slide-down">
                                                            <span class="ladda-label">Create Class</span>
                                                            
                                                        <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                                                          
                                                        </button>
                                                        </center>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">All classes</h5>
                                                <?php 
                                                function pick(){
                                                $arr = ['btn btn-shadow-primary btn-primary','btn btn-shadow-secondary btn-secondary','btn btn-shadow-success btn-success',' btn btn-shadow-info btn-info','btn btn-shadow-info btn-info','btn btn-shadow-warning btn-warning','btn btn-shadow-danger btn-danger','btn btn-shadow-focus btn-focus','btn btn-shadow-alternate btn-alternate','btn btn-shadow-light btn-light','btn btn-shadow-dark btn-dark'];
                                                    $rand = rand(0,10);
                                                    return $arr[$rand];
                                                }
                                                ?>
                                                <button class="col-lg-12 mb-2 mr-2 btn btn-shadow-light btn-light">
                                                <a style="color:inherit!important;text-decoration:none;" href="{{ route('allClasses') }}"> 
                                                View all Classes
                                                </a>
                                                </button>
                                                <hr />
                                               @foreach ($allclasses as $classes)
                                                   <button class="col-lg-12 mb-2 mr-2 {{ pick()}}">
                                                   <a style="color:inherit!important;text-decoration:none;" href="/EditClass/{{ $classes->unique_id }}">
                                                   {{ $classes->class_name }}
                                                   </a>
                                                   </button>
                                               @endforeach
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                        </div>
                        <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-8">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                    <h5 class="card-title">Create Teacher</h5>
                                    <form method="post" action="{{ route('CreateTeacher') }}">
                                    @csrf                                        <div class="position-relative row form-group">
                                            <label for="exampleEmail" class="col-sm-2 col-form-label">Teacher Name</label>
                                            <div class="col-sm-10">
                                                <input name="teachername" placeholder="Enter Teacher Name" type="text" class="form-control">
                                            </div>
                                        </div>
                                       
                                        <div class="position-relative row form-check">
                                            <div class="col-md-12">
                                            <center>
                                                       <button type="submit" class="ladda-button mb-2 mr-2 btn btn-shadow btn-warning" data-style="slide-down">
                                                            <span class="ladda-label">Create Teacher</span>
                                                            
                                                        <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                                                          
                                                        </button>
                                                        </center>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                             </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">All Teachers</h5>
                                                 <button class="col-lg-12 mb-2 mr-2 btn btn-shadow-light btn-light">
                                                <a style="color:inherit!important;text-decoration:none;" href="{{ route('allTeachers') }}"> 
                                                View all Teachers
                                                </a>
                                                </button>
                                                <hr />

                                                 @foreach ($allteachers as $teachers)
                                                   <button class="col-lg-12 mb-2 mr-2 {{ pick()}}">
                                                    <a style="color:inherit!important;text-decoration:none;" href="/EditTeacher/{{ $teachers->unique_id }}">
                                                   {{ $teachers->teacher_name }}
                                                   </a>
                                                   </button>
                                               @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                        </div>
                            <div class="tab-pane tabs-animation fade" id="tab-content-2" role="tabpanel">
                                <div class="row">
                                <div class="col-lg-8">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                    <h5 class="card-title">Create Term</h5>
                                    <form method="post" action="{{ route('CreateTerm') }}">
                                    @csrf 
                                        <div class="position-relative row form-group">
                                            <label for="exampleEmail" class="col-sm-2 col-form-label">Term Name</label>
                                            <div class="col-sm-10">
                                                <input name="termname" placeholder="Enter Term Name" type="text" class="form-control">
                                            </div>
                                        </div>
                                       
                                        <div class="position-relative row form-check">
                                            <div class="col-md-12">
                                            <center>
                                                       <button class="ladda-button mb-2 mr-2 btn btn-shadow btn-warning" data-style="slide-down">
                                                            <span class="ladda-label">Create Term</span>
                                                            
                                                        <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                                                          
                                                        </button>
                                                        </center>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">All Term</h5>
                                                 <button class="col-lg-12 mb-2 mr-2 btn btn-shadow-light btn-light">
                                                <a style="color:inherit!important;text-decoration:none;" href="{{ route('allTerms') }}"> 
                                                View all Terms
                                                </a>
                                                </button>
                                                <hr />
                                                
                                                 @foreach ($allterms as $terms)
                                                   <button class="col-lg-12 mb-2 mr-2 {{ pick()}}">
                                                    <a style="color:inherit!important;text-decoration:none;" href="/EditTerm/{{ $terms->unique_id }}">
                                                   {{ $terms->term_name }}
                                                   </a>
                                                   </button>
                                               @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane tabs-animation fade" id="tab-content-3" role="tabpanel">
                               <div class="row">
                                <div class="col-lg-8">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                    <h5 class="card-title">Create Session</h5>
                                    <form method="post" action="{{ route('CreateSession') }}">
                                    @csrf
                                        <div class="position-relative row form-group">
                                            <label for="exampleEmail" class="col-sm-2 col-form-label">Start Year</label>
                                            <div class="col-sm-10">
                                                <input name="startyear" placeholder="Enter Start Year" type="text" class="form-control yearpicker" >
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label class="col-sm-2 col-form-label">End Year</label>
                                            <div class="col-sm-10">
                                                <input name="endyear" type="text" placeholder="Enter End Year" class="form-control yearpicker">
                                            </div>
                                           
                                        </div>
                                        
                                        <div class="position-relative row form-check">
                                            <div class="col-md-12">
                                            <center>
                                                       <button type="submit" class="ladda-button mb-2 mr-2 btn btn-shadow btn-warning" data-style="slide-down">
                                                            <span class="ladda-label">Create Session</span>
                                                            
                                                        <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                                                          
                                                        </button>
                                                        </center>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">All Session</h5>
                                                  <button class="col-lg-12 mb-2 mr-2 btn btn-shadow-light btn-light">
                                                <a style="color:inherit!important;text-decoration:none;" href="{{ route('allSessions') }}"> 
                                                View all Sessions
                                                </a>
                                                </button>
                                                <hr />
                                                  @foreach ($allsessions as $sessions)
                                                   <button class="col-lg-12 mb-2 mr-2 {{ pick()}}">
                                                    <a style="color:inherit!important;text-decoration:none;" href="/EditSession/{{ $sessions->unique_id }}">
                                                   {{ $sessions->session }}
                                                   </a>
                                                   </button>
                                               @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            <div class="tab-pane tabs-animation fade" id="tab-content-4" role="tabpanel">
                               <div class="row">
                                <div class="col-lg-8">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                    <h5 class="card-title">Create Subject</h5>
                                    <form class="" method="post" action="{{ route('CreateSubject') }}">
                                    @csrf
                                        <div class="position-relative row form-group">
                                            <label for="exampleEmail" class="col-sm-2 col-form-label">Subject Name</label>
                                            <div class="col-sm-10">
                                                <input name="subjectname" placeholder="Enter Subject Name" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label for="examplePassword" class="col-sm-2 col-form-label">Subject Code</label>
                                            <div class="col-sm-10">
                                                <input name="subjectcode" type="text" placeholder="Enter Subject Code" class="form-control">
                                            </div>
                                        </div>
                                        
                                        <div class="position-relative row form-check">
                                            <div class="col-md-12">
                                            <center>
                                                       <button type="submit" class="ladda-button mb-2 mr-2 btn btn-shadow btn-warning" data-style="slide-down">
                                                            <span class="ladda-label">Create Subject</span>
                                                            
                                                        <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                                                          
                                                        </button>
                                                        </center>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">All Subjects</h5>
                                                   <button class="col-lg-12 mb-2 mr-2 btn btn-shadow-light btn-light">
                                                <a style="color:inherit!important;text-decoration:none;" href="{{ route('allSubjects') }}"> 
                                                View all Subjects
                                                </a>
                                                </button>
                                                <hr />

                                                  @foreach ($allsubjects as $subjects)
                                                     <button class="col-lg-12 mb-2 mr-2 {{ pick()}}">
                                                      <a style="color:inherit!important;text-decoration:none;" href="/EditSubject/{{ $subjects->unique_id }}">
                                                     {{ $subjects->subject_name }}
                                                     </a>
                                                     </button>
                                                  @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        
                        
                        
                        
              
            </div>
</div>

@include('layout.footerdash')


</body>
</html>