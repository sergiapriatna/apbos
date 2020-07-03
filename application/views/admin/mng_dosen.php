<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-12">
            <?php 
                    if ($this->session->flashdata('msg')) {
                ?>
                <div class="sufee-alert alert with-close alert-secondary alert-dismissible fade show">
                    <span class="badge badge-pill badge-secondary">Success</span>
                    <?php echo $this->session->flashdata('msg'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                    }
                ?> 
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                        <span ><a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahModal"> <i class="fa fa-plus"></i> Tambah Data</a></span>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Nidn</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($data as $data): ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data->namalengkap ?></td>
                                    <td><?= $data->nidn ?></td>
                                    <td><?= $data->username ?></td>
                                    <td>
                                        <?php  
                                            if ($data->status =="nonaktif" ) {
                                                echo "<span class='badge badge-danger'>";
                                            }else{
                                                echo "<span class='badge badge-success'>";
                                            }
                                            echo $data->status;
                                        ?>
                                        </span>
                                    </td>
                                    <td><?= $data->jabatan?></td>
                                    <td>
                                    <?php if ($data->status == "aktif"):?>
                                        <a href="<?= base_url('dosen/gantiStatus/'.$data->id.'/nonaktif')?>" class="btn btn-orange btn-sm"><i class="fa fa-times"></i> Blokir</a>
                                        <?php else: ?>
                                        <a href="<?= base_url('dosen/gantiStatus/'.$data->id.'/aktif')?>" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Aktifkan</a>
                                        <?php endif ?>
                                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailModal<?= $data->id?>"><i class="fa fa-eye"></i></a>
                                        <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $data->id?>"><i class="fa fa-edit"></i></a>
                                        <a href="<?= base_url('dosen/hapus/'.$data->id)?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php $no++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<?php foreach($data2 as $data2){?>
<div class="modal fade" id="editModal<?= $data2->id?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('dosen/edit/'.$data2->id)?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="form-control-label">Nama Lengkap</label>
                        <input type="text" name="namalengkap" class="form-control" value="<?= $data2->namalengkap?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Nidn</label>
                        <input type="text" name="nidn" class="form-control" value="<?= $data2->nidn?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $data2->username?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control" value="<?= $data2->jabatan?>">
                    </div>
                    <!-- <div class="form-group">
                        <label for="" class="form-control-label">Foto</label>
                        <input type="text" name="foto" class="form-control" value="<?= $data2->foto?>">
                    </div> -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <input class="btn btn-primary" type="submit" value="submit">
            </div>
            </form>
        </div>
    </div>
</div>
<?php }?>

<?php foreach($data3 as $data){?>
<div class="modal fade" id="detailModal<?= $data->id?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Detail Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <img src="<?= base_url() ?>assets/img/dosen/<?= $data->foto ?>" class="img-thumbnail" alt="">
                    </div>
                    <div class="col">
                        <table class="table">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $data->namalengkap ?></td>
                            </tr>
                            <tr>
                                <td>NIDN</td>
                                <td>:</td>
                                <td><?= $data->nidn ?></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td><?= $data->username ?></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>:</td>
                                <td><?= $data->jabatan ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><?= $data->status ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Tambah Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('dosen/tambah')?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="form-control-label">Nama Lengkap</label>
                        <input type="text" name="namalengkap" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Nidn</label>
                        <input type="text" name="nidn" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Jabatan</label>
                        <input type="text" name="jabatan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Foto</label>
                        <input type="file" name="foto" class="form-control" >
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <input class="btn btn-primary" type="submit" value="submit">
            </div>
            </form>
        </div>
    </div>
</div>