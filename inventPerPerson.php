<?php
    // TODO: change views to readable only, unless/untill edit option is available
    // TODO: form validations? maybe?
    // TODO: display components? maybe?

session_start();
include ("backend/conn.php");
if (isset($_SESSION['pass'])) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System - Inventory Per Personel</title>
	
	<!--BU LOGO-->
	<link rel="icon" type="image/png" sizes="32x32" href="assets/images/logo/bu.png">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/bg.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/bg.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon"  >
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" type="text/css" href="DataTable/datatables.min.css">
    <script type="text/javascript" src="DataTable/datatables.min.js"></script>
</head>
	<style>
    
      .personelTable thead tr {
      background-color: #009879;
      color: #ffffff;
      text-align: center;
      font-weight: bold;
      cursor: pointer;
      }
      .personelTable td {
      padding: 12px 15px;
      }
      .personelTable tbody tr {
      border-bottom: 1px solid lightgreen;
      }
      .personelTable tbody tr:nth-of-type(odd) {
      background-color: white;
      }
   </style>
<body>
   	<!--Sidebars-->
    <?php require_once "functions/sidebar.php" ?>
	
            <div class="page-heading">
                <form action="" method="POST" id="formTable">
                    <section class="section">
                        <div class="row" id="table-inverse">
                            <div class="col-12">
                                
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

            // getting the list of personel
            $.ajax({
                type: "GET",
                url: 'functions/inventoryPerPersonel/function.get.personels.php',
                dataType: "JSON",
                success: (data) => {
                    console.log(data);
                    getPersonels(data);
                }
            });

            // filtering by personel
            $('select[name=personel]').on('change', (event) => {
                var personelName = $('#personelName').val();
                // console.log(personelName);
                invPerPersonel
                    .column(1)
                    .search(personelName, false, true, true)
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
                    {
                        "data": null,
                        render : function(row) {
                            let employeeName = row.first_name + " " + row.last_name;
                            return employeeName;
                        }
                    },
                    {"data":"item_name"},
                    {"data":"item_desc"},
                    {"data":"property_num"},
                    {"data":"date_aq"}
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
                a = a.first_name.toLowerCase();
                b = b.first_name.toLowerCase();
                return a < b ? -1 : a > b ? 1 : 0;
            });

            // append values in options
            for( i in data) {
                let sortVal = data[i];
                let firstName = sortVal.first_name;
                let lastName = sortVal.last_name;
                $('#personelName').append(
                    $("<option></option>").val(`${firstName} ${lastName}`).html(`${firstName} ${lastName}`)
                );
            }
        }

    </script>

</body>
</html>

<?php
}else{
      header("Location: login.php");
      exit();
}
?>
