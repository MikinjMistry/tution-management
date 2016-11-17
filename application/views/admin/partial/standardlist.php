<table class="table table-striped table-bordered">
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th></th>
    </thead>
    <tbody>
        <?php
            foreach($standard as $row)
            {
        ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['name']?></td>
            <td><a href="javascript:;" title="view terms"><i class="fa fa-angle-double-right"></i></a></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>