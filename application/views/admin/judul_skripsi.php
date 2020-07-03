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
                        <span ><a href="" class="btn btn-primary float-right"> <i class="fa fa-plus"></i> Tambah Data</a></span>
                    </div>
            
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Mahasiswa</th>
                                    <th>Kategori Skripsi</th>
                                    <th>Status</th>
                                    <th>Link</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no=1; foreach($jdl as $data): ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $data->judulskripsi?></td>
                                    <td><?= $data->mahasiswa?></td>
                                    <td><?= $data->kategoriskripsi?></td>
                                    
                                    <td><?= $data->status?></td>
                                    <td><?= $data->link?></td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailModal<?= $data->id?>"><i class="fa fa-eye"></i></a>
                                        <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModal<?= $data->id?>"><i class="fa fa-edit"></i></a>
                                        <a href="<?= base_url('judulskripsi/hapus/'.$data->id)?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')"><i class="fa fa-trash"></i></a>
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

<?php foreach($data2 as $data2):?>
<div class="modal fade" id="editModal<?= $data2->id?>" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Edit Skripsi Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php base_url('dosen/edit/'.$data2->id)?>" method="post" endtype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="form-control-label">Judul</label>
                        <input type="text" name="namalengkap" class="form-control" value="<?= $data2->judulskripsi?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Mahasiswa</label>
                        <select name="mhs" class="form-control" id="">
                            <?php 
                                foreach($mhs2 as $mhs2):
                                    if($mhs2->id == $data2->mahasiswa){
                                        echo "<option value='".$mhs2->id."' selected>";
                                    }else{
                                        echo "<option value='".$mhs2->id."'>";
                                    }
                            ?><?= $mhs2->namalengkap ?></option>
                                    <?php  endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">DosPem1</label>
                        <select name="dospem1" class="form-control" id="">
                            <?php 
                                foreach($dosen12 as $dosen12):
                                    if($dosen>id == $data2->dosen12){
                                        echo "<option value='".$dosen12->id."' selected>";
                                    }else{
                                        echo "<option value='".$dosen12->id."'>";
                                    }
                            ?><?= $dosen12->namalengkap ?></option>
                                    <?php  endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">DosPem2</label>
                        <select name="dospem2" class="form-control" id="">
                            <?php 
                                foreach($dosen22 as $dosen22):
                                    if($dosen22->id == $data2->dosen22){
                                        echo "<option value='".$dosen22->id."' selected>";
                                    }else{
                                        echo "<option value='".$dosen22->id."'>";
                                    }
                            ?><?= $dosen22->namalengkap ?></option>
                                    <?php  endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Kategori Skripsi</label>
                        <select name="kategoriskripsi" class="form-control" id="">
                            <?php 
                                foreach($kat2 as $kat2):
                                    if($kat2->id == $data2->kat2){
                                        echo "<option value='".$kat2->id."' selected>";
                                    }else{
                                        echo "<option value='".$kat2->id."'>";
                                    }
                            ?><?= $kat2->nama?></option>
                                    <?php  endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Tahun</label>
                        <input type="text" name="foto" class="form-control" value="<?= $data2->tahun?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Status</label>
                        <input type="text" name="foto" class="form-control" value="<?= $data2->status?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">Link</label>
                        <input type="text" name="foto" class="form-control" value="<?= $data2->link?>">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach ?>