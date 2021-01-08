 <div>
     <div class="row">
         <div class="col-lg-4 col-12">
            <div class="card bg-c-red total-card">
                <div class="card-block">
                    <div class="text-left">
                        <h4 id="total_pengguna">0</h4>
                        <p class="m-0">Semua Pengguna</p>
                    </div>
                </div>
            </div>
         </div>
         <div class="col-lg-4 col-6">
             <div class="card bg-c-blue total-card">
                <div class="card-block">
                    <div class="text-left">
                        <h4 id="total_admin">0</h4>
                        <p class="m-0">Admin</p>
                    </div>
                </div>
            </div>
         </div>
         <div class="col-lg-4 col-6">
             <div class="card bg-c-green total-card">
                <div class="card-block">
                    <div class="text-left">
                        <h4 id="total_konsumen">0</h4>
                        <p class="m-0">Konsumen</p>
                    </div>
                </div>
            </div>
         </div>
     </div>
     <div class="card">
        <div class="card-header">
            <h5>Data <?=$type_user_nama?></h5>
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
        <b style="display: none;" id="type_user_id"><?=$type_user_id?></b>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table table-hover" id="tb_pengguna" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No.Hp</th>
                            <th>Jenis Pengguna</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="modalSet"></div>
</div>
<!--  -->
<link rel="stylesheet" href="<?=base_url('assets/js/datatables/css/dataTables.bootstrap4.min.css')?>">
<link rel="stylesheet" href="<?=base_url('assets/pages/notification/notification.css')?>">
<!--  -->
<script src="<?=base_url('assets/js/datatables/js/jquery.dataTables.min.js')?>"></script>
<!--  -->
<script src="<?=base_url('assets/js/datatables/js/dataTables.bootstrap4.min.js')?>"></script>
<!--  -->
<!-- notification js -->
<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap-growl.min.js"></script>
<!--  -->
<script type="text/javascript" src="<?=base_url('assets/custom_js/pengguna.custom.index.js')?>"></script>
<!-- Custom JS -->
<script src="<?=base_url('assets/custom_js/modal.custom.js')?>"></script>   
<script src="<?=base_url('assets/custom_js/notification.custom.js')?>"></script>    
<script src="<?=base_url('assets/custom_js/form.pengguna.custom.js')?>"></script>	