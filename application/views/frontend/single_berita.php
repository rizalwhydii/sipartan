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

	<!-- ======= Blog Single Section ======= -->
	<section id="blog" class="blog">
		<div class="container" data-aos="fade-up">

			<div class="row">

				<div class="col-lg entries">

					<article class="entry entry-single">

						<div class="entry-img justify-content-center">
							<img src="<?= base_url('assets/gambar_berita/' . $berita->gambar_berita) ?>" alt="" class="img-fluid">
						</div>

						<h2 class="entry-title">
							<a href="blog-single.html"><?= $berita->judul_berita; ?></a>
						</h2>

						<div class="entry-meta">
							<ul>
								<li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html"><?= $berita->nama_admin; ?></a></li>
								<li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html">
										<?= date('d M Y', strtotime($berita->tgl_berita)) ?>
									</a></li>
							</ul>
						</div>

						<div class="entry-content" style="text-align: justify; text-indent: 0.5in;">
							<p>
								<?= $berita->isi_berita; ?>
							</p>
						</div>

					</article><!-- End blog entry -->

				</div><!-- End blog sidebar -->

			</div>

		</div>
	</section><!-- End Blog Single Section -->

</main><!-- End #main -->