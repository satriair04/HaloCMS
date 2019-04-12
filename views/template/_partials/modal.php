<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Keluar dari sistem ?</div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="<?php echo site_url('Auth/close')?>">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Logout Delete Confirmation-->
<div class="modal fade" id="bannedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Akun yang dikunci tidak akan mengakses sistem. Kunci akun pengguna ini ?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-banned" class="btn btn-danger" href="#">Kunci akun</a>
      </div>
    </div>
  </div>
</div>

<!-- Unbanned modal Confirmation-->
<div class="modal fade" id="unlockModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Apakah kamu yakin untuk membuka akses akun ini ?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-unbanned" class="btn btn-primary" href="#">Buka akun</a>
      </div>
    </div>
  </div>
</div>

<!-- Hapus draft artikel modal Confirmation-->
<div class="modal fade" id="artRemoveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Draft kamu belum diajukan. Yakin ingin menghapusnya?</div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-artRemove" class="btn btn-danger" href="#">Hapus draft</a>
      </div>
    </div>
  </div>
</div>

<!-- Batalkan memproses artikel _ modal Confirmation-->
<div class="modal fade" id="artUnclaimModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Artikel yang kamu proses ini akan diturunkan ke status 'Pending'. Lepaskan tanggung jawab ?</div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
        <a id="btn-artUnclaim" class="btn btn-danger" href="#">Batalkan memproses artikel</a>
      </div>
    </div>
  </div>
</div>

<!-- Mengklaim artikel _ modal Confirmation-->
<div class="modal fade" id="artClaimModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Kamu akan mengklaim artikel ini, lanjutkan ?</div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-artClaim" class="btn btn-danger" href="#">Klaim artikel</a>
      </div>
    </div>
  </div>
</div>

<!--Update success notification_not implemented yet-->
<div class="modal fade" id="sukses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Notifikasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data berhasil diubah</div>
      <div class="modal-footer">
        <button class="btn btn-success" type="button" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>


<!-- Submit artikel ke redaktur - modal Confirmation-->
<div class="modal fade" id="artSubmitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Ajukan artikel ini agar diproses redaktur ? Kamu tidak dapat mengubah artikel maupun kelola gambar setelah ini. Apakah kamu siap ?</div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Belum !</button>
        <a id="btn-artSubmit" class="btn btn-primary" href="#" data-toggle="tooltip" data-placement="top" title="PERHATIAN: Artikel tidak dapat diupdate setelah anda mengajukannya">Sudah !</a>
      </div>
    </div>
  </div>
</div>

<!-- Unsubmit artikel sebelum di klaim redaktur - modal Confirmation-->
<div class="modal fade" id="artUnsubmitModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Batalkan pengajuan artikel ini ? Redaktur kamu tidak dapat melihat artikel ini dalam daftar mereka. Lanjutkan ?</div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-dismiss="modal">Tutup</button>
        <a id="btn-artUnsubmit" class="btn btn-danger" href="#">Batalkan pengajuan artikel</a>
      </div>
    </div>
  </div>
</div>

<!-- Redaktur setujui artikel - modal Confirmation-->
<div class="modal fade" id="artAcceptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Simpan segala perubahan dan setujui penerbitan artikel ini ? Apakah kamu siap ?</div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Belum !</button>
        <a id="btn-artAccept" class="btn btn-primary" href="#">Sudah !</a>
      </div>
    </div>
  </div>
</div>

<!-- Redaktur tolak artikel - modal Confirmation-->
<div class="modal fade" id="artRejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Tolak usulan penerbitan artikel ini ?</div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-dismiss="modal">Batalkan</button>
        <a id="btn-artReject" class="btn btn-danger" href="#" data-toggle="tooltip" data-placement="top" title="PERHATIAN: Segala perubahan yang kamu lakukan sebelumnya akan direset">Tolak artikel ini</a>
      </div>
    </div>
  </div>
</div>

<!-- Redaktur turunkan status artikel - modal Confirmation-->
<div class="modal fade" id="artDownGradeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Turukan status artikel ini kembali ke tahap "Proses" ?</div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-artDownGrade" class="btn btn-danger" href="#" data-toggle="tooltip" data-placement="top" title="PERHATIAN: Segala perubahan yang kamu lakukan sebelumnya akan direset">Turunkan status</a>
      </div>
    </div>
  </div>
</div>

<!-- Reset password pengguna, konfirmasi-->
<div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Ajukan permintaan reset password kepada administrator ?</div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-resetPassword" class="btn btn-danger" href="#" data-toggle="tooltip" data-placement="top" title="PERHATIAN: Akun kamu akan terkunci hingga administrator telah melakukan reset password">Ajukan permintaan</a>
      </div>
    </div>
  </div>
</div>

<!-- Reset password pengguna, selesai-->
<div class="modal fade" id="resetCompletedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Apakah kamu ingin reset password pengguna akun ini ?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-resetCompleted" class="btn btn-primary" href="#" data-toggle="tooltip" data-placement="top" title="Password default : halocms123">Setujui permintaan</a>
      </div>
    </div>
  </div>
</div>

<!-- Reset konten berita-->
<div class="modal fade" id="resetKontenBerita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Konten berita ini akan direstorasi ke kondisi asli dari wartawannya. Ingin melanjutkan ?</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-resetKonten" class="btn btn-primary" href="#" data-toggle="tooltip" data-placement="top" title="Perhatian : Jika ada beberapa perubahan yang tidak ingin dihapus segera disalin dahulu sebelum dilanjutkan">Reset ulang berita</a>
      </div>
    </div>
  </div>
</div>

<!-- Reset konten berita-->
<div class="modal fade" id="hapusFileGambar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">File gambar yang berhubungan dengan draft ini akan dihapus. Ingin melanjutkan ?</div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-hapusFile" class="btn btn-danger" href="#" >Hapus file gambar ini</a>
      </div>
    </div>
  </div>
</div>

