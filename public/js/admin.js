document.addEventListener('DOMContentLoaded', function() {
    console.log('Alia Cookies Admin System Ready!');

    // PROFIL
    const profileBtn = document.getElementById('profileBtn');
    const profileMenu = document.getElementById('profileMenu');

    if (profileBtn && profileMenu) {
        profileBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            profileMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', function() {
            profileMenu.classList.add('hidden');
        });
    }

    // GREETING
    const greetingElement = document.querySelector('h1');
    if (greetingElement && (greetingElement.innerText.includes('Selamat Datang') || greetingElement.innerText.includes('Hello'))) {
        const hour = new Date().getHours();
        let timeGreeting = "";

        if (hour < 11) timeGreeting = "Selamat Pagi";
        else if (hour < 15) timeGreeting = "Selamat Siang";
        else if (hour < 19) timeGreeting = "Selamat Sore";
        else timeGreeting = "Selamat Malam";

        const currentText = greetingElement.innerText;
        greetingElement.innerText = currentText.replace(/Selamat Datang|Hello/g, timeGreeting);
    }

    // SEARCH & FILTER (PENGELOLAAN)
    const searchBar = document.getElementById('searchBar');
    const filterCategory = document.getElementById('filterCategory');
    const rows = document.querySelectorAll('.product-row');

    function filterTable() {
        if (!searchBar || !filterCategory) return;

        const searchText = searchBar.value.toLowerCase();
        const category = filterCategory.value.toLowerCase();

        rows.forEach(row => {
            const productName = row.querySelector('.product-name').innerText.toLowerCase();
            const productCategory = row.getAttribute('data-category').toLowerCase();

            const matchesSearch = productName.includes(searchText);
            const matchesCategory = category === 'all' || productCategory === category;

            if (matchesSearch && matchesCategory) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    if(searchBar) searchBar.addEventListener('input', filterTable);
    if(filterCategory) filterCategory.addEventListener('change', filterTable);

    // FEEDBACK TABEL
    const tableRows = document.querySelectorAll('tbody tr');
    tableRows.forEach(row => {
        row.addEventListener('click', function() {
            tableRows.forEach(r => {
                r.classList.remove('bg-[#FDF5E6]');
                r.style.backgroundColor = '';
            });
            this.style.backgroundColor = '#FDF5E6';
        });
    });

    // LOGOUT
    const logoutLinks = document.querySelectorAll('a[href="/"]');
    logoutLinks.forEach(btn => {
        btn.addEventListener('click', function(e) {
            if(!confirm('Apakah kamu yakin ingin keluar dari Dapur Alia Cookies?')) {
                e.preventDefault();
            }
        });
    });
});
