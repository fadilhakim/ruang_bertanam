<style>
    .ui-menu {
        list-style: none;
        padding: 0;
        margin: 0 0 0 100px;
        display: block;
        outline: none;
        z-index:999;
    }
</style>

<nav class="navbar">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>

    <div class="navbar-content">

      <form class="form-group" style="margin-top:15px; width:50%">
        <div class="row">
          <div class="col-lg-8">

             <input style="z-index:999" type="text" name="project-update" id="project-update-search" placeholder="Search Plant ..." class="form-control">
            <!-- <select style="display:inline-block;" id="project-update-search" name="project-update">
              <option value="#">-- Cari Project --</option>
              <option value="all-projects/update/1">
                [9031301] Pengadaan DSCP Telkomsat
              </option>
              <option value="all-projects/update/2"> [9031301] Pengadaan Satelit Bapala</option>
            </select> -->
          </div>
          <div class="col-lg-4">
            <!-- <input style="display:inline-block;" class="btn btn-primary" type="submit" value="Cari"> -->
          </div>
        </div>

      </form>

      <ul class="navbar-nav">
          <li class="nav-item">
            <p class="name mb-0">Selamat Datang <span class="font-weight-bold"><?=$this->session->userdata("fullname")?></span></p>
          </li>
          <li class="nav-item dropdown nav-profile">
              <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="<?= base_url() ?>/admin_assets/images/man.png" alt="userr">
              </a>
              <div class="dropdown-menu" aria-labelledby="profileDropdown">
                  <div class="dropdown-header d-flex flex-column align-items-center">
                      <div class="figure mb-3">
                          <img src="<?= base_url() ?>/admin_assets/images/man.png" alt="">
                      </div>
                      <div class="info text-center">
                          <p class="name font-weight-bold mb-0"><?=$this->session->userdata("fullname")?></p>
                          <p class="email text-muted mb-3"><?=$this->session->userdata("email")?></p>
                      </div>
                  </div>
                  <div class="dropdown-body">
                      <ul class="profile-nav p-0 pt-3">
                          <!-- <li class="nav-item">
                              <a href="pages/general/profile.html" class="nav-link">
                                  <i data-feather="user"></i>
                                  <span>Profile</span>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="javascript:;" class="nav-link">
                                  <i data-feather="edit"></i>
                                  <span>Edit Profile</span>
                              </a>
                          </li> -->

                          <li class="nav-item">
                              <a href="<?=base_url("logout")?>" class="nav-link">
                                  <i data-feather="log-out"></i>
                                  <span>Log Out</span>
                              </a>
                          </li>
                      </ul>
                  </div>
              </div>
          </li>
      </ul>
    </div>
</nav>
