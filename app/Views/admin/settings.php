<?= $this->extend('layout/admin/master') ?>

<?= $this->section('content') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-1" style="display: flex; justify-content: center; margin-top: 0.75rem">
            <a href="javascript:history.back();">
                <i class="fas fa-arrow-left"></i>
                Back
            </a>
        </div>
        <div class="col-11">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex align-items-center">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('pesan') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
            <?php if (session()->getFlashdata('pesan2')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= session()->getFlashdata('pesan2') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%">
                    <?php foreach ($settings as $key) : ?>
                        <?php $validation = \Config\Services::validation() ?>
                        <tr>
                            <td><?= $key['keyword'] ?></td>
                            <td>:</td>
                            <td>
                                <a class="" href="" data-toggle="modal" data-target="#edit-<?= $key['setting_id'] ?>"><?= $key['value'] ?></a>
                            </td>
                        </tr>
                        <!-- Modal Edit -->
                        <div class="modal fade" id="edit-<?= $key['setting_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit <?= $key['keyword'] ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('admin/settings/edit/' . $key['setting_id']) ?>" method="POST">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="PATCH">
                                            <input type="text" class="form-control" value="<?= $key['value'] ?>" name="<?= $key['keyword'] ?>">

                                    </div>
                                    <div class="modal-footer">
                                        <a href="" class="btn btn-sm btn-danger" data-dismiss="modal">No <i class="fas fa-ban"></i></a>
                                        <button type="submit" class="btn btn-sm btn-success">Edit <i class="fas fa-check"></i></a>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<?= $this->endSection() ?>