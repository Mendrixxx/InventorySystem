<?php
    include 'backend/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVENTORY</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon"  >
    <script src="assets/js/jquery-3.6.0.min.js"></script>>

<script type="text/javascript">
    
    $(document).ready(function(){
        

    });

</script>

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
                
                
                <li class="sidebar-item active has-sub">
                    <a href="kapagalan.html" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Inventory</span>

                                    <ul class="submenu active">
                                        <li class="submenu-item active">
                                            <a href="mmm.html" class='sidebar-link'>Inventory Per Personnel</a>
                                            
                                        </li>
                                        <ul class="submenu active">
                                            <li class="submenu-item active">
                                            <a href="way.html" class='sidebar-link'>Inventory Per Classification</a>
                                            
                                           
                                        </li>
                             
                        </ul>
                        <li class="sidebar-item active ">
                            <a href="Summary.html" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Summary</span>
                            </a>
                        </li>
                        <li class="sidebar-item active ">
                            <a href="Logs.html" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Logs</span>
                            </a>
                        </li>
                        
                    </div>
                   
                    
                    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
                </div>
                
            </div>
            <div id="main">
                

                <div class="page-heading">
                    
                            <section class="section">
                                <div class="row" id="table-inverse">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Inventory</h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    
                                                </div>
                                                <div class="card-body">
                                                    <table class="table table-striped" id="table1">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Unit</th>
                                                                <th>Description</th>
                                                                <th>Property Number</th>
                                                                <th>Date Acquired</th>
                                                                <th>Unit Of Measure</th>
                                                                <th>Unit Value</th>
                                                                <th>Total Value</th>
                                                                <th>Quantity Per Physical Count</th>
                                                                <th>Remarks</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <div class="buttons"></div>
                                                            <tr>
                                                                <td>Graiden</td>
                                                                <td>1</td>
                                                                <td>076 4820 8838</td>
                                                                <td>Offenburg</td>
                                                                <td> Description</td>
                                                                <td>GDescription</td>
                                                                <td>vDescription</td>
                                                                <td>08Description</td>
                                                                <td>ODescriptionf</td>
                                                                <td> Description</td>
                                                                <td>
                                                                    <a href="#" class="btn btn-primary">Edit</a>
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="btn btn-primary">Delete</a>
                                                                </td>
                                                            
                                                            </tr>
                                                            <td>
                                                                <a href="add.html" class="btn btn-primary">Add</a>
                                                                </td>
                                                            </tbody>
                                                        </table>
                                                    
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

                                                          