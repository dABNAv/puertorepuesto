<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?> 
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Nueva Categoria</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


<div class="card">

    <div class="card-body">

        <p class="content">

        <?php print_r($category)  ?>

        <form action="<?= base_url(route_to('categoriesUpdate')) ?>" method="post" enctype="multipart/form-data">

        <input type="text" value="<?= $category['id'] ?>" name="id">

            <div class="form-group">
                <label for="name">Nombre Categoria</label>
                <input class="form-control" value="<?= $category['name'] ?>" type="text" name="name">
            </div>
            <div class="form-group">
                <label for="image">Imagen</label>
                <br>
                <img class="img-thumbnail" src="<?= base_url()?>/uploads/categories/<?= $category['image'] ?>" width="200">
                <input class="form-control-file" type="file" name="image">
            </div>
            <button class="btn btn-success" type="submit">Editar</button>

            </form>

        </p>

    </div>

</div>


<?= $this->endSection() ?>