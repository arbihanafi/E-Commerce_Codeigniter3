<style>
    .container {
        width: 30%;
        margin-top: 9%;
        box-shadow: 0 3px 20px rgba(0, 0, 0, 0.4);
        padding: 50px;
    }
</style>
<div class="container">
    <?php $this->load->view('./layouts/v_pemberitahuan'); ?>
    <h2 class="text-center">Selamat Datang</h2>
    <hr>
    <form method="post" action="login">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input type="email" class="form-control font-italic" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Email">
            </div>
            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                </div>
                <input type="password" class="form-control font-italic" name="password" id="exampleInputPassword1" placeholder="Password">
            </div>
            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>

        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>
    <div>
        <a class="font-italic" href="<?= base_url('register'); ?>">Create new account!</a>
    </div>
    <div>
        <a class="font-italic" href="#">Lost Password?</a>
    </div>
</div>