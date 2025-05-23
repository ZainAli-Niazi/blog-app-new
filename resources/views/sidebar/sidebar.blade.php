  <!-- Sidebar Toggle Button -->
  <button class="sidebar-toggle">
      <i class="fas fa-bars"></i>
  </button>

  <!-- Sidebar -->
  <div class="sidebar">
      <div class="sidebar-header">
          <div class="text-center mb-4">
              <img src="{{ URL::to('/public/uploads/products/zain.jpg') }}" width="60" alt="zain ali" />
              <h6 class="mt-2 fw-bold">Niazi School<br><small class="text-muted">MANAGEMENT</small></h6>
          </div>
      </div>

      <!-- Sidebar nav -->
      <ul class="nav flex-column py-3">
          <li class="nav-item">
              <a href="#" class="nav-link active">
                  <i class="fas fa-home"></i>
                  Dashboard
              </a>
          </li>

          <li class="nav-item">
              <a class="nav-link text-dark" data-bs-toggle="collapse" href="#academicsMenu" role="button"
                  aria-expanded="false" aria-controls="academicsMenu">
                  <i class="fas fa-layer-group me-2"></i> Academics
              </a>
              <div class="collapse ps-3" id="academicsMenu">
                  <a href="#" class="nav-link small text-dark">Academic Years</a>
                  <a href="{{ route('extra') }}" class="nav-link small text-dark">Class</a>
                  <a href="{{ route('extra1') }}" class="nav-link small text-dark">Sections</a>
                  <a href="{{ route('extra2') }}" class="nav-link small text-dark">Subjects</a>
                  <a href="#" class="nav-link small text-dark">Assign Class Teacher</a>
                  <a href="#" class="nav-link small text-primary fw-bold">Assign Subject</a>
              </div>
          </li>

          <li class="nav-item">
              <a class="nav-link text-dark" data-bs-toggle="collapse" href="#communicateMenu" role="button"
                  aria-expanded="false" aria-controls="communicateMenu">
                  <i class="fas fa-bullhorn me-2"></i> Communicate
              </a>
              <div class="collapse ps-3" id="communicateMenu">
                  <a href="#" class="nav-link small text-dark">Notice Board</a>
                  <a href="#" class="nav-link small text-dark">SMS</a>
              </div>
          </li>

          <li class="nav-item">
              <a class="nav-link text-dark" data-bs-toggle="collapse" href="#studentsInfoMenu" role="button"
                  aria-expanded="false" aria-controls="studentsInfoMenu">
                  <i class="fas fa-user-graduate me-2"></i> Students Info
              </a>
              <div class="collapse ps-3" id="studentsInfoMenu">
                  <a href="#" class="nav-link small text-dark">Student List</a>
                  <a href="#" class="nav-link small text-dark">Admission</a>
              </div>
          </li>

          <li class="nav-item">
              <a class="nav-link text-dark" data-bs-toggle="collapse" href="#FeesMenu" role="button"
                  aria-expanded="false" aria-controls="FeesMenu">
                  <i class="fa-solid fa-money-check-dollar me-2"></i> Fees
              </a>
              <div class="collapse ps-3" id="FeesMenu">
                  <a href="#" class="nav-link small text-dark">Add Fees</a>
              </div>
          </li>

          <li class="nav-item">
              <a class="nav-link text-dark" data-bs-toggle="collapse" href="#homeworkMenu" role="button"
                  aria-expanded="false" aria-controls="homeworkMenu">
                  <i class="fas fa-book me-2"></i> Homework
              </a>
              <div class="collapse ps-3" id="homeworkMenu">
                  <a href="#" class="nav-link small text-dark">Add Homework</a>
                  <a href="#" class="nav-link small text-dark">Homework List</a>
              </div>
          </li>

          <li class="nav-item">
              <a class="nav-link text-dark" data-bs-toggle="collapse" href="#StudentReportMenu" role="button"
                  aria-expanded="false" aria-controls="StudentReportMenu">
                  <i class="fas fa-user-graduate me-2"></i> Student Report
              </a>
              <div class="collapse ps-3" id="StudentReportMenu">
                  <a href="#" class="nav-link small text-dark">Progress Report</a>
                  <a href="#" class="nav-link small text-dark">Student List</a>
              </div>
          </li>

          <li class="nav-item">
              <a class="nav-link text-dark" data-bs-toggle="collapse" href="#RolePermissionMenu" role="button"
                  aria-expanded="false" aria-controls="RolePermissionMenu">
                  <i class="fa-solid fa-gavel me-2"></i> Role & Permission
              </a>
              <div class="collapse ps-3" id="RolePermissionMenu">
                  <a href="#" class="nav-link small text-dark">Progress Report</a>
                  <a href="#" class="nav-link small text-dark">Homework List</a>
              </div>
          </li>

          <li class="nav-item">
              <a class="nav-link text-dark" data-bs-toggle="collapse" href="#AdministratorMenu" role="button"
                  aria-expanded="false" aria-controls="AdministratorMenu">
                  <i class="fa-solid fa-user-tie me-2"></i> Administrator
              </a>
              <div class="collapse ps-3" id="AdministratorMenu">
                  <ul class="nav flex-column ms-3">
                      <a href="#" class="nav-link small text-dark">Department</a>
                      <a href="#" class="nav-link small text-dark">Designation</a>
                      <a href="#" class="nav-link small text-dark">Staff</a>
                      <a href="#" class="nav-link small text-dark">User Settings</a>
                  </ul>
              </div>
          </li>

          <li class="nav-item">
              <a class="nav-link text-dark" data-bs-toggle="collapse" href="#LeaveMenu" role="button"
                  aria-expanded="false" aria-controls="LeaveMenu">
                  <i class="fa-solid fa-lungs-virus me-2"></i> Leave
              </a>
              <div class="collapse ps-3" id="LeaveMenu">
                  <a href="#" class="nav-link small text-dark">Leave Requests</a>
              </div>
          </li>

          <li class="nav-item">
              <a class="nav-link text-dark" data-bs-toggle="collapse" href="#SettingsMenu" role="button"
                  aria-expanded="false" aria-controls="SettingsMenu">
                  <i class="fa-solid fa-gear me-2"></i> Settings
              </a>
              <div class="collapse ps-3" id="SettingsMenu">
                  <a href="#" class="nav-link small text-dark">Profile Settings</a>
              </div>
          </li>
      </ul>
  </div>
