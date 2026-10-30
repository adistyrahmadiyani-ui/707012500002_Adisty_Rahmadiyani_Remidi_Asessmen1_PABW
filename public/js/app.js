document.addEventListener('DOMContentLoaded', function () {
    // 1. Menu navigasi untuk layar kecil
    var toggle = document.getElementById('navToggle');
    var nav = document.getElementById('siteNav');
    if (toggle && nav) {
        toggle.addEventListener('click', function () {
            var open = nav.classList.toggle('open');
            toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
    }

    // 2. Animasi muncul saat elemen terlihat
    var items = document.querySelectorAll('.reveal');
    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        items.forEach(function (el) { observer.observe(el); });
    } else {
        items.forEach(function (el) { el.classList.add('visible'); });
    }

    // 3. Pratinjau status mikroklimat pada form (logika yang sama dengan Controller)
    var tanah = document.getElementById('kelembapan_tanah');
    var preview = document.getElementById('statusPreview');
    var defaultText = preview ? preview.textContent : '';

    function updatePreview() {
        if (!tanah || !preview) { return; }
        var value = tanah.value.trim();
        preview.className = 'preview';

        if (value === '' || isNaN(Number(value))) {
            preview.textContent = defaultText;
            return;
        }

        var nilai = Number(value);
        if (nilai < 40) {
            preview.classList.add('p-kering');
            preview.textContent = 'Pratinjau: Kering. Segera lakukan penyiraman atau irigasi.';
        } else if (nilai <= 70) {
            preview.classList.add('p-optimal');
            preview.textContent = 'Pratinjau: Optimal. Pertahankan pola perawatan saat ini.';
        } else {
            preview.classList.add('p-lembap');
            preview.textContent = 'Pratinjau: Terlalu Lembap. Kurangi penyiraman dan periksa drainase.';
        }
    }

    if (tanah) {
        tanah.addEventListener('input', updatePreview);
        updatePreview();
    }

    var reset = document.getElementById('btnReset');
    if (reset) {
        reset.addEventListener('click', function () {
            setTimeout(function () {
                if (preview) {
                    preview.className = 'preview';
                    preview.textContent = defaultText;
                }
            }, 0);
        });
    }

    // 4. Validasi sederhana di sisi klien sebelum form dikirim
    var form = document.getElementById('formPrediksi');
    if (form) {
        form.addEventListener('submit', function (event) {
            var valid = true;
            form.querySelectorAll('input[required], select[required]').forEach(function (el) {
                var kosong = el.value.trim() === '';
                var diLuarRentang = el.type === 'number' && el.value !== '' &&
                    (Number(el.value) < Number(el.min) || Number(el.value) > Number(el.max));
                if (kosong || diLuarRentang) {
                    el.classList.add('invalid');
                    valid = false;
                } else {
                    el.classList.remove('invalid');
                }
            });
            if (!valid) {
                event.preventDefault();
                var first = form.querySelector('.invalid');
                if (first) { first.focus(); }
            }
        });
    }

    // 5. Filter status pada tabel riwayat
    var filter = document.getElementById('filterStatus');
    var table = document.getElementById('tabelRiwayat');
    if (filter && table) {
        filter.addEventListener('change', function () {
            var pilih = filter.value;
            table.querySelectorAll('tbody tr[data-status]').forEach(function (row) {
                row.style.display = (pilih === '' || row.dataset.status === pilih) ? '' : 'none';
            });
        });
    }
});
