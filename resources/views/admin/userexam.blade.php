@include('layout.head')
@include('layout.header')
@include('layout.sidebar')


<div class="app-main__outer">
    <div class="app-main__inner">
     
                    
<div class="tab-content">
 <div class="tab-pane tabs-animation fade show active" id="tab-content-4" role="tabpanel">
                    
                                <div class="row">
                                    <div class="col-md-4">
                                     <div class="main-card mb-3 card">
                                            <div class="card-body">
                                                <h5 class="card-title">Questions</h5>
                                                <div class="row">
                                                @for ($i =1 ; $i <= 100; $i++)
                                                    <div class="col-md-3">
                                                        <div class="font-icon-wrapper">
                                                            <p class="m-0">{{ $i }}</p>
                                                        </div>
                                                    </div>
                                                @endfor
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
</div> 

   
@include('layout.footerdash')