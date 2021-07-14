<?php
    // TODO: change views to readable only, unless/untill edit option is available
    // TODO: form validations? maybe?
    // TODO: display components? maybe?
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
	</style>

<style>
    
    .table-striped thead tr {
      background-color: #009879;
      color: #ffffff;
      text-align: center;
      font-weight: bold;
      cursor: pointer;
    }
    .table-striped, td, tr,{
        padding: 20px;
        border: 1px solid lightgray;
        border-collapse: collapse;
        text-align: center; 
    }
    tr:nth-of-type(odd){
        background-color: white;
    }
    tr:nth-of-type(odd):hover{
        background-color: dodgerblue;
        color: white;
        transform: scale(1.0);
        transition: transform 100ms ease-in;
    }
	</style>
  

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
                                            <table class="personelTable table table-hover" id="personTable">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Item ID</th>
                                                        <th scope="col">Personel Name</th>
                                                        <th scope="col">Item Name</th>
                                                        <th scope="col">Item Description</th>
                                                        <th scope="col">Property Number</th>
                                                        <th scope="col">Date Acquired</th>
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

    <!-- view/edit modal -->
    <div class="modal fade" id="viewItem" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title-lg">Item Information</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" action="" method="POST">
                        
                        <div class="form-group row g-3">
                            <div class="col-12">
                                <div class="mb-2 row">
                                    <label for="itemID" class="col-sm-3 col-form-label"><h5>Item ID</h5></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="item_id" type="text" id="itemID" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-2 row">
                                    <label for="itemName" class="col-sm-3 col-form-label"><h5>Name</h5></label>
                                    <div class="col-sm">
                                        <input type="text" value="inte_name" class="form-control" id="itemName">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row g-3">
                            <hr><h5>About Item</h5>
                            <div class="col-md-12">
                                <label for="itemDesc" class="form-label">Description</label>
                                <input type="text" value="item_desc" class="form-control" id="itemDesc">
                            </div>
                            
                            <div class="col-md-8">
                                <label for="propNo" class="form-label">Property Number</label>
                                <input type="text" value="prop_num" class="form-control" id="propNo">
                            </div>
                            <div class="col-md-4">
                                <label for="dateAcq" class="form-label">Date Acquired</label>
                                <input type="date" class="form-control">
                            </div>
                            
                            <div class="col-md-6">
                                <label for="unitMeas" class="form-label">Unit of Meassure</label>
                                <input type="text" value="unit_meas" class="form-control" id="unitMeas">
                            </div>
                            <div class="col-md-6">
                                <label for="unitVal" class="form-label">Unit Value</label>
                                <input type="text" value="unit_val" class="form-control" id="unitVal">
                            </div>
                        </div>

                        <div class="form-group row g-3" hidden>
                            <hr><h5>Components</h5>
                            <!-- generate components -->
                        </div>

                        <div class="form-group row g-3">
                            <hr><h5>Quantity Per: </h5>
                            <div class="col-md-6">
                                <label for="qtyPhyCount" class="form-label">Physical Count</label>
                                <input type="number" value="phy_count" class="form-control" id="qtyPhyCount">
                            </div>
                            <div class="col-md-6">
                                <label for="qtyPropCard" class="form-label">Property Card</label>
                                <input type="number" value="prop_card" class="form-control" id="qtyPropCard">
                            </div>
                            <h5>Shortage/Overage</h5>
                            <div class="col-md-6">
                                <label for="SO_quant" class="form-label">Quantity</label>
                                <input type="number" value="SO_phyCount" class="form-control" id="SO_quant">
                            </div>
                            <div class="col-md-6">
                                <label for="SO_totalVal" class="form-label">Total Value</label>
                                <input type="text" value="SO_totalVal" class="form-control" id="SO_totalVal">
                            </div>
                        </div>
                        
                        <div class="form-group row g-3">
                        <hr>
                            <div class="col-md-12">
                                <div class="mb-2 row">
                                    <label for="totalVal" class="col-sm-3 col-form-label"><h5>Total Value:</h5></label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="total_val" type="text" id="totalVal" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" hidden>Save Changes</button>
                </div>
            </div>
        </div>
    </div>
    <!--
    <div class="dropdown">
        <a class="btn btn-outline-primary no-arrow dropdown-toggle btn-sm" href="#" role="button" data-toggle="dropdown">
            <i class="bi bi-box-arrow-up-left"></i><span>More</span>
        </a>
        <div class="dropdwon-menu dropdown-menu-right dropdown-menu-icon-list">
            <a class="view btn btn-outline-info btn-sm dropdown-item" href="#" role="button" data-target="#viewItem">
                <i class="bi bi-box-arrow-up-left"></i><span>View/Edit</span>
            </a>
            <a class="view btn btn-outline-danger btn-sm dropdown-item" href="#" role="button" data-target="#viewItem">
                <i class="bi bi-box-arrow-up-left"></i><span>Delete</span>
            </a>
        </div>
    </div>
    <!-- end of view/edit modal -->

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            
            // getting the list of personel
            $.ajax({
                type: "GET",
                url: 'functions/inventoryPerPersonel/function.get.invPerPersonel.php',
                dataType: "JSON",
                success: (data) => {
                    console.log(data);
                    getPersonels(data);
                }
            });

            // filtering by personel
            var personMap;
            $('select[name=personel]').on('change', (event) => {
                var personelName = $('#personelName').val();
                // console.log(personelName);
                invPerPersonel
                    .column(1)
                    .search(personelName, true, false, false)
                    .draw();
            });

            // generate dataTable
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
                    {"data":"item_id", visible:false},
                    {"data":"remarks"},
                    {"data":"item_name"},
                    {"data":"item_desc"},
                    {"data":"property_num"},
                    {"data":"date_aq"},
                    {   
                        "data": null,
                        "defaultContent":
                            `<a class="view btn btn-outline-info btn-sm" href="#" role="button" data-target="#viewItem">
                                <i class="bi bi-box-arrow-up-left"></i><span>More</span>
                            </a>`,
                        className: "text-center",
                    },
                    {"data":"unit_meas", visible: false},
                    {"data":"unit_val", visible: false},
                    {"data":"total_val", visible: false},
                    {"data":"quant_propcar", visible: false},
                    {"data":"quant_phycou", visible: false},
                    {"data":"SO_quant", visible: false},
                    {"data":"SO_val", visible: false},
                    {"data":"classification", visible: false}
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

            // perform view
            $('.personelTable tbody').on('click', '.view', function() {
                // console.log('click');
                var itemData = $('.personelTable').DataTable().row($(this).parents("tr")).data();
                console.log(itemData);

                $('#itemID').val(itemData.item_id);
                $('#itemName').val(itemData.item_name);
                $('#itemDesc').val(itemData.item_desc);
                $('#propNo').val(itemData.property_num);
                
                // TODO: how to display date in form input type date
                $('#dateAcq').val(itemData.date_aq);
            
                $('#unitMeas').val(itemData.unit_meas);
                $('#unitVal').val(itemData.unit_val);
                $('#qtyPhyCount').val(itemData.quant_phycou);
                $('#qtyPropCard').val(itemData.quant_propcar);
                $('#SO_quant').val(itemData.SO_quant);
                $('#SO_totalVal').val(itemData.SO_val);

                // TODO MAYBE: totalval should calc unit_val*qtyPhyCount
                $('#totalVal').val(itemData.total_val);            

                $('#viewItem').modal('show');
            })

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
