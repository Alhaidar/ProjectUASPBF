<form action="{{route('jadwal.setupbulk')}}" method="post" id="bulkform">
  <div class="card card-form">
  @csrf
  <div class="row no-gutters">
      <div class="col-lg-4 card-body">
          <p><strong class="headings-color">Menambahkan Jadwal Secara Masal</strong></p>
          <p class="text-muted mb-0">jadwal akan ditambahkan secara otomatis berdasarkan pengaturan yang diisi pada formulir.</p>
      </div>
      <div class="col-lg-8 card-form__body card-body">
          <div class="form-group">
              <label for="pdate">Tanggal dimulai</label>
              <input name="pdate" id="pdate" type="date" class="form-control"  required>
          </div>
          <div class="form-group">
              <label for="pstart">Jam presentasi dimulai dalam 1 hari</label>
              <input name="pstart" id="pstart" type="time" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="pend">Batas presentasi berakhir dalam 1 hari</label>
              <input name="pend" id="pend" type="time" class="form-control" required>
          </div>
          <div class="form-group">
              <label for="ptime">Durasi presentasi (menit)</label>
              <input name="ptime" id="ptime" type="number"  pattern="[0-9]{2}" class="form-control" min="1" max="60" maxlength="2" placeholder="contoh: 45" required>
          </div>
          <div class="form-group">
              <label for="jenis">Tujuan</label>
              <select class="form-control" name="tujuan" required>
                <option value="0" selected disabled>Pilih jenis:</option>
                <option value="nonjadwal">Tim yang belum memiliki jadwal</option>
                <option value="semua">Semua tim</option>
              </select>
          </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Atur</button>
  </div>
</form>
