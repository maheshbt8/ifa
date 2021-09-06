<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">IFA Users List</h3>
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<table id="example2" class="table table-bordered table-hover">
						<thead>
						<tr>
							<th style="width: 10%">S.no</th>
							<th style="width: 30%">Username</th>
							<th style="width: 30%">Name</th>
							<th style="width: 30%">Created Time</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$sno=1;
						foreach($userslist as $row)
						{

							echo "<tr>  
                                <td>$sno</td>  
                                <td>$row->username</td>  
                                <td>$row->first_name</td>  
                                <td>$row->created_at</td>  
                                 
                    </tr>";
							$sno++;
						}
						?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
