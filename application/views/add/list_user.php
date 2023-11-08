<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
</head>
<h4>User Info</h4>
<body>
<div class="container">
	<table id="item-list" class="table table-bordered table-striped table-hover">
		<button name="submit" id="save">Store</button>
		<thead>
			<tr>
				<th>S.no</th>
				<th>First Name</th>
				<th>Last Name</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
</body>
<span id="sucess"> Added Spam</span>
<script type="text/javascript">

$(document).ready(function() {
	$('#sucess').hide();
	var base_url = "<?php echo WEB_URL;?>";
    $('#item-list').DataTable({
        "ajax": {
            url : base_url + "Employee/userInfo",
            type : 'GET'
        },
    });
});

$(document).on('click','#save',function(){
		var base_url = "<?php echo WEB_URL;?>";
	    var table = $("#item-list").DataTable();
	     var value = $('.dataTables_filter input').val();
	    var data = table
	    .rows({ filter : 'applied'} )
	    .data()
	    .toArray();

		var obj = [];
		$(data).each(function(i,v){
		    obj.push(v[0]);
		});

			$.ajax({
			type : "POST",
			url : base_url + 'employee/updateRecords',
			dataType: "json",
			data : {id:obj,search:value},
			success : function(response) {
				console.log(response);
				if(response == 0){
					alert('Tags Added sucessfully');
					$('#sucess').show();
					$('#fail').hide()
				}else{
					$('#fail').show();
					$('#sucess').hide();
				}
			}
		});

	});
</script>



</html>