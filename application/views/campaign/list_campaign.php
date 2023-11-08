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
<a href="<?php WEB_URL?>/employee/addCampaign">add</a>
<body>
<div class="container">
	<table id="item-list" class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>S.no</th>
				<th>Campaign Name</th>
				<th>Subject Name</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>
</body>
<script type="text/javascript">

$(document).ready(function() {
	var base_url = "<?php echo WEB_URL;?>";
    $('#item-list').DataTable({
        "ajax": {
            url : base_url + "Employee/campaignInfo",
            type : 'GET'
        },
    });
});
	$(document).on('click','#save',function(){
	    var table = $("#item_list").DataTable();
	    var data = table.row().data();
	   
	   alert(+data.length)

	    console.log(table);
	})

</script>



</html>