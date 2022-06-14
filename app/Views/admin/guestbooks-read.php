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
                    <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url('/admin/guestbooks') ?>">Guestbooks</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 bg-primary">
            <h6 class="m-0 font-weight-bold text-white"><?= $guestbooks['title'] ?></h6>
        </div>
        <div class="card-header py-0 position-relative">
            <hr>
            <table cellPadding="5">
                <tr>
                    <td>From</td>
                    <td> : </td>
                    <td><b><?= $guestbooks['name'] ?></b></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td> <?= $guestbooks['email'] ?></td>
                </tr>
            </table>
            <div class="position-absolute" style="top: 2.3rem; right: 2rem;"><?= $guestbooks['date_create'] ?></div>
            <hr>
            <p><?= $guestbooks['messages'] ?></p>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>

<?= $this->endSection() ?>