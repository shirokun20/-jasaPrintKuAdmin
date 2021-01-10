<div>
	<div class="row">
         <div class="col-lg-4 col-12">
            <div class="card bg-c-red total-card">
                <div class="card-block">
                    <div class="text-left">
                        <h4 id="total_pengguna">0</h4>
                        <p class="m-0"><i class="fa fa-archive"></i> Pesanan Aktif</p>
                    </div>
                </div>
            </div>
         </div>
         <div class="col-lg-4 col-12">
             <div class="card bg-c-blue total-card">
                <div class="card-block">
                    <div class="text-left">
                        <h4 id="total_admin">0</h4>
                        <p class="m-0"><i class="fa fa-check-square-o"></i> Pesanan Selesai</p>
                    </div>
                </div>
            </div>
         </div>
         <div class="col-lg-4 col-12">
             <div class="card bg-c-green total-card">
                <div class="card-block">
                    <div class="text-left">
                        <h4 id="total_konsumen">0</h4>
                        <p class="m-0"><i class="fa fa-times-rectangle-o"></i> Pesanan Dibatalkan</p>
                    </div>
                </div>
            </div>
         </div>
     </div>
     <div class="card">
        <div class="card-header">
            <h5><?=$title?></h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li>
                    	<i class="fa fa fa-wrench open-card-option"></i>
                    </li>
                    <li>
                    	<a href="javascript:void(0)" onclick="modalTambah()">
                    		<i class="fa fa-plus" data-toggle="tooltip" title="Tambah Pengguna"></i>
                    	</a>
                    </li>
                    <li>
                    	<a href="javascript:void(0)" onclick="reloadData()">
                    		<i class="fa fa-refresh" data-toggle="tooltip" title="Reload Data"></i>
                    	</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-block">
        	<h4>
        		Pencarian
        	</h4>
        	<hr>
        	<div class="row" style="margin-bottom: 10px;">
        		<div class="col-12 col-lg-6 form-material">
					<div class="form-group form-default">
	                    <input type="text" name="footer-email" class="form-control">
	                    <span class="form-bar"></span>
	                    <label class="float-label">Cari Invoice, Konsumen atau total bayar...</label>
	                </div>
        		</div>
        		<div class="col-6 col-lg-3">
        			<div class="form-group">
					  <select class="form-control" name="status_transaction_id">
					    <option>Pilih Status Pesanan</option>
					  </select>
					</div>
        		</div>
        		<div class="col-6 col-lg-3">
        			<div class="form-group">
					  <select class="form-control" name="status_payment_id">
					    <option>Pilih Status Pembayaran</option>
					  </select>
					</div>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-4 col-lg-4 form-material">
        			<div class="form-group form-default form-static-label">
	                    <input type="date" name="tanggal_a" class="form-control">
	                    <span class="form-bar"></span>
	                    <label class="float-label">Tanggal</label>
	                </div>
        		</div>
        		<div class="col-4 col-lg-4 text-center" style="padding-top: 7px">
        			<h3>S/D</h3>
        		</div>
        		<div class="col-4 col-lg-4 form-material">
        			<div class="form-group form-default form-static-label">
	                    <input type="date" name="tanggal_a" class="form-control">
	                    <span class="form-bar"></span>
	                    <label class="float-label">Tanggal</label>
	                </div>
        		</div>
        	</div>
            <div class="table-responsive">
                <table class="table table-hover" id="tb_pengguna" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice</th>
                            <th>Waktu Pemesanan</th>
                            <th>Konsumen</th>
                            <th data-toggle="tooltip" title="Total yang harus dibayar!">Total Bayar</th>
                            <th>Status Pembayaran</th>
                            <th>Status Pesanan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>