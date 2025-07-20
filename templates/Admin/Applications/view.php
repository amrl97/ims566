<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Application $application
 */
?>
<!--Header-->
<div class="row text-body-secondary">
	<div class="col-10">
		<h1 class="my-0 page_title"><?php echo $title; ?></h1>
		<h6 class="sub_title text-body-secondary"><?php echo $system_name; ?></h6>
	</div>
	<div class="col-2 text-end">
		<div class="dropdown mx-3 mt-2">
			<button class="btn p-0 border-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fa-solid fa-bars text-primary"></i>
			</button>
				<div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
							<li><?= $this->Html->link(__('Edit Application'), ['action' => 'edit', $application->id], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Form->postLink(__('Delete Application'), ['action' => 'delete', $application->id], ['confirm' => __('Are you sure you want to delete # {0}?', $application->id), 'class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><hr class="dropdown-divider"></li>
				<li><?= $this->Html->link(__('List Applications'), ['action' => 'index'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
				<li><?= $this->Html->link(__('New Application'), ['action' => 'add'], ['class' => 'dropdown-item', 'escapeTitle' => false]) ?></li>
							</div>
		</div>
    </div>
</div>
<div class="line mb-4"></div>
<!--/Header-->

    <style>



        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
        }

        .capital {
            text-transform: uppercase;
            color: #000000;
        }


    </style>

<div class="row">
	<div class="col-md-9">
		<div class="card rounded-0 mb-3 border-0 shadow">
			<div class="card-body text-white">

        <?php echo $this->Html->image('../img/top.png', ['width'=>'100%', 'fullBase' => true]) ?>

    <br />

    <div class="content">
        <table class="right mb-5" style="width: 100%;" align="left">
            <tr>
                <td class="text-end" width="70%">Date: </td>
                <td><?php echo date('d F Y', strtotime($application->created)); ?></td>
            </tr>
        </table>
        <br />
        <strong>Universiti Teknologi MARA Cawangan Selangor</strong>
        <br />
        Kampus Puncak Perdana,
        <br />
        40150 Shah Alam,
        <br />
        Selangor
        <br /><br />
        <hr>
        <br /><br />
        Mr./Mrs.,
        <br /><br />
        <strong>Staffs Leave Application</strong>
        <br /><br />
        <table class="table table-bordered table_transparent capital">
            <tr>
                <td>Staff Name</td>
                <td>:</td>
                <td><?= $application->staff->name ?></td>
            </tr>
            <tr>
                <td>Staff ID</td>
                <td>:</td>
                <td><?= h($application->staff->staff_no) ?></td>
            </tr>
            <tr>
                <td>Department</td>
                <td>:</td>
                <td><?= h($application->department->name) ?></td>
            </tr>
            <tr>
                <td>Leave Type</td>
                <td>:</td>
                <td><?= $application->type->name ?></td>
            </tr>
            <tr>
                <td>Start Date</td>
                <td>:</td>
                <td><?= date('d F Y', strtotime($application->start_date)) ?></td>
            </tr>
            <tr>
                <td>End Date</td>
                <td>:</td>
                <td><?= date('d F Y', strtotime($application->end_date)) ?></td>
            </tr>
            <tr>
                <td>Reason</td>
                <td>:</td>
                <td><?= h($application->reason) ?></td>
            </tr>
        </table>
        <br />
        <div class="justify">
            Kindly be informed that the above-named individual is a staff member working at
            <?= $application->department->name ?> Department.
            <br><br>
            2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;According to our records, he/she has applied for leave on the dates stated above.
            <br><br>
            3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accordingly, after reviewing the leave application submitted by Mr./Ms. <b><?= $application->staff->name ?></b>, 
            we hereby confirm that this leave application
                                <?php if ($application->approval_status == 1) {
                                    echo '<b class="text-danger">have been rejected</b>';
                                } 
                                elseif ($application->approval_status == 2){
                                    echo '<b class="text-success">have been approved</b>';
                                }
                                else
                                    echo '<b class="text-warning">is in process</b>';
                                ?>. 
            Attached here with are the following documents for your reference and further action:
            <br><br>
            <ol type="a">
                <li>&nbsp;&nbsp;&nbsp;&nbsp;Leave Application- <b class="text-danger">
    <a href="http://localhost/leaveapplicationsystem/webroot/files/Applications/image/<?= h($application->image) ?>" 
       target="_blank">
       <?= h($application->image) ?>
    </a>
</b></b></li>

            </ol>
            4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;It is hoped that you will present this letter to the university upon your return after the end of the requested leave period. 
            Your support and cooperation are greatly appreciated.
            <br><br>
            <table width="100%">
                <tr>
                    <td width="85%" style="vertical-align: top;">
                        Thank you and best regards.
                        <br><br>
                        Human Resource Department, UiTM
                        <br><br>
                        <strong>COMPUTER-GENERATED PRINT. NO SIGNATURE REQUIRED.</strong>
                    </td>

                </tr>
            </table>
        </div>
    </div>

    <br /><br />
    <div class="right">
        <?php echo $this->Html->image('../img/surat/ISO.png', ['width' => '170px', 'fullBase' => true]) ?><br />
        <?php echo $this->Html->image('../img/surat/uitmdihatiku.png', ['width' => '170px', 'fullBase' => true]) ?>
    </div>
    </div>
    </div>
        </div>

		<div class="col-md-3">
        <div class="card rounded-0 mb-3 bg-body-tertiary border-0 shadow">
            <div class="card-body">
                <div class="card-title mb-0">Application Data</div>
                <div class="tricolor_line mb-3"></div>
                <div class="table-responsive">
                    <table class="table tabe-sm table-hover">
                        <tr>
                            <td>Application Date</td>
                            <td><?php echo date('M d, Y (h:i A)', strtotime($application->created)); ?></td>
                        </tr>
                        <tr>
                            <td>Approval Date</td>
                            <td><?php echo date('M d, Y (h:i A)', strtotime($application->modified)); ?></td>
                        </tr>
                        <tr>
                            <td>Approval Status</td>
                            <td><?php if ($application->approval_status == 1) {
                           echo '<span class="badge bg-danger">Rejected</span>';
                           } 
                           elseif ($application->approval_status == 2){
                           echo '<span class="badge bg-success">Approved</span>';
                           } 
                           else
                           echo '<span class="badge bg-warning">Pending</span>';
                           ?></td>
                        </tr>
                    </table>
                    <?php echo $this->Form->create($application) ?>
                <?php echo $this->Form->control('approval_status', ['options' => ['1' => 'Rejected', '2' => 'Approved'], 'class' => 'form-select', 'empty' => 'Select Action']); ?>
                <div class="text-end">
                    <?= $this->Form->button('Reset', ['type' => 'reset', 'class' => 'btn btn-outline-warning']); ?>
                    <?= $this->Form->button(('Submit'), ['type' => 'submit', 'class' => 'btn btn-outline-primary'])?>
                    <?php echo $this->Html->link(__('Download PDF'), ['action' => 'pdf', $application->id], ['class' => 'btn btn-primary mt-2', 'escapeTitle' => false]) ?><br />
                </div>
                <?php echo $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>




