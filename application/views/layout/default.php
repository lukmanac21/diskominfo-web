<!DOCTYPE html>
<html lang="en">

<head>
<?php $this->load->view('layout/assets');?>
</head>

<body>
    <div class="layout">
        <div class="vertical-layout">
            <!-- Header START -->
			<?php $this->load->view('layout//header');?>
            <!-- Header END -->
            <!-- Side Nav START -->
			<?php $this->load->view('layout//sidebar');?>
            <!-- Side Nav END -->
			<div class="content">
			<?php echo $content_for_layout; ?>
            <!-- Content START -->
            <!-- Content END -->
			<?php $this->load->view('layout/footer');?>
			</div>
        </div>
    </div>
</body>
<?php $this->load->view('layout/js');?>
</html>