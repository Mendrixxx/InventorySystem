<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Per Personnel</title>

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
                    <a href="kapagalan.php" class='sidebar-link'>
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
                                               
                                            
                                                            </div>
                                                            <form action="#">
                                                                <div class="modal-body">
                                                                    <label>Name: </label>
                                                                    <div class="form-group">
                                                                        <input require  type="text" placeholder="Name"
                                                                            class="form-control">
                                                                    </div>
                                                                    <label>Unit: </label>
                                                                    <div class="form-group">
                                                                        <input require  type="text" placeholder="Unit"
                                                                            class="form-control">
                                                                    </div>
                                                                    <label>Description: </label>
                                                                    <div class="form-group">
                                                                        <input require type="text" placeholder="Description"
                                                                            class="form-control">
                                                                    </div>
                                                                    <label>Property Number: </label>
                                                                    <div class="form-group">
                                                                        <input require  type="text" placeholder="Property Number"
                                                                            class="form-control">
                                                                    </div>
                                                                    <label>Date Acquired: </label>
                                                                    <div class="form-group">
                                                                        <input require  type="text" placeholder="Date Acquired"
                                                                            class="form-control">
                                                                    </div>
                                                                    <label>Unit Of Measure: </label>
                                                                    <div class="form-group">
                                                                        <input require  type="text" placeholder="Unit Of Measure"
                                                                            class="form-control">
                                                                    </div>
                                                                    <label>Unit Value: </label>
                                                                    <div class="form-group">
                                                                        <input require  type="text" placeholder="Unit Value"
                                                                            class="form-control">
                                                                    </div>
                                                                    <label>Total Value: </label>
                                                                    <div class="form-group">
                                                                        <input require  type="text" placeholder="Total Value"
                                                                            class="form-control">
                                                                    </div>
                                                                    <label>Quantity Per Property Card: </label>
                                                                    <div class="form-group">
                                                                        <input require  type="text" placeholder="Quantity Per Property Card"
                                                                            class="form-control">
                                                                    </div>
                                                                    <label>Quantity Per Physical Count: </label>
                                                                    <div class="form-group">
                                                                        <input require  type="text" placeholder="Quantity Per Physical Count"
                                                                            class="form-control">
                                                                    </div>
                                                                    <label>Remarks: </label>
                                                                    <div class="form-group">
                                                                        <input require type="text" placeholder="Remarks"
                                                                            class="form-control">
                                                                    </div>
                                                                    <label>Classification: </label>
                                                                    <div class="form-group">
                                                                        <select  placeholder="Classification" class="form-control">
                                                                            <option value="0">IT</option>
                                                                            <option value="1">LABORATORY</option>
                                                                            <option value="2">OFFICE</option>
                                                                        </select>
                                                                    </div>
                                                                    
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Close</span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-light-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Clear</span>
                                                                    </button>
                                                                    <button type="button" class="btn btn-primary ml-1"
                                                                        data-bs-dismiss="modal">
                                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                                        <span class="d-none d-sm-block">Add</span>
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