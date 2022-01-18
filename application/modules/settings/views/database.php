<div class="main">
    <div class="page-header">
        <h4 class="page-title">Backup Database</h4>
        <div class="breadcrumb">
            <div class="breadcrumb-item"><a href="index.html"> Settings </a></div>
            <div class="breadcrumb-item"><a href="javascript:void(0)"> Backup Database </a></div>
        </div>
    </div>
    <div class="card">
    <?php if ($this->session->flashdata('status')['status'] == 'success') { ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Berhasil !</strong> <?= $this->session->flashdata('status')['msg']; ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php } else if ($this->session->flashdata('status')['status'] == 'error') {  ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>Gagal !</strong> <?= $this->session->flashdata('status')['msg']; ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php } ?>
        <div class="card-body">
            <h4>Database</h4>
            <div class="mt-4">
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
						<a href="<?= site_url('backup_db'); ?>" class="btn btn-primary">Create Backup</a>
					</div><br>
                    <table id="data-table" class="table data-table">
                        <thead>
                            <tr>
                                <th width="75%"><strong>BACKUP NAME</strong></th>
                                <th width="25%"><strong>AKSI</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (count($file) == 0) { ?>
									<tr>
										<td colspan="2"><strong>No Data</strong></td>
									</tr>
									<?php } else {
										foreach ($file as $fres) { ?>
										<tr>
											<td><?= $fres ?></td>
											<td>
                                                <div class="d-grid gap-2 d-md-block">
													<a href="<?= site_url('download_db/' . $fres); ?>" class="btn btn-primary" title="Download"><i class="icon-download-cloud feather"></i>
													</a>
													<a href="<?= site_url('delete_db/' . $fres); ?>" class="btn btn-danger" title="Delete">
														<i class="icon-trash feather"></i>
													</a>
												</div>
											</td>
										</tr>
								<?php }
								} ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

