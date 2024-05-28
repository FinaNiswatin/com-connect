<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>My Activity</title>
  <link rel="stylesheet" href="{{ asset("css/dashboard.css") }}" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <style>
    /* CSS untuk modifikasi tampilan tabel */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    th, td {
      border: 1px solid #151414b6;
      padding: 5px;
      text-align: left;
    }
    th {
      background-color: #6ba488bc;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    /* CSS untuk tombol dan input */
    button, input[type="text"] {
      padding: 10px;
      border: none;
      border-radius: 5px;
      margin-bottom: 10px;
    }
    button {
      background-color: #007bff;
      color: white;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }

    /* CSS untuk mempercantik icon */
    .fa-search, .fa-bell {
      margin-right: 10px;
      color: #007bff;
    }

    /* CSS untuk profil */
    .profile-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      background-color: #f8f9fa;
      border-radius: 10px;
      margin-bottom: 20px;
    }
    .profile-details {
      flex-grow: 1;
      margin-left: 20px;
    }
    .profile-details h3 {
      margin-bottom: 10px;
    }
    .profile-details p {
      margin: 5px 0;
    }
    .profile-image {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      overflow: hidden;
    }
    .profile-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .change-photo {
      font-size: 14px;
      color: #007bff;
      cursor: pointer;
    }

    /* CSS untuk side bar */
    nav {
      position: fixed;
      left: 0;
      top: 0;
      bottom: 0;
      width: 250px; /* Lebar sidebar saat ditampilkan */
      background-color: #454f48e0;
      padding-top: 50px;
      transition: all 0.3s;
      z-index: 9999; /* Menempatkan sidebar di atas konten utama */
      color: white; /* Warna font pada sidebar */
    }

    .side_navbar a,
    .side_navbar span {
      color: #f9f9f9; /* Warna font pada link dan teks lainnya di sidebar */
    }

    /* CSS untuk ikon di sidebar */
    .side_navbar i {
      color: #dadfce; /* Warna ikon pada sidebar */
    }

    /* Menambahkan efek hover pada menu sidebar */
    .side_navbar a:hover {
      background-color: #6ba488bc;
      color: #fbfffde0; /* Warna font saat dihover */
      border-radius: 25px; /* Membuat sudut menu menjadi oval */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Menambahkan bayangan saat dihover */
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5); /* Warna overlay */
      z-index: 9998; /* Menempatkan overlay di atas konten utama, di bawah sidebar */
      display: none; /* Mulai tersembunyi */
    }

    .toggle-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      color: #dadfce;
      cursor: pointer;
      z-index: 9999; /* Menempatkan ikon toggle di atas konten utama */
    }

    /* Tambahkan aturan CSS untuk menyembunyikan teks pada sidebar yang ingin disembunyikan */
    .side_navbar .hidden-text {
      display: none;
    }

    /* Atur background sidebar agar lebih kecil saat disembunyikan */
    nav.collapsed {
      width: 50px; /* Lebar sidebar saat disembunyikan */
    }

    /* Atur lebar ikon toggle agar sesuai dengan sidebar yang telah disembunyikan */
    .toggle-btn {
      right: 0;
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

    .search_box i {
      margin-left: 5px;
      color: #007bff;
      cursor: pointer;
    }

    /* Atur margin konten utama saat sidebar disembunyikan */
    .main-body.collapsed {
      margin-left: 50px; /* Sesuaikan dengan lebar sidebar yang disembunyikan */
    }
  </style>
</head>

<body>
  <header class="header">
    <div class="profile-and-search">
      <div class="logo"></div>
    </div>
  </header>
  <nav id="sidebar">
    <div class="side_navbar" id="side_navbar">
      <span class="hidden-text">Main Menu</span>
      <a class="item-nav" href="/"><i class="fas fa-home"></i> Back to Home</a>
      <a class="item-nav" href="/profile"><i class="fas fa-user"></i> My Profile</a>
      <a class="item-nav" href="/history"><i class="fas fa-history"></i> Activity History</a>
      <a class="item-nav" href="/poin"><i class="fas fa-coins"></i> My Points</a>
      <a class="item-nav" href="/rewards"><i class="fas fa-gift"></i> Rewards</a>

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

  <div class="overlay" onclick="toggleSidebar()"></div>

  <div class="main-body">
    <div class="profile-and-search">
      <div class="profile-container">
        <div class="profile-image">
          @if ($user->profile_img == NULL)
          <img id="profile-picture" src="{{ asset('images/icon2.jpg') }}" alt="Profile Picture">
          @else
          <img id="profile-picture" src="{{ asset('storage/'.$user->profile_img) }}" alt="Profile Picture">   
          @endif
         
        </div>
        <div class="profile-details">
          <h2 id="profile-name">My Profile</h2>
          <p>Usia: {{ $user->usia }}</p>
          <p>Poin: {{ $user->point }}</p>
          <a href="/edit"> Edit Profile</a>
        </div>
      </div>
      <div class="search_box">
        <input type="text" placeholder="Search">
        <i class="fas fa-search"></i>
      </div>
    </div>

    <div class="promo_card">
      <h1>Halo, {{ $user->name }}!</h1>
      <span>Lorem ipsum dolor sit amet.</span>
      <button>Learn More</button>
    </div>

    <div class="history_lists">
      <div class="list1">
        <div class="row">
          <h4>History</h4>
          <a href="#">See all</a>
        </div>
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Amouth</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rewardHistory->reward as $item)
                <tr>
                    <td>
                      {{ $item->nama_reward }}
                    </td>
                    <td>
                      {{ $item->jumlah_point }}
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="list2">
        <div class="row">
          <h4>Documents</h4>
          <a href="#">Upload</a>
        </div>
        <table>
          <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Type</th>
              <th>Uploaded</th>
            </tr>
          </thead>
          <tbody>
            <!-- Isi tabel di sini -->
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('change-photo').addEventListener('change', function() {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          document.getElementById('profile-picture').src = e.target.result;
        }
        reader.readAsDataURL(file);
      }
    });

    // Tambahkan kode ini ke dashboard.js
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.querySelector('.overlay');
      const mainBody = document.querySelector('.main-body');
      sidebar.classList.toggle('hidden');
      overlay.classList.toggle('hidden');
      const itemNavs = sidebar.querySelectorAll('.item-nav');  // Select all elements with class "item-nav" within the sidebar
       itemNavs.forEach(itemNav => itemNav.classList.toggle('hidden'));
      if (sidebar.classList.contains('hidden')) {
        sidebar.style.width = '50px'; // Mengubah lebar sidebar saat disembunyikan
      } else {
        sidebar.style.width = '250px'; // Mengembalikan lebar sidebar saat ditampilkan kembali
      }
      mainBody.classList.toggle('hidden'); // Toggle class collapsed pada main-body
    }
  </script>
</body>

</html>
