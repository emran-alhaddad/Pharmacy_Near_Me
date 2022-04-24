<div class="container">
<div class="shadow p-5 col-6 m-auto mt-5 rounded border" style="">
<form id="signup_form" method="post" action="assets_admin/php/process.php?signup">
<div class="mb-3">
    <label for="full-name" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="full-name" value="<?=showFormValue('full_name')?>" name="full_name" aria-describedby="emailHelp">
   <?=showError('full_name')?>
  </div>
  <div class="mb-3">
    <label for="mobile" class="form-label">Mobile No</label>
    <input type="number" class="form-control" id="mobile" max="9999999999" min="6000000000" value="<?=showFormValue('mobile')?>" name="mobile" aria-describedby="emailHelp">
    <?=showError('mobile')?>

  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email"  value="<?=showFormValue('email')?>" name="email" aria-describedby="emailHelp">
    <?=showError('email')?>
  
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password">
   <?=showError('password')?>

  </div>
  <div class="d-flex justify-content-between align-items-center">
  <button type="submit" class="btn btn-primary">Signup</button>
  <a href="?login" class="text-decoration-none">Already have an account ?</a>
</div>
</form>
</div>


</div>