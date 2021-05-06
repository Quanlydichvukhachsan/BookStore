<div class="modal fade" id="add-author" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm tác giả</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="tree-form_update" >
                    @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Họ tên lót</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="name_update" name="name_update" >
                            <input  type="hidden" class="form-control">
                            <div class="invalid-feedback name"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlSelect2" class="col-sm-3 col-form-label">Tên</label>
                        <div class="col-9">
                            <input  type="text" class="form-control" >
                            <div class="invalid-feedback name"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="btn-update-category" class="btn btn-success btn-pill">@include('admin.category.iconsvg.save')Cập nhật
                        </button>
                        <button type="button" class="btn btn-danger btn-pill"  id="btn-delete-category">Xoá</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


