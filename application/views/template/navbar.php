<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand ml-5" href="#">
        <img src="assets/img/logo1.png" width="100" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="javascript:void()">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('Product') ?>">Produk</a>
            </li>
        </ul>
        <form class=" form-inline my-2 my-lg-0">
            <a class="btn background-neon my-2 mx-2 my-sm-0 border border-dark rounded-pill text-black" href="<?= base_url('login'); ?>">Login</a>
        </form>
    </div>
</nav>
<!-- Navbar ends-->