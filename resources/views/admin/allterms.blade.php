@include('layout.head')
@include('layout.header')
@include('layout.sidebar')
<div class="app-main__outer">
    <div class="app-main__inner">

                    <div class="tab-content">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>NAME</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($allterms as $term)
                                         <tr>
                                        <td>{{ $term->id }}</td>
                                        <td>{{ $term->term_name }}</td>
                                        <td>
                                        @if($term->status === 'active')
                                            <div class="mb-2 mr-2 badge badge-success">Active</div>
                                        @else
                                            <div class="mb-2 mr-2 badge badge-danger">Deactivated</div>
                                        @endif
                                        
                                        </td>
                                        <td><div class="btn btn-group">
                                            <a type="button" href="/EditTerm/{{ $term->unique_id }}" class="border-0 btn-transition btn btn-outline-info"><i class="fa fa-edit"></i></a> 
                                            @if($term->status === 'active')
                                                 <div data-toggle="modal"
                                        data-target="#MODALDEACTIVATETERM{{ $term->id }}" class="border-0 btn-transition btn btn-outline-danger"><i class="fa fa-times"></i></div>
                                                 
                                                 
                                            @else
                                                <div data-toggle="modal"
                                        data-target="#MODALACTIVATETERM{{ $term->id }}" class="border-0 btn-transition btn btn-outline-success"><i class="fa fa-check"></i></div>
                                       
                                        
                                            @endif

                                            <div class="border-0 btn-transition btn btn-outline-danger">
                                                <i class="fa fa-trash-alt"></i></div>
                                            </div>
                                            </div></td>
                                        
                                    </tr>


                                    @endforeach
                                   
                                    
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                         <th>S/N</th>
                                        <th>NAME</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
    </div>

@include('layout.footerdash')

  @foreach ($allterms as $term)

<!-- Activate Term Modal -->

<div id="MODALACTIVATETERM{{ $term->id }}" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Activate Term</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to Activate this term?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a class="btn btn-success" type="button" href='activateterm/{{ $term->id }}'>
                    Activate Term
                </a>
                

            </div>
        </div>
    </div>
</div>

<!-- Deactivate Term Modal -->

<div id="MODALDEACTIVATETERM{{ $term->id }}" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Deactivate Term</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to Deactivate this term?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a class="btn btn-success" type="button" href='deactivateterm/{{ $term->id }}'>
                    Deactivate Term
                </a>
                

            </div>
        </div>
    </div>
</div>
  @endforeach
</body>
</html>