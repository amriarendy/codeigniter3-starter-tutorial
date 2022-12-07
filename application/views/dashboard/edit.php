<?php $this->load->view('layout/header'); ?>
	<main>
		<div class="row">
			<div class="col">
            <form method="post" action="<?=site_url('update')?>">
            <div class="card">
                <div class="card-header">
                    <h5>Form Edit</h5>
                </div>
                    <div class="card-body">
                        <input type="hidden" class="form-control" name="id_tutorial" value="<?=$tutorial['id_tutorial']?>">
                        <input type="hidden" name="<?= get_csrf_name() ?>" class="form-control" value="<?= get_csrf_token() ?>"/>
                        <div class="form-group">
                            <label>Tutorial</label>
                            <input type="text" class="form-control" name="tutorial" value="<?=$tutorial['tutorial']?>">
                            <?= form_error('tutorial', '<div class="text-danger strong">','</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Kategori Tutorial</label>
                            <input type="text" class="form-control" name="kategori_tutorial" value="<?=$tutorial['kategori_tutorial']?>">
                            <?= form_error('kategori_tutorial', '<div class="text-danger strong">','</div>')?>
                        </div>
                        <div class="form-group">
                            <label>Tutorial</label>
                            <textarea class="form-control" name="konten_tutorial"><?=$tutorial['konten_tutorial']?></textarea>
                            <?= form_error('konten_tutorial', '<div class="text-danger strong">','</div>')?>
                        </div>
                    </div>
                    <div class="card-footer d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
	</main>
<?php $this->load->view('layout/footer'); ?>