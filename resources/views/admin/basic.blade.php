@include('layout.head')
@include('layout.header')
@include('layout.sidebar')

     <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div>Basic Settings
                                        <div class="page-title-subheading"></div>
                                    </div>
                                </div>
                            </div>
                    </div>
                <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                              <form method="POST" enctype="multipart/form-data" action="{{ route('UploadSchoolLogo') }}">
                                                @csrf  
                                        <div class="row">
         
                                    <div class="col-md-12">
                                   
                                        <div class="main-card mb-3 card">
                                            <div class="card-body">
                                            <h5 class="card-title">Upload School Logo</h5>
                                               
                                                    <input type="file" name="filelogo" class="form-control" onchange="PreviewFile(this)" required/> 
                                                <br />
                                                <img id="previewImg" width="100" height="100" alt="SCHOOL LOGO"/>
                                            </div>
                                           
                                        </div>
                                        
                                    </div>

                                     <div class="col-md-12">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Upload School Information</h5>
                                  
                                        <div class="position-relative row form-group">
                                            <label for="exampleEmail" class="col-sm-2 col-form-label">School Name</label>
                                            <div class="col-sm-10">
                                                <input name="schoolname" placeholder="Enter School Name" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="position-relative row form-group">
                                            <label class="col-sm-2 col-form-label">School Abbreviation</label>
                                            <div class="col-sm-10">
                                                <input name="schoolabv" type="text" placeholder="Enter School Abbreviation" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="position-relative row form-group">
                                            <label class="col-sm-2 col-form-label">Reg No Initial</label>
                                            <div class="col-sm-10">
                                                <input name="regnoinitial" type="text" placeholder="Enter Reg No Initial"class="form-control" required>
                                            </div>
                                        </div>
                                       
                                        <div class="position-relative row form-group">
                                            <label for="exampleText" class="col-sm-2 col-form-label">General Exam Instruction</label>
                                            <div class="col-sm-10">
                                                <textarea name="generalinstr" id="exampleText" class="form-control" required></textarea>
                                            </div>
                                        </div>

                                       
                                        <div class="position-relative row form-group">
                                            <label for="exampleText" class="col-sm-2 col-form-label">Allow Registration</label>
                                            <div class="col-sm-10">
                                                <input type="checkbox" name="allowreg" value="1" data-toggle="toggle" data-onstyle="success" data-offstyle="danger">
                                            </div>
                                        </div>
                                     
                                        
                                        <div class="position-relative row form-check">
                                            <div class="col-md-12">
                                            <center>
                                            <button class="ladda-button mb-2 mr-2 btn btn-shadow btn-warning" data-style="slide-down" type="submit">
                                            <span class="ladda-label">Save Settings</span>
                                                 <span class="ladda-spinner"></span><div class="ladda-progress" style="width: 0px;"></div></button>
                                                    </button>
                                                        </center>
                                            </div>
                                        </div>
                                                                   </div>
                            </div>
                        </div>

                                    

                                </div>
                            </form>

                            </div>
                            
        </div>
    </div>
                        

@include('layout.footerdash')

<script>
    function PreviewFile(input){
       var file = $("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $('#previewImg').attr("src",reader.result);
            }
            reader.readAsDataURL(file); 
        }
    }
</script>

@if(Session::has('status'))
    <script>
        swal("Success","{!! Session::get('status') !!}","success",{
            button:"OK",
        })
    </script>
@endif

@if(Session::has('statusF'))
    <script>
        swal("Failed","{!! Session::get('statusF') !!}","error",{
            button:"OK",
        })
    </script>
@endif


</body>
</html>