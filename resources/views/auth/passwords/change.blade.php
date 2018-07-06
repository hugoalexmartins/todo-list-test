<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Change Password') }}</div>
        <div class="card-body">
          <div class="alert alert-success" ng-show="form.success">Password changed !</div>
          <form name="form" novalidate ng-submit="passwordUpdate('{{ route('password.update') }}')">
            <div class="form-group">
              <label>Old Password *</label>
              <input class="form-control" name="old" type="password"
                ng-model="form.data.old" 
                required
                ng-class="{'is-invalid': (form.old.$touched || form.$submitted) && form.old.$invalid}">
              <div ng-messages="form.old.$error" 
                ng-show="form.old.$touched || form.$submitted">
                <p ng-message="required" class="invalid-feedback d-block">Please enter your password</p>
                <p ng-message="passwordusermatch" class="invalid-feedback d-block">Your current password doesn't match</p>
              </div>
            </div>
            <div class="form-group">
              <label>New Password *</label>
              <input class="form-control" name="password" type="password"
                ng-model="form.data.password" 
                required
                ng-class="{'is-invalid': (form.password.$touched || form.$submitted) && form.password.$invalid}">
              <div ng-messages="form.password.$error" 
                ng-show="form.password.$touched || form.$submitted">
                <p ng-message="required" class="invalid-feedback d-block">Please enter your password</p>
              </div>
            </div>
            <div class="form-group" >
              <label>Confirm Password *</label>
              <input class="form-control" name="confirmPassword" type="password"
                ng-model="confirm" 
                equal-with="form.data.password"
                required
                ng-class="{'is-invalid': (form.confirmPassword.$touched || form.$submitted) && form.confirmPassword.$invalid}">
              <div ng-messages="form.confirmPassword.$error" 
                ng-show="form.confirmPassword.$touched || form.$submitted">
                <p ng-message="required" class="invalid-feedback d-block">Please enter confirm password</p>
                <p ng-message="equalWith" class="invalid-feedback d-block">Confirm password does not match</p>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  angular.module('todomvc').value('apiToken', '<?php echo $apiToken ?>');
</script>
