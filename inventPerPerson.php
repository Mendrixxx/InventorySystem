<?php
    include 'backend/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Per Personel</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">

    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon"  >
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="DataTable/datatables.min.css">
    <script type="text/javascript" src="DataTable/datatables.min.js"></script>
</head>

<body>
    <div id="app">
        <!-- sidebar -->
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

                <!-- sidebar menu items -->
                <ul>
                    <li class="sidebar-item active has-sub">
                        <a href="kapagalan.php" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Inventory</span>
                        </a>
                        <ul class="submenu active">
                            <li class="submenu-item active">
                                <a href="mmm.html" class='sidebar-link'>Inventory Per Personnel</a>              
                            </li>
                            <li class="submenu-item active">
                                <a href="way.html" class='sidebar-link'>Inventory Per Classification</a>                           
                            </li>
                        </ul>
                    </li>
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
                </ul>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>        
            </div>
        </div>    
        <div id="main">
            <div class="page-heading"> 
                <form action="" method="POST" id="formTable">
                    <section class="section">
                        <div class="row" id="table-inverse">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Inventory Per Personel</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-sm-4">
                                                    <label for="">Personel Name</label>
                                                    <select class="custom-select form-control form-control-sm" id="personelName" name="personel">
                                                        <option selected value="" >All</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-striped" id="personTable">
                                                <thead>
                                                    <tr>
                                                        <th>Personel Name</th>
                                                        <th>Item Name</th>
                                                        <th>Item Description</th>
                                                        <th>Property Number</th>
                                                        <th>Date Acquired</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- generate data through ajax -->
                                                </tbody>
                                            </table>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </form>
            </div>
        </div>
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

    <script type="text/javascript">
        $(document).ready(function(){
            
            $.ajax({
                type: "GET",
                url: 'functions/inventoryPerPersonel/function.get.invPerPersonel.php',
                dataType: "JSON",
                success: (data) => {
                    console.log(data);
                    getPersonels(data);
                }
            });

            var personMap;
            $('select[name=personel]').on('change', (event) => {
                var personelName = $('#personelName').val();
                // console.log(personelName);
                invPerPersonel
                    .column(0)
                    .search(personelName, true, false, false)
                    .draw();
            });

            let invPerPersonel = $("#personTable").DataTable({
                "ajax":{
                    "url": "functions/inventoryPerPersonel/function.get.invPerPersonel.php",
                    "dataSrc":""
                },
                order: [[ 4, "asc" ]],
                scrollCollapse: true,
                autoWidth: false,
                responsive: true,
                select: {
                    style: 'multi',
                },
                "columns":[
                    {"data":"remarks"},
                    {"data":"item_name"},
                    {"data":"item_desc"},
                    {"data":"property_num"},
                    {"data":"date_aq"},
                    {"data":"unit_meas", visible: false},
                    {"data":"unit_val", visible: false},
                    {"data":"total_val", visible: false},
                    {"data":"quant_propcar", visible: false},
                    {"data":"quant_phycou", visible: false},
                    {"data":"SO_quant", visible: false},
                    {"data":"SO_val", visible: false},
                    {"data":"classification", visible: false},
                    {"data":null,
                    "defaultContent":'<a href="#" >Edit</a> | <a href="#"">Delete</a> | <a href="#"">Info</a>'
                    }
                ],
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
		        language: {
			        "info": "_START_-_END_ of _TOTAL_ entries",
			        searchPlaceholder: "Search",
                    paginate: {
                        next: '<i class="ion-chevron-right"></i>',
                        previous: '<i class="ion-chevron-left"></i>'  
                    }
	        	},
            });
        });

        function getPersonels(data) {
            // sort values
            data.sort(function(a, b) {
                a = a.remarks.toLowerCase();
                b = b.remarks.toLowerCase();
                return a < b ? -1 : a > b ? 1 : 0;
            });

            // append values in options
            for( i in data) {
                let sortVal = data[i];
                $('#personelName').append(
                    $("<option></option>").val(sortVal.remarks).html(sortVal.remarks)
                );
            }
        }

    </script>

</body>
</html>