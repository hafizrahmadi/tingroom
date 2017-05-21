<?php $this->load->view('template/new_head_frontend') ?>
	      	<div class="box-dgrey"><?php echo ucwords($lantai[0]['nama_gedung'])." <span class='col-lantai'>".$lantai[0]['nama_lantai']."</span>" ; ?> - For <b style="color:#f39c12;"><?php echo date('d M Y',strtotime($waktu)) ?></b></div>
	      	<div class="content-booking-2">
			<form action="<?php echo site_url('apps/book_demand') ?>" method="post">
			<?php 
	            $no_ruang = 1;
	            foreach ($ruangan as $value) {  
	              $no_jadwal = 1;
          	?>				
	      		<div class="col-xs-12 box-green arrow-down" data-toggle="collapse" data-target="#collapseDiv<?php echo $no_ruang; ?>" >
	            	<div class="col-xs-3 t-bold"><?php echo $value['nama_ruangan'] ?></div>
	            	<div class="col-xs-3 t-white i-board"><?php echo ($value['board']<2?$value['board'].' Unit':$value['board'].' Units') ?></div>
	            	<div class="col-xs-3 t-white i-projector"><?php echo $value['proyektor']==0?"None":"Available" ?></div>
	            	<div class="col-xs-3 t-white i-chair"><?php echo $value['kapasitas'] ?> person</div>
	          	</div>
	          	<div class="col-xs-12 collapse" id="collapseDiv<?php echo $no_ruang; ?>" value="<?php echo $value['id_ruangan']; ?>">
	            	<div class="funkyradio">
	            	<?php
		                foreach ($jadwal as $key) {
		                  if ($value['id_ruangan']==$key['id_ruangan']) {
		            ?>
	              		<div class="funkyradio-default <?php echo $key['status']==1?"reserved":null ?>">
	                  		<input type="checkbox" name="jadwal[]" value="<?php echo $key['id_jadwal'] ?>" id="checkbox<?php echo $no_ruang.'_'.$no_jadwal ?>"  />
	                  		<label for="checkbox<?php echo $no_ruang.'_'.$no_jadwal ?>">
	                  			<span><?php echo $key['jam_awal'].' - '.$key['jam_akhir'] ?></span>
	                  			<span>
	                  				<?php 
				                      if ($key['status']==0) {
				                        echo "Available";
				                      }else if($key['status']==1){
				                        echo "Reserved";
				                      }
				                    ?>
	                  			</span>
	                  		</label>
	                  	</div>
	                  	<?php
			                    
			                  }
			                  $no_jadwal++;  
			                }
			              ?>
			              </div>
			          </div>
			            <?php
			                $no_ruang++;
			              }
			             ?>          
	              	</div>
	            

	            
	            <div class="col-xs-12 no-padding container-submit-booking" >
          			<span>
              				<input type="hidden" name="id_ruangan" value="">
              				<button class="btn  btn-block btn-orange" type="submit" data-href="#">Continue</button>
            			</form>
             
          			</span>
        		</div>
        		</div>
			</div>
		</div>
<?php $this->load->view('template/new_foot_frontend') ?>