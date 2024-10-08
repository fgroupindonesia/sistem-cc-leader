<link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
<link rel="stylesheet" type="text/css" href="/assets/css/style-dashboard.css">
<link href="/assets/css/bootstrap.min.css" rel="stylesheet">


<div class="app-container">
  <div class="sidebar">
    <div class="sidebar-header">
      <div class="app-icon">
        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path fill="currentColor" d="M507.606 371.054a187.217 187.217 0 00-23.051-19.606c-17.316 19.999-37.648 36.808-60.572 50.041-35.508 20.505-75.893 31.452-116.875 31.711 21.762 8.776 45.224 13.38 69.396 13.38 49.524 0 96.084-19.286 131.103-54.305a15 15 0 004.394-10.606 15.028 15.028 0 00-4.395-10.615zM27.445 351.448a187.392 187.392 0 00-23.051 19.606C1.581 373.868 0 377.691 0 381.669s1.581 7.793 4.394 10.606c35.019 35.019 81.579 54.305 131.103 54.305 24.172 0 47.634-4.604 69.396-13.38-40.985-.259-81.367-11.206-116.879-31.713-22.922-13.231-43.254-30.04-60.569-50.039zM103.015 375.508c24.937 14.4 53.928 24.056 84.837 26.854-53.409-29.561-82.274-70.602-95.861-94.135-14.942-25.878-25.041-53.917-30.063-83.421-14.921.64-29.775 2.868-44.227 6.709-6.6 1.576-11.507 7.517-11.507 14.599 0 1.312.172 2.618.512 3.885 15.32 57.142 52.726 100.35 96.309 125.509zM324.148 402.362c30.908-2.799 59.9-12.454 84.837-26.854 43.583-25.159 80.989-68.367 96.31-125.508.34-1.267.512-2.573.512-3.885 0-7.082-4.907-13.023-11.507-14.599-14.452-3.841-29.306-6.07-44.227-6.709-5.022 29.504-15.121 57.543-30.063 83.421-13.588 23.533-42.419 64.554-95.862 94.134zM187.301 366.948c-15.157-24.483-38.696-71.48-38.696-135.903 0-32.646 6.043-64.401 17.945-94.529-16.394-9.351-33.972-16.623-52.273-21.525-8.004-2.142-16.225 2.604-18.37 10.605-16.372 61.078-4.825 121.063 22.064 167.631 16.325 28.275 39.769 54.111 69.33 73.721zM324.684 366.957c29.568-19.611 53.017-45.451 69.344-73.73 26.889-46.569 38.436-106.553 22.064-167.631-2.145-8.001-10.366-12.748-18.37-10.605-18.304 4.902-35.883 12.176-52.279 21.529 11.9 30.126 17.943 61.88 17.943 94.525.001 64.478-23.58 111.488-38.702 135.912zM266.606 69.813c-2.813-2.813-6.637-4.394-10.615-4.394a15 15 0 00-10.606 4.394c-39.289 39.289-66.78 96.005-66.78 161.231 0 65.256 27.522 121.974 66.78 161.231 2.813 2.813 6.637 4.394 10.615 4.394s7.793-1.581 10.606-4.394c39.248-39.247 66.78-95.96 66.78-161.231.001-65.256-27.511-121.964-66.78-161.231z"/></svg>
      </div>
    </div>
  
    <?php include('nav_bar_left.php'); ?>

    <div class="account-info">
      <div class="account-info-picture">
       
     </div>
      <div class="account-info-name">Monica G.</div>
      <button class="account-info-more">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
      </button>
    </div>
  </div>
  <div class="app-content">
   <?php if(isset($data_user)): ?> 
    <h2 class="text-putih" >User Edit</h2>
      <?php else: ?>
       <h2 class="text-putih" >User Baru</h2>
    <?php endif; ?>
 <div class="formulir-baru">
     
    <div>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<?php if(isset($data_user)): ?>
<form id="form-user" action="/update-user" method="POST" >
  <input type="hidden" name="id" value="<?= $data_user->id; ?>" >
<?php else: ?>
<form id="form-user" action="/insert-user" method="POST" >
<?php endif; ?>  
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Full Name</label> 
    <div class="col-8">
      <input id="text1" required name="fullname" type="text" class="form-control" value="<?= $a = isset($data_user)? $data_user->fullname : ''; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Username</label> 
    <div class="col-8">
      <input id="text2" required name="username" <?= $b = isset($data_user)? 'readonly' : ''; ?> type="text" class="form-control" value="<?= $a = isset($data_user)? $data_user->username : ''; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input id="text3" required name="pass" type="password" class="form-control" value="<?= $a = isset($data_user)? $data_user->pass : ''; ?>">
    </div>
  </div>
   <div class="form-group row">
    <label for="text9" class="col-4 col-form-label">Gedung</label> 
    <div class="col-8">
      <input id="text9" required name="gedung" type="text" class="form-control" value="<?= $a = isset($data_user)? $data_user->gedung : '0'; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Divisi Bagian</label> 
    <div class="col-8">
      <select name="divisi" >
        <option <?=$div_it;?> value="IT">IT</option>
        <option <?=$div_doc;?> value="Document Control">Doc.Control</option>
        <option <?=$div_lead;?> value="Leader">Leader</option>
      </select>

     
    </div>
  </div> 
  <div class="form-group row">
    <label for="text5" class="col-4 col-form-label">No HP:</label> 
    <div class="col-8">
      <input id="text5" required name="no_hp" type="text" class="form-control" value="<?= $a = isset($data_user)? $data_user->no_hp : ''; ?>">
    </div>
  </div> 
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="text6" required name="email" type="email" class="form-control" value="<?= $a = isset($data_user)? $data_user->email : ''; ?>">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button id="btn-save-user" name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
 </div>

</div>

<script src="/assets/js/jquery371.min.js"></script>
  <script src="/assets/js/jquery-ui.min.js"></script>
  <script src="/assets/js/custom-actions.js"> </script>
  <script src="/assets/js/js.cookie.min.js"></script>
<script src="/assets/js/dashboard.js"></script>