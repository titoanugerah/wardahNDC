<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card card-nav-tabs card-plain">
        <div class="card-header card-header-success">
          <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#info" data-toggle="tab">
                    <i class="material-icons">info</i>
                    Informasi Umum
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#itemHistory" data-toggle="tab">
                    <i class="material-icons">history</i>
                    Riwayat Stok Item
                  </a>
                </li>

                </ul>
              </div>
            </div>
          </div>
          <div class="card-body ">
            <div class="tab-content text-justify">
              <div class="tab-pane active" id="info">
                <div class="alert alert-warning alert-with-icon" data-notify="container">
                  Pada tab ini, digunakan untuk mengkonfigurasi item terkait
                </div>

                <div class="card-body">
                  <form method="post">
                    <div class="row">
                      <div class="col-md-6 pr-1">
                        <div class="form-group">
                          <label>Nama Item</label>
                          <input type="text" name="item" class="form-control" placeholder="Masukan nama item" value="<?php echo $detail->item; ?>" required>
                        </div>
                      </div>
                      <div class="col-md-6 pl-1">
                        <div class="form-group">
                          <label>Stok</label>
                          <input type="text" name="stock" class="form-control" placeholder="Masukan Stok Awal" value="<?php echo $detail->stock?>" disabled>
                        </div>
                      </div>
                    </div>

                    <div class="button-container">
                      <button type="submit" name="updateItem" value="updateItem" class="btn btn-primary">Simpan Data</button>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteItem">Hapus Item</button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="tab-pane" id="itemHistory">
                <p> sedang dalam tahap development </p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form  method="post">
      <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Hapus Item <?php echo $detail->item.'?'; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <p>Apakah anda yakin akan menghapus item ini? semua histori barang akan terhapus juga, Untuk melanjutkan silahkan masukan password anda untuk memverefikasi keaslian akun anda</p>
            <br>
            <div class="md-form">
              <div class="form-group">
                <label>Password Anda</label>
                <input type="password" name="password" class="form-control" placeholder="Masukan password anda" value="" required>
              </div>
            </div>
          </div>

          <div class="modal-footer modal-danger">
            <button type="submit" class="btn btn-warning" name="deleteItem" value="deleteItem">Hapus Item</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
        </div>
      </div>
    </form>
    </div>
  </div>
