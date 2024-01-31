<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form <?= $judul ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            
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

              <?php 
              echo form_open_multipart('Anggota/UpdateData/' . $anggota['id_anggota']);
              ?>
                <div class="row">
                <div class="col-sm-2">
                  <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                  <label>Foto</label>
                    <img src="<?= base_url('foto/' . $anggota['foto'])?>" id="gambar_load" class="img-fluid" width="250px" height="250px">
                  </div>
                </div>  
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Ganti Foto</label>
                        <input type="file" name="foto" class="form-control" id="preview_gambar" accept="image/*">
                      </div>
                    </div>
                </div>
              </div>
                  <div class="col-sm-10">

                <?php $validation = \Config\Services::validation(); ?>

                    <div class="row">
                      <div class="row">
                    <div class="col-sm-6">
                  <div class="form-group">
                    <label>NIS</label>
                    <input class="form-control  <?=  $validation->hasError('nis') ? 'is-invalid' : null?> " name="nis"  placeholder="NIS"  autofocus value="<?= $anggota['nis'] ?>">
                    <div class="invalid-feedback">
                          <?=$validation->getError('nis')?>
                    </div>
                  </div>
                  </div>

                  <div class="col-sm-6">
                  <div class="form-group">
                    <label>Nama Siswa</label>
                    <input class="form-control <?=  $validation->hasError('nama_siswa') ? 'is-invalid' : null?>" name="nama_siswa" placeholder="Nama_siswa" autofocus value="<?= $anggota['nama_siswa'] ?>">
                    <div class="invalid-feedback">
                          <?=$validation->getError('nama_siswa')?>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control <?=  $validation->hasError('jenis_kelamin') ? 'is-invalid' : null?>">
                         <option value ="<?= $anggota['jenis_kelamin'] ?>"><?= $anggota['jenis_kelamin'] ?></option>
                         <option value ="Laki-laki">Laki-laki</option>
                         <option value ="Perempuan">Perempuan</option>
                 </select>
                 <div class="invalid-feedback">
                          <?=$validation->getError('jenis_kelamin')?>
                    </div>
                  </div>
                </div>

               <div class="col-sm-6">
               <div class="form-group">
               <label>Kelas</label>
                  <select name="id_kelas" class="form-control">
                  <option value="<?= $anggota['id_kelas'] ?>"><?= $anggota['nama_kelas'] ?></option>
                <?php foreach ($kelas as $key => $value) { ?>
                    <option value="<?= $value['id_kelas']?>"><?= $value['nama_kelas']?></option>
                <?php } ?>
                </select>
              </div>
            </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>No Handphone</label>
                    <input class="form-control <?=  $validation->hasError('no_hp') ? 'is-invalid' : null?>" name="no_hp" placeholder="No Handphone" autofocus value="<?= $anggota['no_hp'] ?>">
                    <div class="invalid-feedback">
                          <?=$validation->getError('no_hp')?>
                    </div>
                  </div>
                </div>

                  <div class="col-sm-6">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control  <?=  $validation->hasError('password') ? 'is-invalid' : null?>" name="password" placeholder="Password" autofocus value="<?= $anggota['password'] ?>">
                    <div class="invalid-feedback">
                          <?=$validation->getError('password')?>
                    </div>
                  </div>
                </div>

                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Alamat</label>
                    <input class="form-control  <?=  $validation->hasError('alamat') ? 'is-invalid' : null?>" name="alamat" placeholder="Alamat" autofocus value="<?= $anggota['alamat'] ?>">
                    <div class="invalid-feedback">
                          <?=$validation->getError('alamat')?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                <a  href="<?= base_url('Anggota')?>" class="btn btn-warning"><i class="fas fa-share"></i> Kembali</a>
            </div>
         <?php echo form_close() ?>
    </div>
</div>
            <!-- /.card -->