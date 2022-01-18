<div class="main">
    <div class="page-header">
        <h4 class="page-title">OPD</h4>
        <div class="breadcrumb">
            <div class="breadcrumb-item"><a href="index.html"> Portal </a></div>
            <div class="breadcrumb-item"><a href="javascript:void(0)"> OPD </a></div>
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
                                <th style="width: 5%;">Nama</th>
                                <th style="width: 5%;">Link</th>
                                <th style="width: 5%;">Gambar</th>

                                <th style="width: 15%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($table as $data) { ?>
                                <tr>
                                    <td><?= $no++.'.'?></td>
                                    <td class="font-w600"><?= $data->name?></td>
                                    <td class="font-w600"><?= $data->link?></td>
                                    <th><img src="<?= base_url()?>assets/upload/opd/<?=$data->picture?>" height="30px" width="30px"></th>
                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            <a type="button" href="<?= site_url('opd_edit/'.$data->id)?>" class="btn btn-primary" title="Download"><i class="icon-edit feather"></i>
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
                    <form class="row g-3" method="post" action="<?= site_url('opd_add')?>" enctype='multipart/form-data'>
                        <div class="col-md-6">
                            <label for="date" class="form-label">Tanggal</label>
                            <input type="date" name="date" class="form-control" id="date">
                        </div>
                        <div class="col-md-6">
                            <label for="nama" class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" id="judul">
                        </div>
                        <div class="col-md-6">
                            <label for="file" class="form-label">Gambar</label>
                            <input type="file" name="file" class="form-control" id="file">
                        </div>
                        <div class="col-md-6">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" name="link" class="form-control" id="link">
                        </div>
                        <div class="mt-5 pt-3 text-end">
                            <button type="submit" class="btn btn-secondary me-2">Discard</button>
                            <button type="submit" class="btn btn-primary">Sent</button>
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
                <form class="row g-3" method="post" action="<?= site_url('opd_update')?>" enctype='multipart/form-data'>
                    <div class="col-md-6">
                        <label for="date" class="form-label">Tanggal</label>
                        <input type="date" name="date" class="form-control" id="date" value="<?= $data->date;?>">
                    </div>
                    <div class="col-md-6">
                        <label for="name" class="form-label">Judul</label>
                        <input type="text" name="judul" class="form-control" id="judul" value="<?= $data->judul;?>">
                        <input type="hidden" name="id" class="form-control" id="id" value="<?= $data->id;?>">
                    </div>
                    <div class="col-md-6">
                        <label for="file" class="form-label">Gambar</label>
                        <input type="file" name="file" class="form-control" id="file">
                    </div>
                    <div class="col-md-6">
                        <label for="link" class="form-label">Link</label>
                        <input type="text" name="link" class="form-control" id="link" value="<?= $data->link;?>">
                    </div>
                    <div class="mt-5 pt-3 text-end">
                    <button type="submit" class="btn btn-secondary me-2">Discard</button>
                    <button type="submit" class="btn btn-primary">Sent</button>
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
                <form action="<?= site_url('opd_delete');?>" method="post">
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

