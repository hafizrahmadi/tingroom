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
			                    <a href="#" class="ing">Apa itu Tingroom?</a>
			              	</h4>
			            </div>
			            <div id="question0" class="panel-collapse collapse" style="height: 0px;">
			                <div class="panel-body panel-answer">
			                    Tingroom merupakan aplikasi yang berfungsi untuk membantu dan memudahkan employee dalam melakukan reservasi ruang meeting. Aplikasi ini akan dapat dengaan mudah di akses melalui PC maupun Smartphone anda.
			                </div>
			            </div>
			        </div>
			        <div class="panel panel-default ">
			            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
			                <h4 class="panel-title">
			                    <a href="#" class="ing">Bagaimana Cara Menggunakan Tingroom?</a>
			              	</h4>
			            </div>
			            <div id="question1" class="panel-collapse collapse" style="height: 0px;">
			                <div class="panel-body panel-answer">
			                    Masuk ke halaman landing page Tingroom, kemudian login menggunakan akun email XL dan password yang telah diset secara default. Terdapat 3 fitur, membooking meeting room, melihat histrory booking dan melihat profile akun.
			                </div>
			            </div>
			        </div>
			        <div class="panel panel-default ">
			            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question2">
			                <h4 class="panel-title">
			                    <a href="#" class="ing">Bagaimana Cara Mengganti alamat Email dan nomor telepon di tingroom ? </a>
			              	</h4>
			            </div>
			            <div id="question2" class="panel-collapse collapse" style="height: 0px;">
			                <div class="panel-body panel-answer">
			                    User Tingroom hanya diperbolehkan untuk mengganti password akun & mengganti nomor telepon.
			               	</div>
			            </div>
			        </div>
			        <div class="panel panel-default ">
			            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
			                <h4 class="panel-title">
			                    <a href="#" class="ing">Bagaimana Prosedur Membooking Ruang Meeting? </a>
			              	</h4>
			            </div>
			            <div id="question3" class="panel-collapse collapse" style="height: 0px;">
			                <div class="panel-body panel-answer">
			                    Setelah login ke Tingroom, user akan memilih lantai sesuai dengan previlage, kemudian memilih ruangan meeting. Setelah itu memasukkan jadwal pembookingan ruangan jam dan tanggal, dan menginputkan. Setelah itu Sekretaris akan melalukan approval.
			               	</div>
			            </div>
			        </div>
			        <div class="panel panel-default ">
			            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question4">
			                <h4 class="panel-title">
			                    <a href="#" class="ing">Apa Keunggulan dari Tingroom? </a>
			              	</h4>
			            </div>
			            <div id="question4" class="panel-collapse collapse" style="height: 0px;">
			                <div class="panel-body panel-answer">
			                    Dengan menggunkaan Tingroom, proses membooking meeting menjadi lebih gampang, user bisa melakukan pembookingan ruangan, dimanapun dan kapanpun.
			               	</div>
			            </div>
			        </div>
			        <div class="panel panel-default ">
			            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question5">
			                <h4 class="panel-title">
			                    <a href="#" class="ing">Apakah memungkinkan membooking ruangan untuk berbeda lantai dengan jadwal lebih dari 3 hari ? </a>
			              	</h4>
			            </div>
			            <div id="question5" class="panel-collapse collapse" style="height: 0px;">
			                <div class="panel-body panel-answer">
			                    Sistem ini secara khusus didesain dan diperuntukkan untuk membooking lantai sesuai dengan profile dengan batas maksimal 3 hari kedepan.
			               	</div>
			            </div>
			        </div>
			    </div>

			</div>
		</div>

<?php $this->load->view('template/new_foot_frontend') ?>