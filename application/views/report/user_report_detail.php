<!--
<script>
    function deleteConfirm(){
        $('#deleteModal').modal();
        $('#btn-delete').click(function() {
        // handle form processing here
        document.status.value = 'Cancelled';
    });
    }
</script>
-->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">History Report</h6>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Status</th>
                                    <th>Name</th>
                                    <th>Report Title</th>
                                    <th>Report Type</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                        </thead>
                    <tbody>
                        <?php $index = 1; ?>
                        <?php foreach($reports2 as $r) : ?>
                        <?php if($user['id'] == $r['uqid']) : ?> 
                            <tr>
                                <td><?= $index; ?></td> 
                                <?php if($r['status'] == "Cancelled") : ?> 
                                    <td><a class="badge badge-secondary" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>                                 
                                <?php endif; ?>
                                <?php if($r['status'] == "Pending") : ?> 
                                    <td><a class="badge badge-warning" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>                                 
                                <?php endif; ?>
                                <?php if($r['status'] == "Process") : ?> 
                                    <td><a class="badge badge-primary" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td>                                 
                                <?php endif; ?>
                                <?php if($r['status'] == "Done") : ?> 
                                    <td><a class="badge badge-success" style="font-size:14px;" href="#!" disabled><?= $r['status']; ?></a></td> 
                                <?php endif; ?>                                
                                <td><?= $r['name']; ?></td>
                                <td><?= $r['title']; ?></td>
                                <td><?= $r['type']; ?></td>
                                <td><?= date('d F Y' , $r['date_reported']); ?></td>
                                <td>
                                    <a class="badge badge-primary" style="font-size:14px;" href="<?= site_url('report/detail/'.$r['id']); ?>">Detail</a>
                                    <!--
                                    <a class="badge badge-danger" style="font-size:14px;" href="#!" onclick="deleteConfirm('<?= site_url('report/deleteownreport/'.$r['id']); ?>')">Delete</a>
                                    -->
                                </td>
                            </tr>
                        <?php endif; ?>
                        <?php $index++; ?>
                        <?php endforeach; ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- modal delete -->
<!--
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Deleted data cannot be recovered!</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-delete" class="btn btn-danger" href="#">Remove</a>
      </div>
    </div>
  </div>
</div>
-->