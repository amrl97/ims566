<?php
echo $this->Html->script('qr-code-styling-1-5-0.min.js');
echo $this->Html->css('animate.min');
echo $this->Html->css('jquery.CalendarHeatmap');
echo $this->Html->script('moment.min.js');
echo $this->Html->script('jquery.CalendarHeatmap.min.js');
echo $this->Html->script('https://cdn.jsdelivr.net/npm/apexcharts');
echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js');
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Morphext/2.4.4/morphext.css" integrity="sha256-iwSnUqgAndMlZnwFWAAzto9R/6Un2RBguZEITMb0Olk=" crossorigin="anonymous" />
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!--Header-->
<div class="row text-body-secondary">
	<div class="col-10">
		<h1 class="my-0 page_title"><?php echo $title; ?></h1>
	</div>
	<div class="col-2 text-end">

		<div class="dropdown mx-3 mt-2">
			<a class="btn p-0 border-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				<i class="fa-solid fa-bars text-primary"></i>
			</a>
			<ul class="dropdown-menu">
				<li><?= $this->Html->link(__('<i class="fa-solid fa-arrow-right-from-bracket"></i> Logout'), ['controller' => 'users', 'action' => 'logout'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
			</ul>
		</div>

	</div>
</div>

<div class="row">
	<div class="col-md-9 border-end">
		<style>
			/* ACTIVITIES */

			.activities h1 {
				margin: 0 0 20px;
				font-size: 1.4rem;
				font-weight: 700;
			}

			.activity-container {
				display: grid;
				grid-template-columns: repeat(5, 1fr);
				grid-template-rows: repeat(2, 150px);
				column-gap: 10px;
			}

			.img-one {
				grid-area: 1 / 1 / 2 / 2;
			}

			.img-two {
				grid-area: 2 / 1 / 3 / 2;
			}

			.img-three {
				display: block;
				grid-area: 1 / 2 / 3 / 4;
			}

			.img-four {
				grid-area: 1 / 4 / 2 / 5;
			}

			.img-five {
				grid-area: 1 / 5 / 2 / 6;
			}

			.img-six {
				display: block;
				grid-area: 2 / 4 / 3 / 6;
			}

			.image-container {
				position: relative;
				margin-bottom: 10px;
				box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 3px;
				border-radius: 10px;
			}

			.image-container img {
				width: 100%;
				height: 100%;
				border-radius: 10px;
				object-fit: cover;
			}

			.overlay {
				position: absolute;
				display: flex;
				flex-direction: column;
				align-items: flex-end;
				justify-content: flex-end;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				background: linear-gradient(180deg,
						transparent,
						transparent,
						rgba(3, 3, 185, 0.5));
				border-radius: 10px;
				transition: all 0.6s linear;
			}

			.image-container:hover .overlay {
				opacity: 0;
			}

			.overlay h3 {
				margin-bottom: 8px;
				margin-right: 10px;
				color: #fff;
			}

			/* LEFT BOTTOM */

			.left-bottom {
				display: grid;
				grid-template-columns: 55% 40%;
				gap: 40px;
			}

			a.header:link {
				color: #ffffff;
				text-decoration: none;
			}

			a.header:visited {
				color: #ffffff;
				text-decoration: none;
			}

			a.header:hover {
				color: #ffffff;
				text-decoration: none;
			}
		</style>


		<div class="d-none d-sm-block">
			<div class="activity-container">
				<div class="image-container img-one">
					<?= $this->Html->image('header/walle-min.jpg', ['alt' => 'Code The Pixel']); ?>
					<div class="overlay">
						<h3><a href="https://codethepixel.com/" class="stretched-link header" target="_blank"><b class="logo-small">&lt;/&gt;</b></a></h3>
					</div>
				</div>
				<div class="image-container img-two">
					<?= $this->Html->image('header/cake-min.jpg', ['alt' => 'CakePHP']); ?>
					<div class="overlay">
						<h3><a href="https://cakephp.org/" class="stretched-link header">CakePHP</a></h3>
					</div>
				</div>
				<div class="image-container img-three">
					<?= $this->Html->image('header/ghost-min.jpg', ['alt' => 'Re-CRUD']); ?>
					<div class="overlay">
						<h3><a href="https://github.com/Asyraf-wa/recrud" class="stretched-link header">ReCRUD</a></h3>
					</div>
				</div>
				<div class="image-container img-four">
					<?= $this->Html->image('header/github-min.jpg', ['alt' => 'Github']); ?>
					<div class="overlay">
						<h3><a href="https://github.com/" class="stretched-link header">Github</a></h3>
					</div>
				</div>
				<div class="image-container img-five">
					<?= $this->Html->image('header/bh-min.jpg', ['alt' => 'CRUD']); ?>
					<div class="overlay">
						<h3><a href="#" class="stretched-link header">CRUD</a></h3>
					</div>
				</div>
				<div class="image-container img-six">
					<?= $this->Html->image('header/bootstrap-min.jpg', ['alt' => 'Bootstrap']); ?>
					<div class="overlay">
						<h3><a href="https://getbootstrap.com/" class="stretched-link header">Bootstrap</a></h3>
					</div>
				</div>
			</div>
		</div>



		<div class="row py-3">
			<div class="col-8 fs-5 fw-medium text-body-secondary">
				Report
			</div>
			<div class="col-4 text-end">
				<button class="btn btn-xs btn-outline-warning me-2" data-bs-toggle="collapse" href="#chartCollapse" role="button" aria-expanded="true" aria-controls="chartCollapse">
					Hide Chart
				</button>
				<button onClick="window.location.reload();" class="btn btn-xs btn-primary">Refresh</button>

			</div>
		</div>
		<div class="container">
    <div class="row justify-content-center px-2 mb-4 text-center">
        <div class="col-md-3 border rounded-start pt-3 pb-3 bg-body-tertiary">
            <span class="fs-3">
                <?php echo $total_app; ?> 
                <i class="fa-solid fa-caret-up text-primary"></i>
            </span><br />
            Total Applications
        </div>
        <div class="col-md-3 border pt-3 pb-3 bg-body-tertiary">
            <span class="fs-3">
                <?php echo $total_staff; ?> 
                <i class="fa-solid fa-caret-up text-primary"></i>
            </span><br />
            Total Staffs
        </div>
        <div class="col-md-3 border rounded-end pt-3 pb-3 bg-body-tertiary">
            <span class="fs-3">
                <?php echo $total_dept; ?> 
                <i class="fa-solid fa-caret-up text-primary"></i>
            </span><br />
            Total Department
        </div>
    </div>
</div>


		<div class="collapse show" id="chartCollapse">
			<div class="row mb-4">
				<div class="col-md-3 ps-5 ms-4">
					<div class="approve" data-waffly-title="Total Approved Applications" data-waffly-value="<?php echo $approved_app_percent; ?>%">
						<div class="title">Total Approved Application</div>
						<meter class="applications" value="33" max="100"></meter>
					</div>
				</div>
				<div class="col-md-3 ps-5 ms-4">
					<div class="reject" data-waffly-title="Total Rejected Applications" data-waffly-value="<?php echo $rejected_app_percent; ?>%">
						<div class="title">Total Rejected Application</div>
						<meter class="application" value="50" max="100"></meter>
					</div>
				</div>
				<div class="col-md-3 ps-5 ms-4">
					<div class="pending" data-waffly-title="Total Pending Applications" data-waffly-value="<?php echo $pending_app_percent; ?>%">
						<div class="title">Total Pending Contact</div>
						<meter class="contact" value="50" max="100"></meter>
					</div>
				</div>



			<?php echo $this->Html->script('waffly.js'); ?>
			<script>
				$(document).ready(function() {
					$('.pending').waffly({
						graph_width: 200,
						dot_gap: 3,
						dot_radius: '3px',
						graph_color: '#e9c46a',
						//graph_title_color: '#555',
						graph_value_color: '#e9c46a',
						dot_opacity: .2,
						graph_reverse: true,
						graph_animate: true,
					});

					$('.approve').waffly({
						graph_width: 200,
						dot_gap: 3,
						dot_radius: '3px',
						graph_color: '#c9ffe2',
						//graph_title_color: '#555',
						graph_value_color: '##c9ffe2',
						dot_opacity: .2,
						graph_reverse: true,
						graph_animate: true,
					});

					$('.reject').waffly({
						graph_width: 200,
						dot_gap: 3,
						dot_radius: '3px',
						graph_color: '#ffafcc',
						//graph_title_color: '#555',
						graph_value_color: '#ffafcc',
						dot_opacity: .2,
						graph_reverse: true,
						graph_animate: true,
					});


					$('.my_chart').waffly({
						graph_reverse: false,
						graph_animate: true,
						style_override: true,
						total_dots: 62,
					});
				});
			</script>
		</div>

		
	<div class="col-md-3">

		<div class="card gradient-border mb-3">
			<div class="card-body">
				<div class="card-title mb-0">Profile</div>
				<div class="tricolor_line mb-3"></div>
				<div class="row">
					<div class="col-5 text-center">
						<?php if ($this->Identity->get('avatar') != NULL) {
							echo $this->Html->image('../files/Users/avatar/' . $this->Identity->get('slug') . '/' . $this->Identity->get('avatar'), ['class' => 'w-px-40 rounded', 'width' => '100px', 'height' => '100px']);
						} else
							echo $this->Html->image('avatar_default.png', ['alt' => 'avatar', 'class' => 'w-px-40 h-auto rounded', 'width' => '100px', 'height' => '100px']); ?>
					</div>
					<div class="col-7">
						<?php echo $this->Identity->get('fullname'); ?>
						<br />
						<?php if ($this->Identity->get('user_group_id') == 1) {
							echo 'Administrator';
						} elseif ($this->Identity->get('user_group_id') == 2) {
							echo 'Moderator';
						} elseif ($this->Identity->get('user_group_id') == 3) {
							echo 'User';
						} else
							echo 'Error';
						?>
						<br />
						<div class="mt-4 text-end">
							<a class="btn btn-outline-warning btn-xs" data-bs-toggle="collapse" href="#collapseActivity" role="button" aria-expanded="false" aria-controls="collapseActivity">
								Account Activity
							</a>
						</div>


					</div>

					<br /><br />

				</div>
				<div class="collapse" id="collapseActivity">
					<div class="table-responsive">
						<table class="table table-sm table-border mb-0 table_transparent table-hover">
							<tr>
								<th>Action</th>
								<th>Date/Time</th>
							</tr>
							<?php foreach ($userLogs as $userLog) : ?>
								<tr>
									<td>
										<?php if ($userLog->action == 'Login') {
											echo '<span class="badge bg-success">Login</span>';
										} elseif ($userLog->action == 'Logout') {
											echo '<span class="badge bg-danger">Logout</span>';
										} else
											echo '<span class="badge bg-secondary">Error</span>';
										?>
									</td>
									<td><?php echo date('M d, Y (h:i A)', strtotime($userLog->created)); ?></td>
								</tr>
							<?php endforeach; ?>
						</table>
					</div>
				</div>
			</div>
		</div>


		<div class="card bg-body-tertiary border-0 shadow mb-4">
			<div class="card-body text-body-secondary">
				<div class="row">
					<div class="col-8">
						<div class="card-title mb-0">Scan</div>
					</div>
					<div class="col-4 text-end">
						<button type="button" class="btn btn-xs btn-outline-secondary">QR Code</button>
					</div>
				</div>
				<div class="tricolor_line mb-3"></div>
				<div id="qr" align="center"></div>
				<script type="text/javascript">
					const qrCode = new QRCodeStyling({
						width: 130,
						height: 130,
						margin: 0,
						//type: "svg",
						data: "<?php echo $this->request->getUri(); ?>",
						dotsOptions: {
							//color: "#4267b2",
							type: "dots"
						},
						cornersSquareOptions: {
							type: "dots",
							color: "#007bff",
						},
						cornersDotOptions: {
							type: "dots"
						},
						backgroundOptions: {
							//color: "#ffffff",
						},
						imageOptions: {
							crossOrigin: "anonymous",
							margin: 20
						}
					});

					qrCode.append(document.getElementById("qr"));
					//qrCode.download({ name: "qr", extension: "png" });
				</script>
			</div>
		</div>


	</div>
</div>