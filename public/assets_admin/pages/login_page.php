
<div class="container">
<div class="shadow p-5 col-6 m-auto mt-5 rounded border" style="">
<?=showError('nouser')?>

<form method="post" action="assets_admin_admin/php/process.php?login">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address / Mobile No</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="mobile_or_email" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text">We'll never share your email/mobile with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
  </div>
  <div class="d-flex justify-content-between align-items-center">
  <button type="submit" class="btn btn-primary">Login</button>
  <a href="#" class="text-decoration-none">Forgot Paassword ?</a>
</div>
</form>
</div>


</div>

