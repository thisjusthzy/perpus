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
              echo form_open_multipart('Ebook/UpdateData/'. $ebook['id_ebook']);
              ?>
                <div class="row">
                <div class="col-sm-2">
                <div class="col-sm-12">
                  <div class="form-group">
                  <label>Cover</label>
                    <img src="<?= base_url('cover/'. $ebook['cover'])?>" id="gambar_load" class="img-fluid" width="250px" height="250px">
                  </div>
                </div>  
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>File Cover</label>
                    <input type="file" name="cover" class="form-control" id="preview_gambar" accept="image/*">
                   </div>
                  </div>
                </div>
                <div class="col-sm-10">
                <div class="row">


                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Judul Buku</label>
                    <input  class="form-control" name="judul_ebook" placeholder="Judul Ebook" value="<?= $ebook['judul_ebook']?>">
                   
                  </div>
                </div>

                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>ISBN</label>
                    <input class="form-control" name="isbn" placeholder="ISBN"  value="<?= $ebook['isbn']?>">
                   
                  </div>
                </div>


                 

                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>Kategori</label>
                    <div class=" input-group">
                    <select name="id_kategori" class="form-control ">
                       <option value="<?= $ebook['id_kategori']?>"><?= $ebook['nama_kategori']?></option>
                       <?php foreach ($kategori as $key => $value) { ?>
                        <option value="<?= $value['id_kategori']?>"><?= $value['nama_kategori']?></option>
                       <?php } ?>
                    </select>
                    <span class="input-group-append">
                          <a href="<?= base_url('Kategori')?>" class ="btn btn-info btn-flat">
                            <i class="fas fa-plus"></i>
                        </a>
                       </span>
                  </div>
                </div>
                </div>

                  <div class="col-sm-3">
                  <div class="form-group">
                    <label>Penulis</label>
                    <div class=" input-group">
                    <select name="id_penulis" class="form-control">
                       <option value="<?=$ebook['id_penulis']?>"><?= $ebook['nama_penulis']?></option>
                       <?php foreach ($penulis as $key => $value) { ?>
                        <option value="<?= $value['id_penulis']?>"><?= $value['nama_penulis']?></option>
                       <?php } ?>
                    </select>
                    <span class="input-group-append">
                          <a href="<?= base_url('Penulis')?>" class ="btn btn-info btn-flat">
                            <i class="fas fa-plus"></i>
                        </a>
                       </span>
                   
                  </div>
                </div>
              </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Penerbit</label>
                    <div class=" input-group">
                    <select name="id_penerbit" class="form-control">
                       <option value="<?=$ebook['id_penerbit']?>"><?= $ebook['nama_penerbit']?></option>
                       <?php foreach ($penerbit as $key => $value) { ?>
                        <option value="<?= $value['id_penerbit']?>"><?= $value['nama_penerbit']?></option>
                       <?php } ?>
                    </select>
                    <span class="input-group-append">
                          <a href="<?= base_url('Penerbit')?>" class ="btn btn-info btn-flat">
                            <i class="fas fa-plus"></i>
                        </a>
                       </span>
                  
                  </div>
                </div>
              </div>


              <div class="col-sm-4">
                  <div class="form-group">
                    <label>Tahun</label>
                    <select name="tahun" class="form-control">
                       <option value="<?= $ebook['tahun'] ?>"><?= $ebook['tahun']?></option>
                        <?php for ($i = date('Y'); $i >= 1990 ; $i--) { ?>
                          <option value="<?= $i ?>"><?= $i ?></option>
                       <?php  } ?>
                    </select>
                    
                  </div>
              </div>

              <div class="col-sm-4">
                  <div class="form-group">
                    <label>Bahasa</label>
                    <input  class="form-control" name="bahasa" placeholder="Bahasa"  value="<?= $ebook['bahasa'] ?>">
                   
                  </div>
                </div>

              <div class="col-sm-4">
                  <div class="form-group">
                    <label>Halaman</label>
                    <input type="number" class="form-control" name="halaman" placeholder="Halaman"  value="<?= $ebook['halaman'] ?>">
                    
                  </div>
                </div>


                <div class="col-sm-12">
                  <div class="form-group">
                    <label>File E-Book</label>
                    <input type="file" name="ebooks" class="form-control" accept=".pdf">
                   </div>
                  </div>
                
                </div>
              </div>
            </div>
          </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                <a  href="<?= base_url('Ebook')?>" class="btn btn-warning"><i class="fas fa-share"></i> Kembali</a>
            </div>
         <?php echo form_close() ?>
    </div>
</div>
            <!-- /.card -->