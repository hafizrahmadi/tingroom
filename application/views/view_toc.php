<?php $this->load->view('template/new_head_frontend') ?>
			<div class="col-xs-12 no-padding">
				<div class="box-dgrey no-padding-top-bot menu-history">
		            <div class="row no-padding">
		            	<div class="col-xs-6 bt-progress  <?php echo isset($setfaq)?'active':null ?>" data-href="<?php echo site_url('Faq/') ?>">FAQs</div>
		              	<div class="col-xs-6 bt-progress <?php echo isset($settoc)?'active':null ?>" data-href="<?php echo site_url('Faq/toc') ?>">ToC</div>
		            </div>
		        </div>
			

		        <div class="col-xs-12">
			        <div class="panel panel-default ">
			            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
			                <h4 class="panel-title">
			                    <a href="#" class="ing">Login menggunakan alamat Email XL dengan satu employee berhak mempunyai satu akun.</a>
			              	</h4>
			            </div>
			        </div>
			        <div class="panel panel-default ">
			            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
			                <h4 class="panel-title">
			                    <a href="#" class="ing">Employee dapat melakukan reservasi meeting room sesuai dengan profile lantai</a>
			              	</h4>
			            </div>
			        </div>
			        <div class="panel panel-default ">
			            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question2">
			                <h4 class="panel-title">
			                    <a href="#" class="ing">Batas maksimal melakukan reservasi ruang meeting 3 hari kedepan </a>
			              	</h4>
			            </div>
			        </div>
			        <div class="panel panel-default ">
			            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
			                <h4 class="panel-title">
			                    <a href="#" class="ing">Sekretaris berhak untuk menolak dan/atau menerima request reservasi dari empolyee </a>
			              	</h4>
			            </div>
			        </div>
			        <div class="panel panel-default ">
			            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question4">
			                <h4 class="panel-title">
			                    <a href="#" class="ing">Administrator berhak untuk menonaktifkan status akun user</a>
			              	</h4>
			            </div>
			        </div>
			    </div>

			</div>
		</div>


		<footer class="navbar-fixed-bottom footer"></footer>
	</div>
	<script type="text/javascript">
		$('tr[data-href]').on("click", function() {
          	document.location = $(this).data('href');
      	});
      	$('div[data-href]').on("click", function() {
        	document.location = $(this).data('href');
      	});
	</script>
<?php $this->load->view('template/new_foot_frontend') ?>