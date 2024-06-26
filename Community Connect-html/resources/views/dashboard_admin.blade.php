<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
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
        input[type="text"] {
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

        /* CSS for prettifying icons */
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

        /* CSS for icons in sidebar */
       .side_navbar i {
            color: #dadfce;
        }

        /* Add hover effect to sidebar menu */
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

        /* Adjust overlay layout when sidebar is hidden */
       .overlay.collapsed {
            display: none;
        }

        /* CSS for recent summary */
       .summary {
            margin-top: 20px;
            display: flex;
            flex-wrap: nowrap; /* Prevent wrapping to new line */
            overflow-x: auto; /* Add horizontal scrollbar if too many cards */
        }

       .summary-item {
            width: calc(25% - 20px); /* Divide width into 25% for single row */
            margin-right: 20px;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
        }

        /* CSS for icons in card box */
       .summary-item.icon-wrapper {
            display: flex;
            align-items: center;
        }

       .summary-item.icon-counter {
            margin-left: 5px;
            padding: 5px 10px; /* Increase padding */
            background-color: #007bff;
            color: white;
            border-radius: 15px;
            font-weight: bold;
            font-size: 1.5rem; /* Increase font size */
        }

       .summary-item i {
            font-size: 36px; /* Increase icon font size */
            margin-right: 10px;
            padding: 10px; /* Add padding */
            background-color: rgba(255, 255, 255, 0.5); /* Transparent background color */
            border-radius: 50%; /* Make border radius a circle */
        }

        /* Customize box colors and styles */
       .new-users,
       .total-users,
       .communities,
       .volunteer-activities {
            background-color: #60bcd3d7; /* Background color */
            border: 2px solid #817c74; /* Border color */
            color: #000; /* Text color */
        }

        /* Style for card name */
       .cardName {
            color: var(--black2);
            font-size: 1.1rem;
            margin-top: 5px;
        }

        /* Customize box colors and styles */
       .new-users {
            background-color: #60bcd3d7; /* Background color */
            border: 2px solid #817c74; /* Border color */
            color: #000; /* Text color */
        }

       .total-users {
            background-color: #60bcd3d7; /* Background color */
            border: 2px solid #817c74; /* Border color */
            color: #000; /* Text color */
        }

       .communities {
            background-color: #60bcd3d7; /* Background color */
            border: 2px solid #817c74; /* Border color */
            color: #000; /* Text color */
        }

       .volunteer-activities {
            background-color: #60bcd3d7; /* Background color */
            border: 2px solid #817c74; /* Border color */
            color: #000; /* Text color */
        }

        /* Fix layout for upcoming activities and recent users columns */
       .activities-and-recent-users {
            display: flex;
        }

       .activities {
            flex: 1;
            margin-right: 20px;
        }

       .activities h2 {
            margin-bottom: 10px;
        }

       .recent-users {
            flex: 1;
        }

       .user-card {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

       .user-card img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

       .user-card i {
            font-size: 24px;
            margin-right: 10px;
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
            <a href="dashboard_admin.html"><i class="fas fa-home"></i> Home</a>
            <a href="history.html"><i class="fas fa-user-shield"></i> User</a>
            <a href="poin.html"><i class="fas fa-users"></i> Community</a>
            <a href="#"><i class="fas fa-calendar-alt"></i> Event</a>
            <a href="#"><i class="fas fa-envelope"></i> Massage</a>
            <div class="links">
                <a href="#"><i class="fas fa-cog"></i> Settings</a>
                <a href="#"><i class="fas fa-question-circle"></i> Helpdesk</a>
                <a href="#"><i class="fas fa-sign-out-alt"></i> Log Out</a>
            </div>
        </div>
        <div class="toggle-btn" onclick="toggleSidebar()">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
   
    <div class="overlay" onclick="toggleSidebar()"></div>

    <div class="main-body">
        <div class="user-table">
            <h2></h2>
            <div class="summary">
                <!-- Modify HTML -->
                <div class="summary-item new-users">
                    <div class="icon-wrapper">
                        <i class="fas fa-user-plus"></i>
                        <div class="icon-counter">{{ $user->count() }}</div> <!-- Add element for displaying number -->
                    </div>
                    <div class="bar-padding">
                        <div class="bar" style="width: 20%;"></div>
                    </div>
                    <span>New Users</span>
                </div>
                <div class="summary-item total-users">
                    <i class="fas fa-users"></i>
                    <div class="bar-padding">
                        <div class="bar" style="width: 70%;">{{ $user->count() }}</div>
                    </div>
                    <span>Total Users</span>
                </div>
               
                <div class="summary-item communities">
                    <i class="fas fa-users"></i>
                    <div class="bar-padding">
                        <div class="bar" style="width: 30%;"></div>
                    </div>
                    <span>Communities</span>
                </div>
                <div class="summary-item volunteer-activities">
                    <i class="fas fa-hand-holding-heart"></i>
                    <div class="bar-padding">
                        <div class="bar" style="width: 20%;">{{ $kegiatan->count() }}</div>
                    </div>
                    <span>Volunteer Activities</span>
                </div>
            </div>
            <!-- Add two padding divs below card box -->
            <style>
              /* Add status-specific styles */
              td.status-soon {
                  padding: 10px;
                  background-color: #007bff; /* Biru untuk status Soon */
                  color: white;
              }
      
              td.status-on-progress {
                  padding: 10px;
                  background-color: #ffc107; /* Kuning untuk status On Progress */
              }
      
              td.status-done {
                  padding: 10px;
                  background-color: #28a745; /* Hijau untuk status Done */
                  color: white;
              }
      
              /* Remove border for table */
              table {
                  width: 100%;
                  border-collapse: collapse;
                  margin-bottom: 20px;
              }
      
              th,
              td {
                  padding: 10px;
                  text-align: left;
              }
      
              th {
                  background-color: #6ba488bc;
                  color: white;
              }
      
              /* Remove borders for table */
              table th,
              table td {
                  border: none;
              }
      
              /* Style alternating rows */
              tr:nth-child(even) {
                  background-color: #f2f2f2;
              }
              .activities {
                flex: 2; /* Menyesuaikan lebar kolom "Upcoming Activities" */
                margin-right: 20px;
            }
            
            .recent-users {
                flex: 1; /* Menyesuaikan lebar kolom "Recent Users" */
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
                  <a href="/admin/reward"><i class="fas fa-users"></i> Reward</a>
                  <a href="#"><i class="fas fa-calendar-alt"></i> Event</a>
                  <a href="#"><i class="fas fa-envelope"></i> Massage</a>
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
      
                  <!-- Add two padding divs below card box -->
                  <div class="activities-and-recent-users">
                      <div class="activities">
                          <h2>Upcoming Activities</h2>
                          <table>
                              <thead>
                                  <tr>
                                      <th>Tanggal Kegiatan</th>
                                      <th>Nama Kegiatan</th>
                                      <th>Jumlah Peserta</th>
                                      <th>Status</th>
                                  </tr>
                              </thead>
                              <tbody>
                                @foreach ($kegiatan as $item)
                                <tr>
                                    <td>{{ $item->waktu_pelaksanaan }}</td>
                                    <td>{{ $item->nama_kegiatan }}</td>
                                    <td>{{ $item->jumlah_relawan }} </td>
                                    @if ($item->status == 1)
                                        <td class="status-done">Done</td>
                                    @else
                                        <td class="status-soon">Soon</td>
                                    @endif
                                    
                                </tr>
                                @endforeach
                                  <!-- Add more rows as needed -->
                              </tbody>
                          </table>
                      </div>
                      <div class="recent-users">
                          <h2>Recent Users</h2>
                          <!-- Add .user-card and <i> for profile icon -->
                            @foreach ($user as $item)
                            <div class="user-card">
                                <i class="fas fa-user"></i>
                                <img src="{{ asset('images/profile.jpg') }}" alt="Profile Picture">
                                <span>{{ $item->name }}</span>
                            </div>  
                            @endforeach
                         
                          <!-- Add more user-cards as needed -->
                      </div>
                  </div>
              </div>
          </div>
      
          <script>
              // JavaScript section
              function editUser(userId) {
                  // Logic for editing user
              }
      
              function deleteUser(userId) {
                  // Show pop-up for ban reason
                  document.getElementById('banPopup').style.display = 'block';
              }
          </script>
      </body>
      
      </html>