<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --sidebar-width: 250px;
            --header-height: 60px;
            --primary-color: #4e73df;
            --sidebar-bg: #fff;
            --content-bg: #f8f9fc;
            --secondary-color: #6c757d;
            --success-color: #28a745;
        }

        body {
            overflow-x: hidden;
            background-color: var(--content-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: var(--sidebar-bg);
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            z-index: 100;
            overflow-y: auto;
            padding: 20px 0;
            transition: transform 0.3s ease;
        }

        .sidebar .nav-link {
            padding: 0.75rem 1rem;
            margin: 2px 10px;
            border-radius: 6px;
            transition: all 0.3s;
            color: #495057;
            font-weight: 500;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(78, 115, 223, 0.1);
            color: var(--primary-color) !important;
        }

        .sidebar .nav-link.active {
            background-color: var(--primary-color);
            color: white !important;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.1);
        }

        .sidebar .nav-link i {
            width: 20px;
            text-align: center;
            margin-right: 10px;
        }

        /* Logo and School Info */
        .sidebar-brand {
            text-align: center;
            padding: 1rem 0.5rem;
            margin-bottom: 1rem;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .sidebar-brand img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid var(--primary-color);
            margin-bottom: 10px;
        }

        .sidebar-brand h5 {
            font-weight: 700;
            margin-bottom: 0;
            color: var(--primary-color);
        }

        .sidebar-brand small {
            font-size: 0.75rem;
            color: var(--secondary-color);
        }

        /* Submenu Styles */
        .sidebar .submenu {
            padding-left: 20px;
        }

        .sidebar .submenu .nav-link {
            padding: 0.5rem 1rem;
            font-size: 0.85rem;
            margin: 2px 0;
        }

        /* Main Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            min-height: calc(100vh - var(--header-height));
            transition: margin-left 0.3s ease;
            position: relative;
        }

        /* Header Styles */
        .main-header {
            height: var(--header-height);
            background: white;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            position: fixed;
            top: 0;
            right: 0;
            left: var(--sidebar-width);
            z-index: 99;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            transition: left 0.3s ease;
        }

        .header-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #343a40;
        }

        .user-dropdown .dropdown-toggle {
            display: flex;
            align-items: center;
            color: #495057;
        }

        .user-dropdown .dropdown-toggle::after {
            margin-left: 10px;
        }

        .user-dropdown img {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            margin-right: 8px;
            object-fit: cover;
        }

        /* Card Styles */
        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1.5rem rgba(58, 59, 69, 0.2);
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1rem 1.25rem;
            border-radius: 8px 8px 0 0 !important;
        }

        .card-title {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0;
        }

        /* Search and Filter Section */
        .search-filter-card {
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .search-filter-card .card-body {
            padding: 1.5rem;
        }

        /* Table Styles */
        .table-container {
            max-height: calc(100vh - 300px);
            overflow: auto;
            border-radius: 8px;
            background: white;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        }

        .table-container table {
            width: 100%;
            min-width: 1000px;
            margin-bottom: 0;
        }

        .table-container th {
            position: sticky;
            top: 0;
            background: #f8f9fa !important;
            z-index: 10;
            padding: 1rem;
            font-weight: 600;
            color: #495057;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        .table-container td {
            padding: 0.75rem 1rem;
            vertical-align: middle;
        }

        .table-container tr:hover td {
            background-color: rgba(78, 115, 223, 0.05);
        }

        .student-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #e9ecef;
        }

        /* Status Badges */
        .badge {
            padding: 0.4em 0.6em;
            font-weight: 500;
            font-size: 0.75rem;
        }

        .badge-active {
            background-color: var(--success-color);
        }

        .badge-inactive {
            background-color: var(--secondary-color);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            border: none;
            transition: all 0.3s;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .action-btn-view {
            background-color: rgba(23, 162, 184, 0.1);
            color: #17a2b8;
        }

        .action-btn-edit {
            background-color: rgba(255, 193, 7, 0.1);
            color: #ffc107;
        }

        .action-btn-delete {
            background-color: rgba(220, 53, 69, 0.1);
            color: #dc3545;
        }

        /* Fullscreen Mode */
        .fullscreen-mode {
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            right: 0 !important;
            bottom: 0 !important;
            width: 100% !important;
            height: 100% !important;
            z-index: 1050;
            background: white;
            margin: 0 !important;
            padding: 20px !important;
            overflow: auto;
        }

        .fullscreen-mode .table-container {
            max-height: 100vh !important;
            height: calc(100vh - 60px) !important;
            border-radius: 0 !important;
        }

        .fullscreen-mode .main-header {
            left: 0 !important;
            z-index: 1051;
        }

        /* Fullscreen toggle button */
        .fullscreen-toggle {
            position: fixed;
            top: 80px;
            right: 30px;
            z-index: 10;
            background: rgba(255, 255, 255, 0.9);
            border: 1px solid #e0e0e0;
            border-radius: 50%;
            color: var(--secondary-color);
            font-size: 1.25rem;
            cursor: pointer;
            transition: all 0.3s;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .fullscreen-toggle:hover {
            color: var(--primary-color);
            transform: scale(1.1);
            background: white;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .main-header {
                left: 0;
            }

            .sidebar-toggle {
                display: block !important;
            }
        }

        @media (max-width: 768px) {
            .search-filter-card .row.g-3>div {
                margin-bottom: 10px;
            }

            .search-filter-card .row.g-3>div:last-child {
                margin-bottom: 0;
            }

            .fullscreen-toggle {
                top: 70px;
                right: 20px;
            }
        }

        /* Sidebar Toggle Button */
        .sidebar-toggle {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 999;
            display: none;
            background: var(--primary-color);
            color: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: all 0.3s;
        }

        .sidebar-toggle:hover {
            transform: scale(1.1);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-thumb {
            background: #adb5bd;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f3f5;
            border-radius: 10px;
        }

        /* Pagination */
        .pagination {
            justify-content: center;
            margin-top: 20px;
        }

        .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .page-link {
            color: var(--primary-color);
        }
    </style>
</head>

<body>
    <!-- Sidebar Toggle Button -->
    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <img src="https://via.placeholder.com/70" alt="School Logo">
            <h5>Niazi School</h5>
            <small>MANAGEMENT SYSTEM</small>
        </div>

        <!-- Sidebar Navigation -->
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="collapse" href="#studentMenu" role="button"
                    aria-expanded="true" aria-controls="studentMenu">
                    <i class="fas fa-user-graduate"></i> Students
                </a>
                <div class="collapse show submenu" id="studentMenu">
                    <a href="#" class="nav-link active">Student List</a>
                    <a href="#" class="nav-link">Add Student</a>
                    <a href="#" class="nav-link">Promote Students</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#attendanceMenu" role="button"
                    aria-expanded="false" aria-controls="attendanceMenu">
                    <i class="fas fa-calendar-check"></i> Attendance
                </a>
                <div class="collapse submenu" id="attendanceMenu">
                    <a href="#" class="nav-link">Daily Attendance</a>
                    <a href="#" class="nav-link">Reports</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#classMenu" role="button" aria-expanded="false"
                    aria-controls="classMenu">
                    <i class="fas fa-layer-group"></i> Classes
                </a>
                <div class="collapse submenu" id="classMenu">
                    <a href="#" class="nav-link">Class List</a>
                    <a href="#" class="nav-link">Sections</a>
                    <a href="#" class="nav-link">Subjects</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#teacherMenu" role="button" aria-expanded="false"
                    aria-controls="teacherMenu">
                    <i class="fas fa-chalkboard-teacher"></i> Teachers
                </a>
                <div class="collapse submenu" id="teacherMenu">
                    <a href="#" class="nav-link">Teacher List</a>
                    <a href="#" class="nav-link">Add Teacher</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#feeMenu" role="button" aria-expanded="false"
                    aria-controls="feeMenu">
                    <i class="fas fa-money-bill-wave"></i> Fees
                </a>
                <div class="collapse submenu" id="feeMenu">
                    <a href="#" class="nav-link">Fee Structure</a>
                    <a href="#" class="nav-link">Fee Collection</a>
                    <a href="#" class="nav-link">Reports</a>
                </div>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-cog"></i> Settings
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Header -->
    <header class="main-header">
        <div class="header-title">
            <i class="fas fa-user-graduate me-2"></i> Student Management
        </div>
        <div class="user-dropdown">
            <button class="btn dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown"
                aria-expanded="false">
                <img src="https://via.placeholder.com/32" alt="User Image">
                Admin
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
            </ul>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content" id="mainContent">
        <!-- Fullscreen Toggle Button - Positioned fixed on the right side -->
        <button class="fullscreen-toggle" id="fullscreenToggle" title="Toggle Fullscreen">
            <i class="fas fa-expand"></i>
        </button>

        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Student List</h1>
                <a href="#" class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i> Add Student
                </a>
            </div>

            <!-- Search and Filter Card -->
            <div class="card search-filter-card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-4"><i class="fas fa-search me-2"></i>Search & Filter</h5>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label for="studentName" class="form-label">Student Name</label>
                                <input type="text" class="form-control" id="studentName"
                                    placeholder="Enter name">
                            </div>
                            <div class="col-md-2">
                                <label for="rollNumber" class="form-label">Roll Number</label>
                                <input type="text" class="form-control" id="rollNumber" placeholder="Roll no">
                            </div>
                            <div class="col-md-2">
                                <label for="classSelect" class="form-label">Class</label>
                                <select class="form-select" id="classSelect">
                                    <option selected value="">All Classes</option>
                                    <option>Class 1</option>
                                    <option>Class 2</option>
                                    <option>Class 3</option>
                                    <option>Class 4</option>
                                    <option>Class 5</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="sectionSelect" class="form-label">Section</label>
                                <select class="form-select" id="sectionSelect">
                                    <option selected value="">All Sections</option>
                                    <option>Section A</option>
                                    <option>Section B</option>
                                    <option>Section C</option>
                                </select>
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary me-2">
                                    <i class="fas fa-search me-2"></i> Search
                                </button>
                                <button type="reset" class="btn btn-outline-secondary">
                                    <i class="fas fa-sync-alt me-2"></i> Reset
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Student List Card -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="fas fa-list me-2"></i>Student Records</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-container" id="studentTableContainer">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Student Name</th>
                                    <th>Admission ID</th>
                                    <th>Roll No</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Father Name</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><img src="https://via.placeholder.com/40" alt="Student" class="student-img">
                                    </td>
                                    <td>Md. Mehedi Hasan</td>
                                    <td>ST-2023-001</td>
                                    <td>101</td>
                                    <td>Class 1</td>
                                    <td>Section A</td>
                                    <td>Md. Rahman</td>
                                    <td>+8801712345678</td>
                                    <td><span class="badge badge-active">Active</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn action-btn-view">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn action-btn-edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn action-btn-delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><img src="https://via.placeholder.com/40" alt="Student" class="student-img">
                                    </td>
                                    <td>Sara Ahmed</td>
                                    <td>ST-2023-002</td>
                                    <td>102</td>
                                    <td>Class 1</td>
                                    <td>Section A</td>
                                    <td>Usman Ahmed</td>
                                    <td>+8801812345678</td>
                                    <td><span class="badge badge-active">Active</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn action-btn-view">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn action-btn-edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn action-btn-delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><img src="https://via.placeholder.com/40" alt="Student" class="student-img">
                                    </td>
                                    <td>Bilal Raza</td>
                                    <td>ST-2023-003</td>
                                    <td>103</td>
                                    <td>Class 2</td>
                                    <td>Section B</td>
                                    <td>Imran Raza</td>
                                    <td>+8801912345678</td>
                                    <td><span class="badge badge-active">Active</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn action-btn-view">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn action-btn-edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn action-btn-delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><img src="https://via.placeholder.com/40" alt="Student" class="student-img">
                                    </td>
                                    <td>Fatima Noor</td>
                                    <td>ST-2023-004</td>
                                    <td>104</td>
                                    <td>Class 2</td>
                                    <td>Section B</td>
                                    <td>Noor Muhammad</td>
                                    <td>+8801512345678</td>
                                    <td><span class="badge badge-inactive">Inactive</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn action-btn-view">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn action-btn-edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn action-btn-delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><img src="https://via.placeholder.com/40" alt="Student" class="student-img">
                                    </td>
                                    <td>Hassan Ali</td>
                                    <td>ST-2023-005</td>
                                    <td>105</td>
                                    <td>Class 3</td>
                                    <td>Section C</td>
                                    <td>Ali Akbar</td>
                                    <td>+8801612345678</td>
                                    <td><span class="badge badge-active">Active</span></td>
                                    <td>
                                        <div class="action-buttons">
                                            <button class="action-btn action-btn-view">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="action-btn action-btn-edit">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-btn action-btn-delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');

            if (window.innerWidth <= 992 &&
                !sidebar.contains(event.target) &&
                !sidebarToggle.contains(event.target) &&
                sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });

        // Fullscreen functionality
        const fullscreenToggle = document.getElementById('fullscreenToggle');
       
        let isFullscreen = false;

        fullscreenToggle.addEventListener('click', toggleFullscreen);

        // Also support ESC key to exit fullscreen
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && isFullscreen) {
                toggleFullscreen();
            }
        });

        function toggleFullscreen() {
            isFullscreen = !isFullscreen;

            if (isFullscreen) {
                // Enter fullscreen
                mainContent.classList.add('fullscreen-mode');
                document.body.style.overflow = 'hidden';
                fullscreenToggle.innerHTML = '<i class="fas fa-compress"></i>';
                fullscreenToggle.title = 'Exit Fullscreen';
            } else {
                // Exit fullscreen
                mainContent.classList.remove('fullscreen-mode');
                document.body.style.overflow = '';
                fullscreenToggle.innerHTML = '<i class="fas fa-expand"></i>';
                fullscreenToggle.title = 'Toggle Fullscreen';
            }

            // Move focus to the toggle button for better accessibility
            fullscreenToggle.focus();
        }
    </script>
</body>

</html>



























