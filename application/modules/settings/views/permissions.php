<div class="main">
    <div class="page-header">
        <h4 class="page-title">Module</h4>
        <div class="breadcrumb">
            <div class="breadcrumb-item"><a href="index.html"> Settings </a></div>
            <div class="breadcrumb-item"><a href="javascript:void(0)"> Module </a></div>
        </div>
    </div>
    <div class="card">
        <?php if (isset($edit)) { ?>
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
                <form class="row g-3" action="<?= site_url('roles_permission_edit'); ?>" method="post" enctype="multipart/form-data" id="form_add">
                <input type="hidden" name="role_id" value="<?= $role_id?>">
                <table id="data-table" class="table data-table">
                        <thead>
                            <tr>
                                <th style="width: 1%;">#</th>
                                <th>Name</th>
                                <th style="width: 1%;">View</th>
                                <th style="width: 1%;">Add</th>
                                <th style="width: 1%;">Edit</th>
                                <th style="width: 1%;">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if(!empty($table)){
                                $no = 1;
                                foreach ($table as $data) { ?>
                                <tr>
                                    <td><?= $no.'.'?></td>
                                    <td colspan="5" align="left"><strong><?= strtoupper($data->name)?></strong></td>
                                    <?php $noop = 1; $operations = get_operations_by_module($data->id); 
                                        foreach($operations as $doperation){ $permission = get_permission_by_role($role_id, $doperation->id);?>
                                        <input type="hidden" name="operation[<?= $doperation->id?>]" value="<?= $doperation->id?>">
                                        <tr>
                                            <td><?= $no.'.'.$noop++?></td>
                                            <td align="left"><strong style="padding-left: 20px;"><?= $doperation->name?></strong></td>
                                            <td class="text-center">
                                                <?php if($doperation->can_view == 1){?>
                                                    <label class="css-control css-control-primary css-checkbox">
                                                        <input type="checkbox" class="css-control-input" value="1" name="can_view[<?= $doperation->id?>]" <?= !empty($permission->can_view) && $permission->can_view == 1 ? 'checked':'';?>>
                                                        <span class="css-control-indicator"></span>
                                                    </label>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if($doperation->can_add == 1){?>
                                                    <label class="css-control css-control-primary css-checkbox">
                                                        <input type="checkbox" class="css-control-input" value="1" name="can_add[<?= $doperation->id?>]" <?= !empty($permission->can_add) && $permission->can_add == 1 ? 'checked':'';?>>
                                                        <span class="css-control-indicator"></span>
                                                    </label>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if($doperation->can_edit == 1){?>
                                                    <label class="css-control css-control-primary css-checkbox">
                                                        <input type="checkbox" class="css-control-input" value="1" name="can_edit[<?= $doperation->id?>]" <?= !empty($permission->can_edit) && $permission->can_edit == 1 ? 'checked':'';?>>
                                                        <span class="css-control-indicator"></span>
                                                    </label>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if($doperation->can_delete == 1){?>
                                                    <label class="css-control css-control-primary css-checkbox">
                                                        <input type="checkbox" class="css-control-input" value="1" name="can_delete[<?= $doperation->id?>]" <?= !empty($permission->can_delete) && $permission->can_delete == 1 ? 'checked':'';?>>
                                                        <span class="css-control-indicator"></span>
                                                    </label>
                                                <?php } ?>
                                            </td>
                                        </tr>                            
                                <?php } $no++;}   ?>
                                <?php }else{
                                    echo '<tr><td colspan="6"><strong>NO DATA</strong></td></tr>';
                                }   
                                ?>    
                                </tr>
                        </tbody>
                    </table>
                    <div class="form-group row">
                        <div class="col-lg-12 ml-auto">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a class="btn btn-danger" href="<?= site_url('roles');?>">Back</a>
                        </div>
                    </div>  
                    </form>
            <?php } ?>
        </div>
    </div>
</div>