<div class="padding">
	<div class="margin">
		<h5 class="mb-0 _300">Hi <span class="font-weight-bold"><?=$this->session->userdata("fullname")?></span>, Welcome back</h5>
	</div>

	<div class="row">
		<div class="col-lg-6">
	        <?php $this->load->view("template/pages/dashboard/components/status_card") ?>

		</div>

		<div class="col-lg-6">
	        <?php $this->load->view("template/pages/dashboard/components/mom_piechart") ?>
      	</div>

		  <div class="col-lg-12">
	        <?php $this->load->view("template/pages/dashboard/components/latest_action_plan", $order_by_asc) ?>
		</div>
		  
		<div class="col-lg-12">
	        <?php $this->load->view("template/pages/dashboard/components/latest_mom", $order_by_asc) ?>
		</div>

		

		

		<!-- <div class="col-lg-6">
			<div class="row">

			  	<div class="col-lg-12">
			  		<div class="box p-a">
			          <div class="pull-left m-r">
			            <span class="w-40 warn text-center rounded">
			              <i class="material-icons">shopping_basket</i>
			            </span>
			          </div>
			          <div class="clear">
			            <h4 class="m-0 text-md"><a href="">75 <span class="text-sm">MoM</span></a></h4>
			            <small class="text-muted">is on Progress.</small>
			          </div>
			        </div>
			  	</div>

			  	<div class="col-lg-12">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			            <span class="w-40 dker text-center rounded">
			              <i class="material-icons">comment</i>
			            </span>
			          </div>
			          <div class="clear">
			            <h4 class="m-0 text-md"><a href="">69 <span class="text-sm">Comments</span></a></h4>
			            <small class="text-muted">5 approved.</small>
			          </div>
			        </div>
			    </div>

			    <div class="col-lg-12">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			            <span class="w-40 dker text-center rounded">
			              <i class="material-icons">comment</i>
			            </span>
			          </div>
			          <div class="clear">
			            <h4 class="m-0 text-md"><a href="">69 <span class="text-sm">Comments</span></a></h4>
			            <small class="text-muted">5 approved.</small>
			          </div>
			        </div>
			    </div>

			    <div class="col-lg-12">
			        <div class="box p-a">
			          <div class="pull-left m-r">
			            <span class="w-40 dker text-center rounded">
			              <i class="material-icons">comment</i>
			            </span>
			          </div>
			          <div class="clear">
			            <h4 class="m-0 text-md"><a href="">69 <span class="text-sm">Comments</span></a></h4>
			            <small class="text-muted">5 approved.</small>
			          </div>
			        </div>
			    </div>

			</div>

		</div> -->


	</div>
  
</div>
