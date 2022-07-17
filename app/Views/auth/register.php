<?= $this->extend('front/layout/main') ?>
<?= $this->section('content') ?>



<div class="container">

    <div class="abs-center">
        
        <form action="<?=  base_url('auth/store') ?>" class="border p-3 form" method="POST">
            &nbsp;
            <h1 class="text-center">Registrate!</h1>

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= old('name') ?>">
                <p class="text-danger"><?= session('errors.name') ?></p>
            </div>
            <div class="form-group">
                <label for="surname">Apellido</label>
                <input type="text" name="surname" id="surname" class="form-control" value="<?= old('surname') ?>">
                <p class="text-danger"><?= session('errors.surname') ?></p>
            </div>
            <div class="form-group">
                <label for="email">Correo</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>">
                <p class="text-danger"><?= session('errors.email') ?></p>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control">
                <p class="text-danger"><?= session('errors.password') ?></p>
            </div>
            <div class="form-group">
                <label for="c-password">Repite tu Contraseña</label>
                <input type="password" name="c-password" id="c-password" class=" form-control">
            </div>


            <button type="submit" class="btn btn-primary">Registrate</button>
        </form>
    </div>

</div>



<?= $this->endSection() ?>