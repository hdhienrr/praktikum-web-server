<?php
// TiketKu - halaman utama (UI demo)
$destinations = [
    ['name' => 'Jakarta', 'desc' => 'Ibukota yang selalu punya cerita', 'image' => 'https://images.unsplash.com/photo-1596402184320-417e7178b2cd?auto=format&fit=crop&w=900&q=85'],
    ['name' => 'Bandung', 'desc' => 'Sejuk, asri, dan penuh pesona', 'image' => 'https://images.unsplash.com/photo-1596436889106-be35e843f974?auto=format&fit=crop&w=900&q=85'],
    ['name' => 'Yogyakarta', 'desc' => 'Budaya, seni, dan sejarah', 'image' => 'https://images.unsplash.com/photo-1584810359583-96fc3448beaa?auto=format&fit=crop&w=900&q=85'],
    ['name' => 'Surabaya', 'desc' => 'Kota pahlawan yang modern', 'image' => 'https://images.unsplash.com/photo-1621274403997-37aace184f49?auto=format&fit=crop&w=900&q=85'],
];
$today = date('Y-m-d');
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="TiketKu membantu kamu mencari tiket kereta, bus, dan travel dengan mudah.">
  <title>TiketKu — Pesan Tiket Perjalanan</title>
  <style>
    :root{--purple:#6847d9;--purple-dark:#5032bb;--ink:#242344;--muted:#73758e;--line:#e7e6f1;--bg:#f8f7fc;--white:#fff}
    *{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;font-family:Inter,ui-sans-serif,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;color:var(--ink);background:var(--bg)}
    a{text-decoration:none;color:inherit}button,input,select{font:inherit}.container{width:min(1180px,calc(100% - 40px));margin:auto}
    .navbar{height:78px;background:rgba(255,255,255,.96);border-bottom:1px solid #eeeaf7;display:flex;align-items:center;position:sticky;top:0;z-index:10;backdrop-filter:blur(12px)}.nav-inner{display:flex;align-items:center;justify-content:space-between;gap:24px}.brand{display:flex;align-items:center;gap:10px;color:var(--purple);font-size:23px;font-weight:850;letter-spacing:-.7px}.brand-mark{width:36px;height:36px;border-radius:12px;background:linear-gradient(135deg,#8d73f5,#5838c7);display:grid;place-items:center;color:#fff;font-size:20px;box-shadow:0 7px 16px #6847d933}.nav-links{display:flex;gap:34px;color:#686782;font-size:14px;font-weight:650}.nav-links a:hover,.nav-links a.active{color:var(--purple)}.nav-actions{display:flex;gap:10px}.btn{border:1px solid var(--purple);border-radius:10px;padding:11px 20px;font-weight:750;cursor:pointer;transition:.2s}.btn-outline{background:#fff;color:var(--purple)}.btn-primary{background:var(--purple);color:#fff;box-shadow:0 6px 14px #6847d92b}.btn:hover{transform:translateY(-1px);filter:brightness(.97)}.menu-toggle{display:none;background:none;border:0;font-size:25px;color:var(--ink)}
    .hero{min-height:370px;position:relative;isolation:isolate;color:#fff;background:linear-gradient(90deg,rgba(48,35,100,.77),rgba(72,49,130,.42)),url('https://images.unsplash.com/photo-1474487548417-781cb71495f3?auto=format&fit=crop&w=2000&q=90') center 54%/cover;display:flex;align-items:center}.hero:after{content:"";position:absolute;z-index:-1;inset:0;background:linear-gradient(0deg,rgba(40,30,85,.28),transparent 55%)}.hero-content{padding:58px 0 94px}.eyebrow{display:inline-flex;align-items:center;gap:8px;padding:8px 12px;border:1px solid #ffffff60;border-radius:99px;background:#ffffff19;font-size:12px;font-weight:750;letter-spacing:.3px}.hero h1{font-size:clamp(36px,5vw,54px);line-height:1.1;letter-spacing:-1.7px;max-width:570px;margin:20px 0 14px}.hero p{font-size:17px;line-height:1.7;max-width:500px;margin:0;color:#f1edff}
    .search-wrap{margin-top:-56px;position:relative;z-index:2}.search-card{background:#fff;border:1px solid #eeebf7;border-radius:18px;padding:23px;box-shadow:0 18px 45px #32205c15}.search-grid{display:grid;grid-template-columns:1fr 1fr 1fr .9fr auto;gap:14px;align-items:end}.field label{display:block;font-size:12px;font-weight:750;color:#666580;margin:0 0 9px 2px}.field input,.field select{width:100%;height:48px;border:1px solid #deddec;border-radius:10px;padding:0 13px;color:var(--ink);background:#fff;outline:none;min-width:0}.field input:focus,.field select:focus{border-color:var(--purple);box-shadow:0 0 0 3px #6847d91a}.search-button{height:48px;white-space:nowrap;padding:0 22px;display:flex;align-items:center;justify-content:center;gap:9px}
    .features{display:grid;grid-template-columns:repeat(4,1fr);gap:25px;padding:44px 0 48px}.feature{text-align:center;padding:4px 12px}.feature-icon{margin:0 auto 13px;width:48px;height:48px;border-radius:15px;background:#eee9ff;color:var(--purple);display:grid;place-items:center;font-size:23px}.feature h3{font-size:15px;margin:0 0 7px}.feature p{font-size:13px;line-height:1.6;color:var(--muted);margin:0 auto;max-width:230px}
    .destinations{padding:32px 0 70px;background:linear-gradient(180deg,#f1effa,#f8f7fc)}.section-head{display:flex;align-items:end;justify-content:space-between;gap:20px;margin-bottom:24px}.section-head h2{font-size:25px;letter-spacing:-.6px;margin:0 0 7px}.section-head p{margin:0;color:var(--muted);font-size:14px}.see-all{font-size:13px;color:var(--purple);font-weight:800;white-space:nowrap}.destination-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px}.destination{height:218px;position:relative;overflow:hidden;border-radius:15px;color:#fff;background:#343047;box-shadow:0 7px 20px #2a1a4a12}.destination img{width:100%;height:100%;object-fit:cover;transition:transform .45s}.destination:hover img{transform:scale(1.06)}.destination:after{content:"";position:absolute;inset:0;background:linear-gradient(180deg,transparent 20%,rgba(17,15,38,.82))}.destination-tag{position:absolute;top:13px;left:13px;z-index:1;border-radius:99px;background:#ffffffd9;color:#464261;padding:6px 9px;font-size:10px;font-weight:800}.destination-info{position:absolute;z-index:1;left:16px;right:16px;bottom:16px}.destination-info h3{margin:0 0 5px;font-size:20px}.destination-info p{margin:0;font-size:12px;color:#f1eff9}.arrow{position:absolute;right:0;bottom:0;width:29px;height:29px;border-radius:50%;display:grid;place-items:center;background:#fff;color:var(--purple);font-size:18px;font-weight:900}
    .cta{padding:0 0 70px;background:#f8f7fc}.cta-inner{padding:30px 34px;border-radius:18px;background:linear-gradient(115deg,#5b3bc7,#8b70ed);color:#fff;display:flex;justify-content:space-between;align-items:center;gap:20px}.cta h2{font-size:23px;margin:0 0 7px}.cta p{margin:0;color:#eee8ff;font-size:14px}.cta .btn{background:#fff;color:var(--purple);border-color:#fff;white-space:nowrap}
    footer{background:#211c3e;color:#d9d5eb;padding:30px 0}.footer-inner{display:flex;align-items:center;justify-content:space-between;gap:20px;font-size:12px}.footer-brand{font-size:19px;font-weight:850;color:#fff}.footer-note{color:#bcb6d5}
    .notice{display:none;margin-top:12px;padding:12px 14px;background:#f1edff;border-radius:10px;color:#5135b6;font-size:13px}.notice.show{display:block}
    @media(max-width:900px){.nav-links{gap:17px}.search-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.search-button{width:100%}.destination-grid{grid-template-columns:repeat(2,1fr)}.features{grid-template-columns:repeat(2,1fr)}}
    @media(max-width:640px){.container{width:min(100% - 28px,1180px)}.navbar{height:68px}.brand{font-size:21px}.menu-toggle{display:block}.nav-links{display:none;position:absolute;top:67px;left:0;right:0;background:#fff;padding:18px 22px;box-shadow:0 12px 20px #1c15351a;flex-direction:column;gap:18px}.nav-links.open{display:flex}.nav-actions{gap:7px}.nav-actions .btn{padding:9px 11px;font-size:12px}.hero{min-height:355px;background-position:58% center}.hero-content{padding:48px 0 78px}.hero h1{font-size:38px}.hero p{font-size:15px}.search-wrap{margin-top:-43px}.search-card{padding:17px}.search-grid{grid-template-columns:1fr;gap:12px}.field input,.field select,.search-button{height:46px}.features{gap:26px 12px;padding:36px 0}.feature{padding:0 3px}.feature h3{font-size:13px}.feature p{font-size:12px}.destinations{padding:27px 0 45px}.section-head h2{font-size:22px}.section-head p{font-size:12px}.destination-grid{gap:12px}.destination{height:180px;border-radius:12px}.destination-info{left:12px;right:12px;bottom:12px}.destination-info h3{font-size:17px}.destination-info p{font-size:10px}.destination-tag{top:10px;left:10px;font-size:9px}.arrow{width:25px;height:25px}.cta{padding-bottom:45px}.cta-inner{padding:24px;align-items:flex-start;flex-direction:column}.cta h2{font-size:21px}.footer-inner{align-items:flex-start;flex-direction:column;gap:10px}}
  </style>
</head>
<body>
<header class="navbar">
  <div class="container nav-inner">
    <a class="brand" href="#beranda"><span class="brand-mark">◆</span> TiketKu</a>
    <button class="menu-toggle" id="menuToggle" aria-label="Buka menu">☰</button>
    <nav class="nav-links" id="navLinks"><a class="active" href="#beranda">Beranda</a><a href="#cari-tiket">Tiket</a><a href="#pesanan">Pesanan Saya</a><a href="#tentang">Tentang</a></nav>
    <div class="nav-actions"><a class="btn btn-outline" href="#masuk">Masuk</a><a class="btn btn-primary" href="#daftar">Daftar</a></div>
  </div>
</header>
<main>
  <section class="hero" id="beranda"><div class="container hero-content">
    <span class="eyebrow">✦ TEMAN SETIA SETIAP PERJALANAN</span>
    <h1>Perjalanan Impianmu Dimulai di Sini</h1>
    <p>Pesan tiket kereta, bus, dan travel dengan mudah, cepat, dan aman hanya di TiketKu.</p>
  </div></section>
  <section class="container search-wrap" id="cari-tiket">
    <form class="search-card" id="ticketForm">
      <div class="search-grid">
        <div class="field"><label for="asal">Dari</label><input id="asal" name="asal" placeholder="⌖  Kota asal" required></div>
        <div class="field"><label for="tujuan">Ke</label><input id="tujuan" name="tujuan" placeholder="⌖  Kota tujuan" required></div>
        <div class="field"><label for="tanggal">Tanggal Berangkat</label><input id="tanggal" name="tanggal" type="date" min="<?= htmlspecialchars($today, ENT_QUOTES, 'UTF-8') ?>" required></div>
        <div class="field"><label for="penumpang">Penumpang</label><select id="penumpang" name="penumpang"><option value="1">1 Penumpang</option><option value="2">2 Penumpang</option><option value="3">3 Penumpang</option><option value="4">4 Penumpang</option><option value="5">5 Penumpang</option></select></div>
        <button class="btn btn-primary search-button" type="submit"><span>⌕</span> Cari Tiket</button>
      </div>
      <div class="notice" id="searchNotice" role="status"></div>
    </form>
  </section>
  <section class="container features" id="tentang">
    <article class="feature"><div class="feature-icon">♢</div><h3>Aman &amp; Terpercaya</h3><p>Transaksi dijamin aman dengan sistem pembayaran terpercaya.</p></article>
    <article class="feature"><div class="feature-icon">ϟ</div><h3>Proses Cepat</h3><p>Pesan tiket dalam hitungan menit, tanpa ribet.</p></article>
    <article class="feature"><div class="feature-icon">◇</div><h3>Harga Terbaik</h3><p>Dapatkan harga terbaik untuk perjalananmu.</p></article>
    <article class="feature"><div class="feature-icon">♧</div><h3>Customer Service 24/7</h3><p>Kami siap membantu kapan saja kamu butuh.</p></article>
  </section>
  <section class="destinations" id="pesanan"><div class="container">
    <div class="section-head"><div><h2>Destinasi Populer</h2><p>Tujuan favorit yang sering dipilih untuk perjalanan.</p></div><a class="see-all" href="#cari-tiket">Lihat Semua →</a></div>
    <div class="destination-grid">
      <?php foreach ($destinations as $destination): ?>
      <a class="destination" href="#cari-tiket" data-city="<?= htmlspecialchars($destination['name'], ENT_QUOTES, 'UTF-8') ?>">
        <img src="<?= htmlspecialchars($destination['image'], ENT_QUOTES, 'UTF-8') ?>" alt="Pemandangan <?= htmlspecialchars($destination['name'], ENT_QUOTES, 'UTF-8') ?>" loading="lazy">
        <span class="destination-tag">KERETA · BUS · TRAVEL</span>
        <div class="destination-info"><h3><?= htmlspecialchars($destination['name'], ENT_QUOTES, 'UTF-8') ?></h3><p><?= htmlspecialchars($destination['desc'], ENT_QUOTES, 'UTF-8') ?></p><span class="arrow">→</span></div>
      </a>
      <?php endforeach; ?>
    </div>
  </div></section>
  <section class="cta"><div class="container cta-inner"><div><h2>Siap untuk perjalanan berikutnya?</h2><p>Temukan tiket yang cocok dan mulai rencanakan perjalananmu.</p></div><a href="#cari-tiket" class="btn">Cari Tiket Sekarang →</a></div></section>
</main>
<footer><div class="container footer-inner"><div class="footer-brand">◆ TiketKu</div><div>Perjalanan nyaman dimulai dari sini.</div><div class="footer-note">© <?= date('Y') ?> TiketKu. UI demo untuk pengembangan.</div></div></footer>
<script>
  const menuToggle = document.getElementById('menuToggle');
  const navLinks = document.getElementById('navLinks');
  menuToggle.addEventListener('click', () => navLinks.classList.toggle('open'));

  document.querySelectorAll('.destination').forEach(card => {
    card.addEventListener('click', () => {
      document.getElementById('tujuan').value = card.dataset.city;
    });
  });

  document.getElementById('ticketForm').addEventListener('submit', function (event) {
    event.preventDefault();
    const asal = document.getElementById('asal').value.trim();
    const tujuan = document.getElementById('tujuan').value.trim();
    const tanggal = document.getElementById('tanggal').value;
    const penumpang = document.getElementById('penumpang').value;
    const notice = document.getElementById('searchNotice');
    if (asal.toLowerCase() === tujuan.toLowerCase()) {
      notice.textContent = 'Kota asal dan tujuan tidak boleh sama, ya.';
    } else {
      notice.textContent = `Pencarian demo: ${asal} → ${tujuan}, tanggal ${tanggal}, ${penumpang} penumpang. Sambungkan form ini ke sistem pencarian tiket untuk menampilkan hasil sebenarnya.`;
    }
    notice.classList.add('show');
  });
</script>
</body>
</html>
