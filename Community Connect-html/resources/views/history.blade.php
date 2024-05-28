<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Activity History</title>
  <link rel="stylesheet" href="{{ asset('css/dashboard.cs') }}s" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    /* Tambahkan CSS tambahan di sini untuk responsif */
    @media only screen and (max-width: 600px) {
      /* Contoh: Atur lebar tabel agar responsif */
      table {
        width: 100%;
      }
    }

    /* CSS untuk pop-up */
    .popup {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: rgb(95, 121, 113);
      border: 1px solid #9a3737;
      padding: 20px;
      z-index: 999;
      /* Modifikasi warna dan padding */
      background-color: #82ccb8;
      /* Warna latar belakang pop-up */
      border-radius: 10px;
      /* Sudut border pop-up */
      box-shadow: 0 0 20px rgba(19, 19, 19, 0.1);
      /* Bayangan pop-up */
      /* Atur lebar dan tinggi pop-up */
      width: 400px;
      /* Lebar pop-up */
      height: auto;
      /* Tinggi pop-up (otomatis menyesuaikan konten) */
    }

    /* CSS untuk label pada form */
    .popup label {
      display: block;
      margin-bottom: 10px;
      color: #333;
      /* Warna label */
    }

    /* CSS untuk input pada form */
    .popup input,
    .popup select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      /* Warna border input */
      border-radius: 5px;
      /* Sudut border input */
      margin-bottom: 15px;
      box-sizing: border-box;
      outline: none;
    }

    /* CSS untuk tombol pada form */
    .popup button {
      padding: 10px 20px;
      background-color: #007bff;
      /* Warna latar tombol */
      color: #fff;
      /* Warna teks tombol */
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .popup button:hover {
      background-color: #0056b3;
      /* Warna latar tombol saat dihover */
    }

    /* Menambahkan efek hover pada menu sidebar */
    .side_navbar a:hover {
      background-color: #6ba488bc;
      color: #fbfffde0;
      /* Warna font saat dihover */
      border-radius: 25px;
      /* Membuat sudut menu menjadi oval */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
      /* Menambahkan bayangan saat dihover */
    }

    /* CSS untuk side bar */
    nav#sidebar {
      position: fixed;
      left: 0;
      top: 0;
      bottom: 0;
      width: 250px;
      /* Lebar sidebar saat ditampilkan */
      background-color: #454f48e0;
      padding-top: 50px;
      transition: width 0.3s;
      /* Transisi hanya pada lebar */
      z-index: 9999;
      /* Menempatkan sidebar di atas konten utama */
    }

    /* CSS untuk link di sidebar */
    .side_navbar a {
      color: #fff;
      /* Ubah warna font sesuai keinginan */
    }

    /* CSS untuk ikon di sidebar */
    .side_navbar i {
      color: hsl(0, 0%, 98%);
      /* Warna ikon pada sidebar */
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
      margin-left: 50px;
      /* Sesuaikan dengan lebar sidebar yang disembunyikan */
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
      width: 20px;
      /* Ubah ukuran gambar profil */
      height: 20px;
      /* Ubah ukuran gambar profil */
      border-radius: 50%;
      /* Membuat gambar profil menjadi lingkaran */
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

    /* CSS untuk toggle sidebar */
    .toggle-btn {
      position: absolute;
      top: 20px;
      left: 20px;
      cursor: pointer;
      color: #fff;
      z-index: 9999;
    }

    .toggle-btn i {
      font-size: 24px;
    }
  </style>
</head>

<body>
  <header class="header">
    <div class="profile-info">
      <div class="logo">
        <img src="{{ asset('images/icon2.jpg') }}" alt="">
        <h4>{{ $user->name }}</h4>
      </div>
      <div class="search_box">
        <input type="text" placeholder="Search">
        <i class="fas fa-search"></i>
      </div>
    </div>
    <div class="header-icons"></div>
  </header>
  <div class="container">

    <div class="overlay" onclick="toggleSidebar()"></div>

    <div class="main-body">
      @if(session()->has('success'))
      <div class="alert alert-info" role="alert" id="errorAlert">
          {{ session('success') }}
        </div>
      @endif
      <h2>Activity History</h2>
      <div class="history_lists">
        <div class="list1">
          <table id="activityTable">
            <thead>
              <tr>
                <th>Tanggal Kegiatan</th>
                <th>Nama Kegiatan</th>
                <th>Kategori Kegiatan</th>
                <th>Jumlah Relawan</th>
                <th>Jumlah Point</th>
                <th>Kode Unik</th>
                <th>Keterangan</th>
                <th  colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
             @foreach ($kegiatan as $item)
             <tr>
              <td>{{ $item->waktu_pelaksanaan }}</td>
              <td>{{ $item->nama_kegiatan }}</td>
              <td>{{ $item->kategori }}</td>
              <td>{{ $item->jumlah_relawan }}</td>
              <td>{{ $item->jumlah_point }}</td>
              <td>{{ $item->kode_unik }}</td>
              @if ($item->status == 1)
                <td>Sudah Terlaksana</td>
              @else
                <td>Belum Terlaksana</td>
              @endif
              <td>
                <button type="button" data-toggle="modal" data-target="#Edit_{{ $item->id_kegiatan }}" form="KegiatanEdit_{{ $item->id_kegiatan }}"><i class="fas fa-edit"></i></button>
              </td>
              <td>
                <form action="{{ route('kegiatan.delete', $item->id_kegiatan) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit"><i class="fas fa-trash-alt"></i></button>
                </form>
                
              </td>
            </tr>
            <div class="modal fade" id="Edit_{{ $item->id_kegiatan }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="{{ route('kegiatan.update', $item->id_kegiatan) }}" method="post"  id="KegiatanEdit_{{ $item->id_kegiatan }}">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                          <label for="author" class="col-form-label">Nama Kegiatan:</label>
                          <input type="text" class="form-control" id="author" name="nama_kegiatan" value="{{ $item->nama_kegiatan }}">
                        </div>
                        <div class="form-group">
                          <label for="gambar_video">Poster Kegiatan:</label>
                          <input type="file" class="form-control-file" id="gambar_video" name="gambar_kegiatan">
                          <p>Poster Saat Ini:</p>
                          <img src="{{ asset('storage/' . $item->gambar_kegiatan) }}" alt="Article Image" style="max-width: 200px;">
                      </div>
                      <div class="form-group">
                          <label for="lokasi_kegiatan" class="col-form-label">Lokasi Pelaksanaan:</label>
                          <input type="text" class="form-control" id="lokasi_kegiatan" name="lokasi_kegiatan"  value="{{ $item->lokasi_kegiatan }}">
                        </div>
                        <div class="form-group">
                          <label for="slug" class="col-form-label">Waktu Pelaksanaan: </label>
                          <input type="date" class="form-control  " id="slug" name="waktu_pelaksanaan" value="{{ $item->waktu_pelaksanaan }}">
                        </div>
                        <div class="form-group">
                          <label for="excerpt" class="col-form-label">Jumlah Relawan: </label>
                          <input type="number" class="form-control  " id="excerpt" name="jumlah_relawan" value="{{ $item->jumlah_relawan }}">
                        </div>
                        <div class="form-group">
                          <label for="point" class="col-form-label">Jumlah Point: </label>
                          <input type="number" class="form-control  " id="point" name="jumlah_point" value="{{ $item->jumlah_point }}">
                        </div>
                        <div class="form-group">
                          <label for="status">Status :</label>
                          <select class="form-control" id="status" name="status">
                              <option value="">Select Role</option>
                              <option value="1" {{ $item->status == '1' ? 'selected' : '' }}>Sudah Terlaksana</option>
                              <option value="0" {{ $item->status == '0' ? 'selected' : '' }}>Belum Terlaksana</option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="kategori" class="col-form-label">Kategori:</label>
                        <input type="text" class="form-control" id="kategori" name="kategori"  value="{{ $item->kategori }}">
                      </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" >Submit</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
             @endforeach
              
              <!-- Tambahkan data kegiatan sesuai kebutuhan -->
            </tbody>
          </table>
        </div>
      </div>

      <!-- Pop-up untuk edit -->
 

      <!-- Form untuk menambahkan kegiatan -->
      <div class="add-form">
        <h3>Add Activity</h3>
        <form id="addActivityForm" action="{{ route('kegiatan.add') }}" method="POST" enctype="multipart/form-data">
          @method('POST')
          @csrf
          <label for="activityDate">Tanggal Kegiatan:</label>
          <input type="date" id="activityDate" name="waktu_pelaksanaan"><br><br>
          <label for="activityName">Nama Kegiatan:</label>
          <input type="text" id="activityName" name="nama_kegiatan"><br><br>
          <label for="activityImg">Poster Kegiatan:</label>
          <input type="file"  id="activityImg" name="gambar_kegiatan"><br><br>
          <label for="activityLoct">Lokasi Kegiatan:</label>
          <input type="text" id="activityLoct" name="lokasi_kegiatan"><br><br>
          <label for="activityScope">Kategori:</label>
          <select id="activityScope" name="kategori">
            <option value="Daerah">Daerah</option>
            <option value="Nasional">Nasional</option>
          </select><br><br>
          <label for="activityVolun">Jumlah Relawan:</label>
          <input type="number" id="activityVolun" name="jumlah_relawan"><br><br>
          <label for="activityPoint">Jumlah Point:</label>
          <input type="number" id="activityPoint" name="jumlah_point"><br><br>
          <label for="activityStatus">Status Kegiatan:</label>
          <select id="activityStatus" name="status">
            <option value="1">Sudah Terlaksana</option>
            <option value="0">Belum Terlaksana</option>
          </select><br><br>
          <button type="submit">Submit</button>
        </form>
      </div>

    </div>

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

  </div>

  <script>
    // Tambahkan kode ini ke dashboard.js
    if (document.getElementById('errorAlert')) {
        setTimeout(function() {
            document.getElementById('errorAlert').style.display = 'none';
        }, 5000); // Hide after 5 seconds
      }
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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
