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
      <title>Inventory System - Inventory</title>
	  
	  <!--BU LOGO-->
	  <link rel="icon" type="image/png" sizes="32x32" href="assets/images/logo/bu.png">
	  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/bg.css">  
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

        function format ( d ) {
            // `d` is the original data object for the row
            var temp,strTable;
            if(d[0]!== undefined){
                   strTable =  '<table class="table" >'+
                '<thead>'+
                    '<tr>'+
                        '<th>Component Name</th>'+
                        '<th>Date Aquired</th>'+
                        '<th>Unit Of Measure</th>'+
                        '<th>Unit Value</th>'+
                        '<th>Total Value</th>'+
                        '<th>Q.P. Property Card</th>'+
                        '<th>Q.P. Physical Count</th>'+
                        '<th>Shortage/Overage Q.</th>'+
                        '<th>Shortage/Overage V.</th>'+
                        '<th>Manage</th>'+
                    '</tr>'+
                '</thead>';
                for( temp in d ){
                    if(d[temp].comp_name !== undefined){
                        strTable += ''+
                        '<tbody>'+
                            '<tr>'+
                                '<td>'+d[temp].comp_name+'</td>'+
                                '<td>'+d[temp].c_date_aq+'</td>'+
                                '<td>'+d[temp].c_unit_meas+'</td>'+
                                '<td>'+d[temp].c_unit_val+'</td>'+
                                '<td>'+d[temp].c_total_val+'</td>'+
                                '<td>'+d[temp].c_quan_propcar+'</td>'+
                                '<td>'+d[temp].c_quan_phycou+'</td>'+
                                '<td>'+d[temp].c_SO_quan+'</td>'+
                                '<td>'+d[temp].c_SO_val+'</td>'+
                                '<td>'+d[temp].button+'</td>'+
                            '</tr>'
                        '</tbody>';
                    }
                }
                strTable += '</table>'; 
            }else{
                return "This Item has <a style='color:red;'>No Component</a>.";
            }
            
            return strTable;
           /*
            return '<table class="table table-striped">'+
                '<tr>'+
                    '<td>'+d.component.comp_name+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Extension number:</td>'+
                    '<td>'+d.component_comp_id+'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Extra info:</td>'+
                    '<td>And any further details here (images etc)...</td>'+
                '</tr>'+
            '</table>';*/
        }

        var table = $("#table1").DataTable({
            "processing":true,
            "serverside":true,
			"autoWidth":false,
            "ajax":{
                url: "backend/itemTable.php",
                dataType: "json"
            },
            "columns":[
            {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
            },
                {"data":"item_name"},
                {"data":"item_desc"},
                {"data":"property_num"},
                {"data":"date_aq"},
                {"data":"unit_meas"},
                {"data":"unit_val"},
                {"data":"total_val"},
                {"data":"quant_propcar"},
                {"data":"quant_phycou"},
                {"data":"SO_quant"},
                {"data":"SO_val"},
                {"data":"cl_name"},
                {"data":"last_name"},
                {"data":"button"}
            ]
       });
	   
        $('#table1 tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( this );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                // $( row.child() ).DataTable();
                
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        } );

    });


</script>
   </head>
   <style>
      td.details-control {
      background: url('DataTable/DataTables-1.10.25/images/details_open.png') no-repeat center center;
      cursor: pointer;
      }
      tr.shown td.details-control {
      background: url('DataTable/DataTables-1.10.25/images/details_close.png') no-repeat center center;
      }
      .table thead tr {
      background-color: #009879;
      color: #ffffff;
      text-align: center;
      font-weight: bold;
      cursor: pointer;
      }
      .table td {
      padding: 12px 15px;
      }
      .table tbody tr {
      border-bottom: 1px solid lightgreen;
      }
      .table tbody tr:nth-of-type(odd) {
      background-color: white;
      }
   </style>
   <body>
   <!--Sidebars-->
      <?php require_once "functions/sidebar.php" ?>
	  
      <div class="page-heading">
         <section class="section">
            <div class="row" id="table-inverse">
               <div class="col-12">
                  
                        <h4 class="card-title">Inventory</h4>
                     </div>
                     <div class="card-content">
                        <div class="card-body">
                        </div>
                        <div class="card-body">
                           <table class="table" id="table1">
                              <thead>
                                 <tr>
                                    <th rowspan="2">View Component</th>
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
      <!--############################################################################################################################################################################################## -->
      <!-- DELETE item MODAL -->
      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title custom_align" id="Heading">Notice!</h4>
                  <button type="button" class="close" onclick="CloseModalPopup();" data-dismiss="modal" aria-hidden="true">×</button>
               </div>
               <form action="backend/delete.php" method="POST">
                  <div class="modal-body">
                     <div class="alert alert-default"><span class="fa fa-exclamation-triangle"></span> Are you sure
                        you want to delete this Item?</br>
                        Remove Record - Item is not intended to be recorded (Will not be added to costing)</br>
                     </div>
                     <input type="hidden" name="Delete_ID" id="Delete_ID">
                     <input type="hidden" name="item_name" id="item_name"> <!-- For logs -->
                  </div>
                  <div class="modal-footer ">
                     
                     <button type="button" class="btn btn-secondary" onclick="CloseModalPopup();" id="cancel" data-dismiss="modal"><span
                        class="fa fa-times-circle"></span> Cancel</button>
                     <button type="submit" name="xdata" class="btn btn-danger" id="xdata"><span
                        class="fa fa-check-circle"></span> Remove Record</button>
                     <button type="submit" name="continue" class="btn btn-warning" id="continue"><span
                        class="fa fa-check-circle"></span> Set as Unservicable</button>
                  </div>
               </form>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!--############################################################################################################################################################################################## -->
      <!--############################################################################################################################################################################################## -->
      <!-- DELETE component MODAL -->
      <div class="modal fade" id="deletec" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title custom_align" id="Heading">Notice!</h4>
                  <button type="button" class="close" onclick="CloseModalPopup();" data-dismiss="modal" aria-hidden="true">×</button>
               </div>
               <form action="backend/deletec.php" method="POST">
                  <div class="modal-body">
                     <div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Are you sure
                        you want to delete this Component?
                     </div>
                     <input type="hidden" name="Delete_IDc" id="Delete_IDc">
                     <input type="hidden" name="comp_name" id="comp_name"> <!-- For logs -->
                  </div>
                  <div class="modal-footer ">
                     <button type="button" class="btn btn-default" onclick="CloseModalPopup();" id="cancel" data-dismiss="modal"><span
                        class="fa fa-times-circle"></span> Cancel</button>
                     <button type="submit" name="continuec" class="btn btn-success" id="continuec"><span
                        class="fa fa-check-circle"></span> Continue</button>
                  </div>
               </form>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!--############################################################################################################################################################################################## -->
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
                        </div>
                        <label>Total value of Shortage/Overage: </label>
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
                        </div>
                        <label>Total value of Shortage/Overage: </label>
                        <div class="form-group">
                           <input name="cvSO" type="number"  placeholder="Total value of Shortage/Overage" class="form-control" Required>
                        </div>
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
      <!--############################################################################################################################################################################################## -->
      <!--Edit Item Modal -->
      <div class="modal fade" id="edititem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Item</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body">
                  <form action="backend/editItem.php" method="POST" autocomplete = "off" id="editform">
                     <div class="modal-body">
                        <label>Name of Item: </label>
                        <div class="form-group">
                           <input name="iname" id="iname" type="text" placeholder="Name" class="form-control" Required>
                        </div>
                        <label>Description: </label>
                        <div class="form-group">
                           <input name="desc" id="desc" type="text" placeholder="Description" class="form-control" Required>
                        </div>
                        <label>Property Number: </label>
                        <div class="form-group">
                           <input  name="pnum" id="pnum" type="text" placeholder="Property Number" class="form-control" Required>
                        </div>
                        <label>Date Acquired: </label>
                        <div class="form-group">
                           <input  name="dateaq" id="dateaq" type="date" class="form-control" Required>
                        </div>
                        <label>Unit of Measure: </label>
                        <div class="form-group">
                           <input name="umeas" id="umeas" type="text" placeholder="Unit Measured" class="form-control" Required>
                        </div>
                        <label>Unit Value: </label>
                        <div class="form-group">
                           <input name="uvalue"  id="uvalue" type="number" placeholder="Unit Value" class="form-control" Required>
                        </div>
                        <label>Total Value: </label>
                        <div class="form-group">
                           <input name="tvalue" id="tvalue" type="number" placeholder="Total Value" class="form-control" Required>
                        </div>
                        <label>Quantity Per Property Card: </label>
                        <div class="form-group">
                           <input  name="qPropCard" id="qPropCard" type="number"  placeholder="Quantity Per Property Card"class="form-control" Required>
                        </div>
                        <label>Quantity Per Physical Count: </label>
                        <div class="form-group">
                           <input name="qPhysCount" id="qPhysCount" type="number"  placeholder="Quantity Per Physical Count" class="form-control" Required>
                        </div>
                        <label>Quantity of Shortage/Overage: </label>
                        <div class="form-group">
                           <input name="qSO" id="qSO" type="number"  placeholder="Quanity of Shortage/Overage" class="form-control" Required>
                        </div>
                        <label>Total value of Shortage/Overage: </label>
                        <div class="form-group">
                           <input name="vSO" id="vSO" type="number"  placeholder="Total value of Shortage/Overage" class="form-control" Required>
                        </div>
                        <label>Remarks: </label>
                        <div class="form-group">
                           <?php
                              $sql = "Select * from `employee`";
                              $result = mysqli_query($conn, $sql);
                              ?>
                           <select name="remarks" id="remarks" class="form-control">
                           <?php while($row = mysqli_fetch_array($result)){
                              echo "<option value = '$row[0]'>$row[4]"." "."$row[2]</option>"; // di ko gets?
                              }?>
                           </select>
                        </div>
                        <label>Classification: </label>
                        <div class="form-group">
                           <select name="classification" id="classification" class="form-control">
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
                        <button name = "update" id="update" type="submit" class="btn btn-primary ml-1"
                           data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Update</span>
                        </button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!--Edit Item Modal END-->
      <!--Edit Component Modal -->
      <div class="modal fade" id="editcomp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        </div>
                        <label>Total value of Shortage/Overage: </label>
                        <div class="form-group">
                           <input name="cvSO" type="number"  placeholder="Total value of Shortage/Overage" class="form-control" Required>
                        </div>
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
      <!--Add Item Modal END-->
      <script>
         //DELETE item SCRIPT
         $('#table1').on('click', '#dtbn', function() {
             $('#delete').modal({
         backdrop: 'static',
         keyboard: false
         });
             $('#delete').modal('show');
         
             var data = $(this).data('assigned-id');
             console.log(data);
             $('#Delete_ID').val(data);
         
         /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
         //For logs feature. Wag pong tanggalin.
         $tr = $(this).closest("tr");
         var data_logsItem = $tr.children("td").map(function(){
         return $(this).text();
         }).get();
         
         console.log(data_logsItem);
         
         $('#item_name').val(data_logsItem[1]);
         /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
         });
         
         //DELETE comp SCRIPT
         $('#table1').on('click', '#dtbnc', function() {
             $('#deletec').modal({
         backdrop: 'static',
         keyboard: false
         });
             $('#deletec').modal('show');
         
             var data = $(this).data('assigned-id');
             console.log(data);
             $('#Delete_IDc').val(data);
         
         /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
         //For logs feature. Wag pong tanggalin.
         $tr = $(this).closest("tr");
         var data_logsComp = $tr.children("td").map(function(){
         return $(this).text();
         }).get();
         
         console.log(data_logsComp);
         
         $('#comp_name').val(data_logsComp[0]);
         /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
         });
         
         function CloseModalPopup() {
             $("#delete").modal('hide');
             $("#deletec").modal('hide');
         }
      </script>
      <!--############################################################################################################################################################################################## -->
      <!-- EDIT SCRIPT -->
      <script>
        $(document).ready(function(){
          $("#table1").on("click", "#editbtn", function(){
            var itemid = $(this).attr("editId");
            submitform(itemid);
          });
            //get values from the inputs
          function submitform(itemid){
            $("#editform").submit(function(){
              //e.preventDefault();
                  var temp = true;
                  var item_name = $("#iname").val();
                  var item_des = $("#desc").val();
                  var item_prop_no = $("#pnum").val();
                  var item_date = $("#dateaq").val();
                  var item_umeasure = $("#umeas").val();
                  var item_uvalue = $("#uvalue").val();
                  var item_totalvalue = $("#tvalue").val();
                  var item_quantity_prop_card = $("#qPropCard").val();
                  var item_quantity = $("#qPhysCount").val();
                  var item_quantity_shortage = $("#qSO").val();
                  var item_total_shortage = $("#vSO").val();
                  var remarks = $("#remarks").val();
                  var classification = $("#classification").val();
                    $.ajax({
                        url:"backend/editItem.php",
                        method:"post",
                        data: {
                          updatebtn:temp,
                            id:itemid,
                            name:item_name,
                            des:item_des,
                            prop_no:item_prop_no,
                            date:item_date,
                            umeasure:item_umeasure,
                            uvalue:item_uvalue,
                            totalvalue:item_totalvalue,
                            quantity_prop_card:item_quantity_prop_card,
                            quantity:item_quantity,
                            quantity_shortage:item_quantity_shortage,
                            total_shortage:item_total_shortage,
                            remarks:remarks,
                            classification:classification,
                        },
                        success:function(response){
                            alert(response);
                            //table.destroy
                            //reloadTable
                        }
                    });
                    
                    
            });
          }
        });


        //
        function itemdisplay(ctl){
            editRow = $(ctl).parents("tr");
            var cols = editRow.children("td");
            var id = editRow.attr("editId");
            var remarks;
            var classification;

            $("#iname").val($(cols[1]).text());
            $("#desc").val($(cols[2]).text());
            $("#pnum").val($(cols[3]).text());
            $("#dateaq").val($(cols[4]).text());
            $("#umeas").val($(cols[5]).text());
            $("#uvalue").val($(cols[6]).text());
            $("#tvalue").val($(cols[7]).text());
            $("#qPropCard").val($(cols[8]).text());
            $("#qPhysCount").val($(cols[9]).text());
            $("#qSO").val($(cols[10]).text());
            $("#vSO").val($(cols[11]).text());
            remarks = $("#remarks option:selected");
            classification = $("#classification option:selected");
        }
    </script> 
   </body>
</html>
<?php
}else{
header("Location: login.php");
exit();
}
