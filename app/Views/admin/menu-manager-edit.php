<?= $this->extend('layout/admin/master') ?>

<?= $this->section('content') ?>

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

    <div class="row">
        <div class="col-6">
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
                    <div class="dd w-100" id="nestable">
                        <ol class="dd-list">
                            <?php foreach ($menus as $key) : ?>
                                <li class="dd-item d-flex align-items-center" data-id="<?= $key['menu_id']; ?>">
                                    <div class="dd-handle dd3-handle mt-1"></div>
                                    <div class="dd3-content w-100"><?= $key['title']; ?>
                                        <div class="dd3-actions float-right" style="margin-top: -5px;">
                                            <a href="<?= base_url('admin/menu-manager/edit/' . $key['menu_id']); ?>" class="btn butdef1 btn-sm "><i class="fa fa-fw fa-edit"></i>
                                            </a>
                                            <a href="<?= base_url('admin/menu-manager/delete/' . $key['menu_id']); ?>" class="btn butdef1 btn-sm " data-toggle="modal" data-target="#delete-<?= $key['menu_id'] ?>"><i class="fa fa-fw fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <!-- Modal Delete -->
                                <div class="modal fade" id="delete-<?= $key['menu_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Item Confirm</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="alert alert-warning" role="alert">
                                                    <b>Peringatan !</b> Anda yakin ingin menghapus data ini ?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="" class="btn btn-sm btn-danger" data-dismiss="modal">No <i class="fas fa-ban"></i></a>
                                                <a href="<?= base_url('/admin/menu-manager/delete/' . $key['menu_id']) ?>" class="btn btn-sm btn-success">Yes <i class="fas fa-check"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="" method="POST">
                        <input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" class="form-control mb-3" id="nestable-output" name="json" />
                        <button class="btn btn-sm btn-success">Save Change <i class="fa fa-check"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Menu Edit</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="<?= $menu['title'] ?>">
                        </div>

                        <div class="mb-3">
                            <label for="url">Url</label>
                            <input type="text" class="form-control" name="url" id="url" value="<?= $menu['url'] ?>">
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" name="target" id="flexRadioDefault3" value="_self" <?= $menu['target'] === '_self' ? 'checked' : '' ?> />
                            <label class="custom-control-label pt-1" for="flexRadioDefault3"> Self </label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" name="target" id="flexRadioDefault4" value="_blank" <?= $menu['target'] === '_blank' ? 'checked' : '' ?> />
                            <label class="custom-control-label pt-1" for="flexRadioDefault4"> Blank </label>
                        </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex">
                        <button class="btn btn-sm btn-success">Add <i class="fa fa-plus"></i></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="/js/jquery.js" defer></script>
<script>
    $(document).ready(function() {

        var updateOutput = function(e) {
            var list = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };

        // activate Nestable for list 1
        $('#nestable').nestable({
                group: 1
            })
            .on('change', updateOutput);

        // activate Nestable for list 2
        // $('#nestable2').nestable({
        //         group: 1
        //     })
        //     .on('change', updateOutput);

        // output initial serialised data
        updateOutput($('#nestable').data('output', $('#nestable-output')));

    });
</script>

<?= $this->endSection() ?>