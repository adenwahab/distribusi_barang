<body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <form>
        <div class="form-group row">
            <label for="text" class="col-3 col-form-label">Nama Pelanggan</label>
            <div class="col-9">
                <input id="text" name="text" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="text1" class="col-3 col-form-label">Produk</label>
            <div class="col-9">
                <input id="text1" name="text1" type="text" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label for="status_member" class="col-3 col-form-label">Status Member</label>
            <div class="col-9">
                <select id="status_member" name="status_member" class="custom-select">
                    <option value="">Pilih salah satu</option>
                    <option value="true">Bukan Member</option>
                    <option value="false">Member</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="select" class="col-3 col-form-label">Status Bayar</label>
            <div class="col-9">
                <select id="select" name="select" class="custom-select" required="required">
                    <option value="">Pilih salah satu</option>
                    <option value="lunas">Lunas</option>
                    <option value="dp">DP</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="text2" class="col-3 col-form-label">Jumlah harga</label>
            <div class="col-9">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-money"></i>
                        </div>
                    </div>
                    <input id="text2" name="text2" type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-3 col-9">
                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</body>

</html>