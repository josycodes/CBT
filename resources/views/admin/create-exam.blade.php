@include('layout.head')
@include('layout.header')
@include('layout.sidebar')
     
<div class="app-main__outer">
    <div class="app-main__inner">
    <div class="app-page-title">
                        <div class="page-title-wrapper">
                           
                            <div class="page-title-actions">
                               
                                <div class="d-inline-block dropdown">
                                    <button type="button" aria-expanded="false" class="btn-shadow btn btn-info">
                                        <span class="btn-icon-wrapper pr-2 opacity-7">
                                            <i class="fa fa-business-time"></i>
                                        </span>
                                        View All Exams
                                    </button>
                                    
                                </div>
                            </div>    </div>
                    </div>  

                <div class="tab-content">
                
                 <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <form method="post" action="{{ route('MakeExam') }}">
                                        @csrf
                                    <div id="smartwizard3" class="forms-wizard-vertical">
                                        <ul class="forms-wizard">
                                            <li>
                                                <a href="#step-122">
                                                    <em>1</em><span>Basic Exam Information</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-222">
                                                    <em>2</em><span> Final Exam Information</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-322">
                                                    <em>3</em><span>Create Exam</span>
                                                </a>
                                            </li>
                                        </ul>
                                        
                                        <div class="form-wizard-content">
                                        
                        <div id="step-122">
                                <div class="card-body">
                                    <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Select Subject</h5>
                                    <select class="multiselect-dropdown form-control" name="subject">
                                     <option>Select Subject</option>
                                        @foreach ($allsubjects as $subjects)
                                            
                                       
                                            <option value="{{ $subjects->unique_id }}"><b>{{ $subjects->subject_name }}</b></option>
                                           
                                       
                                         @endforeach
                                         
                                    </select>
                                </div>
                            </div>
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Select CLass</h5>
                                    <select class="multiselect-dropdown form-control" name="studentclass">
                                    <option>Select Class</option>
                                        @foreach ($allclasses as $classes)
                                             <option value="{{ $classes->unique_id }}"><strong>{{ $classes->class_name }}</strong></option>
                                           
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Select Teacher</h5>
                                    <select class="multiselect-dropdown form-control" name="teacher">
                                       <option>Select Subject</option>
                                       @foreach ($allteachers as $teachers)
                                           <option value="{{ $teachers->unique_id }}"><strong>{{ $teachers->teacher_name }}</strong></option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Select Term</h5>
                                    <select class="multiselect-dropdown form-control" name="term">
                                        <option>Select Term</option>
                                       @foreach ($allterms as $terms)
                                           <option value="{{ $terms->unique_id }}"><strong>{{ $terms->term_name }}</strong></option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Select Session</h5>
                                    <select class="multiselect-dropdown form-control" name="session">
                                         <option>Select Session</option>
                                       @foreach ($allsessions as $sessions)
                                           <option value="{{ $sessions->unique_id }}"><strong>{{ $sessions->session }}</strong></option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            </div>
                                                   
                                                </div>
                        </div>
                                            <div id="step-222">
                                                <div id="accordion" class="accordion-wrapper mb-3">
                                                    <div class="card">
                                                        <div id="headingTwo" class="b-radius-0 card-header">
                                                            <button type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"
                                                                class="text-left m-0 p-0 btn btn-link btn-block">
                                                                <span class="form-heading">Final Exam Informations<p></p></span>
                                                            </button>
                                                        </div>
                                                        <div data-parent="#accordion" id="collapseTwo" class="collapse show">
                                                            <div class="card-body">
                                                               <div class="position-relative form-group">
                                                                    <label>Exam Duration(Minutes)</label>
                                                                    <input name="numminutes" placeholder="Enter the Number of Minutes the exam would last" type="text" class="form-control">
                                                                </div>
                                                                <div class="position-relative form-group">
                                                                    <label>Number of Questions</label>
                                                                    <input name="numquestion" placeholder="Use Integer Values Eg.60" type="text" class="form-control">
                                                                </div>
                                                                <div class="position-relative form-group">
                                                                    <label>Exam Status</label>
                                                                   <select class="form-control" name="examstatus">
                                                                   <option>Select Exam Status</option>
                                                                   <option value="active">Active</option>
                                                                   <option value="inactive">Inactive</option>
                                                                   </select>
                                                                </div>
                                                                <div class="position-relative form-group">
                                                                    <label>Show Result After Submission</label>
                                                                   <select class="form-control" name="resultstatus">
                                                                   <option>Select Result Status</option>
                                                                   <option value="active">Active</option>
                                                                   <option value="inactive">Inactive</option>
                                                                   </select>
                                                                </div>
                                                                <div class="position-relative form-group">
                                                                    <label>Warning Time</label>
                                                                    <input name="warnmin" placeholder="Example. 5 this means a warning message will display 5mins to the exam end time" type="text" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-322">
                                                <div class="no-results">
                                                    <div class="swal2-icon swal2-success swal2-animate-success-icon">
                                                        <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                                                        <span class="swal2-success-line-tip"></span>
                                                        <span class="swal2-success-line-long"></span>
                                                        <div class="swal2-success-ring"></div>
                                                        <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                                        <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                                                    </div>
                                                    <div class="results-subtitle mt-4">Finished!</div>
                                                    <div class="results-title">CLick the Button to create Exam</div>
                                                    <div class="mt-3 mb-3"></div>
                                                    <div class="text-center">
                                                        <button class="btn-shadow btn-wide btn btn-success btn-lg">Create Exam</button>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    </form>
                                    <div class="divider"></div>
                                    <div class="clearfix">
                                        <button type="button" id="reset-btn22" class="btn-shadow float-left btn btn-link">Reset</button>
                                        <button type="button" id="next-btn22" class="btn-shadow btn-wide float-right btn-pill btn-hover-shine btn btn-primary">Next</button>
                                        <button type="button" id="prev-btn22" class="btn-shadow float-right btn-wide btn-pill mr-3 btn btn-outline-secondary">Previous</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



</div>

@include('layout.footerdash')


</body>
</html>