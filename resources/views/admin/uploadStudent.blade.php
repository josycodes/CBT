@include('layout.head')
@include('layout.header')

@include('layout.sidebar')
<div class="app-main__outer">
    <div class="app-main__inner">




             <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                            <li class="nav-item">
                                <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                    <span>UPLOAD STUDENT DATA</span>
                                </a>
                            </li>
                            
                            
             </ul>
              <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-8">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                    <h5 class="card-title">Upload Student Data</h5>
                                    <form action="{{ route('importExcel') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="position-relative row form-group">
                                            <label for="exampleEmail" class="col-sm-2 col-form-label">Select Class</label>
                                            <div class="col-sm-10">
                                               <select class="form-control" name="class_id">
                                                <option> --Select Class--</option>
                                                @foreach ($allclasses as $class)
                                                    <option value="{{ $class->unique_id }}">{{ $class->class_name }}</option>
                                                @endforeach
                                               </select>
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label class="col-sm-2 col-form-label">Class Code</label>
                                            <div class="col-sm-10">
                                                <input name="file" type="file" class="form-control" required>
                                            </div>
                                        </div>
                                        
                                        <div class="position-relative row form-check">
                                            <div class="col-md-12">
                                            <center>
                                                       <button type="submit" class="ladda-button mb-2 mr-2 btn btn-shadow btn-warning" data-style="slide-down">
                                                            <span class="ladda-label">Upload Student</span>
                                                            
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
                                                <h5 class="card-title">Hover Shadow</h5>
                                                <button class="mb-2 mr-2 btn btn-shadow-primary btn-primary">Primary</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-secondary btn-secondary">Secondary</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-success btn-success">Success</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-info btn-info">Info</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-warning btn-warning">Warning</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-danger btn-danger">Danger</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-focus btn-focus">Focus</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-alternate btn-alternate">Alt</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-light btn-light">Light</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-dark btn-dark">Dark</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-link btn-link">link</button>
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
                                                <h5 class="card-title">Hover Shadow</h5>
                                                <button class="mb-2 mr-2 btn btn-shadow-primary btn-primary">Primary</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-secondary btn-secondary">Secondary</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-success btn-success">Success</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-info btn-info">Info</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-warning btn-warning">Warning</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-danger btn-danger">Danger</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-focus btn-focus">Focus</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-alternate btn-alternate">Alt</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-light btn-light">Light</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-dark btn-dark">Dark</button>
                                                <button class="mb-2 mr-2 btn btn-shadow-link btn-link">link</button>
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