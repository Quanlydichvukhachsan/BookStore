
    <div class="modal fade" id="exampleModalsmall" tabindex="-1" role="dialog"  data-backdrop="static"
         data-keyboard="false"
         aria-labelledby="exampleModalSmallTitle" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalSmallTitle">Edit permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['method' => 'GET', 'id'=>'form-permission']) !!}
                    <div class="form-group">
                        <label for="arrayPermission">Choose permission</label>
                        <select class="select2bs4" name="arrayPermission" id="arrayPermission" multiple="multiple" data-placeholder="Select a permission" style="width: 100%;">

                        </select>
                        </div>
                    {!! Form::close() !!}

                </div>
                <div class="modal-footer">
                    <button type="button" onclick="removeFormModalSmall()" class="btn btn-danger btn-pill" data-dismiss="modal">Delete</button>
                    <button type="button" onclick="removeFormModalSmall()" class="btn btn-primary btn-pill">Cancel registration</button>
                </div>
            </div>
        </div>
    </div>

