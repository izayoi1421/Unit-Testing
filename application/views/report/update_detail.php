<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card col-md-8 shadow mb-4">
    <div class="card-header py-3">
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                    <h6 class="m-0 font-weight-bold text-primary"><a href="<?= base_url('report') ?>"><i class="fas fa-arrow-left"></i> Back</a></h6>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                    <?php if($ureport['status'] == "Cancelled") : ?> 
                        <h6 class="m-0 font-weight-bold"><p>Status:  <span style="color: #ff0000"><?= $ureport['status']; ?></span</p></h6>  
                    <?php endif; ?>                      
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">    
            <div class="form-group">
                <input class="form-control" type="hidden" name="id" value="<?= $ureport['id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="uqid">UQID</label>
                <input class="form-control" type="text" name="uqid" value="<?= $ureport['uqid']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="name">Reporter's Name</label>
                <input class="form-control" type="text" name="name" value="<?= $ureport['name']; ?>" readonly>
            </div>
            <?php if($ureport['accused_name'] != "NA") : ?> 
            <div class="form-group">
                <label for="name">Accused Name</label>
                <input class="form-control" type="text" name="accused_name" value="<?= $ureport['accused_name']; ?>" readonly>
            </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="report">Status of Report</label>
                        <?php if($ureport['status'] == "Cancelled") : ?> 
                            <select class="form-control" name="status" disabled="disabled">                         
                                <option class="text-secondary text-center" value="Cancelled" disable <?php if( $ureport['status'] == "Cancelled") echo 'selected = "selected"'; ?> readonly>Cancelled</option>    
                            </select>
                        <?php endif; ?>
                        <?php if($ureport['status'] == "Done") : ?> 
                            <select class="form-control" name="status" disabled="disabled">                         
                                <option class="text-secondary text-center" value="Done" disable <?php if( $ureport['status'] == "Cancelled") echo 'selected = "selected"'; ?> readonly>Cancelled</option>    
                            </select>
                        <?php endif; ?>                                
                        <?php if($ureport['status'] != "Cancelled") : ?> 
                            <select class="form-control" name="status">                                                         
                                <option class="text-warning text-center" value="Pending" <?php if( $ureport['status'] == "Pending") echo 'selected = "selected"';?>>Pending</option>
                                <option class="text-primary text-center" value="Process" <?php if( $ureport['status'] == "Process") echo 'selected = "selected"';?>>Process</option>
                            </select>
                        <?php endif; ?>
                    </div>
                </div>
            </div>  
            <div class="form-group">
                <label for="address">Address</label>
                <input class="form-control" type="text" name="address" value="<?= $ureport['address']; ?>" readonly>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input class="form-control" type="text" name="age" value="<?= $ureport['age']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contactnum">Contact Number</label>
                        <input class="form-control" type="text" name="contactnum" value="<?= $ureport['contactnum']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Report Title</label>
                <input class="form-control" type="text" name="title" value="<?= $ureport['title']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="description">Report Description*</label>
                <textarea class="form-control" id="description" name="description" rows="3" readonly><?= $ureport['description']; ?></textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="type">Report Type</label>
                        <input class="form-control" type="text" name="type" value="<?= $ureport['type']; ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="date_reported">Reported On</label>
                        <input class="form-control" type="text" name="date_reported" value="<?= date('d F Y' , $ureport['date_reported']); ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <a target="_blank" class="badge badge-primary" style="font-size:16px;" href="<?= base_url('assets/img/report/').$ureport['file']; ?>"><i class="fas fa-image"></i> Check Attachment</a>
            </div>
            <!-- btn -->
            <?php if($ureport['status'] != "Cancelled") : ?>    
            <div class="row">         
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="btn btn-success" type="submit" name="btn" value="Change" />
                    </div>
                </div>                                    
                <div class="col-md-6">
                    <div class="form-group">            
                        <input class="btn btn-danger" type="button" name="cancel" value="Cancel" onClick="window.location='http://localhost/ComplaintMS-CI/report';" />
                    </div>
                </div>
            </div>    
            <?php endif; ?>                
            </form> 
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->