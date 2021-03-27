<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Create user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="firstName" class="col-form-label">First Name</label>
                    <input name="firstName" id="firstName" type="text" class="form-control" placeholder="first name" value="">
            </div>
            <div class="form-group">
                <label for="lastName" class="col-form-label">Last Name</label>
                <input name="lastName" id="lastName" type="text" class="form-control" value="" placeholder="lastname">
            </div>
            <div class="form-group">
               <label for="email" class="col-form-label">Email</label>
                    <input name="email" id="email" type="text" class="form-control" placeholder="enter address" value="">
            </div>
            <div class="form-group">
                <label for="firstName" class="col-form-label">User Name</label>
                <input name="userName" id="userName" type="text" class="form-control" placeholder="enter phone number" value="">
            </div>
            <div class="form-group">
                <label for="password" class="col-form-label">Password</label>
                <input name="password" id="password" type="password" class="form-control" placeholder="password" value="">
            </div>
            <div class="form-group">
            <label for="password_confirmation" class="col-form-label">Confirm Password</label>
            <input name="password_confirmation"  id="password_confirmation" type="password" class="form-control" placeholder="password confirm" value="">
            </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="btn-submit" class="btn btn-primary">Create user</button>
        </div>

       </div>
    </div>
</div>
