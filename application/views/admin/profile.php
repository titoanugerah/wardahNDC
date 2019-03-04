<div class="row">
  <div class="col-md-8">
    <div class="card">

      <div class="card-body">
        <form method="post">
          <h3>Edit Profil</h3>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukan username" value="<?php echo $this->session->userdata['username']; ?>" required>
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukan password baru" value="">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Masukan email anda" value="<?php echo $this->session->userdata['email']; ?>" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 pr-1">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="fullname" class="form-control" placeholder="Masukan nama lengkap anda" value="<?php echo $this->session->userdata['fullname']; ?>" required>
              </div>
            </div>
            <div class="col-md-6 pl-1">
              <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" name="phone" class="form-control" placeholder="Masukan nomor telepon anda" value="<?php echo $this->session->userdata['phone']; ?>" required>
              </div>
            </div>
          </div>
          <div class="button-container">
            <button type="submit" name="updateProfile" value="updateProfile" class="btn btn-primary">Simpan Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card card-user">
      <div class="image">
        <img src="<?php echo base_url('./assets/upload/'.$this->session->userdata['display_picture'])?>" alt="..." style="width:330px">
      </div>
      <div class="card-body">
        <center>
        <div class="author">
            <br>
            <h5 class="title"><b><?php echo $this->session->userdata['fullname']?></b></h5>
            <?php echo "@".$this->session->userdata['username']?>
        </div>
        <p class="description text-center"><?php echo $this->session->userdata['email']?></p>
        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update Foto Profil</button>
      </center>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          <i class="fa fa-image"></i>
        </button>
        <center>
          <h4 class="title title-up">Ubah Foto Profil</h4>
        </center>
      </div>
      <div class="modal-body">
        <p>Silahkan upload foto dengan dimensi maksimal 500 x 500</p>
        <div class="md-form">
            <div class="file-field">
                <div class="btn btn-primary btn-sm float-left">
                    <span>Choose file</span>
                    <input type="file">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Upload your file">
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-default">Upload</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
      </div>
    </div>
  </div>
</div>
