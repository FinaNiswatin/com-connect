<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard - Voucher Rewards</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <style>
        /* CSS for modifying table appearance */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #151414b6;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #6ba488bc;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* CSS for buttons and inputs */
        button,
        input[type="text"],
        input[type="number"] {
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

        .fa-edit,
        .fa-trash-alt {
            color: #007bff;
            cursor: pointer;
            margin-right: 5px;
        }

        /* CSS for sidebar */
        nav {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 250px;
            background-color: #454f48e0;
            padding-top: 50px;
            transition: all 0.3s;
            z-index: 9999;
            color: white;
            overflow-x: hidden;
            scrollbar-width: none;
        }

        .side_navbar a,
        .side_navbar span {
            color: #f9f9f9;
        }

        .side_navbar i {
            color: #dadfce;
        }

        .side_navbar a:hover {
            background-color: #6ba488bc;
            color: #fbfffde0;
            border-radius: 25px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9998;
            display: none;
        }

        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 5px;
            z-index: 9999;
            display: none;
        }

        .toggle-btn {
            position: absolute;
            top: 10px;
            right: 5px;
            color: #dadfce;
            cursor: pointer;
            z-index: 9999;
        }

        #sidebar.hide {
            width: 60px;
        }

        .overlay.collapsed {
            display: none;
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
        <div class="side_navbar">
            <a href="/admin"><i class="fas fa-home"></i> Home</a>
            <a href="/admin/user"><i class="fas fa-user-shield"></i> User</a>
            <a href="/admin/reward"><i class="fas fa-users"></i> Community</a>
            <a href="#"><i class="fas fa-calendar-alt"></i> Event</a>
            <a href="#"><i class="fas fa-envelope"></i> Message</a>
            <div class="links">
                <a href="#"><i class="fas fa-cog"></i> Settings</a>
                <a href="#"><i class="fas fa-question-circle"></i> Helpdesk</a>
                <a href="/logout"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </div>
        </div>
        <div class="toggle-btn" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </div>
    </nav>

    <div class="overlay" onclick="toggleSidebar()"></div>

    <div class="main-body">
        <div class="voucher-table">
            <h2>Voucher Rewards</h2>
            <div class="alert alert-info" role="alert" id="errorAlert">
                {{ session('success') }}
              </div>
            <button onclick="showAddPopup()">Add Voucher</button>
            <div id="addPopup" class="popup">
                <form id="voucherForm" action="{{ route("reward.add") }}" method="POST">
                    @method('POST')
                    @csrf
                    <input type="text" id="voucherName" placeholder="Voucher" required  name="nama_reward"/>
                    <input type="number" id="pointsRequired" placeholder="Jumlah Poin" name="jumlah_point" required />
                    <button type="submit">Add Voucher</button>
                </form>
                <button onclick="hideAddPopup()">Close</button>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Voucher</th>
                        <th>Jumlah Poin</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="voucherTableBody">
                    @foreach ($reward as $item)
                    <tr>
                        <td>{{ $item->nama_reward }}</td>
                        <td>{{ $item->jumlah_point }}</td>
                        <td>
                            <i class="fas fa-edit" onclick="showEditPopup(this)"></i>
                            <form action="{{ route('reward.delete', $item->id_reward) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit"><i class="fas fa-trash-alt"></i></button>
                                
                            </form>
                            
                        </td>
                    </tr> 
                    <div id="editPopup" class="popup">
                        <form id="editVoucherForm" action="{{ route('reward.update', $item->id_reward) }}"method="post">
                            @method('PUT')
                            @csrf
                            <input type="text" id="editVoucherName" placeholder="Voucher"  name="nama_reward" required />
                            <input type="number" id="editPointsRequired" placeholder="Jumlah Poin" name="jumlah_point" required />
                            <button type="submit">Update Voucher</button>
                        </form>
                        <button onclick="hideEditPopup()">Close</button>
                    </div>
                    @endforeach
                    
                </tbody>
            </table>
           
        </div>
    </div>

    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            var overlay = document.querySelector('.overlay');
            sidebar.classList.toggle('hide');
            overlay.classList.toggle('collapsed');
        }

        function showAddPopup() {
            document.getElementById('addPopup').style.display = 'block';
        }

        function hideAddPopup() {
            document.getElementById('addPopup').style.display = 'none';
        }

        function showEditPopup(element) {
            var row = element.closest('tr');
            var cells = row.children;
            document.getElementById('editVoucherName').value = cells[0].textContent;
            document.getElementById('editPointsRequired').value = cells[1].textContent;
            document.getElementById('editPopup').style.display = 'block';
            document.getElementById('editPopup').row = row; 
        }

        function hideEditPopup() {
            document.getElementById('editPopup').style.display = 'none';
        }

        if (document.getElementById('errorAlert')) {
        setTimeout(function() {
            document.getElementById('errorAlert').style.display = 'none';
        }, 5000); // Hide after 5 seconds
      }

    </script>
</body>

</html>
