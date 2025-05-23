<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Niazi School Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f5f9;
            font-family: 'Segoe UI', sans-serif;
        }

        :root {
            --sidebar-width: 250px;
            --header-height: 60px;
            --primary-color: #4e73df;
            --sidebar-bg: #fff;
            --content-bg: #f8f9fc;
        }

        .sidebar {
            height: 100vh;
            width: var(--sidebar-width);
            background-color: var(--sidebar-bg);
            position: fixed;
            top: 0;
            left: 0;
            border-right: 1px solid #ddd;
            padding: 1.5rem 1rem;
            overflow-y: auto;
            z-index: 1000;
        }

        .sidebar a {
            text-decoration: none;
            color: #333;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: var(--primary-color);
            color: #fff !important;
            border-radius: 8px;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            padding: 30px 30px 0 30px;
            background-color: #f1f5f9;
        }

        .form-section {
            background: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        .form-title {
            font-weight: 800;
            font-size: 18px;
            margin-bottom: 20px;
            color: #333;
        }

        .required-star {
            color: red;
        }

        .top-buttons {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            z-index: 1000;
        }

        .top-buttons a,
        .top-buttons button {
            width: 100px;
        }

        .top-buttons a {
            padding: 0 0 10px 20%;
            color: #dc3545;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer {
            text-align: center;
            padding: 20px 0;
            font-size: 14px;
            color: #777;
        }

        .footer a {
            color: #dc3545;
            text-decoration: none;
        }

        .profile-section {
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }

        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 20px;
        }

        .section-title {
            color: #2c3e50;
            font-size: 1.5rem;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .info-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px 15px;
            border: 1px solid #ced4da;
        }

        .divider {
            border-top: 1px solid #e9ecef;
            margin: 30px 0;
        }

        .password-section {
            margin-top: 25px;
        }

        .required-star {
            color: red;
            font-weight: bold;
        }

        .btn-save {
            background-color: #3498db;
            color: white;
            padding: 8px 20px;
            border-radius: 5px;
            border: none;
        }

        .card-box {
            border-radius: 12px;
            padding: 20px;
            color: #fff;
            text-align: center;
        }

        .card-box i {
            font-size: 24px;
        }

        .notice-board {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-top: 30px;
        }
    
        /* Main Content Styles */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            min-height: calc(100vh - var(--header-height));
        }

        /* Student Table Container */
        .student-table-container {
            max-height: calc(100vh - 250px);
            overflow: auto;
            display: block;
            position: relative;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            background: white;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        }

        .student-table-container table {
            width: 100%;
            min-width: 1000px;
        }

        .student-table-container th {
            position: sticky;
            top: 0;
            background: white;
            z-index: 10;
            box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.1);
        }

        /* Custom scrollbar like attendance table */
        .student-table-container::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        .student-table-container::-webkit-scrollbar-thumb {
            background: #6c757d;
            border-radius: 10px;
        }

        .student-table-container::-webkit-scrollbar-track {
            background: #f8f9fa;
            border-radius: 10px;
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
            justify-content: flex-end;
            padding: 0 20px;
        }

        /* Search Box */
        .search-box {
            background: white;
            border-radius: 8px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            padding: 15px;
            margin-bottom: 20px;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .action-btn {
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
        }

        .fullscreen-student-list {
            position: fixed !important;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100% !important;
            height: 100% !important;
            z-index: 1050;
            background: white;
            overflow: auto;
            padding: 2rem;
            margin: 0 !important;
            border-radius: 0 !important;
        }

        .fullscreen-student-list .card-body {
            height: calc(100vh - 4rem);
            overflow-y: auto;
        }

        .fullscreen-student-list .fa-expand-arrows-alt {
            display: none;
        }

        .fullscreen-student-list .fa-compress-arrows-alt {
            display: inline;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .sidebar {
                width: 220px;
            }
            .main-content {
                margin-left: 220px;
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding-top: 80px;
            }
            .top-buttons {
                position: fixed;
                top: 15px;
                right: 15px;
                flex-direction: row;
                gap: 10px;
                align-items: center;
            }
            .top-buttons a {
                padding: 0;
                margin-right: 0;
            }
            .top-buttons button {
                display: none; /* Hide Add New button on mobile */
            }
            .sidebar-toggle {
                display: block !important;
                position: fixed;
                top: 15px;
                left: 15px;
                z-index: 1050;
                background: #4a6cf7;
                color: white;
                border: none;
                border-radius: 5px;
                padding: 5px 10px;
            }
            .d-flex.justify-content-between.align-items-center.mb-4 {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 576px) {
            .form-section {
                padding: 15px;
            }
            .main-content {
                padding: 15px;
            }
            .top-buttons {
                position: fixed;
                top: 15px;
                right: 15px;
                margin-top: 0;
                width: auto;
            }
            .top-buttons a {
                width: auto;
                padding: 5px 10px;
            }
        }

        .sidebar-toggle {
            display: none;
        }
        .form-label {
            font-weight: 500;
        }
    </style>
</head>

<body>
    <!-- Sidebar Toggle Button -->
    <button class="sidebar-toggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="text-center mb-4">
            <img src="{{ URL::to('/public/uploads/products/zain.jpg') }}" width="60" alt="zain ali" />
            <h6 class="mt-2 fw-bold"> Niazi School<br><small class="text-muted">MANAGEMENT</small></h6>
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <i class="fas fa-user-graduate me-2"></i> Students
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-chalkboard-teacher me-2"></i> Teachers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-book me-2"></i> Classes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-calendar-alt me-2"></i> Attendance
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-money-bill-wave me-2"></i> Fees
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-envelope me-2"></i> Notices
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-cog me-2"></i> Settings
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold">Add Student</h3>
            </div>
            <div class="top-buttons">
                <a href="#" class="text-danger">LogOut</a>
            </div>
        </div>

        <!-- Error Messages -->
        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- ACADEMIC INFO -->
            <div class="form-section">
                <div class="form-title">ACADEMIC INFORMATION</div>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Academic Year <span class="required-star">*</span></label>
                        <select class="form-select @error('academic_year') is-invalid @enderror" name="academic_year" required>
                            <option disabled selected>Select year</option>
                            <option value="2023-2024" {{ old('academic_year') == '2023-2024' ? 'selected' : '' }}>2023-2024</option>
                            <option value="2024-2025" {{ old('academic_year') == '2024-2025' ? 'selected' : '' }}>2024-2025</option>
                            <option value="2025-2026" {{ old('academic_year') == '2025-2026' ? 'selected' : '' }}>2025-2026</option>
                        </select>
                        @error('academic_year')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-3">
                        <label class="form-label">Class <span class="required-star">*</span></label>
                        <select class="form-select @error('class') is-invalid @enderror" name="class" required>
                            <option disabled selected>Select class</option>
                            <option value="1st" {{ old('class') == '1st' ? 'selected' : '' }}>1st</option>
                            <option value="2nd" {{ old('class') == '2nd' ? 'selected' : '' }}>2nd</option>
                            <option value="3rd" {{ old('class') == '3rd' ? 'selected' : '' }}>3rd</option>
                        </select>
                        @error('class')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-3">
                        <label class="form-label">Section <span class="required-star">*</span></label>
                        <select class="form-select @error('section') is-invalid @enderror" name="section" required>
                            <option disabled selected>Select section</option>
                            <option value="A" {{ old('section') == 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ old('section') == 'B' ? 'selected' : '' }}>B</option>
                        </select>
                        @error('section')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-3">
                        <label class="form-label">Admission ID</label>
                        <input type="text" class="form-control @error('admission_id') is-invalid @enderror" 
                               name="admission_id" placeholder="Auto-generated if empty" value="{{ old('admission_id') }}">
                        @error('admission_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-3">
                        <label class="form-label">Admission Date <span class="required-star">*</span></label>
                        <input type="date" class="form-control @error('admission_date') is-invalid @enderror" 
                               name="admission_date" required value="{{ old('admission_date') }}">
                        @error('admission_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- PERSONAL INFO -->
            <div class="form-section">
                <div class="form-title">PERSONAL INFORMATION</div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Student Name <span class="required-star">*</span></label>
                        <input type="text" class="form-control @error('student_name') is-invalid @enderror" 
                               name="student_name" placeholder="Enter student name" required value="{{ old('student_name') }}">
                        @error('student_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">Father's Name <span class="required-star">*</span></label>
                        <input type="text" class="form-control @error('father_name') is-invalid @enderror" 
                               name="father_name" placeholder="Enter father's name" required value="{{ old('father_name') }}">
                        @error('father_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label">Date of Birth <span class="required-star">*</span></label>
                        <input type="date" class="form-control @error('dob') is-invalid @enderror" 
                               name="dob" required value="{{ old('dob') }}">
                        @error('dob')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label">Gender <span class="required-star">*</span></label>
                        <select class="form-select @error('gender') is-invalid @enderror" name="gender" required>
                            <option disabled selected>Select gender</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-4">
                        <label class="form-label">Religion</label>
                        <select class="form-select @error('religion') is-invalid @enderror" name="religion">
                            <option disabled selected>Select religion</option>
                            <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                            <option value="Christianity" {{ old('religion') == 'Christianity' ? 'selected' : '' }}>Christianity</option>
                            <option value="Hinduism" {{ old('religion') == 'Hinduism' ? 'selected' : '' }}>Hinduism</option>
                        </select>
                        @error('religion')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- CONTACT INFO -->
            <div class="form-section">
                <div class="form-title">CONTACT INFORMATION</div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Email (optional)</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               name="email" placeholder="Enter email" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">Phone <span class="required-star">*</span></label>
                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                               name="phone" placeholder="Enter phone number" required value="{{ old('phone') }}">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">Country <span class="required-star">*</span></label>
                        <select class="form-select @error('country') is-invalid @enderror" name="country" required>
                            <option disabled selected>Select country</option>
                            <option value="Pakistan" {{ old('country') == 'Pakistan' ? 'selected' : '' }}>Pakistan</option>
                            <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                            <option value="UAE" {{ old('country') == 'UAE' ? 'selected' : '' }}>UAE</option>
                        </select>
                        @error('country')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">Address <span class="required-star">*</span></label>
                        <textarea class="form-control @error('address') is-invalid @enderror" 
                                  name="address" rows="2" placeholder="Enter address" required>{{ old('address') }}</textarea>
                        @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- DOCUMENTS -->
            <div class="form-section">
                <div class="form-title">DOCUMENTS</div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Student Photo <span class="required-star">*</span></label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" 
                               name="photo" required>
                        @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">Birth Certificate <span class="required-star">*</span></label>
                        <input type="file" class="form-control @error('birth_certificate') is-invalid @enderror" 
                               name="birth_certificate" required>
                        @error('birth_certificate')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="col-md-6">
                        <label class="form-label">Parent ID Proof (optional)</label>
                        <input type="file" class="form-control @error('parent_id_proof') is-invalid @enderror" 
                               name="parent_id_proof">
                        @error('parent_id_proof')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Submit</button>
                <p class="mt-2 text-muted"><small>Fields marked with <span class="text-danger">*</span> are required.</small></p>
            </div>
        </form>
    </div>

    <div class="footer mt-5">
        2025 © Niazi School MANAGEMENT Developed By <a href="#"> Zain Ali</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Toggle sidebar on mobile
        document.querySelector('.sidebar-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('show');
        });
    </script>
</body>
</html>