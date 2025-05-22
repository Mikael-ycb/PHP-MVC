<div class="container mt-3">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash();?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data Mahasiswa
            </button>
            <br>
            <h3>Daftar mahasiswa</h3>
                    <ul class="list-group">
                        <?php foreach($data['mhs'] as $mhs):?>
                        <li class="list-group-item ">
                            <a href="<?= BASEURL;?>/mahasiswa/hapus/<?= $mhs['id'];?>" class="badge text-bg-danger float-end ms-2" onclick="return confirm('yakin?');">Hapus</a>

                            <?= $mhs['nama'];?>
                            <a href="<?= BASEURL;?>/mahasiswa/detail/<?= $mhs['id'];?>" class="badge text-bg-primary float-end ">detail</a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah data Mahasiswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
            <div class="form-group">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama">  
            </div>

            <div class="form-group">
            <label for="nrp" class="form-label">NRP</label>
            <input type="number" class="form-control" id="nrp" name="nrp">  
            </div>

            <div class="form-group">
            <label for="email" class="form-label">email</label>
            <input type="email" class="form-control" id="email" name="email">  
            </div>
            
            <div calss="form-group"></div>
            <label for="jurusan">Jurusan</label>
            <select class="fotm-control" name="jurusan" id="jurusan">
                <option value="Informatika">Informatika</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Teknik Farmasi">Teknik Farmasi</option>
                <option value="Psikologi">Psikologi</option>
                <option value="Farmasi">Farmasi</option>
            </select>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>