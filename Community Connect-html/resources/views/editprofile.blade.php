<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Edit Profile</title>
  <link rel="stylesheet" href="{{ asset("css/dashboard.css") }}" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: Arial, sans-serif;
      background-image: url('images/connect2.png');
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    form {
      width: 90%;
      max-width: 800px;
      padding: 5vw;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      margin-top: 5%;
      margin-bottom: 5%;
    }

    h2 {
      text-align: center;
      color: #333333;
    }

    label {
      margin-bottom: 5px;
      color: #555555;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"],
    input[type="date"],
    input[type="file"],
    textarea {
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #dddddd;
      border-radius: 5px;
      width: 100%;
      box-sizing: border-box;
    }

    button {
      padding: 10px;
      border: none;
      border-radius: 5px;
      background-color: #007bff;
      color: white;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3;
    }

    .profile-image {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }

    .profile-image img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin-right: 20px;
    }

    .change-photo {
      cursor: pointer;
      color: #007bff;
      position: relative;
      overflow: hidden;
    }

    .change-photo input[type="file"] {
      position: absolute;
      opacity: 0;
      width: 100%;
      height: 100%;
      cursor: pointer;
    }

    @media (max-width: 600px) {
      form {
        padding: 10vw;
      }

      .profile-image img {
        width: 80px;
        height: 80px;
      }
    }
  </style>
</head>

<body>
  <header class="header">
    <div class="profile-and-search">
      <div class="logo"></div>
    </div>
  </header>

  <form action="{{ route('user.update', $user->id_users) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <h2>Edit Profile</h2>
    <div class="profile-image">
      <div class="form-group">
        <label for="activityImg">Profile User:</label>
        <input type="file"  id="activityImg" name="profile_img">
        <img id="profile-picture" src="{{ asset('storage/' .$user->profile_img) }}" alt="Profile Picture" >   
      </div>


    </div>

    <label for="username-current">Nama</label>
    <input type="text" id="username-current" name="name" placeholder="Nama" required value="{{ $user->name }}">

    <label for="passwordcurrent">Password Saat Ini</label>
    <input type="password" id="passwordcurrent" name="passwordcurrent" placeholder="Password Saat Ini" required>

    <label for="passwordnew">Password Baru</label>
    <input type="password" id="passwordnew" name="passwordnew" placeholder="Password Baru" required>


    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Email" required value="{{ $user->email }}">

    <label for="alamat">Alamat</label>
    <textarea id="alamat" name="alamat" placeholder="Alamat" required>
      {{ $user->alamat }}
    </textarea>

    <label for="usia">Usia</label>
    <input type="number" id="usia" name="usia" required value="{{ $user->usia }}">

    <button type="submit">Simpan Perubahan</button>
  </form>

  <script>
    
  </script>
</body>

</html>
