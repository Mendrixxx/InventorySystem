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
      <link rel="stylesheet" href="assets/css/bootstrap.css">
      <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
      <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
      <link rel="stylesheet" href="assets/css/app.css">
      <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon"  >
<link rel="stylesheet" href="assets/css/bg.css"> 
	  
      <script src="assets/js/jquery-3.6.0.min.js"></script>
      <link rel="stylesheet" type="text/css" href="DataTable/datatables.min.css">
      <script type="text/javascript" src="DataTable/datatables.min.js"></script>
	  
      <script type="text/javascript">
         $(document).ready(function(){
          load_data();
          load_dropdown();
        /*function format ( d ) {
            // `d` is the original data object for the row
          if(d.hasOwnProperty(0)){
            var strTable =  '<table class="table" >'+
            '<thead>'+
                '<tr style= "background-color: #009879">'+
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
            '</thead>'+
            '<tbody>';
            var len = Object.keys(d).length;
            for(var i=0;i<len-15;i++){
              var holder = d[i];
              strTable += '<tr>';
              strTable += (holder.comp_name!=null ? '<td>'+holder.comp_name+'</td>': '<td></td>');
              strTable += (holder.c_date_aq != null ? '<td>'+holder.c_date_aq+'</td>': '<td></td>');
              strTable += (holder.c_unit_meas != null ? '<td>'+holder.c_unit_meas+'</td>': '<td></td>');
              strTable += (holder.c_unit_val != null ? '<td>'+holder.c_unit_val+'</td>': '<td></td>');
              strTable += (holder.c_total_val != null ? '<td>'+holder.c_total_val+'</td>': '<td></td>');
              strTable += (holder.c_quan_propcar != null ? '<td>'+holder.c_quan_propcar+'</td>': '<td></td>');
              strTable += (holder.c_quan_phycou != null ? '<td>'+holder.c_quan_phycou+'</td>': '<td></td>');
              strTable += (holder.c_SO_quan != null ? '<td>'+holder.c_SO_quan+'</td>': '<td></td>');
              strTable += (holder.c_SO_val != null ? '<td>'+holder.c_SO_val+'</td>': '<td></td>');
              strTable += (holder.button != null ? '<td>'+holder.button+'</td>': '<td></td>');
                '</tr>';
            }
            strTable += '</tbody></table>'; 
          }else{
            return "This Item has <a style='color:red;'>No Component</a>.";
          }
            return strTable;
        }*/

        function load_dropdown(){
          $.ajax({
            url:'backend/loadDropdown.php',
            dataType:'json',
            success:function(response){
              $("#select_classi").empty();
              var len = response.length;
              $("#select_classi").append("<option value>ALL ITEMS</option>");
              for(var i = 0;i<len; i++){
                var name  =  response[i]['name'];
                $("#select_classi").append("<option value='"+name+"'>"+name+"</option>");
              }
            }
          });
        }

        function load_data(category){
          var GlobalEditNum;

          table = $("#table1").DataTable({
              "processing":true,
              "serverside":true,
  			      "autoWidth":false,
              "ajax":{
                  url: "backend/itemTable.php",
                  data:{category:category},
                  type:"POST"
              },
              "columns":[
              /*{
                  "className":      'details-control',
                  "orderable":      false,
                  "data":           null,
                  "defaultContent": ''
              },*/
              {
                "data":"item_name",
                "defaultContent":" "
              },
              {
                "data":"item_desc",
                "defaultContent":" "
              },
              {
                "data":"property_num",
                "defaultContent":" "
              },
              {
                "data":"date_aq",
                "defaultContent":" "
              },
              {
                "data":"unit_meas",
                "defaultContent":" "
              },
              {
                "data":"unit_val",
                "defaultContent":" "
              },
              {
                "data":"total_val",
                "defaultContent":" "
              },
              {
                "data":"quant_propcar",
                "defaultContent":" "
              },
              {
                "data":"quant_phycou",
                "defaultContent":" "
              },
              {
                "data":"SO_quant",
                "defaultContent":" "
              },
              {
                "data":"SO_val",
                "defaultContent": " " 
              },
              {
                "data":"cl_name",
                "defaultContent":" "
              },
              {
                "data":"last_name",
                "defaultContent":" "
              },
              {
                "data":"button",
                "defaultContent":" "
              }],
              
         });
	      }
        /*$('#table1 tbody').on('click', 'td.details-control', function () {
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
        } );*/

        $("#select_classi").on('change',function(){
            var category = $(this).val();
            $('#table1').DataTable().destroy();
            if(category != '')
            {
             load_data(category);
            }
            else
            {
             load_data();
            }
        });

        $(document).on('click','#addC',function(){
          var newClassi = $("#addClassi").val();
          var manage = $.trim($("#addC").html());                     
          if(manage === "Add"){// add classification
            if(newClassi != null && newClassi !== ''){
              $.ajax({
                url:"backend/addClassification.php",
                method:"POST",
                data:{newC:newClassi},
                success:function(response){
                  if(response == "1"){
                    $("#addClassi").val("");
                    loadClassiTable();
                    load_dropdown();
                  }else if(response == "0"){
                    alert("Something wrong occured. Please try again.");
                    $("#addClassi").val("");
                  }else if(response == "3"){
                    alert("Classification already exists.");
                    $("#addClassi").val("");
                  }
                } 
              });
            }else{
              alert("Please enter a value in the text field.");
            }
          }else if(manage==="Edit"){//edit classification
            var clnumber = GlobalEditNum;
            if(newClassi != null && newClassi !== ''){  
              $.ajax({
                url:"backend/editClassification.php",
                method:"POST",
                data:{clnum:clnumber,newC:newClassi},
                success:function(response){
                  if(response === "success"){
                    $("#addClassi").val("");
                    $("#addC").removeClass("btn btn-warning");
                    $("#addC").addClass("btn btn-success");
                    $("#addC").html("Add");
                    loadClassiTable();
                    load_dropdown();
                  }else if(response ==="query fail"){
                    alert("Something wrong occured. Please try again.");
                    $("#addClassi").val("");
                  }else if(response ==="duplicate"){
                    alert("Classification already exists.");
                    $("#addClassi").val("");
                  }
                }
              });
            }else{
              alert("Please enter a value in the text field.");
            }
          }
        });

        $(document).on('click','#editC',function(){
            var cl_num = $(this).attr("editClassi");
            var toEdit = $(this).closest('td').siblings().html();
            GlobalEditNum = cl_num;
            
            $("#addClassi").val(toEdit);
            $("#addC").removeClass("btn btn-success");
            $("#addC").addClass("btn btn-warning");
            $("#addC").html("Edit");
            $("#cancelEd").show();
        });

        $(document).on('click','#cancelEd',function(){
          $("#cancelEd").hide();
          $("#addClassi").val("");
          $("#addC").removeClass("btn btn-warning");
          $("#addC").addClass("btn btn-success");
          $("#addC").html("Add");
        });

        $(document).on('click','#deleteC',function(){
          var cl_num = $(this).attr("deleteClassi");
          
          $.ajax({
            url:"backend/deleteClassification.php",
            method:"POST",
            data:{clnum:cl_num},
            success:function(response){
              console.log(response);
              if(response === "delete error"){
                alert("Cannot delete classification. Please delete all items before deleting classification.");
                $("#addClassi").val("");
                $("#addC").removeClass("btn btn-warning");
                $("#addC").addClass("btn btn-success");
              }else if (response == "success"){
                loadClassiTable();
                load_dropdown();
                $("#addClassi").val("");
                $("#addC").removeClass("btn btn-warning");
                $("#addC").addClass("btn btn-success");
                $("#addC").html("Add");
              }
              
            }  
          });
        });

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
	   .card {
        position: relative;
        top: -0.5rem;
        float: left;
        min-width: 4rem;
        margin-left: 0;
        margin-right: 1rem;
        text-align: left;
      }
   </style>
   <body>
   <!--Sidebars-->
      <?php require_once "functions/sidebar.php" ?>
	  
      <div class="page-heading">
         <section class="section">
            <div class="row" id="table-inverse">
               <div class="col-12">
                   <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Inventory</h4>
                     </div>
                     <div class="card-content">
                        <div class="card-classi">
                          <select id="select_classi" style="margin-left: 30px;margin-right: 20px;">

                            </select>
                            <button type="button" class="btn btn-primary" onclick="loadClassiTable()" data-backdrop="static" data-toggle="modal" data-target="#classimodal">Update Classification</button>
                          </div>
                        <div class="card-body">
                        </div>
                        <div class="card-body">
                           <table class="table" id="table1">
                              <thead>
                                 <tr>
                                    <!-- <th rowspan="2">View Component</th> -->
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
                                 <!--<td>
                                        <a href="#" class="btn btn-primary">Edit</a>
                                       </td>
                                       <td>
                                           <a href="#" class="btn btn-primary">Delete</a>
                                       </td> -->
                              </tbody>
                           </table>
                           <button id="additm" type="button" class="btn btn-primary" data-backdrop="static" data-toggle="modal" data-target="#additem">Add Item</button>
				                   

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
      

      <div class="modal fade" id="classimodal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title custom_align" id="Heading">Classification</h4>
                  <button type="button" class="close" onclick="CloseModalPopup();" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                  <table id="classiTable">
                    <thead>
                      <tr>
                        <th>Classification</th>
                        <th>Manage</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- load table here  -->
                    </tbody>
                  </table>

                  <div class="form-group">
                     <input id="addClassi" name="classification_name" type="text" class="form-control" autocomplete="off" Required>
                  </div>
                  <button type="button" name="continuec" class="btn btn-success" id="addC"> Add</button>
                  <button type="button" name="continuec" class="btn btn-danger" id="cancelEd"> Cancel Editing</button>
                </div>
                <div class="modal-footer ">
                   <button type="button" class="btn btn-secondary" onclick="CloseModalPopup();" id="cancel" data-dismiss="modal"><span
                      class="fa fa-times-circle"></span> Cancel</button>
                </div>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>

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
                  <form  method="POST" autocomplete="off" id="addform">
                     <div class="modal-body">
                        NOTE: Total Value will automatically be computed based on the Unit Value and Quantity Per Physical Count.</li></br></br>
                        <label>Name of Item: </label>
                        <div class="form-group">
                           <input name="iname" id="ainame" type="text" class="form-control" Required>
                        </div>
                        <label>Description: </label>
                        <div class="form-group">
                           <input name="desc" id="adesc" type="text" class="form-control" Required>
                        </div>
                        <label>Property Number: </label>
                        <div class="form-group">
                           <input  name="pnum"  id="apnum"type="text" class="form-control" Required>
                        </div>
                        <label>Date Acquired: </label>
                        <div class="form-group">
                           <input  name="dateaq" id="adateaq"type="date" class="form-control" Required>
                        </div>
                        <label>Unit of Measure: </label>
                        <div class="form-group">
                           <input name="umeas" id="aumeas" type="text" class="form-control" Required>
                        </div>   
                        <label>Unit Value: </label>
                        <div class="form-group"> 
                           <input name="uvalue" id="auvalue" type="number" min="15000"class="form-control" Required>
                        </div>
                        <label>Quantity Per Property Card: </label>
                        <div class="form-group">
                           <input  name="qPropCard" id="aqPropCard" type="number"  min="1" class="form-control" >
                        </div>
                        <label>Quantity Per Physical Count: </label>
                        <div class="form-group">
                           <input name="qPhysCount" id="aqPhysCount" type="number"  min="1" class="form-control" Required>
                        </div>
                        <label>Quantity of Shortage/Overage: </label>
                        <div class="form-group">
                           <input name="qSO" id="aqSO" type="number"  min="0" class="form-control" >
                        </div>
                        <label>Total value of Shortage/Overage: </label>
                        <div class="form-group">
                           <input name="vSO" id="avSO" type="number"  min="0" class="form-control">
                        </div>
                        <label>Remarks: </label>
                        <div class="form-group">
                           <?php
                              $sql = "Select employee.id, employee.first_name, employee.last_name from `employee` INNER JOIN `nbc` ON employee.id = nbc.employee_id INNER JOIN `colleges` ON nbc.college_id = colleges.id WHERE colleges.id = '1'";
                              $result = mysqli_query($conn, $sql);
                              ?>
                           <select name="remarks" id="aremarks" class="form-control">
                           <?php while($row = mysqli_fetch_array($result)){
                              echo "<option value = '$row[0]'>$row[2]".", "."$row[1]</option>";
                              }?>
                           </select>
                        </div>
                        <label>Classification: </label>
                        <div class="form-group">
                           <select name="classification2" id="classification2" class="form-control">
                  
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
                  <form method="POST" autocomplete = "off" id="editform">
                     <div class="modal-body">
                      NOTE: <i>Total Value will automatically be computed based on the Unit Value and Quantity Per Physical Count.</i></br>
                        </br>
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
                           <input  name="dateaq" id="dateaq" type="date" class="form-control">
                        </div>
                        <label>Unit of Measure: </label>
                        <div class="form-group">
                           <input name="umeas" id="umeas" type="text" placeholder="Unit Measured" class="form-control">
                        </div>
                        <label>Unit Value: </label>
                        <div class="form-group">
                           <input name="uvalue"  id="uvalue" type="number" min="0" placeholder="Unit Value" class="form-control">
                        </div>
                        <label>Quantity Per Property Card: </label>
                        <div class="form-group">
                           <input  name="qPropCard" id="qPropCard" type="number"  min="0" placeholder="Quantity Per Property Card"class="form-control">
                        </div>
                        <label>Quantity Per Physical Count: </label>
                        <div class="form-group">
                           <input name="qPhysCount" id="qPhysCount" type="number"  min="0" placeholder="Quantity Per Physical Count" class="form-control">
                        </div>
                        <label>Quantity of Shortage/Overage: </label>
                        <div class="form-group">
                           <input name="qSO" id="qSO" type="number"  min="0" placeholder="Quanity of Shortage/Overage" class="form-control">
                        </div>
                        <label>Total value of Shortage/Overage: </label>
                        <div class="form-group">
                           <input name="vSO" id="vSO" type="number"  min="0" placeholder="Total value of Shortage/Overage" class="form-control">
                        </div>
                        <label>Remarks: </label>
                        <div class="form-group">
                           <?php
                              $sql = "Select employee.id, employee.first_name, employee.last_name from `employee` INNER JOIN `nbc` ON employee.id = nbc.employee_id INNER JOIN `colleges` ON nbc.college_id = colleges.id WHERE colleges.id = '1'";
                              $result = mysqli_query($conn, $sql);
                              ?>
                           <select name="remarks" id="remarks" class="form-control">
                           <?php while($row = mysqli_fetch_array($result)){
                              echo "<option value = '$row[0]'>$row[2]".", "."$row[1]</option>";
                              }?>
                           </select>
                        </div>
                        <!-- load classification from database -->
                        <label>Classification: </label>
                        <div class="form-group">
                           <select name="classification" id="classification" class="form-control">
                              
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
     
             

      <script> 
        // classification table
        function loadClassiTable(){
          $.ajax({
            url:"backend/classiTable.php",
            success: function(response){
              $("#classiTable tbody").html(response);
              $("#cancelEd").hide();
            }
          });
        }


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
         
         //console.log(data_logsItem);
         
         $('#item_name').val(data_logsItem[0]);
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
         
         //console.log(data_logsComp);
         
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
            var classi = $(this).attr("classId");
            load_editdropdown(classi);
            submitform(itemid);
          });
            //get values from the inputs
          function submitform(itemid){
            $("#editform").submit(function(){
                  var temp = true;
                  var item_name = $("#iname").val();
                  var item_des = $("#desc").val();
                  var item_prop_no = $("#pnum").val();
                  var item_date = $("#dateaq").val();
                  var item_umeasure = $("#umeas").val();
                  var item_uvalue = $("#uvalue").val();
                  var item_quantity_prop_card = $("#qPropCard").val();
                  var item_quantity = $("#qPhysCount").val();
                  var item_quantity_shortage = $("#qSO").val();
                  var item_total_shortage = $("#vSO").val();
                  var remarks = $("#remarks option:selected").val();
                  var classification = $("#classification option:selected").val();
                  
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
                            quantity_prop_card:item_quantity_prop_card,
                            quantity:item_quantity,
                            quantity_shortage:item_quantity_shortage,
                            total_shortage:item_total_shortage,
                            remarks:remarks,
                            classification:classification,
                        },
                        success:function(response){
                            alert(response);
                        }
                    });
                    
                    
            });
          }
        });


        //

        function itemdisplay(ctl){
            editRow = $(ctl).parents("tr");
            var cols = editRow.children("td");
            var id = $("#editbtn").attr("editId");
            var remarks = $(cols[13]).children("a").attr("employeeId");
            //var classification_id = $(cols[13]).children("a").attr("classId");
            //console.log(classification);
            $("#iname").val($(cols[0]).text());
            $("#desc").val($(cols[1]).text());
            $("#pnum").val($(cols[2]).text());
            $("#dateaq").val($(cols[3]).text());
            $("#umeas").val($(cols[4]).text());
            $("#uvalue").val($(cols[5]).text());
            $("#qPropCard").val($(cols[7]).text());
            $("#qPhysCount").val($(cols[8]).text());
            $("#qSO").val($(cols[9]).text());
            $("#vSO").val($(cols[10]).text());
            $("#remarks").val(remarks, true);
            //$("#classification").val(classification, true);       
        }

        function load_editdropdown(classi){
          $.ajax({
            url:'backend/loadEditButtonDropDown.php',
            dataType:'json',
            success:function(response){
              $("#classification").empty();
              var len = response.length;
              for(var i = 0;i<len; i++){
                var name  =  response[i]['name'];
                if(i == classi)
                  $("#classification").append("<option value='"+i+"' selected>"+name+"</option>");
                else
                  $("#classification").append("<option value='"+i+"'>"+name+"</option>");
              }
            }
          });
        }
        </script> 
      <!--############################################################################################################################################################################################## -->
      <!-- Load Class in Add SCRIPT -->
        <script>
        $("#additm").on("click", function(){
         load_adddropdown();   
         setvaltoadd();
          });
                //get values from the inputs
            function setvaltoadd(){
            $("#addform").submit(function(){
                  var temp = true;
                  var item_name = $("#ainame").val();
                  var item_des = $("#adesc").val();
                  var item_prop_no = $("#apnum").val();
                  var item_date = $("#adateaq").val();
                  var item_umeasure = $("#aumeas").val();
                  var item_uvalue = $("#auvalue").val();
                  var item_quantity_prop_card = $("#aqPropCard").val();
                  var item_quantity = $("#aqPhysCount").val();
                  var item_quantity_shortage = $("#aqSO").val();
                  var item_total_shortage = $("#avSO").val();
                  var remarks = $("#aremarks option:selected").val();
                  var classification = $("#classification2 option:selected").val();
                  
                    $.ajax({
                        url:"backend/insert.php",
                        method:"post",
                        data: {
                            addbtn:temp,
                            iname:item_name,
                            desc:item_des,
                            pnum:item_prop_no,
                            dateaq:item_date,
                            umeas:item_umeasure,
                            uvalue:item_uvalue,
                            qPropCard:item_quantity_prop_card,
                            qPhysCount:item_quantity,
                            remarks:remarks,
                            classification2:classification,
                            qSO:item_quantity_shortage,
                            vSO:item_total_shortage, 
                        },
                        success:function(response){
                            alert(response);
                        }
                    });
                    
                    
            });
          }
      
        function load_adddropdown(){
          $.ajax({
            url:'backend/loadAddButtonDropDown.php',
            dataType:'json',
            success:function(response){
              $("#classification2").empty();
              var len = response.length;
              for(var i = 0;i<len; i++){
                var name  =  response[i]['name'];
                var id = response[i]['id'];
                $("#classification2").append("<option value="+id+">"+name+"</option>");
               
                  
              }
            }
          });
        }
    </script> 
   </body>
</html>
<?php
}else{
header("Location: login.php");
exit();
}
