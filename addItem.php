<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
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
                                            <a href="mmm.html">Inventory Per Personnel</a>
                                            
                                        </li>
                                        <ul class="submenu active">
                                            <li class="submenu-item active">
                                            <a href="way.html" class='sidebar-link'>Inventory Per Classification</a>
                                            
                                     
                                        
                                                
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
                    <section id="form-and-scrolling-components">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <h4 class="card-title">Please Input all data Needed to proceed</h4>
 

                                                            <form action="insert.php" method="POST">
                                                                <div class="modal-body">
                                                                
                                                                    <label>Name: </label>
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
                                                                    <label>Unit Measured: </label>
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
                                                                        <input name="remarks" type="text" placeholder="Remarks"class="form-control" Required>   
                                                                    </div>
                                                                    <label>Classification: </label>
                                                                    <div class="form-group">
                                                                        <select name="classification" placeholder="Classification" class="form-control">
                                                                            <option value="0">IT</option>
                                                                            <option value="1">LABORATORY</option>
                                                                            <option value="2">OFFICE</option>
                                                                        </select>
                                                                    </div>
                                                                    
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button onclick="window.location.href='inventory.php'" type="button" class="btn btn-light-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Close</span>
                                                                    </button>
                                                                    <input type = "reset" value="Clear" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcomp">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Add a Component for this Item</span>
                                                                    </button>
                                                                    <button name = "add" type="submit" class="btn btn-primary ml-1"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Finish up</span>
                                                                    </button>
                                                
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

<!-- Modal -->
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
               <form action="#">
                                                                <div class="modal-body">
                                                                <label>Name: </label>
                                                                    <div class="form-group">
                                                                        <input name="iname" type="text" placeholder="Name" class="form-control" Required>
                                                                    </div>
                                                                    
                                                                    <label>Date Acquired: </label>
                                                                    <div class="form-group">
                                                                        <input  name="dateaq" type="date" class="form-control" Required>
                                                                         
                                                                    </div>
                                                                    <label>Unit Measured: </label>
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
                                                                        <input name="remarks" type="text" placeholder="Remarks"class="form-control" Required>   
                                                                    </div>
                                                                <div class="modal-footer">
                                                                   
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Cancel</span>
                                                                        
                                                                    </button>
                                                                   
                                                                    <button type="button" class="btn btn-primary ml-1"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">ADD</span>
                                                                    </button>
                                                                </div>
                                                            </form>
      </div>
    </div>
  </div>
</div>

</body>