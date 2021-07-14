<?php
    include 'backend/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INVENTORY</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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

<script type="text/javascript">
    
    $(document).ready(function(){
       $("#table1").DataTable({
            "processing":true,
            "serverside":true,
            "ajax":{
                url: "backend/itemTable.php",
                dataType: "json"
            }
       });

    });


</script>

</head>
    </style>
.table-striped thead tr {
      background-color: #009879;
      color: #ffffff;
      text-align: center;
      font-weight: bold;
      cursor: pointer;
    }

.table-striped td {
    padding: 12px 15px;
  }
  .table-striped tbody tr {
    border-bottom: 1px solid lightgreen;
  }
  
  .table-striped tbody tr:nth-of-type(odd) {
    background-color: white;
  }
  .table-striped tbody tr:nth-of-type(odd):hover {
    background-color: dodgerblue;
    color: white;
    transform: scale(1.0);
    transition: transform 100ms ease-in;
  }
  
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
                                                                <th rowspan="2">Name</th>
                                                                <th rowspan="2">Description</th>
                                                                <th rowspan="2">Property Number</th>
                                                                <th rowspan="2">Date Acquired</th>
                                                                <th rowspan="2">Unit Of Measure</th>
                                                                <th rowspan="2">Unit Value</th>
                                                                <th rowspan="2">Total Value</th>
                                                                <th rowspan="2">Quantity Per Property Card</th>
                                                                <th rowspan="2">Quantity Per Physical Count</th> 
                                                                <th colspan="2">Shortage/Overage</th>
                                                                <th rowspan="2">Classification</th>
                                                                <th rowspan="2">Remarks</th>
                                                                <th rowspan="2">Manage</th>
                                                            </tr>
                                                            <tr>
                                                                <th>Quantity</th>
                                                                <th>Value</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <td>
                                                                 <!--    <a href="#" class="btn btn-primary">Edit</a>
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="btn btn-primary">Delete</a>
                                                                </td> -->
                                                        </tbody>
                                                        </table>
                                                        <button type="button" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#additem">Add Item</button>
                                                        <button type="button" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#addcomp">Add Component</button>
                                                                
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


<!--Add Item Modal -->
<div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="backend/insert.php" method="POST">
                                                                <div class="modal-body">
                                                                
                                                                    <label>Name of Item: </label>
                                                                    <div class="form-group">
                                                                        <input name="iname" type="text" placeholder="Name" class="form-control" Required>
                                                                    </div>
                                                                    <label>Description: </label>
                                                                    <div class="form-group">
                                                                        <input name="desc" type="text" placeholder="Description" class="form-control" Required>
                                                                          
                                                                    </div>
                                                                    <label>Property Number: </label>
                                                                    <div class="form-group">
                                                                        <input  name="pnum" type="text" placeholder="Property Number" class="form-control" Required>

                                                                    </div>
                                                                    <label>Date Acquired: </label>
                                                                    <div class="form-group">
                                                                        <input  name="dateaq" type="date" class="form-control" Required>
                                                                         
                                                                    </div>
                                                                    <label>Unit of Measure: </label>
                                                                    <div class="form-group">
                                                                        <input name="umeas" type="text" placeholder="Unit Measured" class="form-control" Required>
                                                                           
                                                                    </div>
                                                                    <label>Unit Value: </label>
                                                                    <div class="form-group">
                                                                        <input name="uvalue"  type="number" placeholder="Unit Value" class="form-control" Required>
                                                                         
                                                                    </div>
                                                                    <label>Total Value: </label>
                                                                    <div class="form-group">
                                                                        <input name="tvalue" type="number" placeholder="Total Value" class="form-control" Required>
                                                                          
                                                                    </div>
                                                                    <label>Quantity Per Property Card: </label>
                                                                    <div class="form-group">
                                                                        <input  name="qPropCard" type="number"  placeholder="Quantity Per Property Card"class="form-control" Required>
                                                                          
                                                                    </div>
                                                                    <label>Quantity Per Physical Count: </label>
                                                                    <div class="form-group">
                                                                        <input name="qPhysCount" type="number"  placeholder="Quantity Per Physical Count" class="form-control" Required> 
                                                                    </div>
                                                                    <label>Quantity of Shortage/Overage: </label>
                                                                    <div class="form-group">
                                                                        <input name="qSO" type="number"  placeholder="Quanity of Shortage/Overage" class="form-control" Required> 
                                                                    </div> <label>Total value of Shortage/Overage: </label>
                                                                    <div class="form-group">
                                                                        <input name="vSO" type="number"  placeholder="Total value of Shortage/Overage" class="form-control" Required> 
                                                                    </div>
                                                                    <label>Remarks: </label>
                                                                    <div class="form-group">
                                                                        <?php
                                                                        $sql = "Select * from `employee`";
                                                                        $result = mysqli_query($conn, $sql);
                                                                        ?>
                                                                        <select name="remarks" class="form-control">
                                                                            <?php while($row = mysqli_fetch_array($result)){
                                                                            echo "<option value = '$row[0]'>$row[4]"." "."$row[2]</option>";
                                                                            }?>
                                                                        </select>   
                                                                    </div>
                                                                    <label>Classification: </label>
                                                                    <div class="form-group">
                                                                        <select name="classification" class="form-control">
                                                                            <option value="0">IT</option>
                                                                            <option value="1">LABORATORY</option>
                                                                            <option value="2">OFFICE</option>
                                                                        </select>
                                                                    </div>
                                                                    
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Cancel</span>
                                                                    </button>
                                                                    
                                                                    <button name = "add" type="submit" class="btn btn-primary ml-1"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Add Item</span>
                                                                    </button>
                                                
                                                                </div>
                                                            </form>
      </div>
    </div>
  </div>
</div>
<!--Add Item Modal END-->
<!--Add Component Modal -->
<div class="modal fade" id="addcomp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Component</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="backend/insert.php" method="POST">
                                                                <div class="modal-body">
                                                                <label>Select the Item that will receive this Component: </label> 
                                                                <div class="form-group">
                                                                    <?php
                                                                    $sql = "Select * from `item`";
                                                                    $result = mysqli_query($conn, $sql);
                                                                    
                                                                    ?>
                                                                        <select name="itmname" class="form-control">
                                                                            <?php while($row = mysqli_fetch_array($result)){
                                                                            echo "<option value = '$row[0]'>$row[1]</option>";
                                                                            }?>
                                                                        </select>
                                                                    </div>
                                                                <label>Name of Component: </label>
                                                                    <div class="form-group">
                                                                        <input name="cname" type="text" placeholder="Name" class="form-control" Required>
                                                                    </div>
                                                                    
                                                                    <label>Date Acquired: </label>
                                                                    <div class="form-group">
                                                                        <input  name="cdateaq" type="date" class="form-control" Required>
                                                                         
                                                                    </div>
                                                                    <label>Unit of Measure: </label>
                                                                    <div class="form-group">
                                                                        <input name="cumeas" type="text" placeholder="Unit Measured" class="form-control" Required>
                                                                           
                                                                    </div>
                                                                    <label>Unit Value: </label>
                                                                    <div class="form-group">
                                                                        <input name="cuvalue"  type="number" placeholder="Unit Value" class="form-control" Required>
                                                                         
                                                                    </div>
                                                                    <label>Total Value: </label>
                                                                    <div class="form-group">
                                                                        <input name="ctvalue" type="number" placeholder="Total Value" class="form-control" Required>
                                                                          
                                                                    </div>
                                                                    <label>Quantity Per Property Card: </label>
                                                                    <div class="form-group">
                                                                        <input  name="cqPropCard" type="number"  placeholder="Quantity Per Property Card"class="form-control" Required>
                                                                          
                                                                    </div>
                                                                    <label>Quantity Per Physical Count: </label>
                                                                    <div class="form-group">
                                                                        <input name="cqPhysCount" type="number"  placeholder="Quantity Per Physical Count" class="form-control" Required> 
                                                                    </div>
                                                                    <label>Quantity of Shortage/Overage: </label>
                                                                    <div class="form-group">
                                                                        <input name="cqSO" type="number"  placeholder="Quanity of Shortage/Overage" class="form-control" Required> 
                                                                    </div> <label>Total value of Shortage/Overage: </label>
                                                                    <div class="form-group">
                                                                        <input name="cvSO" type="number"  placeholder="Total value of Shortage/Overage" class="form-control" Required> 
                                                                    </div>
                                                                <div class="modal-footer">
                                                                   
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Cancel</span>
                                                                        
                                                                    </button>
                                                                   
                                                                    <button name = "addc" type="sumbit" class="btn btn-primary ml-1"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Add Component</span>
                                                                    </button>
                                                                </div>
                                                            </form>
      </div>
    </div>
  </div>
</div>
<!--Add Component Modal END-->


                    </body>
                    
                    </html>

                                                          
