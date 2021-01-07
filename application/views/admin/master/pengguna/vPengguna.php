 <div>
     <div class="row">
         <div class="col-lg-4 col-12">
            <div class="card bg-c-red total-card">
                <div class="card-block">
                    <div class="text-left">
                        <h4><?= number_format($jumlah['total_pengguna']); ?></h4>
                        <p class="m-0">Semua Pengguna</p>
                    </div>
                </div>
            </div>
         </div>
         <div class="col-lg-4 col-6">
             <div class="card bg-c-blue total-card">
                <div class="card-block">
                    <div class="text-left">
                        <h4><?= number_format($jumlah['total_admin']); ?></h4>
                        <p class="m-0">Admin</p>
                    </div>
                </div>
            </div>
         </div>
         <div class="col-lg-4 col-6">
             <div class="card bg-c-green total-card">
                <div class="card-block">
                    <div class="text-left">
                        <h4><?= number_format($jumlah['total_konsumen']); ?></h4>
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
<script type="text/javascript">
	// url
	var url = window.location.href;
	var url_2 = url.substring(0,url.lastIndexOf('/pengguna/'));
	// table
	var tabel;
    var tagHtml;
    var inputType = '';
    var user_id = '';
	// tag
	var tb_pengguna = $('#tb_pengguna');
	var type_user_id = $('#type_user_id');
    var modalSet = $('.modalSet');
    // Data Sementara 
    var dataTypeUser = [];
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
    // 
	let reloadData = () => {
		tabel.ajax.reload();
	}
    // 
    let modalTambah = () => {
        // 
        inputType = 'tambah';
        user_id = '';
        tagHtml = '';
        // 
        tagHtml = modalData('Tambah Pengguna', formTambah());
        modalSet.html(tagHtml);
        // 
        $('[name="user_nama"]').val('');
        $('[name="user_email"]').val('');
        $('[name="user_phone"]').val('');
        $('[name="user_password"]').val('');
        $('[name="type_user_id"]').val('');
        // 
        formUse();
        // 
        modalVisible();
    }
    //
    let modalVisible = (aksi = 'show') => {
        setTimeout(() => {
            $('#modalID').modal(aksi);
        }, 200);
    }
    // 
    let formUse = () => {
        let form = $('#form');
        form.on({
            submit: () => {
                if (form[0].checkValidity()) {
                    CustomNotification('Tunggu Sebentar!', 'Sedang menyimpan data pengguna', 'fa fa-user', 'inverse');
                    modalVisible('hide');
                    setTimeout((e) => {
                        simpanData();
                    }, 1000);
                }
                return false;
            }
        });
    }
    // 
    let modalEdit = (data) => {
        inputType = 'edit';
        user_id = data.user_id;
        tagHtml = '';
        // 
        tagHtml = modalData('Edit Pengguna', formTambah());
        modalSet.html(tagHtml);
        // 
        $('[name="user_nama"]').val(data.user_nama);
        $('[name="user_email"]').val(data.user_email);
        $('[name="user_phone"]').val(data.user_phone);
        $('[name="user_password"]').val('');
        $('[name="type_user_id"]').val(data.type_user_id);
        // 
        formUse();
        // 
        modalVisible();
    }
    // 
    let editClick = async (user_id = '') => {
        try {
            const {
                jasaprint
            } = await $.ajax({
                url: `${url_2}/pengguna/getPengguna/`,
                dataType: "JSON",
                data: {
                    user_id,
                },
                type: "GET",
            });
            if (jasaprint.status == 'success') {
                modalEdit(jasaprint.data);
            }
        } catch (e) {
            console.log(e);
        }
    }
    //
    var simpanData = async () => {
        // 
        let form = $('#form');
        var formData = new FormData(form[0]);
        formData.append('user_id', user_id);
        formData.append('type_input', inputType);
        formData.append('simpan', $('[name="simpan"]').val());
        // 
        try {
            const {
                jasaprint
            } = await $.ajax({
                url: `${url_2}/pengguna/simpan/`,
                data: formData,
                type: "POST",
                processData: false,
                contentType: false,
                dataType: "JSON",
            });
            _simpan(jasaprint);
        } catch (e) {
            console.log(e);
        }
    } 

    var _simpan = ({
        message,
        status
    }) => {
        if (status === 'success') {
            CustomNotification('Berhasil!', message, 'fa fa-check-circle', status);
        } else {
             CustomNotification('Gagal!', message, 'fa fa-times-circle', 'danger');
        }
        reloadData();
    }
</script>
<!-- Custom JS -->
<script src="<?=base_url('assets/custom_js/modal.custom.js')?>"></script>   
<script src="<?=base_url('assets/custom_js/notification.custom.js')?>"></script>    
<script src="<?=base_url('assets/custom_js/form.pengguna.custom.js')?>"></script>	