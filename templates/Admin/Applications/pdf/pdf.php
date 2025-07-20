<!DOCTYPE html>
<html>

<head>
    <title>PDF</title>
    <style>
        @page {
            margin: 0px 0px 0px 0px !important;
            padding: 0px 0px 0px 0px !important;
        }

        .right {
            text-align: right;
            padding-right: 50px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
        }

        .content {
            margin-left: 70px;
            margin-right: 70px;
        }

        .capital {
            text-transform: uppercase;
        }

        .justify {
            text-align: justify;
        }


        .qr {
            width: 100px;
        }
    </style>
</head>

<body>

    <div>
        <?php echo $this->Html->image('../img/top.png', ['width' => '100%', 'fullBase' => true]) ?>
    </div>
    <br />

    <div class="content">
        <table class="right mb-5" style="width: 100%;" align="left">
            <tr>
                <td class="text-end" width="85%">Date:</td>
                <td><?php echo date('d F Y', strtotime($applications->created)); ?></td>
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
        <table class="table table-bordered table-sm table_transparent capital">
            <tr>
                <td>Staff Name</td>
                <td>:</td>
                <td><?= $applications->staff->name ?></td>
            </tr>
            <tr>
                <td>Staff ID</td>
                <td>:</td>
                <td><?= h($applications->staff->staff_no) ?></td>
            </tr>
            <tr>
                <td>Department</td>
                <td>:</td>
                <td><?= h($applications->department->name) ?></td>
            </tr>
            <tr>
                <td>Leave Type</td>
                <td>:</td>
                <td><?= $applications->type->name ?></td>
            </tr>
            <tr>
                <td>Start Date</td>
                <td>:</td>
                <td><?= date('d F Y', strtotime($applications->start_date)) ?></td>
            </tr>
            <tr>
                <td>End Date</td>
                <td>:</td>
                <td><?= date('d F Y', strtotime($applications->end_date)) ?></td>
            </tr>
            <tr>
                <td>Reason</td>
                <td>:</td>
                <td><?= h($applications->reason) ?></td>
            </tr>
        </table>
        <br />
        <div class="justify">
            Kindly be informed that the above-named individual is a staff member working at
            <?= $applications->department->name ?> Department.
            <br><br>
            2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;According to our records, he/she has applied for leave on the dates stated above.
            <br><br>
            3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Accordingly, after reviewing the leave application submitted by Mr./Ms. <b><?= $applications->staff->name ?></b>, 
            we hereby confirm that this leave application
                                <?php if ($application->approval_status == 1) {
                                    echo '<b>have been rejected</b>';
                                } 
                                elseif ($application->approval_status == 2){
                                    echo '<b>have been approved</b>';
                                }
                                else
                                    echo '<b>is in process</b>';
                                ?>. 
            Attached here with are the following documents for your reference and further action:
            <br><br>
            <ol type="a">
                <li>&nbsp;&nbsp;&nbsp;&nbsp;Leave Application- <b class="text-danger">
    <a href="http://localhost/leaveapplicationsystem/webroot/files/Applications/image/<?= h($application->image) ?>" 
       target="_blank">
       <?= h($applications->image) ?>
    </a>
</b></b></li>
            </ol>
            4.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;It is hoped that you will present this letter to the university upon your return after the end of the requested leave period. Your support and cooperation are greatly appreciated.
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
                    <td width="5%" class="right">
                        <img src="http://localhost/internms/qr/qrcode.php?s=qrh&d=<?php echo $this->request->getUri(); ?>" class="qr">
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <br /><br />
    <div class="right">
        <?php echo $this->Html->image('../img/ISO.png', ['width' => '170px', 'fullBase' => true]) ?><br />
        <?php echo $this->Html->image('../img/uitmdihatiku.png', ['width' => '170px', 'fullBase' => true]) ?>
    </div>
</body>

</html>