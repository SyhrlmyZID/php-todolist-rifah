// JS Toogle sidebar responfife ukuran handphone
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('-translate-x-full');
}

// JS dropdown pada navbar
const adminBtn = document.getElementById('adminBtn');
const dropdown = document.getElementById('dropdown');

document.addEventListener('click', function (e) {
    if (!adminBtn.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.classList.add('hidden');
    }
});
adminBtn.addEventListener('click', function () {
    dropdown.classList.toggle('hidden');
});

// JS flatpickr untuk mengambil tanggal dari edit_tugas.php
flatpickr("#deadline", { enableTime: false, dateFormat: "Y-m-d" });