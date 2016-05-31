@include('public.top')
            <div id="page-inner"> 
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
				            <div class="panel-heading">
                                系统环境
				            </div>        
							  
							<div class="panel-body"> 
								<div class="alert alert-success">
									<strong>操作系统：</strong><?php echo PHP_OS;?>
								</div>
								<div class="alert alert-success">
									<strong>PHP版本</strong> <?php echo phpversion();?>
								</div>
								<div class="alert alert-success">
									<strong>Web 服务器：</strong> <?php echo $_SERVER['SERVER_SOFTWARE'];?>
								</div>
								<div class="alert alert-success">
									<strong>程序版本：</strong> 1.0.0
								</div>
<!-- 								<div class="alert alert-info">
									<strong>Heads up!</strong> This alert needs your attention, but it's not super important.
								</div>
								<div class="alert alert-warning">
									<strong>Warning!</strong> Best check yo self, you're not looking too good.
								</div>
								<div class="alert alert-danger">
									<strong>Oh snap!</strong> Change a few things up and try submitting again.
								</div> -->
							</div>
				        </div>
			         </div>						
				</div>
			</div>		
@include('public.footer')
