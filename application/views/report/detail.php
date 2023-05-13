<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card col-md-8 shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('report/user_report_detail') ?>"><i class="fas fa-arrow-left"></i> Back</a></h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    <?php if($report['status'] == "Cancelled") : ?> 
                        <h6 class="m-0 font-weight-bold"><p>Status:  <span style="color: #ff0000"><?= $report['status']; ?></span</p></h6>  
                    <?php endif; ?>                      
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
        <form action="" name="form1" id="form1" method="post" enctype="multipart/form-data">    
            <div class="form-group">
                <input class="form-control" type="hidden" name="id" value="<?= $report['id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="uqid">UQID</label>
                <input class="form-control" type="text" name="uqid" value="<?= $report['uqid']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="name">Reporter's Name</label>
                <input class="form-control" type="text" name="name" value="<?= $report['name']; ?>" readonly>
            </div>
            <?php if($report['accused_name'] != "NA") : ?> 
            <div class="form-group">
                <label for="name">Accused Name</label>
                <input class="form-control" type="text" name="accused_name" value="<?= $report['accused_name']; ?>" readonly>
            </div>
            <?php endif; ?>
            <div class="row" style="display: none;visibility: hidden">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="report">Status of Report</label>
                        <select class="form-control" name="status" type="hidden">                         
                            <option class="text-warning text-center" value="Cancelled" disable <?php if( $report['status'] == "Cancelled") echo 'selected = "selected"'; ?>>Cancelled</option>    
                        </select>
                    </div>
                </div>
            </div>  
            <div class="form-group">
                <label for="address">Address</label>
                <input class="form-control" type="text" name="address" value="<?= $report['address']; ?>" readonly>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input class="form-control" type="text" name="age" value="<?= $report['age']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contactnum">Contact Number</label>
                        <input class="form-control" type="text" name="contactnum" value="<?= $report['contactnum']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Report Title</label>
                <input class="form-control" type="text" name="title" value="<?= $report['title']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="description">Report Description*</label>
                <textarea class="form-control" id="description" name="description" rows="3" readonly><?= $report['description']; ?></textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type">Report Type</label>
                        <input class="form-control" type="text" name="type" value="<?= $report['type']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_reported">Reported On</label>
                        <input class="form-control" type="text" name="date_reported" value="<?= date('d F Y' , $report['date_reported']); ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <a target="_blank" class="badge badge-primary" style="font-size:16px;" href="<?= base_url('assets/img/report/').$report['file']; ?>"><i class="fas fa-image"></i> Check Attachment</a>
            </div>
            <!-- btn -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <?php if($report['status'] != "Cancelled" && $report['status'] != "Done") : ?> 
                            <input class="btn btn-danger" href="#deleteModal" type="button" data-toggle="modal" data-target="#confirm-submit"  name="btn" value="Cancel" onclick="return deleteConfirm(this.form)"/>
                        <?php endif; ?>
                    </div>
                </div>                                    
            </div>                    
            </form> 
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- modal delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Cancelled Report Can't Be Process or Recover Again</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <input id="delete-confirm" class="btn btn-danger" type="submit" value="Confirm"/>
      </div>
    </div>
  </div>
</div>
<script>
    function deleteConfirm(){
        $('#deleteModal').modal();
        $('#delete-confirm').click(function() {
        // handle form processing here
        $('#form1').submit();
    }); 
    }
</script>