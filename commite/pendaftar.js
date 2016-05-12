$(document).ready(function(){
	var Table = $('#data_pendaftar').DataTable({
		"ajax": "function.php?action=data_pendaftar",
		"Processing": true,
		"ServerSide": true,
		"columns": 
		[
		{ 
			"data": "username",
			"width": '10%',
			"render": function(data){
				return '<h6>'+data+'<h6>';
			}
		},
		{ 
			"data": "nama_sekolah",
			"render": function(data){
				return '<h6>'+data+'</h6>';
			}
		},
		{ 
			"data": "phone",
			"render": function(data){
				return '<h6>'+data+'</h6>';
			}
		},
		{ 
			"data": null,
			"width": '10%',
			"render": function(data){
				return '<h6>'+upload(data)+'</h6>';
			}
		},
		{ 
			"data": null,
			"width": '10%',
			"render": function(data){
				return '<h6>'+konfirmasi(data)+'</h6>';
			}
		},
		{ 
			"data": "tanggal_daftar",
			"width": '10%',
			"render": function(data){
				return '<h6>'+data+'</h6>';
			}
		},
		{ 
			"data": null,
			"width": '15%',
			"render": function(data){
				return '<h6>'+opsi(data)+'</h6>';
			}
		}

		]
	});

	$('#data_pendaftar tbody').on('click', '.cek-upload', function(){
		$('#mdl_konfirmasi').modal('show');
		var datas  = Table.row( $(this).parents('tr') ).data();
		var x=document.getElementById('rincian-kompetisi').rows;
		var y=x[1].cells;
		y[0].innerHTML=datas["jumlah_speech"];
		y[1].innerHTML=datas["jumlah_debate"];
		y[2].innerHTML=datas["jumlah_story_telling"];

		document.getElementById('id').value=datas["id"];
		document.getElementById('username').value=datas["username"];
		document.getElementById('status_konfirmasi').value=datas["konfirmasi"];
		document.getElementById('image-upload').src=datas["image_payment"];
		if (datas["konfirmasi"]==0) {
			document.getElementById('konfirmasi-btn').value="konfirmasi";
		} else if (datas["konfirmasi"]==1) {
			document.getElementById('konfirmasi-btn').value="Batal Konfirmasi";
		};
	});

	$('#hapus-image-btn').on('click', function(){
	    var konfirmasi = document.getElementById('status_konfirmasi').value;
	    var data = $('#form-konfirmasi').serialize();

		if (konfirmasi == 1) {
			alert("anda harus membatalkan konfirmasi terlebih dahulu sebelum menghapus payment proof");
		} else {
			if (confirm("apakah anda yakin akan menghapus payment proof peserta?")) {
				$.ajax({
		    		type: "POST",
		    		url: "function.php?action=hapus_upload",
		    		data: data,
		    		success: function(msg){
		            	var respons = JSON.parse(msg)
		            	alert(respons.message);
		            },
		            error: function(msg){
		            	alert("Gagal menghapus payment proof. code: 11011CS");
		            }
		    	}).done(function(data){
	         		Table.ajax.reload( null, false );
					$('#mdl_konfirmasi').modal('hide');
		    	});
			}
		}
	});

	$('#form-konfirmasi').on('submit', function(e){
		e.preventDefault();
	    var data = $(this).serialize();
	    var konfirmasi = document.getElementById('status_konfirmasi').value;
	    if (confirm("apakah yakin akan mengubah status konfirmasi?")) {
			$("#konfirmasi-btn").addClass("disabled");

		    if (konfirmasi == 1) {
		    	$.ajax({
		    		type: "POST",
		    		url: "function.php?action=batal_konfirmasi",
		    		data: data,
		    		success: function(msg){
		            	var respons = JSON.parse(msg)
		            	alert(respons.message);
		            },
		            error: function(msg){
		            	alert("Gagal mengubah status konfirmasi. code: 11011CS");
		            }
		    	}).done(function(data){
	         		Table.ajax.reload( null, false );
					$('#mdl_konfirmasi').modal('hide');
					$("#konfirmasi-btn").removeClass("disabled");

		    	});
		    } else {
		    	$.ajax({
		    		type: "POST",
		    		url: "function.php?action=konfirmasi",
		    		data: data,
		    		success: function(msg){
		            	var respons = JSON.parse(msg)
		            	alert(respons.message);
		            },
		            error: function(msg){
		            	alert("Gagal mengubah status konfirmasi. code: 11001CS");
		            }
		    	}).done(function(data){
	         		Table.ajax.reload( null, false );
					$('#mdl_konfirmasi').modal('hide');
					$("#konfirmasi-btn").removeClass("disabled");

		    	});
		    }
	    }

	});

	function upload(data){
		if (data["upload"]== 1) {
	  		return '<button class="btn btn-success btn-xs cek-upload" data-toggle="tooltip" data-placement="bottom" title="to setting registration">Sudah</button>';
		} else {
			return 'belum';
		}
	}

	function konfirmasi(data){
		if (data["upload"] == 0 ) {
			return '<span class="label label-danger">Belum Upload</span>';
		}

		if (data["konfirmasi"]==1) {
			return '<span class="label label-success">Sudah</span>';
		} else {
			return '<span class="label label-warning">Belum</span>';
		}
	}

	function opsi(data){
		var a = '<button class="btn btn-warning btn-xs reset-btn" data-toggle="tooltip" data-placement="bottom" title="untuk mereset password">reset password</button> ';
		var b = '<button class="btn btn-danger btn-xs hapus-btn" data-toggle="tooltip" data-placement="bottom" title="untuk menghapus akun">hapus</button>';
		return a+b;
	}

	$('#data_pendaftar tbody').on('click', '.reset-btn', function(){
		var datas  = Table.row( $(this).parents('tr') ).data();
		var data = 'username='+datas["username"]+'&id='+datas['id'];

		if (confirm("Apakah yakin akan me-reset pasword akun "+datas["username"])) {
			$.ajax({
				type: "POST",
				url: "function.php?action=reset_password",
				data: data,
				success: function(msg){
					var respons = JSON.parse(msg)
					alert(respons.message);
				},
				error: function(msg){
					alert("Gagal me-reset password. code: 11011CS");
				}
			}).done(function(data){
				Table.ajax.reload( null, false );
			});
		}
	});

	$('#data_pendaftar tbody').on('click', '.hapus-btn', function(){
		var datas  = Table.row( $(this).parents('tr') ).data();
		var data = 'username='+datas["username"]+'&id='+datas['id'];

		if (confirm("Apakah yakin akan menghapus akun "+datas["username"])) {
			$.ajax({
				type: "POST",
				url: "function.php?action=delete_akun",
				data: data,
				success: function(msg){
					var respons = JSON.parse(msg)
					alert(respons.message);
				},
				error: function(msg){
					alert("Gagal menghapus akun. code: 11011CS");
				}
			}).done(function(data){
				Table.ajax.reload( null, false );
			});
		}
	});

});