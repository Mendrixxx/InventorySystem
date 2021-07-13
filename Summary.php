<?php
    include("backend/conn.php");
    $sql = " Select Distinct classification from item";
    $res = mysqli_query($conn,$sql);
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System - Summary</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
        <script type="text/javascript" src="assets/js/select.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/BU.gif" style="width: 150px; height: 150px" ></img></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
               
                        <li class="sidebar-item  ">
                            <a href="kapagalan.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Inventory</span>
                            </a>
                        </li>
                        <li class="sidebar-item active ">
                            <a href="Summary.php" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Summary</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="logs.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Logs</span>
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
        
         <option value="0">IT</option>
         <option value="1">LABORATORY</option>
         <option value="2">OFFICE</option>
      
	 <?php while( $rows = mysqli_fetch_array($res) ){ ?>
	 <?php   } ?>
        
	</select>										

                                            </div>
										<div class="col-md-4">
											<input type="text" id="first-name" class="form-control" name="fname" placeholder="Search">
										</div>
         
									</div>
                                    
                                </div>
                                <div class="card-content">
                                    <!-- table strip dark -->
                                    <div class="table-responsive">
                                        <table class="table table-striped table-dark mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Year</th>
                                                    <th>Total Value</th>
                                                </tr>
                                            </thead>
                                            <tbody id = "ans">
                                                
<?php
    $sql = " SELECT YEAR(date_aq) as yearName, sum(total_val) as total from item where classification='IT' group by YEAR(date_aq) order by date_aq desc ";    
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
</div>
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/main.js"></script>
</body>

</html> 
