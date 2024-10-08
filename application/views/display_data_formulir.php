<link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
<link rel="stylesheet" type="text/css" href="/assets/css/style-dashboard.css">
<link href="/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="/assets/css/display-data-formulir.css" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/dataTables.dataTables.css" />


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
      
    </div>
  </div>
  <div class="app-content">
 <h2 class="text-putih" >Submitted Data </h2>
 
 <div class="row justify-content-start">
    
      <?php if($user_divisi == "IT"): ?>
    <div  id="clear-all-link" class="text-white col-md-1 clear-all-container">
      <img src="/assets/images/delete.png"><br>
      <span  data-form="<?= $form_name ;?>" >Clear All</span>
    </div>

    <?php endif; ?>

    <div id="convert-to-excel" data-form="<?= $form_name ;?>" class="text-white col-md-1 clear-all-container"> 
      <img id="convert-excel-image" src="/assets/images/excel.png"> <br>
      <span  > Convert Excel </span>
    </div>

    <div id="excel-menu" class="floating-menu" style="display:none;">
      <a id="excel-csv">CSV format</a> 
      <a id="excel-xlsx">XLSX format</a>
      <a id="excel-cancel">Cancel</a>
    </div>

    <?php if($user_divisi == 'IT'): ?>
    <div id="convert-to-pdf"  class="text-white col-md-1 clear-all-container"> 
      <img id="convert-pdf-image" src="/assets/images/pdf.png"> <br>
      <span  > Convert PDF </span>
    </div>
    <?php endif; ?>

     <div id="switch-display"  class="text-white col-md-1 clear-all-container"> 
      <img  src="/assets/images/reload.png"> <br>
      <span  > Switch Display </span>
    </div>


  </div>

  <div class="row">
    <h3 class="col"><?= $form_name; ?></h3>  
  </div>
 
 <!-- split container area -->
 <div class="row display" id="split-main">

 <div  class="col-md-3" id="split-container" >
  <ul class="box-side">

     <?php if(!empty($data_all)): ?>
       <?php foreach($data_all as $data => $val): ?>
         <?php $dataBaru = (array) $val; $tempData = array(); // for json storing?>
         <li class="item-menu" data-date-created="<?=$dataBaru['date_created'];?>">
          <input type="checkbox" value="<?=$dataBaru['id'];?>" > 
        <?php $post = 0; $jawabUrut = 1; $colNeeded1 = 1; $colNeeded2 = sizeof($dataBaru)-1 ; ?>  
        
        <?php foreach($dataBaru as $data_in => $value): ?>
          <?php if(($post == $colNeeded1)): ?>
          <span class="item-list"><?= "jawaban : " . $jawabUrut; ?> </span>
           <?php elseif(($post == $colNeeded2)): ?>
          <span class="item-list"><?= $value; ?> </span>
          <?php endif; $post++; $jawabUrut++; $tempData[] = $value; ?>
        <?php endforeach; ?>
            <pre class="json-form-data"><?=json_encode($dataBaru);?> </pre>

             </li>
      <?php endforeach; ?>
     <?php endif; ?>
 </ul>
 </div>

 <div class="col-md-8" id="form-container">
    <textarea id="hidden-code">
        <?= $code_json; ?>
    </textarea>

    <div id="form-info">
    <span id="date-created">Taken at : </span> <br>
    <span id="username">Filled by :</span>
    <hr>
    </div>

    <div id="form-render">

    </div>
 </div>

</div>
<!-- split container area ended -->

  <div id="table-container" class="hidden">

    <div class="row title">
    <h3 class="col-md-5" style="display:none;"><?= $form_name; ?></h3>
  </div>

    <table id="table-data" class="display">
    <?php if(isset($data_all)): ?>
      <thead>
        <tr>
           <th>ID</th>
             <th>Gedung</th>
            <th>Username</th>
             <th>Date Created</th>
            <?php if(isset($data_header)): ?>
              <?php foreach($data_header as $data_judul => $v): ?>
                <th><?= $v;?></th>
              <?php endforeach; ?>
            <?php endif; ?>
           
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($data_all)): ?>
      <?php foreach($data_all as $data => $val): ?>
        <tr>
          <?php $dataBaru = (array) $val; ?>
        <?php foreach($dataBaru as $data_in => $value): ?>
             <td> <?= $value; ?> </td> 
        <?php endforeach; ?>
        </tr>
       <?php endforeach; ?>
     <?php endif; ?>
      </tbody> 
     <?php endif; ?>
   </table>
  </div>

  


  

</div>

<script src="/assets/js/jquery371.min.js"></script>
  <script src="/assets/js/jquery-ui.min.js"></script>
  <script src="/assets/js/form-builder.min.js"></script>
<script src="/assets/js/form-render.min.js"></script>

<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jspdf-html2canvas@latest/dist/jspdf-html2canvas.min.js"></script>

<script src="/assets/js/dataTables.js"></script>
<script src="/assets/js/display-formulir.js"></script>
<script src="/assets/js/display-data-formulir.js"></script>
<script src="/assets/js/convert-excel.js"></script>
<script src="/assets/js/js.cookie.min.js"></script>
<script src="/assets/js/dashboard.js"></script>