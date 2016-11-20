<div class="box-cell">
	<div class="box-inner padding">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tuition List
                    <div class="pull-right">
                        <a href="admin/tutions/add" class="btn btn-primary btn-icon tution_add_btn"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a>
                    </div>
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
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Branch List</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
        // get branch detail
        $(document).on('click','.branch_view',function(){
            var id = $(this).attr('id');
            $.ajax({
                url : 'admin/tutions/branch/'+id,
                method : 'get',
                success : function(res){
                    $('#myModal .modal-body').html(res);
                    $('#myModal').modal();
                }
            });
        });
        // Get standerd detail of perticular branch
        $(document).on('click', '.dis_standerd', function(){
            var id = $(this).attr('data-id');
            $.ajax({
                url : 'admin/tutions/standard/'+id,
                method : 'get',
                success : function(res){
                    $('.standard').html(res);
                    $('.subview').slideDown();
                }
            });
        });
        // Get Term detail by branch standard id
        $(document).on('click', '.dis_term', function(){
            var id = $(this).attr('data-id');
            $.ajax({
                url : 'admin/tutions/term/'+id,
                method : 'get',
                success : function(res)
                {
                    $('.terms').html(res);
                }
            });
        });
    })
</script>