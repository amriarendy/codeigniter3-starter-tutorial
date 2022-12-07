<?php $this->load->view('layout/header'); ?>
	<main>
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-header">
						<a href="<?=site_url('tambah');?>" class="btn btn-primary"> Tambah Data</a>
					</div>
					<div class="card-body table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
							<th scope="col">#</th>
							<th scope="col">Tutorial</th>
							<th scope="col">Kategori Tutorial</th>
							<th scope="col">Konten Tutorial</th>
							<th scope="col-1">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=0;
							foreach($tutor as $row) : 
							?>
							<tr>
								<th scope="row"><?=++$no;?></th>
								<td><?=$row->tutorial;?></td>
								<td><?=$row->kategori_tutorial;?></td>
								<td><?=$row->konten_tutorial;?></td>
								<td>
									<a href="<?=site_url('edit/').$row->id_tutorial?>" class="btn btn-warning" href="">Edit</a>
									<a href="<?=site_url('hapus/').$row->id_tutorial?>" class="btn btn-danger" href="">Delete</a>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					</div>
					<div class="card-footer">
						Development By <a href="https://github.com/amriarendy">amriarendy</a>
					</div>
				</div>
			</div>
		</div>
	</main>
<?php $this->load->view('layout/footer'); ?>