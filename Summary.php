<?php
    session_start();
    include("backend/conn.php");
    $sql = " Select Distinct classification from item";
    $res = mysqli_query($conn,$sql);

    if (isset($_SESSION['pass'])) {
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
    <script type="text/javascript" src="assets/js/select.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="DataTable/DataTables-1.10.25/css/jquery.dataTables.min.css">

</head>

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
									<a href="#" class="btn btn-danger" >Generate PDF</a>
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
																						<label>Select Classification</lable>


<!-- Displays on dropdown the classifications from table item-->
        <select id = "classification" onchange="selectClassi()">

         <option value="0">OFFICE</option>
         <option value="1">IT</option>
         <option value="2">LABORATORY</option>

	 <?php while( $rows = mysqli_fetch_array($res) ){ ?>
	 <?php   } ?>

	</select>

                                        </div>
									</div>
                                </div>
                                <div class="card-content">
                                    <!-- table strip dark -->
                                    <div class="table-responsive">
                                        <table id = "sam" class="table table-striped table-dark mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Year</th>
                                                    <th>Total Value</th>
                                                </tr>
                                            </thead>
<tbody id = "ans">
<?php
    $sql = " SELECT YEAR(date_aq) as yearName, sum(total_val) as total from item where classification='OFFICE' group by YEAR(date_aq) order by date_aq desc ";
    $res = mysqli_query($conn,$sql);

    while ($rows = mysqli_fetch_array($res)) {
        $total=$rows["total"];
        $total=number_format($total,2);
    ?>
    <tr>
        <td> <?php echo $rows['yearName'] ?> </td>
        <td>Php <?php echo $total ?> </td>
    </tr>

<?php }?>
</tbody>
                                    </table>
                                                                <div>
                                                                <button type="button" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#rst">Save to Archive </button>
                                                              </div>

                                </div>
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
      <!-- DELETE component MODAL -->
      <div class="modal fade" id="rst" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title custom_align" id="Heading">Notice!</h4>
                  <button type="button" class="close" onclick="CloseModalPopup();" data-dismiss="modal" aria-hidden="true">×</button>
               </div>
               <form action="backend/total.php" method="POST">
                  <div class="modal-body">
                     <div class="alert alert-default"><span class="fa fa-exclamation-triangle"></span> Are you sure
                        you want to archive this years inventory?</br>(This will compute for the total cost of this year.)
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

<script type="text/javascript">

    //Datatable
    $(document).ready(function(){
       $("#sam").DataTable({
            "ajax":{
                "url": "backend/summary.php",
                "dataSrc":"",
           },
            "ordering": false,
            "columns":[
                
                {"data":"ayear"},
                {"data":"total"},
            ],

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
