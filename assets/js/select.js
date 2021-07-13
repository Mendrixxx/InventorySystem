 function selectClassi(){

 	var x= document.getElementById("classification").value;

 	$.ajax({
 		url:"showSummary.php",
 		method: "Post",
 		data:{
 			id : x
 		},
 		success: function(data){
 			$("#ans").html(data);
 		}


 	})
 }