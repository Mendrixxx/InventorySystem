<!--Inventory System Logs -->
<?php
session_start();
include ("backend/conn.php");
if (isset($_SESSION['pass'])) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System - Logs</title>
	
	<!--BU LOGO-->
	<link rel="icon" type="image/png" sizes="32x32" href="assets/images/logo/bu.png">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bg.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
	<link rel="stylesheet" type="text/css" href="DataTable/DataTables-1.10.25/css/jquery.dataTables.min.css">
</head>
<style>
    
      .display thead tr {
      background-color: #009879;
      color: #ffffff;
      text-align: center;
      font-weight: bold;
      cursor: pointer;
      }
      .display td {
      padding: 12px 15px;
      }
      .display tbody tr {
      border-bottom: 1px solid lightgreen;
      }
      .display   tbody tr:nth-of-type(odd) {
      background-color: white;
      }
   </style>
<body>
	<!--Sidebars-->
    <?php require_once "functions/sidebar.php" ?>
	
	 <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>LOGS</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">

                            </nav>
                        </div>
                    </div>
                </div>

				<!-- Card Header Start-->
                    <div class="card-header">
						<div class="card-box mb-40">
							<div class="pb-15">
								<!--Datatable Start-->
								<table id="logs" class="display" style="width:100%">
									<thead>
										<tr>
											<th>Action</th>
											<th>Date of Action</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
								<!--Datatable End-->
                            </div>
                        </div>
					</div>
				<!--Card Header End-->
        </div>
    </div>

	<!-- JQuery and DataTable Plugin-->
   <script type = "text/javascript" src="Datatable/jquery-3.5.1.js"></script>
   <script type = "text/javascript"  src="Datatable/DataTables-1.10.25/js/jquery.dataTables.min.js"></script>

	<script type="text/javascript">

	//Datatable
    $(document).ready(function(){
       $("#logs").DataTable({
		   "processing":true,
           "serverside":true,
            "ajax":{
                "url": "backend/logData.php",
                "dataSrc":"",
           },
		   "order": [[ 1, "asc" ]],
            "columns":[
			  {
                "data":"action",
                "defaultContent":" "
              },
			  {
                "data":"date_action",
                "defaultContent":" "
              },
            ],
		"lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
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
