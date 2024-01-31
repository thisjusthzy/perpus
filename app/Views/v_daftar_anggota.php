<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= base_url('Auth') ?>" class="h2"><?= $judul?></a>
        </div>
        <div class="card-body">
            <?php
        if (session()->getFlashdata('pesan')) { echo '
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>'; echo session()->getFlashdata('pesan'); echo '</h5>
            </div>
            '; } ?>

            <?php echo form_open('Auth/Daftar') ?>
            <?php $validation = \Config\Services::validation(); ?>

            <div class="form-group">
                <input class="form-control <?= $validation->hasError('nis') ? 'is-invalid' : null?>" value="<?= old('nis') ?>" name="nis" placeholder="Nis" />
                <div class="invalid-feedback"><?=$validation->getError('nis')?></div>
            </div>

            <div class="form-group">
                <select name="jenis_kelamin" class="form-control">
                    <option value="">--Pilih Jenis Kelamin--</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <input class="form-control <?= $validation->hasError('nama_siswa') ? 'is-invalid' : null?>" value="<?= old('nama_siswa') ?>" name="nama_siswa" placeholder="Nama Siswa" />
                <div class="invalid-feedback"><?=$validation->getError('nama_siswa')?></div>
            </div>

            <div class="form-group">
                <select name="id_kelas" class="form-control">
                    <option value="">--Pilih Kelas--</option>
                    <?php foreach ($kelas as $key =>
                    $value) { ?>
                    <option value="<?= $value['id_kelas']?>"><?= $value['nama_kelas']?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <input class="form-control <?= $validation->hasError('no_hp') ? 'is-invalid' : null?>" value="<?= old('no_hp') ?>" name="no_hp" placeholder="No Handphone" />
                <div class="invalid-feedback"><?=$validation->getError('no_hp')?></div>
            </div>
            <div class="form-group">
                <input type="password" class="form-control <?= $validation->hasError('password') ? 'is-invalid' : null?>" value="<?= old('password') ?>" name="password" placeholder="Password" />
                <div class="invalid-feedback"><?=$validation->getError('password')?></div>
            </div>

            <div class="form-group">
                <input type="password" class="form-control <?= $validation->hasError('ulangi_password') ? 'is-invalid' : null?>" value="<?= old('ulangi_password') ?>" name="ulangi_password" placeholder=" Ulangi Password" />
                <div class="invalid-feedback"><?=$validation->getError('ulangi_password')?></div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <a class="btn btn-success btn-block" href="<?= base_url('Auth') ?>">Kembali</a>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                </div>
            </div>
            <?php echo form_close() ?>
            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="<?= base_url('Auth/LoginAnggota')?>" class="btn btn-block btn-warning"> <i class="fa fa-sign-in-alt"></i> Kembali Login </a>
            </div>
        </div>

        <!-- /.card-body -->
    </div>
</div>
