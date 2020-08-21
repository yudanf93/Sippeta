<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
</head>
<body>
	<table>
		<tr>
			<td>
				<center>
					<img src= http://demo.temanukai.com/assets/images/logo-perusahaan.png >
					<h2>Pembayaran SIP PETA Anda telah Diterima</h2> <br>
				</center>
			</td>
		</tr>

		<tr>
			<td>
				<ul>
					<li dir=>
						<p dir=>Nama : <?php echo $nama_pembayaran ?></p>
					</li>
					<li dir=>
						<p dir=>Berkas : <?php echo $nama_berkas ?></p>
					</li>
					<li dir=>
						<p dir=>Kode : <?php echo $kode_pembayaran ?></p>
					</li>
					<li dir=>
						<p dir=>Kode : <?php $date=date_create($tglbayar_pembayaran); echo date_format($date, 'd F Y'); ?></p>
					</li>
					<li dir=>
						<p dir=>Biaya : Rp. <?php echo number_format($nominal_pembayaran,'0',',',',') ?></p>
					</li>
					<li dir=>
						<p dir=>Email : <?php echo $email_user ?> </p>
					</li>
				</ul>

				<p>&nbsp;</p>

				<center>Kontak kami <br><br><b>email</b> : admin@sippeta.com <b>Telepon</b> : (0265) 7297930 <b>WA</b> : +6282231888840 &nbsp;</center>

			</td>
		</tr>

		<tr>
			<tr>
				<td style='background-color:#1c4597;color:white;' class='p-2'>  
					<center>
						<p class='align-center'>
							Copyright &copy SIPPETA 2020
						</p>
					</center>
				</td>
			</tr>
		</table>