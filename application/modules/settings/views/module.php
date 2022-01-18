<div class="main">
    <div class="page-header">
        <h4 class="page-title">Module</h4>
        <div class="breadcrumb">
            <div class="breadcrumb-item"><a href="index.html"> Settings </a></div>
            <div class="breadcrumb-item"><a href="javascript:void(0)"> Module </a></div>
        </div>
    </div>
    <div class="card">
        <?php if(isset($list)){?>
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
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-data-tab" data-bs-toggle="pill" data-bs-target="#pills-data" type="button" role="tab" aria-controls="pills-data" aria-selected="true">Data</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-add-tab" data-bs-toggle="pill" data-bs-target="#pills-add" type="button" role="tab" aria-controls="pills-add" aria-selected="false">New Data</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-data" role="tabpanel" aria-labelledby="pills-data-tab">
                <table id="data-table" class="table data-table">
                        <thead>
                            <tr>
                                <th style="width: 1%;">#</th>
                                <th>Name</th>
                                <th style="width: 5%;">Status</th>
                                <th style="width: 15%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php $no = 1; foreach ($table as $data) { ?>
                                    <tr>
                                        <td><?= $no++.'.'?></td>
                                        <td class="font-w600"><?= $data->name?></td>
                                        <td><?php if($data->is_active == 1){$checkStatus = 'checked';}else{$checkStatus = '';}?>
                                            <div class="form-check form-switch">
                                                <form id="form_<?= $data->id ?>" action="<?= site_url('module_check')?>" method="post">
                                                    <input class="form-check-input check" name="checkbox" id="<?= $data->id ?>" type="checkbox" id="flexSwitchCheckDefault" <?= $checkStatus ?>>
                                                    <input type="hidden" name="id" value="<?= $data->id ?>">
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                                <div class="d-grid gap-2 d-md-block">
													<a type="button" href="<?= site_url('module_edit/'.$data->id)?>" class="btn btn-primary" title="Download"><i class="icon-edit feather"></i>
                                                    </a>
													<button data-bs-toggle="modal" data-bs-target="#delete<?= $data->id?>" class="btn btn-danger" title="Delete">
														<i class="icon-trash feather"></i>
													</button>
												</div>
											</td>
                                    </tr>
                                <?php } ?>                      
                            </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="pills-add" role="tabpanel" aria-labelledby="pills-add-tab">
                <form class="row g-3" method="post" action="<?= site_url('module_add')?>">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Module</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="col-md-6">
                        <label for="short_code" class="form-label">Short Code</label>
                        <input type="text" name="short_code" class="form-control" id="short_code">
                    </div>
                    <div class="col-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
    <?php } elseif(isset($edit)){?>
            <div class="card-body">
            <?php foreach ($table as $data) { ?>
                <form class="row g-3" method="post" action="<?= site_url('module_update')?>">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Module</label>
                        <input type="text" name="name" class="form-control" id="name" value="<?= $data->name;?>">
                        <input type="hidden" name="id" class="form-control" id="id" value="<?= $data->id;?>">
                    </div>
                    <div class="col-md-6">
                        <label for="short_code" class="form-label">Short Code</label>
                        <input type="text" name="short_code" class="form-control" id="short_code" value="<?= $data->short_code;?>">
                    </div>
                    <div class="col-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            <?php }?>
            </div>
        <?php } ?>
    </div>
    <?php $no = 1; foreach ($table as $data) { ?>
    <div class="modal fade" id="delete<?= $data->id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?= site_url('module_delete');?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h5>Delete Data <?= $data->name?> ?</h5>
                        <input type="hidden" name="delete_id" value="<?= $data->id?>"/>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php }?>
</div>
<script>
     $('.check').click(function (e) { 
        var id = $(this).attr('id')
        var check = $(this).prop('checked')
        if (check) {
            $('#form_' + id).submit();
        } else {
            $('#form_' + id).submit();
        }
    });
</script>

