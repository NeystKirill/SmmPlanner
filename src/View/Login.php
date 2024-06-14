<?php 
namespace App\View ; 

class Login extends \App\View\Base 
{
    public function container(array $i_am_batman) 
    {
        ?> 
                <!-- Login Content -->
                <div class="bg-white pulldown">
                    <div class="content content-boxed overflow-hidden">
                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                                <div class="push-30-t push-50 animated fadeIn">
                                    <!-- Login Title -->
                                    <div class="text-center">
                                        <i class="si si-7x si-plane" ></i>
                                        <p class="text-muted push-10-t" style="font-size: 25px;">InstaPlanner</p>
                                    </div>
                                    <!-- END Login Title -->
                                    <?php 
                                    if (isset($i_am_batman['message'])): ?>
                                        <div class="alert alert-warning alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h3 class="font-w300 push-15">Warning</h3>
                                        <p><?= $i_am_batman['message'] ?><a class="alert-link" href="javascript:void(0)"></a></p>
                                        </div>
                                    <?php endif; ?>
                                    
                                
                                    
                                    <!-- Login Form -->
                                    <!-- jQuery Validation (.js-validation-login class is initialized in js/pages/base_pages_login.js) -->
                                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                    <form class="js-validation-login form-horizontal push-50-t" action="/log_in" method="post">
                                        <div class="form-group">
                                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary floating">
                                                    <input class="form-control" type="text" id="login-email" name="login-email">
                                                    <label for="login-username">Email</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary floating">
                                                    <input class="form-control" type="password" id="login-password" name="login-password">
                                                 
                                                    <label for="login-password">Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">

                                            <div class="col-xs-6">
                                                <div class="font-s13  push-5-t">
                                                    <a href="base_pages_reminder_v2.html">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group push-30-t">
                                            <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                                                <button class="btn btn-sm btn-block btn-primary" type="submit">Log in</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Login Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Login Content -->

                <!-- Login Footer -->
                <div class="pulldown push-30-t text-center animated fadeInUp">
                    <small class="text-muted"><span class="js-year-copy"></span> Make / Plan / Post </small>
                </div>
        <?php
    }
}