<nav class="sidebar">
  <div style="background-color:#ff0042; border-right:0px;" class="sidebar-header">
    <a href="#" class="sidebar-brand">
      Ruang<span style="color:#fff;"> Bertanam</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span style="background:#fff"></span>
      <span style="background:#fff"></span>
      <span style="background:#fff"></span>
    </div>
  </div>
  <div class="sidebar-body" style="border-right:0px;">
    <ul class="nav">
      <li class="nav-item nav-category">Menu Utama</li>
     
      <!-- <li class="nav-item">
        <a href="<?=base_url("dashboard")?>" class="nav-link">
          <i class="link-icon" data-feather="box"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li> -->
      <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#dashboard" role="button" aria-expanded="false" aria-controls="projects">
            <i class="link-icon" data-feather="monitor"></i>
            <span class="link-title">Dashboard</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="dashboard">
            <ul class="nav sub-menu">
              <!-- <li class="nav-item">
                <a href="<?= base_url("dashboard_chart") ?>" class="nav-link">All Node Status & Projects</a>
              </li> -->
             
            </ul>
          </div>
      </li>
     
      <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#projects" role="button" aria-expanded="false" aria-controls="projects">
            <i class="link-icon" data-feather="file-text"></i>
            <span class="link-title"> Plants </span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="projects">
            <ul class="nav sub-menu">
              <li class="nav-item">
                <a href="<?= base_url("admin/plants") ?>" class="nav-link">Plants</a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("admin/family_plants") ?>" class="nav-link">Family Plants</a>
              </li>
            </ul>
          </div>
      </li>
    
      <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#history" role="button" aria-expanded="false" aria-controls="history">
            <i class="link-icon" data-feather="save"></i>
            <span class="link-title">History</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
          </a>
          <div class="collapse" id="history">
            <ul class="nav sub-menu">
              <!-- <li class="nav-item">
                <a href="<?= base_url("history/project-update") ?>" class="nav-link">Project Update Logs</a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url("history/users") ?>" class="nav-link">Users Logs</a>
              </li> -->
            </ul>
          </div>
      </li>
     
      <li class="nav-item nav-category">Menu Admin</li>
			
      <li class="nav-item">
        <a href="<?=base_url("admin/user")?>" class="nav-link">
          <i class="link-icon" data-feather="user"></i>
          <span class="link-title">User List</span>
        </a>

      </li>
			
			<li class="nav-item">
				<a href="<?=base_url("admin/group")?>" class="nav-link">
          <i class="link-icon" data-feather="layers"></i>
          <span class="link-title">Group List</span>
        </a>
			</li>
		

    </ul>
  </div>
</nav>
