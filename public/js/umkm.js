document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.umkm-cat');
    const cards = document.querySelectorAll('.umkm-card');

    function filterCards(filterKeyword) {
        if (!filterKeyword) return;

        cards.forEach(card => {
            const kategoriKartu = card.getAttribute('data-kategori').toLowerCase().trim();
            const filter = filterKeyword.toLowerCase().trim();

            if (filter === 'all') {
                card.style.display = '';
            } else if (kategoriKartu.includes(filter) || filter.includes(kategoriKartu)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    }

    buttons.forEach(btn => {
        btn.addEventListener('click', () => {
            buttons.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            
            const filter = btn.getAttribute('data-filter');
            filterCards(filter);
        });
    });

    const initialActiveBtn = document.querySelector('.umkm-cat.active');
    if (initialActiveBtn) {
        filterCards(initialActiveBtn.getAttribute('data-filter'));
    }
});