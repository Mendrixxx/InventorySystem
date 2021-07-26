<?php
    session_start();
    include("backend/conn.php");
    $sql = " SELECT * from classification";
    $res = mysqli_query($conn,$sql);
    if (isset($_SESSION['pass'])) {
    include "backend/conn.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
      

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System - Summary</title>
  
  <!--BU LOGO-->
  <link rel="icon" type="image/png" sizes="32x32" href="assets/images/logo/bu.png">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTable/DataTables-1.10.25/css/jquery.dataTables.min.css">

  </head>  
<style>



      .table thead tr {
      background-color: #009879;
      color: #ffffff;
      text-align: center;
      font-weight: bold;
      cursor: pointer;
      }
      .table td {
      padding: 12px 15px;
      }
      .table tbody tr {
      border-bottom: 1px solid lightgreen;
      }
      .table tbody tr:nth-of-type(odd) {
      background-color: white;
      }
   </style>
   <body>
    <!--Sidebars-->
    <?php require_once "functions/sidebar.php" ?>
  
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Summary</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
      
                                <button type="button" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#addcomp">Generate PDF</button>
                      
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>


                <!-- Striped rows with inverse dark table start -->
                <section class="section">
                    <div class="row" id="table-striped-dark">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                  <div class="row">
                    <div class="col">

                       <select name="classification" id="classification" class="form-control">
                           <option value="">All Classification</option>
                          <?php while( $row = mysqli_fetch_array($res) ){ ?>
                           <?php     echo '<option value="'.$row["classification_id"].'">'.$row["cl_name"].'</option>';
                           } ?>
                        </select>       

                    </div>
                  </div>
                                </div>
                                <div class="card-content">
                                     <div class="card">
                                       <div class="card-header">
                                    <!-- table strip dark -->
                                    <div class="table-responsive">
                                        <table id = "summary" class="table table-striped">
                                            <thead>
                                                <tr>
                                                  <th>Year</th>
                                                  <th>Total Value</th>
                                                  <th>Classification</th>
                                                </tr>    
                                            </thead>   
                                        </table>
                                                                <div>
                                                                 <?php
                                                                 $chkdt = "SELECT * from archive Where ayear =".Date("Y");
                                                                 $chk = mysqli_query($conn, $chkdt);
                                                                 if(mysqli_num_rows($chk)==0){
                                                                    echo '<button type="button" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#rst">Save to Archive </button>';
                                                                 }
                                                                 else{
                                                                    echo '<button disabled type="button" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#rst">Save to Archive </button>';
                                                                 }
                                                                 ?>   
                                                                
                                                              </div>
                                        <div class="modal fade" id="addcomp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Generate PDF</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form autocomplete="off" action="backend/insert.php" method="POST">
                     <div class="modal-body">
                        <label>Select the PDF to be generated:  </label>
                        <div class="form-group">
                        <label> </label>
                        </div>
                        <div class="form-group">

                        <label>Office Summary </label>

                        </div>
                        <div class="form-group">
                         <!-- Generate PDF button -->
                         <style type="text/css">

                            #button{

                                display: inline-block;
                                background-color: green;
                                color: white;
                                padding: 5px;
                                text-align: center;
                                font-family: verdana;
                                text-decoration: none;
                                height: 38px;
                                width: 100px;
                                margin-left: 1px;
                                margin-bottom: 1px;
                            }
                            </style>

                            <a id="button" class= "btn btn-primary" href ="genPDFsum.php">Office</a>
                            </div>
                        <div class="form-group">

                        <label>IT Summary </label>

                        </div>
                        <div class="form-group">
                         <!-- Generate PDF button -->
                         <style type="text/css">

                            #button{

                                display: inline-block;
                                background-color: green;
                                color: white;
                                padding: 5px;
                                text-align: center;
                                font-family: verdana;
                                text-decoration: none;
                                height: 38px;
                                width: 100px;
                                margin-left: 1px;
                                margin-bottom: 1px;
                            }
                            </style>

                            <a id="button" class= "btn btn-primary" href ="genPDFsum1.php">IT</a>
                            </div>
                            <div class="form-group">

                            <label>Laboratory Summary </label>

                            </div>
                            <div class="form-group">
                            <!-- Generate PDF button -->
                            <style type="text/css">

                                #button{

                                    display: inline-block;
                                    background-color: green;
                                    color: white;
                                    padding: 5px;
                                    text-align: center;
                                    font-family: verdana;
                                    text-decoration: none;
                                    height: 38px;
                                    width: 100px;
                                    margin-left: 1px;
                                    margin-bottom: 1px;
                                }
                                </style>

                                <a id="button" class= "btn btn-primary" href ="genPDFsum2.php">Laboratory</a>
                                
                                <div class="form-group">

                                <label> </label>

                                </div>
                                <div class="form-group">

                                <label>Items in Inventory</label>

                                </div>
                               <!-- Generate PDF button -->
                                <style type="text/css">

                             #button{

                            display: inline-block;
                            background-color: green;
                            color: white;
                            padding: 5px;
                            text-align: center;
                            font-family: verdana;
                            text-decoration: none;
                            height: 38px;
                            width: 200px;
                            margin-left: 1px;
                            margin-bottom: 1px;
                        }
                        </style>

                        <a id="button" class= "btn btn-primary" href ="genPDF1.php">Generate PDF</a>


                    
</div>
</div>
</div>
</div>
</section>


        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Bachelor of Science 3 - B</p>
                </div>
                <div class="float-end">

                </div>
            </div>
        </footer>
    </div>
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>

   <!--############################################################################################################################################################################################## -->
      <!-- Save to Archive MODAL -->
      <div class="modal fade" id="rst" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title custom_align" id="Heading"> Are you sure
                        you want to archive this years inventory?</h4>
                  <button type="button" class="close" onclick="CloseModalPopup();" data-dismiss="modal" aria-hidden="true">×</button>
               </div>
               <form action="backend/total.php" method="POST">
                  <div class="modal-body">
                     <div class="alert alert-default"><span class="fa fa-exclamation-triangle"></span>Year: <?php echo date("Y")?> </br><li>This will compute for the total cost of this year's Inventory.
                     </br><li>Items Added after the process will be computed for the following year.
                     </br><li>This process is irreversible.
                     </div>
                  </div>
                  <div class="modal-footer ">
                     <button type="button" class="btn btn-secondary" onclick="CloseModalPopup();" id="cancel" data-dismiss="modal"><span
                        class="fa fa-times-circle"></span> No</button>
                     <button type="submit" name="reset" class="btn btn-warning" id="reset"><span
                        class="fa fa-check-circle"></span> Yes</button>
                  </div>
               </form>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!--############################################################################################################################################################################################## -->
  <!-- JQuery and DataTable Plugin-->
   <script type = "text/javascript" src="Datatable/jquery-3.5.1.js"></script>
   <script type = "text/javascript"  src="Datatable/DataTables-1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" >

$(document).ready(function(){
 
 load_data();

 function load_data(is_classification)
 {
  var dataTable = $('#summary').DataTable({
   "processing":true,
   "serverSide":true,
   "order":[],
   "ajax":{
    url:"backend/summary.php",
    type:"POST",
    data:{is_classification:is_classification}
   },
   "columnDefs":[
    {
     "targets":[2],
     "orderable":false,
    },
   ],
  });
 }

 $(document).on('change', '#classification', function(){
  var classification = $(this).val();
  $('#summary').DataTable().destroy();
  if(classification != '')
  {
   load_data(classification);
  }
  else
  {
   load_data();
  }
 });
});
</script>
</body>
</html>



<?php
}else{
      header("Location: login.php");
      exit();
}
