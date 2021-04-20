<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm thể loại</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Tên thể loại</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Nhập tên thể loại">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleFormControlSelect2" class="col-sm-3 col-form-label">nhóm cha</label>
                        <div class="col-9">
                            <select id="demo" multiple="multiple">
{{--                                <option value="blueberry" data-section="Smoothies">Blueberry</option>--}}
                                <option value="longan" data-description="Really good :o" selected="selected">Longan</option>
                                <option value="milk tea" data-section="Smoothies">Milk Tea</option>
                                <option value="green apple" data-section="Smoothies/Bubble Tea">Green Apple</option>
                                <option value="passion fruit" data-section="Smoothies/Bubble Tea" data-description="The greatest flavor" selected="selected">Passion Fruit</option>
                                <option value="strawberry" data-section="Smoothies">Strawberries</option>
                                <option value="peach" data-section="Smoothies">Peach</option>
                            </select>
                        </div>
                    </div>

                </form>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-pill">@include('admin.category.iconsvg.save')Lưu
                </button>
                <button type="button" class="btn btn-secondary btn-pill" data-dismiss="modal">Bỏ qua</button>

            </div>
        </div>
    </div>
</div>
