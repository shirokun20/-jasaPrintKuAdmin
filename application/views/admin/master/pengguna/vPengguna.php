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
                    <!-- <li>
                    	<i class="fa fa-window-maximize full-card"></i>
                    </li> -->
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
<!--  -->
<link rel="stylesheet" href="<?=base_url('assets/js/datatables/css/dataTables.bootstrap4.min.css')?>">
<!--  -->
<script src="<?=base_url('assets/js/datatables/js/jquery.dataTables.min.js')?>"></script>
<!--  -->
<script src="<?=base_url('assets/js/datatables/js/dataTables.bootstrap4.min.js')?>"></script>
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
        dataTypeUser.push({
            type_user_id: '',
            type_user_nama: 'Pilih Jenis Pengguna',  
        });
        dataTypeUser.push({
            type_user_id: '1',
            type_user_nama: 'Admin',  
        });
        dataTypeUser.push({
            type_user_id: '2',
            type_user_nama: 'Konsumen',  
        });
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

    let formTambah = () => {
        output = '<form id="form">';
        // Input Nama
        output += '<div class="form-group">';
            output += '<label>Nama *</label>';
            output += '<input type="text" name="user_nama" class="form-control" placeholder="Masukan Nama.." required>';
        output += '</div>';
        // Email
        output += '<div class="form-group">';
            output += '<label>Email *</label>';
            output += '<input type="text" name="user_email" class="form-control" placeholder="Masukan Email.." required>';
        output += '</div>';
        // Phone
        output += '<div class="form-group">';
            output += '<label>No.Hp *</label>';
            output += '<input type="text" name="user_phone" class="form-control" placeholder="Masukan No.Hp.." required>';
        output += '</div>';
        // Password
        output += '<div class="form-group">';
            output += `<label>Password ${(inputType == 'tambah') ? '*' : ''}</label>`;
            output += `<input type="password" name="user_password" class="form-control" placeholder="Masukan Password.." ${(inputType == 'tambah') ? 'required' : ''}>`;
        output += '</div>';
        // Type User
        output += '<div class="form-group">';
            output += '<label>Jenis Pengguna *</label>';
            output += '<select name="type_user_id" class="custom-select" required>';
            dataTypeUser.map((e, index) => {
                output += `<option value="${e.type_user_id}">${e.type_user_nama}</option>`;
            })
            output += '</select>';
        output += '</div>';
        //  Button
        output += '<input type="submit" name="simpan" class="btn btn-success pull-right" value="Simpan">';
        output += '</form>';
        return output;
    }

    let modalTambah = () => {
        inputType = 'tambah';
        user_id = '';
        tagHtml = modalData('Tambah Pengguna', formTambah());
        modalSet.append(tagHtml);
        $('[name="user_nama"]').val('');
        $('[name="user_email"]').val('');
        $('[name="user_phone"]').val('');
        $('[name="user_password"]').val('');
        $('[name="type_user_id"]').val('');
        $('#form').on({
            submit: () => {
                return false;
            }
        });
        setTimeout(() => {
            $('#modalID').modal('show');
        }, 200);
    }

    let modalEdit = (data) => {
        inputType = 'edit';
        tagHtml = modalData('Edit Pengguna', formTambah());
        modalSet.append(tagHtml);
        $('[name="user_nama"]').val(data.user_nama);
        $('[name="user_email"]').val(data.user_email);
        $('[name="user_phone"]').val(data.user_phone);
        $('[name="user_password"]').val('');
        $('[name="type_user_id"]').val(data.type_user_id);
        $('#form').on({
            submit: () => {
                return false;
            }
        });
        setTimeout(() => {
            $('#modalID').modal('show');
        }, 200);
    }

    let editClick = async (user_id = '') => {
        try {
            const {
                jasaprint
            } = await $.ajax({
                url: url_2 + '/pengguna/getPengguna/',
                dataType: "JSON",
                data: {
                    user_id,
                },
                type: "GET",
            });
            if (jasaprint.status == 'success') {
                user_id = user_id;
                modalEdit(jasaprint.data);
            }
        } catch (e) {
            console.log(e);
        }
    }
</script>
<!--  -->
<script src="<?=base_url('assets/custom_js/modal.custom.js')?>"></script>	