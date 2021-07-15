<!--Inventory System Logs -->

<?php
include "backend/conn.php"; //Connect to the Database
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System - Logs</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
	<link rel="stylesheet" type="text/css" href="DataTable/DataTables-1.10.25/css/jquery.dataTables.min.css">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item  ">
                            <a href="kapagalan.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Inventory</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="Summary.php" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Summary</span>
                            </a>
                        </li>

                        <li class="sidebar-item active ">
                            <a href="Logs.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Logs</span>
                            </a>
                        </li>
						<li class="sidebar-item  ">
                            <a href="signin.php" class='sidebar-link'>
                                <i class="bi bi-x-octagon-fill"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

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
											<th>Item/Component Name</th>
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
				<!-- Card Header End-->
					
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Bicol University College of Science</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by BUCS-BSCS</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

	<!-- JQuery and DataTable Plugin-->
   <script type = "text/javascript" src="Datatable/jquery-3.5.1.js"></script>
   <script type = "text/javascript"  src="Datatable/DataTables-1.10.25/js/jquery.dataTables.min.js"></script>
	
	<script type="text/javascript">
	
	//Datatable 
    $(document).ready(function(){
       $("#logs").DataTable({
            "ajax":{
                "url": "backend/logData.php",
                "dataSrc":"",
            },
            "columns":[
				{"data":"action"},
                {"data":"item_name"},
                {"data":"date_action"},
            ],

       });

    });
</script>

</body>
</html>