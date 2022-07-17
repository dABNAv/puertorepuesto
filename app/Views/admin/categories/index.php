<?= $this->extend('admin/layout/main') ?>

<?= $this->section('content') ?> 
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Categorias</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- row de opciones de busqueda -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">OPCIONES</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" id="btnClear">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="<?= base_url(route_to('categoriesCreate')) ?>" class="btn btn-primary">
                                <i class="fas fa-solid fa-user-plus"> Agregar </i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">                 
                    <table id="tableUsers" class="table table-striped w-100 shadow">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> NOMBRE </th>
                                <th> IMAGEN </th>
                                <th> CREADO </th>
                                <th> ACTUALIZADO </th>
                                <th class="text text-center"> ACCIONES </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($category as $key):?> 
                                <tr>
                                <th scope="row"> <?= $key['id'] ?> </th>
                                <td> <?= $key['name'] ?> </td>
                                <td> <?= $key['image'] ?> </td>
                                <td> <?= $key['created_at'] ?> </td>
                                <td> <?= $key['updated_at'] ?> </td>
                                <td>
                                    <a href="<?= base_url('admin/editar/'.$key['id']) ?>"
                                        <i class="fas fa-pencil-alt fs-5 text-primary"></i>
                                    </a>
                                    <a href="<?php echo base_url('admin/eliminar/'.$key['id']) ?>">
                                        <i class="fas fa-trash-alt fs-5 text-danger"></i>
                                    </a>
                                </td>
                                </tr>
       
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    <!-- /.content -->


<?= $this->endSection() ?>




<?= $this->section('js') ?>




<script>
  $(function () {
    $("#tableUsers").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tableUsers_wrapper .col-md-6:eq(0)');
  });
</script>
<?= $this->endSection() ?>

