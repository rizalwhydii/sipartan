<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="title"><b>SIPARTAN</b></h2>
            <ol>
                <li><b>Home</b></li>
                <li><b><?= $judul; ?></b></li>
            </ol>
        </div>
    </div>
</section>

<!-- ======= Blog Single Section ======= -->
<section id="blog" class="blog section-bg rounded">
    <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg entries">

                <article class="entry entry-single">

                    <div class="entry-img">
                        <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                    </div>

                    <h2 class="entry-title text-center">
                        <p class="display-5" style="font-weight: bold; font-size:larger"><?= $judul; ?></p>
                    </h2>

                    <img src="<?= base_url('assets/img/') . 'struktur2.jpg'; ?>" class="img-responsive mx-auto d-block" alt="" srcset="" style="width: 75%;">

                </article><!-- End blog entry -->


            </div>

        </div><!-- End blog comments -->

    </div><!-- End blog entries list -->
</section><!-- End Blog Single Section -->