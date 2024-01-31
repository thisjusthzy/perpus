<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form <?= $judul ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

             

            <?php 
              echo form_open_multipart('Pengaturan/UpdateWeb');
            ?>
            <div class="card-body">
            <?php
                if (session()->getFlashdata('pesan')) {
                    echo ' <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                    echo session()->getFlashdata('pesan');
                    echo '</h5></div>';
                } 
                ?>
            
                <div class="row">
                     <div class="col-sm-2">
                        <div class="row">
                             <div class="col-sm-12">
                                 <div class="form-group">
                                    <label>Logo Sekolah</label>
                                    <img src="<?= base_url('logo/' . $web['logo']) ?>"  width="200px" height="200px">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                 <label>Ganti Logo</label>
                                 <input type="file" name="logo" accept="image/png">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $validation = \Config\Services::validation(); ?>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Sekolah</label>
                            <input class="form-control <?=  $validation->hasError('nama_sekolah') ? 'is-invalid' : null?>" name="nama_sekolah"  placeholder="Nama Sekolah"   value="<?= $web['nama_sekolah']; ?>">
                            <div class="invalid-feedback">
                                <?=$validation->getError('nama_sekolah')?>
                            </div>
                        </div>
                    </div>
              

                  <div class="col-sm-6">
                     <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control <?=  $validation->hasError('alamat') ? 'is-invalid' : null?>" name="alamat" placeholder="Alamat"  value="<?= $web['alamat']; ?>">
                     <div class="invalid-feedback">
                        <?=$validation->getError('alamat')?>
                    </div>
                  </div>
                </div>

                <?php $validation = \Config\Services::validation(); ?>

                  <div class="col-sm-6">
                  <div class="form-group">
                    <label>Kecamatan</label>
                    <input  class="form-control  <?=  $validation->hasError('kecamatan') ? 'is-invalid' : null?>" name="kecamatan" placeholder="Kecamatan"  value="<?= $web['kecamatan']; ?>">
                    <div class="invalid-feedback">
                          <?=$validation->getError('kecamatan')?>
                    </div>
                  </div>
                </div>

                  <div class="col-sm-6">
                  <div class="form-group">
                    <label>Kabupaten / Kota</label>
                    <input class="form-control <?=  $validation->hasError('kab_kota') ? 'is-invalid' : null?>" name="kab_kota" placeholder="Kabupaten / Kota"  value="<?= $web['kab_kota']; ?>">
                    <div class="invalid-feedback">
                          <?=$validation->getError('kab_kota')?>
                    </div>
                  </div>
                </div>

                  <div class="col-sm-6">
                  <div class="form-group">
                    <label>No Handphone</label>
                    <input class="form-control <?=  $validation->hasError('no_telepon') ? 'is-invalid' : null?>" name="no_telepon" placeholder="No Handphone"  value="<?= $web['no_telepon']; ?>">
                    <div class="invalid-feedback">
                          <?=$validation->getError('no_telepon')?>
                    </div>
                  </div>
                </div>
              </div>
              </div>

              <div class="col-sm-12">
                <div class="form-group">
                    <label>Sejarah</label>
                    <textarea rows="5"  class="form-control" name="sejarah"><?= $web['sejarah']; ?></textarea>
                  </div>
                </div>

              <div class="col-sm-12">
                <div class="form-group">
                    <label>Visi</label>
                    <textarea rows="5"  class="form-control" name="visi"><?= $web['visi']; ?></textarea>
                  </div>
                </div>

              <div class="col-sm-12">
                <div class="form-group">
                    <label>Misi</label>
                    <textarea rows="5"  class="form-control" name="misi"><?= $web['misi']; ?></textarea>
                  </div>
                </div>
              </div>  
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>
         <?php echo form_close() ?>
    </div>
</div>
            <!-- /.card -->