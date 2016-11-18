<table class="table table-striped table-bordered">
    <thead>
        <th>Id</th>
        <th>Name</th>
    </thead>
    <tbody>
        <?php
            if(empty($term))
            {
                echo '<tr><td colspan="3">No terms available.</td></tr>';
            }
            foreach($term as $row)
            {
        ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['term_name']?></td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>