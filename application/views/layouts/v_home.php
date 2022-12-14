<style>
    body {
        background-color: white;
    }

    .carousel-item {
        height: 658px;
    }

    .jumbotron {
        background-image: linear-gradient(#AAE2CE, #00FFFF);
    }
</style>

<!-- contents-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php foreach ($hero as $key => $rows) : ?>
            <div class="carousel-item <?php echo $key == 0 ? 'active' : '' ?>">
                <img class="d-block w-100" src="<?= base_url('./assets/uploads/'); ?><?= $rows['file_foto']; ?>" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5><strong><?php echo $rows['label'] ?></strong></h5>
                    <p><strong><?php echo $rows['description'] ?></strong></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div>
<!-- contents ends-->