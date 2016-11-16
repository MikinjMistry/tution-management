<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <th></th>
            <th>Address</th>
            <th>Establishment Year</th>
            <th>Creation Date</th>
            <th>Status</th>
        </thead>
        <tbody>
             
            <?php
                if(empty($tution))
                {
            ?>
                    <tr><td colspan="5">No branch available.</td></tr>
            <?php
                }
                else
                {
                    $cnt = 1;
                    foreach($tution as $row)
                    {
            ?>
                        <tr>
                            <td><?=$cnt++?></td>
                            <td><?=$row['address']?></td>
                            <td><?=$row['establishment_year']?></td>
                            <td><?=date('d M, Y', strtotime($row['creation_time']))?></td>
                            <td><?=$row['is_approved'] == '1' ? 'Approved' : 'Unapproved'?></td>
                        </tr>
            <?php
                    }
                }
            ?>
        </tbody>
    </table>
</div>