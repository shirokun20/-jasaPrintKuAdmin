var dataTypeUser = [];
$(() => {
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
})

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