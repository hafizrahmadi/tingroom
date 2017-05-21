<?php $this->load->view('template/new_head_frontend') ?>
	      	<div class="col-xs-12">
				Ini adalah aplikasi yang dirancang oleh Facility Management untuk memudahkan anda melakukan reservasi ruang meeting. Happy worklife :)
				<form id="form-lantai" method="post" action="<?php echo site_url('apps/booking/'); ?>">
			  	<div class="col-xs-12 no-padding">
					<div class="form-group form-date">
				        <div class='input-group date'>
				            <input type="text" id="datepicker" class="form-control datepicker" placeholder="Pilih Tanggal Booking (dd/mm/yyyy)" name="waktu" /> 
				            <span class="input-group-addon btn btn-green"><i class="fa fa-calendar fa-fw "></i> </span>
				        </div>
				    </div>
				</div>
			  	<table class="table table-grey" >
			    	<tbody>
			    	<?php foreach ($lantai as $key) { ?>
			      		<tr data-href="<?php  echo $key['id_lantai']; ?>" >
			        		<td><?php echo ucwords($key['nama_gedung']); ?></td>
                      		<td class="col-lantai"><?php echo $key['nama_lantai'];  ?></td>
			      		</tr>
			      	<?php } ?>
			    	</tbody>
			  	</table> 
			  		<input type="hidden" name="id_lantai" value="">
				</form>
			</div>
		</div>
<?php $this->load->view('template/new_foot_frontend') ?>