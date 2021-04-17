<style type="text/css">
    
    .page-content {
        background-image: url(<?=base_url("admin_assets/images/login_bg.png")?>);
        background-size: cover;
    }
</style>
<div style="height: 100vh" class="page-content d-flex align-items-center justify-content-center">
    <div class="row w-100 auth-page">
        
        <div class="col-md-6 col-xl-6 mx-auto">
            <div class="card">
                <img style="position: absolute; right:20px; top:20px; width: 150px;" src="<?=base_url("admin_assets/images/logo.png")?>">
                <div class="row">
                    <div class="col-md-12 pl-md-0">
                        <div class="auth-form-wrapper px-4 py-5">
                        <h3 
                            style="letter-spacing:1px;color:#152734 !important; margin-top: -30px;" 
                            href="#" 
                            class="noble-ui-logo d-block mb-2"
                        >Ruang Bertanam</h3>
                        <h6 class="text-muted font-weight-normal mb-4">Please Log in to your account.</h6>
                        <form class="forms-sample" id="login-form">
                            <div class="form-group">
                            <label for="form-email-login">Username :</label>
                                <input type="text" class="form-control" id="form-username-login" placeholder="username">
                            </div>
                            <div class="form-group">
                            <label for="form-password-login">Password :</label>
                                <input type="password" class="form-control" id="form-password-login" placeholder="Password">
                            </div>
                            <div class="form-check form-check-flat form-check-primary">

                            </div>
                            <div class="mt-3">
                                <button style="background-color: #ff0042; border-color: #ff0042" id="login-btn" type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Login</button>

                            </div>

                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
