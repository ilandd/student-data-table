<!DOCTYPE html>
<head>
	<title>Tabel Data Siswa</title>
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="<?php echo 'style.css'; ?>">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
        .sidebar {
            transition: all 0.3s ease;
        }
        .header {
            transition: all 0.3s ease;
        }
        .logo-text {
            transition: opacity 0.2s ease;
        }
    </style>
<body class="bg-gray-100 min-h-screen flex">
    <div class="sidebar bg-blue-800 text-white w-64 min-h-screen flex flex-col justify-between py-4">
        <div>
            <div class="flex items-center px-4 py-2">
                <div class="w-10 h-10 bg-white rounded-md flex items-center justify-center">
                    <i class="fas fa-user text-gray-800 font-bold text-xl"></i>
                </div>
                <span class="logo-text ml-3 font-semibold">Beranda</span>
            </div>
            <nav class="mt-6">
                <a href="#dashboard" class="flex items-center px-6 py-3 text-gray-200 hover:bg-blue-700">
                    <i class="fas fa-home w-6 text-center"></i>
                    <span class="logo-text ml-3">Dashboard</span>
                </a>
            </nav>
            <a href="add/tambah.php" class="flex items-center px-6 py-3 text-gray-200 hover:bg-blue-700">
                <i class="fas fa-plus w-6 text-center"></i>
                <span class="logo-text ml-3">Tambah</span>
            </a>
            <a href="sidebar/contact.html" class="flex items-center px-6 py-3 text-gray-200 hover:bg-blue-700">
                <i class="fas fa-phone w-6 text-center"></i>
                <span class="logo-text ml-3">Kontak</span>
            </a>
            <a href="sidebar/kalkulator.html" class="flex items-center px-6 py-3 text-gray-200 hover:bg-blue-700">
                <i class="fas fa-calculator w-6 text-center"></i>
                <span class="logo-text ml-3">Kalkulator</span>
            </a>
        </div>
    </div>
    <div class="flex-1 flex flex-col" id="mainWrapper">
        <header id="mainHeader" class="header bg-white shadow-sm py-4 px-6 flex justify-between items-center ml-0 transition-all duration-300" style="margin-top:0;">
            <button id="toggleSidebar" class="text-gray-700 focus:outline-none">
                <i class="fas fa-bars text-xl"></i>
            </button>            
            <div class="search-bar-floating">
                <form action="" class="search-form flex justify-center" method="get">
                    <input type="text" name="cari" placeholder="Search..." class="search-input rounded-[20px] shadow-[0_2px_10px_rgba(0,0,0,0.5)] p-[15px_25px] border-none mr-4" value="<?php echo isset($_GET['cari']) ? htmlspecialchars($_GET['cari']) : ''; ?>">
                    <button type="submit" class="search-btn bg-blue-400 text-white rounded-[30px] shadow-[0_2px_10px_rgba(0,0,0,0.5)] p-[15px_25px] border-none">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </header>
        <div class="h-20"></div>
<?php 
include 'koneksi.php';
$no = 1;
if(isset($_GET['cari']) && $_GET['cari'] != ''){
    $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
    $data = mysqli_query($koneksi,"SELECT * FROM siswa WHERE Nama LIKE '%$cari%' OR NIS LIKE '%$cari%' OR Alamat LIKE '%$cari%'");
} else {
    $data = mysqli_query($koneksi,"SELECT * FROM siswa");
}
?>
<main id="mainContent" class="flex-1 flex flex-col p-2 sm:p-4 lg:p-6 max-w-full mx-auto transition-speed">
    <section id="dashboard">
        <div class="overflow-x-auto">
            <table class="w-full max-w-[99vw] mx-auto text-center mb-8 font-times-new-roman rounded-[10px] border-collapse table-auto shadow-[0_4px_15px_rgba(0,0,0,0.1)] text-[1.5rem] bg-white overflow-hidden shadow-[0_5px_20px_rgba(0,0,0,0.1)]">
                <tr class="text-[1.1rem]">
                    <th class="bg-gradient-to-b from-[#3498db] to-[#2980b9] text-white font-semibold sticky top-0 cursor-pointer select-none p-[10px]">NO</th>
                    <th class="bg-gradient-to-b from-[#3498db] to-[#2980b9] text-white font-semibold sticky top-0 cursor-pointer select-none p-[10px]">Nama</th>
                    <th class="bg-gradient-to-b from-[#3498db] to-[#2980b9] text-white font-semibold sticky top-0 cursor-pointer select-none p-[10px]">NIS</th>
                    <th class="bg-gradient-to-b from-[#3498db] to-[#2980b9] text-white font-semibold sticky top-0 cursor-pointer select-none p-[10px]">Alamat</th>
                    <th class="bg-gradient-to-b from-[#3498db] to-[#2980b9] text-white font-semibold sticky top-0 cursor-pointer select-none p-[10px]">OPSI</th>
                </tr>
                <?php 
                while($d = mysqli_fetch_array($data)){
                ?>
                <tr class="even:bg-[#f2f2f2] hover:bg-[#e6e6e6] transition-colors duration-200">
                    <td class="m-[5px] p-[10px]"><?php echo $no++; ?></td>
                    <td class="m-[5px] p-[10px]"><?php echo $d['Nama']; ?></td>
                    <td class="m-[5px] p-[10px]"><?php echo $d['NIS']; ?></td>
                    <td class="m-[5px] p-[10px]"><?php echo $d['Alamat']; ?></td>
                    <td class="m-[5px] p-[10px]">
                        <a href="modify/edit.php?id=<?php echo $d['id']; ?>"><i class="fa-solid fa-pen"></i></a>
                        <a href="modify/hapus.php?id=<?php echo $d['id']; ?>"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                <?php 
                }
                ?>
            </table>
        </div>
    </section>
</main>
<?php
echo 
"<script>
document.getElementById('toggleSidebar').addEventListener('click', function() {
            const sidebar = document.querySelector('.sidebar');
            const header = document.querySelector('.header');
            const mainContent = document.querySelector('main');
            const logoTexts = document.querySelectorAll('.logo-text');
            
            if (sidebar.classList.contains('w-64')) {
                sidebar.classList.remove('w-64');
                sidebar.classList.add('w-20');
                header.classList.remove('ml-0');
                header.classList.add('ml-0');
            } else {
                sidebar.classList.remove('w-20');
                sidebar.classList.add('w-64');
                header.classList.remove('ml-0');
                header.classList.add('ml-0');
            }
            
            logoTexts.forEach(text => {
                text.classList.toggle('hidden');
            });
        });
</script>"
?>
</body>
</html>