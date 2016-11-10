<div class="box-cell">
	<div class="box-inner padding">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tuition List
                </div>
                <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped b-t b-b" id="tutionlst">
                        <thead>
                            <th>Class Name</th>
                            <th>Class Admin</th>
                            <th></th>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
	</div>
</div>
<script>
    $(function(){
        $('#tutionlst').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax" : {
                        url : 'admin/api/tutions/get',
                        type : 'post'
                    },
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 2 ] }
             ]
            
        });
    })
</script>