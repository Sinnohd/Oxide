<?php if(!class_exists('raintpl')){exit;}?><div class="modal" id="modal-login">
  <form action="index.php" method="post">
    <div class="modal-header">
      <h3>
        NextGen MFS (Ingestion Dashboard)
      </h3>
    </div>
    <div class="modal-body">
      <fieldset>
        <div class="control-group">
          <label for="login-username">Username</label>
          <div class="input">
            <input class="large validates[required]" id="username" name="username" size="30" type="text" autocomplete="off">
          </div>
        </div>
        <div class="control-group error">
          <label for="login-password">Password</label>
          <div class="input">
            <input class="large validates[required]" id="password" name="password" size="30" type="password">
          </div>
        </div>
      </fieldset>
    </div>
    <div class="modal-footer">
      Only authorized users <button name="login" type="submit" class="btn btn-primary">Login</button>
    </div>
  </form>
</div>
<div class="modal" id="modal-recovery">
  <form action="#" method="post" id="frm-recovery">
    <div class="modal-header">
      <h3>
        Password Recovery
      </h3>
    </div>
    <div class="modal-body">
      <fieldset>
        <div class="control-group">
          <label for="recovery-username">Username or e-mail</label>
          <div class="input">
            <input class="large validates[required]" id="recovery-username" name="recovery[username]" size="30" type="text" autocomplete="off"> <span class="help-inline">Password recovery hint</span>
          </div>
        </div>
      </fieldset>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary toggle-login-recovery">Cancel</button> <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>