<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
	<div class="container">
		<div class="d-flex justify-content-between align-items-center">
			<h2 class="title"> <b> SIPARTAN</b></h2>
			<ol>
				<li><b>Home</b></li>
				<li><b><?= $judul ?></b></li>
			</ol>
		</div>
	</div>
</section><!-- Breadcrumbs Section -->

<main id="main">

	<!-- ======= Blog Section ======= -->
	<section id="blog" class="blog">
		<div class="container" data-aos="fade-up">

			<div class="row justify-content-center">

				<div class="col-lg-9 entries">
					<?php foreach ($berita as $value) : ?>
						<article class="entry">

							<div class="entry-img">
								<img src="<?= base_url('assets/gambar_berita/' . $value['gambar_berita']) ?>" alt="" class="img-fluid">
							</div>

							<h2 class="entry-title">
								<a href="<?= base_url('frontend/single_berita?') . 'brt=' . $value['id_berita']; ?>"><?= $value['judul_berita']; ?></a>
							</h2>

							<div class="entry-meta">
								<ul>
									<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html"><?= $value['nama_admin']; ?></a></li>
									<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html">
											<?= date('d M Y', strtotime($value['tgl_berita'])) ?>
										</a></li>
								</ul>
							</div>

							<div class="entry-content">
								<p style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
									<?= $value['isi_berita']; ?>
								</p>
								<div class="read-more">
									<a href="<?= base_url('frontend/single_berita?') . 'brt=' . $value['id_berita']; ?>">Read More</a>
								</div>
							</div>

						</article><!-- End blog entry -->
					<?php endforeach;  ?>
					<div class="blog-pagination">
						<ul class="justify-content-center">
							<?php
							echo $this->pagination->create_links();
							?>
						</ul>
					</div>

				</div><!-- End blog entries list -->



			</div><!-- End blog sidebar -->

		</div>

		</div>
	</section><!-- End Blog Section -->

</main><!-- End #main -->