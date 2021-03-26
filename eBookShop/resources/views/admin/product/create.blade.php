<div class="modal  bs-example-modal-lg  fade" id="addStudentModal" focus-group focus-group-head="loop" focus-group-tail="loop" focus-stacktabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    ×
                </button>
                <h4 class="modal-title">Add Student</h4>
            </div>
            <div class="modal-body">
                <form name="form.studentForm" id='form.studentForm' ng-submit="submitForm()" novalidate>
                    <!-- NAME -->
                    <div class="form-group" ng-class="{ 'has-error' : form.studentForm.name.$invalid && !form.studentForm.name.$pristine }">
                        <label>Name*</label>
                        <input type="text" name="name" class="form-control" ng-model="newStudent.name" ng-minlength=3 ng-maxlength=20 required>
                        <p ng-show="form.studentForm.name.$error.required && form.studentForm.name.$dirty" class="help-block">Name is required.</p>
                        <p ng-show="form.studentForm.name.$error.minlength" class="help-block">Name is required to be at least 3 characters</p>
                        <p ng-show="form.studentForm.name.$error.maxlength" class="help-block">Name cannot be longer than 20 characters</p>
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group" ng-class="{ 'has-error' : form.studentForm.phoneNumber.$invalid && !form.studentForm.phoneNumber.$pristine }">
                        <label>Phone Number*</label>
                        <input type="number" name="phoneNumber" class="form-control" ng-model="newStudent.phoneNumber" ng-minlength="11" ng-maxlength=11 required>
                        <p ng-show="form.studentForm.phoneNumber.$error.required && form.studentForm.phoneNumber.$dirty" class="help-block">Phone Number is required.</p>
                        <p ng-show="form.studentForm.phoneNumber.$error.minlength" class="help-block">Field is too short</p>
                        <p ng-show="form.studentForm.phoneNumber.$error.maxlength" class="help-block">Field is too long</p>
                    </div>

                    <!-- EMAIL -->
                    <div class="form-group" ng-class="{ 'has-error' : form.studentForm.email.$invalid && form.studentForm.email.$dirty }">
                        <label>Email*</label>
                        <input type="email" name="email" class="form-control" ng-model="newStudent.email" required>
                        <p ng-show="form.studentForm.email.$error.required && form.studentForm.email.$dirty" class="help-block">Your email is required.</p>
                        <p ng-show="form.studentForm.email.$error.email" class="help-block">Enter a valid email.</p>
                    </div>
                    <button type="submit" ng-disabled="form.studentForm.$invalid" ng-click='postStudent(newStudent)' class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
