<table class="table table-striped table-bordered">
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th></th>
    </thead>
    <tbody>
        <?php
            if(empty($standard))
            {
                echo '<tr><td colspan="3">No standard available.</td></tr>';
            }
            foreach($standard as $row)
            {
        ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['name']?></td>
            <td><a href="javascript:;" title="view terms" class="dis_term" data-id="<?=$row['bsid']?>"><i class="fa fa-angle-double-right"></i></a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>