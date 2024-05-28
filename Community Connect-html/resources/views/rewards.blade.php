<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Rewards</title>
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <style>
    /* Tambahkan CSS tambahan di sini untuk responsif */
    @media only screen and (max-width: 600px) {
      /* Contoh: Atur lebar tabel agar responsif */
      table {
        width: 100%;
      }
    }

    /* Menambahkan efek hover pada menu sidebar */
    .side_navbar a:hover {
      background-color: #6ba488bc;
      color: #fbfffde0; /* Warna font saat dihover */
      border-radius: 25px; /* Membuat sudut menu menjadi oval */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Menambahkan bayangan saat dihover */
    }
    
    /* CSS untuk side bar */
    nav#sidebar {
      position: fixed;
      left: 0;
      top: 0;
      bottom: 0;
      width: 250px; /* Lebar sidebar saat ditampilkan */
      background-color: #454f48e0;
      padding-top: 50px;
      transition: width 0.3s; /* Transisi hanya pada lebar */
      z-index: 9999; /* Menempatkan sidebar di atas konten utama */
    }
    
    /* CSS untuk link di sidebar */
    .side_navbar a {
      color: #fff; /* Ubah warna font sesuai keinginan */
    }
      
    /* CSS untuk ikon di sidebar */
    .side_navbar i {
      color: hsl(0, 0%, 98%); /* Warna ikon pada sidebar */
    }
    
    /* Atur tata letak overlay saat sidebar disembunyikan */
    .overlay.collapsed {
      display: none;
    }

    /* CSS untuk kotak pencarian */
    .search_box {
      position: absolute;
      top: 20px;
      right: 20px;
      display: flex;
      align-items: center;
    }

    .search_box input[type="text"] {
      padding: 10px;
      border-radius: 5px;
      border: none;
      outline: none;
    }

    /* Atur tampilan ikon pencarian */
    .search_box i {
      margin-left: 5px;
      color: #007bff;
      cursor: pointer;
    }

    /* Atur margin konten utama saat sidebar disembunyikan */
    .main-body.collapsed {
      margin-left: 50px; /* Sesuaikan dengan lebar sidebar yang disembunyikan */
    }
    
    /* CSS untuk header */
    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 60px;
      padding: 20px;
      background: #3e3636c4;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .header .profile-info .logo img {
      width: 20px; /* Ubah ukuran gambar profil */
      height: 20px; /* Ubah ukuran gambar profil */
      border-radius: 50%; /* Membuat gambar profil menjadi lingkaran */
    }
    
    .header .logo a {
      color: #000;
      font-size: 18px;
      font-weight: 600;
      margin-right: 2rem;
    }
    
    .header .search_box input {
      padding: 10px;
      width: 250px;
      background: rgb(228, 228, 228);
      border: none;
      border-top-left-radius: 5px;
      border-bottom-left-radius: 5px;
      font-size: 14px;
    }
    
    .header .search_box i {
      padding: 10px;
      cursor: pointer;
      color: #fff;
      background: #000;
      border-top-right-radius: 5px;
      border-bottom-right-radius: 5px;
    }
    
    .header .header-icons i {
      margin-right: 2rem;
      cursor: pointer;
      font-size: 18px;
    }
    
    .header .header-icons .account img {
      width: 35px;
      height: 35px;
      border-radius: 50%;
    }
    .popup {
      display: none;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: rgb(49, 128, 118);
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
      z-index: 9999;
    }

    /* CSS tambahan untuk halaman Rewards */
    .rewards-container {
      padding: 20px;
    }

    .reward-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #f4f4f4;
      padding: 15px;
      margin-bottom: 10px;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .reward-item .details {
      display: flex;
      flex-direction: column;
    }

    .reward-item .details h3 {
      margin: 0;
      font-size: 18px;
    }

    .reward-item .details p {
      margin: 5px 0 0;
      font-size: 14px;
      color: #666;
    }

    .reward-item .claim-btn {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .reward-item .claim-btn:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <header class="header">
    <div class="logo">
      <a href="#">User Dashboard</a>
      <div class="search_box">
        <input type="text" placeholder="Search">
        <i class="fas fa-search"></i> <!-- Ganti class ikon dengan benar -->
      </div>
    </div>

    <div class="header-icons">
      <i class=""></i>
      <div class="account">
        <img src="" alt="">
        <h4></h4>
      </div>
    </div>
  </header>
  <div class="container">
    <nav id="sidebar">
      <div class="side_navbar" id="side_navbar">
        <span class="hidden-text">Main Menu</span>
        <a class="item-nav" href="/"><i class="fas fa-home"></i> Back to Home</a>
        <a class="item-nav" href="/profile"><i class="fas fa-user"></i> My Profile</a>
        <a class="item-nav" href="/history"><i class="fas fa-history"></i> Activity History</a>
        <a class="item-nav" href="/poin"><i class="fas fa-coins"></i> My Points</a>
        <a class="item-nav" href="#"><i class="fas fa-gift"></i> Rewards</a>
  
        <div class="links">
          <span class="hidden-text">Lainnya</span>
          <a class="item-nav" href="#"><i class="fas fa-cog"></i> Settings</a>
          <a class="item-nav" href="#"><i class="fas fa-address-book"></i> Contact</a>
          <a class="item-nav" href="#"><i class="fas fa-question-circle"></i> Help</a>
          <a class="item-nav" href="/logout"><i class="fas fa-sign-out-alt"></i> Log Out</a>
        </div>
      </div>
      <div class="toggle-btn" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
      </div>
    </nav>

    <div class="main-body">
      @if (session('error'))
      <div class="alert alert-danger" role="alert" id="errorAlert">
          {{ session('error') }}
      </div>
      @endif
      <h2>Rewards</h2>
      <div class="rewards-container">
        @foreach ($reward as $item)
        <form action="{{ route('reward.claim', $item->id_reward) }}" method="POST">
          @method('POST')
          @csrf
          <div class="reward-item">
            <div class="details">
              <h3>{{ $item->nama_reward }}</h3>
              <p>Butuh {{ $item->jumlah_point }} point</p>
            </div>
            <button class="claim-btn" type="submit">Claim</button>
          </div>
        </form>
        
            
        @endforeach
        <!-- Daftar voucher -->
       
       
        <!-- Tambahkan voucher lainnya sesuai kebutuhan -->
      </div>
    </div>
  </div>

  <script>
    if (document.getElementById('errorAlert')) {
        setTimeout(function() {
            document.getElementById('errorAlert').style.display = 'none';
        }, 5000); // Hide after 5 seconds
    }
  </script>
</body>
</html>
