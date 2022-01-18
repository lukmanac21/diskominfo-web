<div class="main">
	<div class="page-header">
		<h4 class="page-title">Users</h4>
		<div class="breadcrumb">
			<div class="breadcrumb-item"><a href="index.html"> Settings </a></div>
			<div class="breadcrumb-item"><a href="javascript:void(0)"> Users </a></div>
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
					<button class="nav-link active" id="pills-data-tab" data-bs-toggle="pill"
						data-bs-target="#pills-data" type="button" role="tab" aria-controls="pills-data"
						aria-selected="true">Data</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="pills-add-tab" data-bs-toggle="pill" data-bs-target="#pills-add"
						type="button" role="tab" aria-controls="pills-add" aria-selected="false">New Data</button>
				</li>
			</ul>
			<div class="tab-content" id="pills-tabContent">
				<div class="tab-pane fade show active" id="pills-data" role="tabpanel" aria-labelledby="pills-data-tab">
					<table id="data-table" class="table data-table">
						<thead>
							<tr>
								<th style="width: 1%;">#</th>
								<th>Username</th>
								<th>Fullname</th>
								<th class="d-none d-sm-table-cell">Email</th>
								<th>Phone Number</th>
								<th class="d-none d-sm-table-cell" style="width: 5%;">Status</th>
								<th style="width: 20%;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; foreach ($table as $data) { ?>
							<tr>
								<td><?= $no++.'.'?></td>
								<td class="font-w600"><?= $data->username?></td>
								<td class="font-w600"><?= $data->nama_lengkap?></td>
								<td class="font-w600"><?= $data->email?></td>
								<td class="font-w600"><?= $data->contact_no?></td>
								<td><?php if($data->is_active == 1){$checkStatus = 'checked';}else{$checkStatus = '';}?>
									<div class="form-check form-switch">
										<form id="form_<?= $data->id ?>" action="<?= site_url('users_check')?>" method="post">
											<input class="form-check-input check" name="checkbox" id="<?= $data->id ?>" type="checkbox" id="flexSwitchCheckDefault" <?= $checkStatus ?> <?= $this->rbac->hasPrivilege('users', 'can_edit') == true ? '':'disabled';?>>
											<input type="hidden" name="id" value="<?= $data->id ?>">
										</form>
									</div>
								</td>

								<td class="text-center">
									<div class="d-grid gap-2 d-md-block">
										<?php if ($this->rbac->hasPrivilege('users', 'can_edit')){?>
										<a type="button" href="<?= site_url('users_edit/'.$data->id)?>"
											class="btn btn-primary" title="edit"><i class="icon-edit feather"></i>
										</a>
										<?php } ?>
										<?php if ($this->rbac->hasPrivilege('users', 'can_delete')){?>
										<button type="button" class="btn btn-danger" title="Delete"
											data-toggle="tooltip" onclick="delete_data('<?= $data->id?>')">
											<i class="icon-trash feather"></i>
										</button>
										<?php } ?>
										<?php if ($this->rbac->hasPrivilege('users', 'can_edit')){?>
										<a type="button" href="<?= site_url('users_load_pass/'.$data->id)?>"
											class="btn btn-warning" title="change password"><i
												class="icon-unlock feather"></i>
										</a>
										<?php } ?>
										<?php if ($this->rbac->hasPrivilege('users', 'can_edit')){?>
										<a href="<?= site_url('reset_password/'.$data->id);?>" class="btn btn-success"
											title="Reset Password" data-toggle="tooltip">
											<i class="icon-refresh-cw feather"></i>
										</a>
										<?php } ?>
									</div>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="tab-pane fade" id="pills-add" role="tabpanel" aria-labelledby="pills-add-tab">
					<form class="row g-3" action="<?= site_url('users_add'); ?>" method="post"
						enctype="multipart/form-data">
						<div class="col-md-6">
							<label for="short_code" class="form-label">Roles</label>
							<select class="form-control" id="select2" name="roles" style="width: 100%;"
								data-placeholder="Choose one.." required>
								<?php foreach ($roles as $droles) { ?>
								<option value="<?= $droles->id ?>"><?= $droles->name ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-md-6">
							<label for="username" class="form-label">Username</label>
							<input type="text" name="username" class="form-control" id="username">
						</div>
						<div class="col-md-6">
							<label for="nama" class="form-label">Fullname</label>
							<input type="text" name="nama" class="form-control" id="nama">
						</div>
						<div class="col-md-6">
							<label for="telepon" class="form-label">Telp</label>
							<input type="text" name="telepon" class="form-control" id="telepon">
						</div>
						<div class="col-md-6">
							<label for="email" class="form-label">Email</label>
							<input type="email" name="email" class="form-control" id="email">
						</div>
						<div class="col-md-6">
							<label for="password" class="form-label">Password</label>
							<input type="password" name="password" class="form-control" id="password">
						</div>
						<div class="col-md-6">
							<label for="gambar" class="form-label">Images</label>
							<input type="file" name="gambar" class="form-control" id="gambar">
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
			<form class="row g-3" action="<?= site_url('users_update');?>" method="post" enctype="multipart/form-data">
				<div class="col-md-6">
					<label for="short_code" class="form-label">Roles</label>
					<select class="form-control" id="select2" name="roles" style="width: 100%;"
						data-placeholder="Choose one.." required>
						<?php foreach ($roles as $droles) { ?>
						<option value="<?= $droles->id ?>"><?= $droles->name ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-md-6">
					<label for="username" class="form-label">Username</label>
					<input type="text" name="username" class="form-control" id="username"
						value="<?= $edit[0]->username?>">
					<input type="hidden" name="id" class="form-control" id="username" value="<?= $edit[0]->id?>">
				</div>
				<div class="col-md-6">
					<label for="nama" class="form-label">Fullname</label>
					<input type="text" name="nama" class="form-control" id="nama" value="<?= $edit[0]->nama_lengkap?>">
				</div>
				<div class="col-md-6">
					<label for="telepon" class="form-label">Telp</label>
					<input type="text" name="telepon" class="form-control" id="telepon"
						value="<?= $edit[0]->contact_no?>">
				</div>
				<div class="col-md-6">
					<label for="email" class="form-label">Email</label>
					<input type="email" name="email" class="form-control" id="email" value="<?= $edit[0]->email?>">
				</div>
				<div class="col-md-6">
					<label for="gambar" class="form-label">Images</label>
					<input type="file" name="gambar" class="form-control" id="gambar">
				</div>
				<div class="col-12">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
			<?php }?>
		</div>
		<?php } elseif(isset($edit_password)){?>
		<div class="card-body">

			<form class="row g-3" action="<?= site_url('users_change_pass');?>" method="post"
				enctype="multipart/form-data">
				<div class="col-md-6">
					<label for="username" class="form-label">Password lama</label>
					<input type="password" name="old_pass" class="form-control">
					<input type="hidden" name="pass_id" class="form-control" value="<?= $edit_password[0]->id?>">
				</div>
				<div class="col-md-6">
					<label for="nama" class="form-label">Ulangi Password Lama</label>
					<input type="password" name="current_pass" class="form-control" id="nama">
				</div>
				<div class="col-md-6">
					<label for="telepon" class="form-label">Password Baru</label>
					<input type="password" name="new_pass" class="form-control" id="telepon">
				</div>
				<div class="col-12">
					<button type="submit" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
		<?php } ?>
	</div>
	<?php $no = 1; foreach ($table as $data) { ?>
	<div class="modal fade" id="delete<?= $data->id?>" tabindex="-1" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?= site_url('module_delete');?>" method="post">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<h5>Delete Data <?= $data->name?> ?</h5>
						<input type="hidden" name="delete_id" value="<?= $data->id?>" />
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
<script type="text/javascript">
	$(document).ready(function () {
		$('#select2').select2({
			theme: "bootstrap"
		});
	});
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
