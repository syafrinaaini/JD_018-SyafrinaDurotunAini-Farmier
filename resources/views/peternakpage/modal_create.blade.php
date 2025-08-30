<div id="modalCreate" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <h2>Tambah Ternak</h2>

        <form action="{{ route('livestocks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="jenis">Jenis Ternak</label>
                <input type="text" name="jenis" id="jenis" placeholder="Contoh: Sapi" required>
            </div>

            <div class="form-group">
                <label for="ras">Ras Ternak</label>
                <input type="text" name="ras" id="ras" placeholder="Contoh: Limousin" required>
            </div>

            <div class="form-group">
                <label for="stok">Jumlah/Stok</label>
                <input type="number" name="stok" id="stok" min="1" required>
            </div>

            <div class="form-group">
                <label for="image">Upload Gambar</label>
                <input type="file" name="image" id="image" accept="image/*">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Simpan</button>
                <button type="button" class="btn-cancel" id="cancelModal">Batal</button>
            </div>
        </form>
    </div>
</div>