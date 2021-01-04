 <div class="card">
    <div class="card-header">
        <h5>Data <?=$type_user_nama?></h5>
        <div class="card-header-right">
            <ul class="list-unstyled card-option">
                <li>
                	<i class="fa fa fa-wrench open-card-option"></i>
                </li>
                <li>
                	<i class="fa fa-window-maximize full-card"></i>
                </li>
                <li>
                	<a href="javascript:void(0)">
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
            <table class="table" id="tb_pengguna" width="100%">
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
<link rel="stylesheet" href="<?=base_url('assets/js/datatables/css/dataTables.bootstrap4.min.css')?>">
<script src="<?=base_url('assets/js/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?=base_url('assets/js/datatables/js/dataTables.bootstrap4.min.js')?>"></script>
<script type="text/javascript">
	// url
	var url = window.location.href;
	var url_2 = url.substring(0,url.lastIndexOf('/pengguna/'));
	// table
	var tabel;
	// tag
	var tb_pengguna = $('#tb_pengguna');
	var type_user_id = $('#type_user_id');
	// ready function
	$(() => {
		datatablesAjax();
	});
	// functions
	let datatablesAjax = () => {
		tabel = tb_pengguna.DataTable({
			"processing": true, 
            "ordering": true, 
            "info": false, 
            "serverSide": true, 
            "order": [], 
     		// Ajax
            "ajax": {
                "url": url_2+"/pengguna/showDataPengguna/",
                "type": "POST",
                "data": ( data ) => {
                	data.type_user_id = type_user_id.text();
                }
            },
     		// Order
            "columnDefs": [{ 
                "targets": [ 0 ], 
                "orderable": false, 
            }],
		});
	}

	let reloadData = () => {
		tabel.ajax.reload();
	}
</script>	