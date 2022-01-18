<div class="main">
    <div class="row">
        <?php if ($this->session->flashdata('status')['status'] == 'success') { ?>
		<div class="alert alert-success alert-dismissible fade show" role="alert">
			<strong>Berhasil !</strong> <?= $this->session->flashdata('status')['msg']; ?>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<?php } ?>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h3>$168.90</h3>
                            <span class="text-muted fw-semibold">This Month</span>
                        </div>
                        <div class="text-success fw-bold font-size-lg">+18%</div>
                    </div>
                    <div class="mt-4" id="monthly-revenue" style="max-width: 250px;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h3>$168.90</h3>
                            <span class="text-muted fw-semibold">This Month</span>
                        </div>
                        <div class="text-success fw-bold font-size-lg">+18%</div>
                    </div>
                    <div class="mt-4" id="monthly-revenue" style="max-width: 250px;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h3>$168.90</h3>
                            <span class="text-muted fw-semibold">This Month</span>
                        </div>
                        <div class="text-success fw-bold font-size-lg">+18%</div>
                    </div>
                    <div class="mt-4" id="monthly-revenue" style="max-width: 250px;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

