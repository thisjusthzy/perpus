<div class="col-md-12">

<?php 
$db = \Config\Database::connect();

foreach ($pengajuanditolak as $key => $value) {

    $buku = $db->table('peminjaman')
        ->join('buku','buku.id_buku = peminjaman.id_buku', 'left')
        ->where('id_anggota', $value['id_anggota'])
        ->where('status_pinjam', 'Ditolak')
        ->get()->getResultArray();
    ?>
   
<div class="col-md-12">
    
<div class="card card-widget widget-user-2">

<div class="widget-user-header bg-danger">
<div class="widget-user-image">
<img class="img-circle elevation-2" src="<?= base_url('foto/'. $value['foto'])?>">
</div>

<h3 class="widget-user-username"><?= $value['nama_siswa'] ?> (<?= $value['qty'] ?> Buku) </h3>
<h5 class="widget-user-desc"><?= $value['nama_kelas'] ?></h5>
</div>
<div class="card-footer p-0">
<table class="table table-hover">
    <tr class="text-center">
        <th>No</th>
        <th>Tanggal Pengajuan</th>
        <th>Cover</th>
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Lama Pinjam</th>
        <th>Tanggal Tempo</th>
    </tr>

    <?php $no=1;
    foreach ($buku as $key => $data) { ?>
    <tr>
        <td><?= $no++?></td>
        <td class="text-center"><?= $data['tgl_pengajuan']?></td>
        <td class="text-center">
            <img src="<?= base_url('cover/'. $data['cover']) ?>" width="70px" height="80px">
        </td>
        <td class="text-center"><?= $data['judul_buku']?></td>
        <td class="text-center"><?= $data['tgl_pinjam']?></td>
        <td class="text-center"><?= $data['lama_pinjam']?></td>
        <td class="text-center"><?= $data['tgl_harus_kembali']?></td> 
    </tr>

       </div>
    <?php } ?>
</table>
</div>
</div>
</div>

<?php } ?>