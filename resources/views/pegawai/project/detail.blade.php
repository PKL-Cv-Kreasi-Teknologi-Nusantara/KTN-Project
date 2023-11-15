<div class="head">
    <center>
        <div class="col col-md-6">
            <h1>{{
                // nama project
                }}</h1>
        </div>
    </center>
  

</div>
    <div style="text-align: left" class="row">
        <div class="col col-md-12 col-12 mt-2">
            <div class="form-group">
                <label for="nama_barang">PO Number</label>
                <input type="text" class="form-control disabled-input"
                    id="part_no" name="po_number"
                    value="" readonly>
                @error('part_no')
                    <span class="invalid-feedback" role="alert">
                        <strong></strong>
                    </span>
                @enderror
                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
            </div>
        </div>
        <div class="col col-md-12 col-12 mt-2">
            <div class="form-group">
                <label for="password" style="margin-bottom: 5px;">Pengirim</label>
                <input type="text" class="form-control disabled-input" value="" name="pengirim" readonly>

            </div>
        </div>
        <div class="col col-md-12 col-12 mt-2">
            <div class="form-group">
                <label for="tujuan" style="margin-bottom: 5px;">Tujuan Pengiriman</label>
                <input type="text" class="form-control disabled-input" id="tujuan" name="penerima"
                        value="" readonly>
            </div>
        </div>        
    </div>

</div>
