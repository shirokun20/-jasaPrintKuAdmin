<div>
	<div class="row" style="margin-bottom: 10px;">
		<div class="col-12 col-sm-3">
			<a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="return window.history.back();">
        		<i class="fa fa-arrow-left"></i> Kembali
        	</a>
		</div>
	</div>
	<div class="row">
		<div class="col-12 col-lg-12">
			<div class="card">
			    <div class="card-header">
			        <h5>Info Pemesanan</h5>
			    </div>
			    <div class="card-block no-padding">
			    	<div class="table-responsive">
			    		<table class="table table-bordered" width="100%">
			    			<thead>
			    				<tr>
				    				<th>INVOICE</th>
				    				<th class="text-center">:</th>
				    				<th class="text-right" style="font-weight: bold;">JASAPRINT/02/18012020/00001</th>
				    				<th>Tanggal Pemesanan</th>
				    				<th class="text-center">:</th>
				    				<th class="text-right" style="font-weight: bold;">18/01/2020</th>
				    			</tr>
			    			</thead>
			    		</table>
			    	</div>
			    </div>
			</div>
		</div>
		<div class="col-12 col-lg-12">
			<div class="card">
			    <div class="card-header">
			        <h5>Detail <i>File</i> pemesanan</h5>
			        <div class="float-right">
			        	<a href="javascript:void(0)" class="btn btn-primary btn-sm" id="btnTFile">
        					<i class="fa fa-plus"></i> Tambah File
        				</a>
			        </div>
			    </div>
			    <form id="formFile">
				    <?php  
		        		$this->shiro_lib->page('admin/transaksi/pemesanan/vPemesananInputFile');
		        	?>
			    </form>
			    <div class="card-block">
			    	<div class="table-responsive">
			    		<table class="table table-hover" width="100%">
			    			<thead>
			    				<tr>
			    					<th>#</th>
			    					<th title="Nama File/Url (yang mengirimkan filenya berupa google driver)" data-toggle="tooltip">Nama/Url</th>
			    					<th title="Jenis Print (Warna/Non Warna)" data-toggle="tooltip">Jenis</th>
			    					<th>Size (MB)</th>
			    					<th title="Halaman berapa saja yang di print!" data-toggle="tooltip">Halaman</th>
			    					<th title="Jumlah Halaman" data-toggle="tooltip">Total</th>
			    					<th title="Keterangan" data-toggle="tooltip">Ket</th>
			    					<th>Aksi</th>
			    				</tr>
			    			</thead>
			    		</table>
			    	</div>
			    </div>
			</div>
		</div>
		<div class="col-12 col-lg-8">
			<div class="card">
			    <div class="card-header">
			        <h5>Info Pembayaran</h5>
			    </div>
			    <div class="card-block no-padding">
			    	<div class="table-responsive">
			    		<table class="table table-bordered" width="100%">
			    			<thead>
			    				<tr>
				    				<th>Total Print Warna</th>
				    				<th class="text-center">:</th>
				    				<th class="text-right" style="font-weight: bold;">(<span class="totalHalamanWarna">0</span> x <span class="Print_Warna_Harga">0</span>) Rp.0,00</th>
				    			</tr>
				    			<tr>
				    				<th>Total Print Hitam/Putih</th>
				    				<th class="text-center">:</th>
				    				<th class="text-right" style="font-weight: bold;">(<span class="totalHalamanHP">0</span> x <span class="Print_Hitam_Putih_Harga">0</span>) Rp.0,00</th>
				    			</tr>
				    			<tr>
				    				<th>Total yang harus dibayar</th>
				    				<th class="text-center">:</th>
				    				<th class="text-right" style="font-weight: bold;">Rp.0,00</th>
				    			</tr>
				    		</thead>
			    		</table>
			    	</div>
			    </div>
			</div>
		</div>
	</div>
</div>
<!-- Notifikasi local -->
<link rel="stylesheet" href="<?=base_url('assets/pages/notification/notification.css')?>">
<script type="text/javascript" src="<?=base_url()?>assets/js/bootstrap-growl.min.js"></script>
<script src="<?=base_url('assets/custom_js/notification.custom.js')?>"></script>    
<!-- package/plugin -->
<script src="<?=base_url('assets/js/pdfjs/build/pdf.js')?>"></script>
<!--  -->
<script type="text/javascript">
	// url
	var url = window.location.href;
	var url_2 = url.substring(0,url.lastIndexOf('/transaksi/'));
	// tag
	let cardFormFile = $('#cardFormFile'),
		formFile = $('#formFile'),
		// untuk info pembayaran
		$thw = $('.totalHalamanWarna'),
		$thhp = $('.totalHalamanHP'),
		$pwh = $('.Print_Warna_Harga'),
		$phph = $('.Print_Hitam_Putih_Harga'),
		// untuk tag data sementara
		$ths = $('.ths'),
		$hps = $('.hps'),
		$tbps = $('.tbps'),
		// 
		selectFileOrUrl = $('[name="selectFileOrUrl"]'),
		urlInput = $('[name="url"]'),
		fileInput = $('[name="upload"]'),
		detailFileSize = $('[name="detail_file_size"]'),
		detailFileTotalPages = $('[name="detail_file_total_pages"]'),
		sHalamanPrintTypeId = $('[name="halamanPrintTypeId"]'),
		sPrintTypeId = $('[name="printTypeId"]'),
		detailFilePrintPagesText = $('[name="detailFilePrintPagesText"]'),
		urlForm = $('#urlInput'),
		fileForm = $('#fileInput'),
		sliderDFPPT = $('#sliderDFPPT'),
		btnTFile = $('#btnTFile');
	// 
	var totalHalaman = 0;
	// Untuk info pembayaran
	var printWarnaPrice = 0;
	var printHitamPutihPrice = 0;
	var totalHalamanPWarna = 0;
	var totalHalamanPHP = 0;
	// Untuk data sementara 
	var totalBiayaSementara = 0;
	// 
	var typingTimer;
	var doneTypingInterval = 1000;
	// 
	var dataItemSementara = new Array();
	// 
	pdfjsLib.GlobalWorkerOptions.workerSrc = "./../../../../assets/js/pdfjs/build/pdf.worker.js";
	//  Ready Function 
	$(() => {
		getDataWarnaPrice();
		setDefault();
		setDefaultDataSementara();
	});
	// 
	let setDefault = () => {
		$thw.text(totalHalamanPWarna);
		$thhp.text(totalHalamanPHP);
		$pwh.text(printWarnaPrice);
		$phph.text(printHitamPutihPrice);
		detailFileTotalPages.val(totalHalaman);
	}
	// 
	let setDefaultDataSementara = () => {
		var totalHalamanPrintSementara = 0;
		totalBiayaSementara = 0;
		// 
		if (sHalamanPrintTypeId.val() == '1') {
			totalHalamanPrintSementara = totalHalaman;
		} else if (sHalamanPrintTypeId.val() == '2') {
			totalHalamanPrintSementara  = dataItemSementara.length;
			console.log(dataItemSementara);
		}
		// 
		var hargaPrintSementara = 0;
		if (sPrintTypeId.val() == '1') {
			hargaPrintSementara = printWarnaPrice;
		} else if (sPrintTypeId.val() == '2') {
			hargaPrintSementara  = printHitamPutihPrice;
		}
		// 
		totalBiayaSementara = (totalHalamanPrintSementara * hargaPrintSementara);
		// 
		$hps.text(hargaPrintSementara);
		$ths.text(totalHalamanPrintSementara);
		$tbps.text(`${toRupiah(totalBiayaSementara)}`);
	}
	// 
	let _setDefaultDataSementara = () => {
		 if (sHalamanPrintTypeId.val() == '1' && sPrintTypeId.val() != '') {
		 	CustomNotification('Tunggu Sebentar!', 'Sedang menghitung total biaya print item yang akan ditambahkan!', 'fa fa-print', 'inverse');
		 	setTimeout(() => setDefaultDataSementara(), 1000);
		 } else if (sHalamanPrintTypeId.val() == '2' && sPrintTypeId.val() != '' && dataItemSementara.length > 0) {
		 	CustomNotification('Tunggu Sebentar!', 'Sedang menghitung total biaya print item yang akan ditambahkan!', 'fa fa-print', 'inverse');
		 	setTimeout(() => setDefaultDataSementara(), 1000);
		 } else {
		 	setDefaultDataSementara();
		 }
	}
	// 
	let setDefaultFormAndSlider = () => {
		urlForm.slideUp('slow');
		fileForm.slideUp('slow');
		sliderDFPPT.slideUp('slow');
		// 
		urlInput.prop({
			required: false,
		});
		fileInput.prop({
			required: false,
		});
		detailFilePrintPagesText.prop({
			required: false,
		});
		// 
		detailFileSize.prop({
			readonly: true,
		});
		detailFileTotalPages.prop({
			readonly: true,
		});
		// 
		detailFileSize.val('');
		detailFileTotalPages.val('');
		fileInput.val('');
		urlInput.val('');
		detailFilePrintPagesText.val('');
		sHalamanPrintTypeId.val('');
	}
	// 
	let setDefaultsliderDFPPT = () => {
		dataItemSementara = [];
		sliderDFPPT.slideUp('slow');
		// 
		detailFilePrintPagesText.prop({
			required: false,
		});
		// 
		detailFilePrintPagesText.val('');
	}
	// ambil harga per jenis print
	let getDataWarnaPrice = async () => {
		try {
			const {
				jasaprint
			} = await $.ajax({
				url: url_2 + '/setting/atur_harga/ambilDataHarga/',
				type: "GET",
				dataType: "JSON",
			});
			if (jasaprint.status == "success") {
				printWarnaPrice = jasaprint.data.hargaPrintWarna;
				printHitamPutihPrice = jasaprint.data.hargaPrintHP;
			}
		} catch (e) {
			console.log(e);
		}

		setTimeout(() => setDefault(), 1000);
	}
	// 
	formFile.on({
		submit: () => {
			return false;
		}
	})
	// 
	btnTFile.on({
		click: () => {
			cardFormFile.slideToggle('slow');
			formFile[0].reset();
			_selectFileOrUrl();
		}
	});
	// 
	selectFileOrUrl.on({
		change: () => {
			 _selectFileOrUrl();
		}
	});
	// 
	sHalamanPrintTypeId.on({
		change: () => {
			_sHalamanPrintTypeId();
		}
	});
	// 
	sPrintTypeId.on({
		change: () => {
			_setDefaultDataSementara();
		}
	})
	// 
	detailFilePrintPagesText.on({
		keyup: () => {
			if (totalHalaman > 0) {
				clearTimeout(typingTimer);
				typingTimer = setTimeout(() => onSetChangeData((obj) => {
					dataItemSementara = obj.data;
			        setTimeout(() => detailFilePrintPagesText.val(obj.text), doneTypingInterval);
					_setDefaultDataSementara();
				}, detailFilePrintPagesText.val()), doneTypingInterval);
			}
		},
		keydown: () => {
			clearTimeout(typingTimer);
		}
	});
	// 
	detailFileTotalPages.on({
		keyup: () => {
			totalHalaman = detailFileTotalPages.val();
		}
	})
	//
	let _sHalamanPrintTypeId = () => {
		setDefaultsliderDFPPT();
		if (sHalamanPrintTypeId.val() == '2') {
			sliderDFPPT.slideDown('slow');
			detailFilePrintPagesText.prop({
				required: true,
			});
		} 
		
		_setDefaultDataSementara();
	} 
	// 
	let _selectFileOrUrl = () => {
		// 
		setDefaultFormAndSlider();
		// 
		if (selectFileOrUrl.val() == '1') {
			fileForm.slideDown('slow');
			fileInput.prop({
				required: true,
			});
		} else if (selectFileOrUrl.val() == '2') {
			urlForm.slideDown('slow');
			urlInput.prop({
				required: true,
			});
			detailFileSize.prop({
				readonly: false,
			});
			detailFileTotalPages.prop({
				readonly: false,
			});
		} 
	}

	fileInput.on({
		change: (e) => {
			totalHalaman = 0;
			var file = fileInput[0].files[0];
			if (!file) {
		      return;
		    } else {
	    	  CustomNotification('Tunggu Sebentar!', 'Sedang menghitung jumlah halaman dan Ukuran file!', 'fa fa-print', 'inverse');
		      _readFile(file);
		    }
		}
	});

	let _readFile = (file) => {
		_fileInputSize(file.size);
		var fileReader = new FileReader();
		// 
	    fileReader.onload = function (e) {
    	  const data = e.target.result;
	      readPDFFile(new Uint8Array(data));
	    };
	    // 
	    fileReader.readAsArrayBuffer(file);

	    setTimeout((e) => setDefault(), 1000);
	}

	let readPDFFile = (pdf) => {
	  pdfjsLib.getDocument({data: pdf}).promise.then(function(doc) {
	  	totalHalaman = doc.numPages;
	  });
	}

	let _fileInputSize = (value) => {
		// 
		var _size = value;
        var fSExt = new Array('Bytes', 'KB', 'MB', 'GB'),
    	i=0;
    	while(_size>900) {
    		_size/=1024;
    		i++;
    	}
        var exactSize = (Math.round(_size*100)/100)+' '+fSExt[i];
        // 
        detailFileSize.val(exactSize);
        
	}
</script>
<script>
	const onSetChangeData = (cb, value = '') => {
        var check = value.toString();
        var toData = '';
        var obj = new Object();
        if (check.match(',') != null) {
            const hasil = check.split(',') || new Array();
            var setArray = new Array();
            hasil.map((e) => {
                var angka = Number(e) || 0;
                var dataCheck = setArray.filter((e) => {
                	return e == angka;
                });
                if ((angka > 0) && (dataCheck.length < 1) && (setArray.length <= totalHalaman) && (angka <= totalHalaman)) {
                    setArray.push(angka);
                }
            });
            obj.data = setArray;
            obj.text = setArray.toString();
        } else if (check.match(' sd ') != null) {
            const hasil = check.split(' sd ') || new Array();
            var setArray = new Array();
            if (hasil.length > 1) {
                var angka1 = Number(hasil[0]) || 0;
                var angka2 = Number(hasil[1]) || 0;
                if (angka2 <= totalHalaman) {
                    for (let index = angka1; index <= angka2; index++) {
                        setArray.push(index);
                    }
                    obj.data = setArray;
                    obj.text = value;
                }
            }
        } else if (Number(value) <= totalHalaman && value != '') {
            var setArray = new Array();
        	setArray.push(Number(value));
        	obj.data = setArray;
            obj.text = value;
        } else {
        	obj.data = [];
            obj.text = '';
        }
        cb(obj);
        // console.log(obj.text);
        // toData = JSON.stringify(obj);
        // console.log(toData.toString());
    }
    // 
    const toRupiah = (angka = 0) => {
    	var rupiah = '';		
		var angkarev = angka.toString().split('').reverse().join('');
		for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
		return 'Rp. '+rupiah.split('',rupiah.length-1).reverse().join('');
    }
</script>