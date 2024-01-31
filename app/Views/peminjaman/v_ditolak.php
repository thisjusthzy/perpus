<div class="col-md-12">
    <div class="card card-outline card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <?= $judul ?>
            </h3>
        </div>

        <div class="card-body">
        <?php
            $errors = session()->getFlashdata('errors');
            if (!empty($errors)) { ?>
                <div class="alert alert-danger" role="alert">
                    <h4>Periksa Entry Form</h4>
                    <ul>
                        <?php foreach ($errors as $key => $error ) { ?>
                            <li><?= esc($error) ?></li>
                       <?php } ?>
                    </ul>
                </div>
            <?php } ?>
            
            <?php
                if (session()->getFlashdata('pesan')) {
                    echo ' <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i>';
                    echo session()->getFlashdata('pesan');
                    echo '</h5></div>';
                } 
            ?>
        

      <table class="table table-bordered">
      <tr class="text-center">
          <th>NO</th>
          <th>No Pinjam</th>
          <th>Cover</th>
          <th>Data Buku</th>
          <th>Peminjaman</th>
          <th>Status</th>
          <th>Keterangan</th>
        </tr>
        <?php $no = 1;
         foreach ($pengajuanditolak as $key => $value) { ?>
        <tr>
          <td><?= $no++ ?></td>
          <td class="text-center"><?= $value['no_pinjam'] ?></td>
          <td class="text-center">
              <img src="<?= base_url('cover/'. $value['cover']) ?>" width="125px" height="125px">
              <p><b><?= $value['kode_buku'] ?></b></p>
          </td>
          <td>
              <p>
              <h5 class="text-primary"><?= $value['judul_buku'] ?></h5>
                <b> Kategori :  </b> <?= $value['nama_kategori']?> <br>
                <b> Penulis : </b> <?= $value['nama_penulis']?> <br>
                <b> Penerbit :  </b> <?= $value['nama_penerbit']?> <br>
                <b> Lokasi :</b> <?= $value['nama_rak']?> Lantai  <?= $value['lantai_rak']?><br>
                <b> Halaman :  </b> <?= $value['halaman']?><br>
                <b> ISBN :  </b> <?= $value['isbn']?><br>
                <b> Tahun :  </b> <?= $value['tahun']?><br>
              </p>
          </td>
          <td> <b> Tanggal Pengajuan :  </b><?= $value['tgl_pengajuan']?><br>
               <b> Tanggal Pinjam :  </b><?= $value['tgl_pinjam']?><br>
               <b> Lama Pinjam :  </b><?= $value['lama_pinjam']?> Hari<br>
               <b> Tanggal Harus Kembali:  </b><?= $value['tgl_harus_kembali']?><br>
         </td>
          <td class="text-center">
            <span class="right badge badge-danger"><?= $value['status_pinjam'] ?></span>
          </td>
          <td class="text-center"><?= $value['ket']?></td>
        </tr>
        <?php } ?>
      </table>

        </div>
    </div>
</div>

<!--Modal Tambah Pengajuan-->
<div class="modal fade" id="modal-sm">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah <?= $judul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <?php 
                  $id_anggota = session()->get('id_anggota');
                  $tgl = date('Ymd');
                  $no_pinjam = $id_anggota . $tgl;

              ?>

              <?php echo form_open(base_url('Peminjaman/AddPengajuan')) ?>   
              
              <div class="form-group">
                    <label>No Pinjam</label>
                    <input  class="form-control" name="no_pinjam" value="<?= $no_pinjam?>" readonly>
                  </div>

              <div class="form-group">
                    <label>Judul Buku</label>
                    <select name="id_buku" class="form-control select2" >
                      <option value="">--Pilih Buku--</option>
                      <?php foreach ($buku as $key => $value) { ?>
                        <option value="<?= $value['id_buku'] ?>"><?= $value['judul_buku'] ?></option>
                    <?php  } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Tanggal Pinjam</label>
                    <input type="date"  class="form-control" name="tgl_pinjam" required>
                  </div>


                  <div class="form-group">
                    <label>Lama Pinjam</label>
                    <input type="number" name="lama_pinjam" class="form-control" value="7" max="7" min="1">
                  </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary btn-flat">Ajukan</button>
            </div>
            <?php echo form_close() ?>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

