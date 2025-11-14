<!DOCTYPE html>
<html>
<head>
	<title>Edit-page</title>
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width-device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body class="bg-white p-6 rounded-xl shadow-md card space-y-4 max-w-6xl mx-auto">
	<body class="py-8 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">CRUD DATA SISWA</h1>
            <p class="text-gray-600">Sistem Management Data Siswa</p>
        </div>

	<div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
		<div class="bg-blue-600 py-4 px-6">
                <h2 class="text-xl font-semibold text-white flex items-center">
                    <i class="fa-solid fa-pen px-4"></i>Edit Data Siswa
                </h2>
            </div>
	<?php
	include 'koneksi.php';
	$id = $_GET['id'];
	$data = mysqli_query($koneksi,"select * from siswa where id='$id'");
	while($d = mysqli_fetch_array($data)){
		?>
		<div class="p-6">
		<a href="../index.php" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-6 transition-colors duration-200">
                    <i class="fas fa-arrow-left mr-2"></i>Back
                </a>
		<form action="update.php" class="space-y-6" method="post">
			<div>
                <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">
                    <i class="fas fa-user text-blue-500 mr-2"></i>Nama :
                    </label>
                     <div class="mt-1 relative rounded-md shadow-sm">
						<input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                        <input type="text"  name="Nama" class="block w-full py-3 pl-4 pr-10 border border-gray-300 rounded-lg input-focus focus:ring-blue-500 focus:border-blue-500 transition duration-200" placeholder="Masukkan Nama..." value="<?php echo $d['Nama']; ?>">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                        </div>
                    </div>

					<div>
                        <label for="nis" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-id-card text-blue-500 mr-2"></i>NIS :
                        </label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input type="text" name="NIS" class="block w-full py-3 pl-4 pr-10 border border-gray-300 rounded-lg input-focus focus:ring-blue-500 focus:border-blue-500 transition duration-200" placeholder="Masukkan Nomor Induk Siswa..." value="<?php echo $d['NIS']; ?>">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-id-card text-gray-400"></i>
                            </div>
                        </div>
                    </div>

					<div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">
                            <i class="fas fa-home text-blue-500 mr-2"></i>Alamat :
                        </label>
                        <div class="mt-1">
                            <textarea rows="3" name="Alamat" class="block w-full py-3 px-4 border border-gray-300 rounded-lg input-focus focus:ring-blue-500 focus:border-blue-500 transition duration-200" placeholder="Masukkan Alamat..." value="<?php echo $d['Alamat']; ?>"></textarea>
                        </div>
                    </div>
					<div class="pt-4">
                        <button type="submit" class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-200">
                            <i class="fas fa-save mr-2"></i>SIMPAN
                        </button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php 
	}
	?>
</body>
</html>