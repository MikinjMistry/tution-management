<div class="row">
    <div class="col-sm-12">
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <th></th>
            <th>Address</th>
            <th>Establishment Year</th>
            <th>Creation Date</th>
            <th>Status</th>
            <th></th>
            </thead>
            <tbody>

                <?php
                if (empty($tution)) {
                    ?>
                    <tr><td colspan="6">No branch available.</td></tr>
                    <?php
                } else {
                    $cnt = 1;
                    foreach ($tution as $row) {
                        ?>
                        <tr>
                            <td><?= $cnt++ ?></td>
                            <td><?= $row['address'] ?></td>
                            <td><?= $row['establishment_year'] ?></td>
                            <td><?= date('d M, Y', strtotime($row['creation_time'])) ?></td>
                            <td><?= $row['is_approved'] == '1' ? 'Approved' : 'Unapproved' ?></td>
                            <td><a href="javascript:;" data-id="<?= $row['id'] ?>" class="dis_standerd" title="View Standerd"><i class="fa fa-list"></i></a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>
    
    <div class="col-sm-12 subview" style="display:none;">
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    STANDARD
                </div>
                <div class="panel-body">
                    <div class="standard table-responsive" >

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    TERMS
                </div>
                <div class="panel-body">
                    <div class="terms table-responsive" >

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>