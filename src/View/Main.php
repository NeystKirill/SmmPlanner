<?php
namespace App\View;

class Main extends \App\View\Base
{
    public function container(array $i_am_batman)
    {
        ?>
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
            <aside id="side-overlay">
                <div id="side-overlay-scroll">
                    <div class="side-header side-content">
                        <button class="btn btn-default pull-right" type="button" data-toggle="layout" data-action="side_overlay_close">
                            <i class="fa fa-times"></i>
                        </button>
                    </div>
                    <div class="side-content remove-padding-t">
                        <div class="block pull-r-l border-t">
                            <div class="block-content tab-content">
                                <div class="tab-pane fade fade-right in active" id="tabs-side-overlay-overview">
                                    <div class="block pull-r-l">
                                        <div class="block-header bg-gray-lighter"></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade fade-left" id="tabs-side-overlay-sales">
                                    <div class="block pull-r-l"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <nav id="sidebar">
                <div id="sidebar-scroll">
                    <div class="sidebar-content">
                        <div class="side-header side-content bg-white-op">
                            <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times"></i>
                            </button>
                            <div class="btn-group pull-right">
                                <button class="btn btn-link text-gray dropdown-toggle" data-toggle="dropdown" type="button">
                                    <i class="si si-plane"></i>
                                </button>
                            </div>
                            <a class="h5 text-white" href="/">
                                <i class="si si-plane-o-notch text-primary"></i> <span class="h4 font-w600 sidebar-mini-hide">InstaPlanner</span>
                            </a>
                        </div>
                        <div class="side-content side-content-full">
                            <ul class="nav-main">
                                <li>
                                    <a href="/insta"><i class="fa fa-instagram"></i><span class="sidebar-mini-hide">Instagram accounts</span></a>
                                </li>
                                <li>
                                    <a href="/tasks"><i class="si si-rocket"></i><span class="sidebar-mini-hide">Tasks</span></a>
                                </li>
                                <li>
                                    <a href="/users"><i class="si si-cup"></i><span class="sidebar-mini-hide">Users</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <header id="header-navbar" class="content-mini content-mini-full">
                <ul class="nav-header pull-right">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
                                <img src="/oneui/assets/img/avatars/avatar10.jpg" alt="Avatar">
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-header">Profile</li>
                                <li>
                                    <a tabindex="-1" href="/profile">
                                        <i class="si si-user pull-right"></i>Profile
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Actions</li>
                                <li>
                                    <a tabindex="-1" href="/users/change_pass">
                                        <i class="si si-lock pull-right"></i>Change password
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="/log_out">
                                        <i class="si si-logout pull-right"></i>Log out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </header>
            <?= $this->content($i_am_batman)?>
        </div>
       <?php 
    }
    
        protected function content(array $i_am_batman) 
        {
            ?> 
 <style>
        .animated {
            animation-duration: 1.5s;
            animation-fill-mode: both;
        }
        .fadeInUp {
            animation-name: fadeInUp;
        }
        @keyframes fadeInUp {
            from {
                transform: translate3d(0, 40px, 0);
                opacity: 0;
            }
            to {
                transform: translate3d(0, 0, 0);
                opacity: 1;
            }
        }
    </style>
    <main id="main-container" style="min-height: 876px;">
        <!-- Hero Section -->
        <div class="content bg-image" style="background-image: url('/oneui/assets/img/photos/photo8@2x.jpg');">
            <a href="/profile">
            <div class="push-50-t push-15 clearfix">
                <div class="push-15-r pull-left animated fadeIn">
                    <img class="img-avatar img-avatar-thumb" src="/oneui/assets/img/avatars/avatar13.jpg" alt="">
                </div>
                <h1 class="h2 text-white push-5-t animated zoomIn">Welcome to SMMPlanner <?= $_SESSION['auth']['username']?>!</h1>
                <h2 class="h5 text-white-op animated zoomIn">Your Ultimate Social Media Management Tool</h2>
            </div></a>
        </div>
        <!-- END Hero Section -->

        <!-- Stats Section -->
        <div class="content bg-white border-b">
            <div class="row items-push text-uppercase">
                <div class="col-xs-6 col-sm-3">
                    <div class="font-w700 text-gray-darker animated fadeIn">Week online</div>
                    <a class="h2 font-w300 text-primary animated flipInX" href="">12753</a>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="font-w700 text-gray-darker animated fadeIn">Tasks completed</div>
                    <a class="h2 font-w300 text-primary animated flipInX" href="/tasks">591577</a>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="font-w700 text-gray-darker animated fadeIn">Users on platform</div>
                    <a class="h2 font-w300 text-primary animated flipInX" href="/users">750055</a>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="font-w700 text-gray-darker animated fadeIn">Rating</div>
                    <div class="text-warning push-10-t animated flipInX">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span class="text-muted">(3.8)</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Stats Section -->

        <!-- Features Section -->
        <div class="content content-boxed">
        <h1 class="h2 text-black push-10-t animated zoomIn text-center font-w700" style = "margin-bottom:40px">Three best things which make your account better with us! </h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="block block-rounded block-link-pop">
                        <div class="block-header bg-success">
                            <h3 class="block-title"><i class="fa fa-cogs"></i> Schedule activity</h3>
                        </div>
                        <div class="block-content ">
                            <p>You can make 3 tasks simultaneously , on the one account</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block block-rounded block-link-pop">
                        <div class="block-header bg-info">
                            <h3 class="block-title"><i class="fa fa-sync-alt"></i> Accounts connected</h3>
                        </div>
                        <div class="block-content">
                            <p>You can connect more then 2 accounts at the same time</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block block-rounded block-link-pop">
                        <div class="block-header bg-warning">
                            <h3 class="block-title"><i class="fa fa-chart-line"></i>Interacting with everything</h3>
                        </div>
                        <div class="block-content">
                            <p>You can easily interact with accounts , tasks and users</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Features Section -->

        <!-- Recent News Section -->
        <div class="content">
            <div class="block block-rounded">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title text-white"><i class="fa fa-newspaper"></i> Recent News</h3>
                </div>
                <div class="block-content">
                    <ul class="fa-ul">
                        <li class="h4 mb-2"><i class="fa fa-angle-right fa-li text-warning"style ="font-size: 25px"></i> New algorithms affecting content visibility.</li>
                        <li class="h4 mb-2"><i class="fa fa-angle-right fa-li text-warning"style ="font-size: 25px"></i> Discover the latest social media trends for 2024.</li>
                        <li class="h4 mb-2"><i class="fa fa-angle-right fa-li text-warning"style ="font-size: 25px"></i> Upcoming features in our next update.</li>
                        <li class="h4 mb-2"><i class="fa fa-angle-right fa-li text-warning"style ="font-size: 25px"></i> Effective marketing strategies revealed.</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END Recent News Section -->
        <!-- Level benefits -->
        <div class="content">
            <div class="block block-rounded">
                <div class="block-header bg-warning">
                    <h3 class="block-title text-white"><i class="fa fa-newspaper"></i>Level interaction</h3>
                </div>
                <p class ="h4 text-black push-10-t text-center font-w600">We have advantages for you for your activity </p>
                <div class="block-content">
                <p class ="h4">1: From Gold level we give you <span class ="h3 text-success font-w700">first step subscription for month</span> </p>
                <p class ="h4">2: From Diamond level you will take  <span class ="h3 text-success font-w700">first step subscription forever </span></p>
                <p class ="h4">3: From <span class="h3 text-amethyst-darker">THE GOAT LEVEL</span> we will provide you  <span class ="h3 text-success font-w700">the second step subscription for month</span></p>
                </div>
            </div>
        </div>
        <!-- END Level benefits -->
        <!-- Price table -->
        <table class="table table-borderless table-header-bg text-center remove-margin-b">
                                <thead>
                                    <tr>
                                        <th style="width: 150px;"></th>
                                        <th class="h3 text-center">First step </th>
                                        <th class="h3 text-center">Second step</th>
                                        <th class="h3 text-center">Third step</th>
                                    </tr>
                                </thead>
                                <tbody class ="h4">
                                    <tr class="active">
                                        <td></td>
                                        <td>
                                            <div class="h1 font-w700 push-10">$4</div>
                                            <div class="h5 font-w300 text-muted">per month</div>
                                        </td>
                                        <td>
                                            <div class="h1 font-w700 push-10">$8</div>
                                            <div class="h5 font-w300 text-muted">per month</div>
                                        </td>
                                        <td>
                                            <div class="h1 font-w700 push-10">$12</div>
                                            <div class="h5 font-w300 text-muted">per month</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="font-w600 text-left">Active tasks</td>
                                        <td>3</td>
                                        <td>7</td>
                                        <td>14</td>
                                        
                                    </tr>
                                    <tr>
                                        <td class="font-w600 text-left">Storage of files</td>
                                        <td>1GB</td>
                                        <td>7GB</td>
                                        <td>14GB</td>
                                      
                                    </tr>
                                    <tr>
                                        <td class="font-w600 text-left">Accounts connected</td>
                                        <td>2</td>
                                        <td>5</td>
                                        <td>8</td>
                                       
                                    </tr>
                                    <tr>
                                        <td class="font-w600 text-left">Personal help</td>
                                        <td><i class="si si-close text-danger"></i></td>
                                        <td><i class="si si-close text-danger"></i></td>
                                        <td><i class="si si-check text-primary"></i></td>
                            
                                    </tr>
                                    <tr class="active">
                                        <td></td>
                                        <td>
                                            <button class="btn btn-success" type="button">Sign Up</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button">Sign Up</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-success" type="button">Sign Up</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
        <!-- END Price table -->
        <!-- Contact Section -->
        <div class="content">
            <div class="block block-rounded">
                <div class="block-header bg-danger">
                    <h3 class="block-title text-white"><i class="fa fa-phone"></i> Contact Us</h3>
                </div>
                <div class="block-content">
                    <p class="text-muted">We are here to help you 24/7. Reach out to us through the following channels:</p>
                    <ul class="fa-ul">
                        <li class="mb-2"><i class="fa fa-envelope fa-li text-danger"></i> Email: support@smmplanner.com</li>
                        <li class="mb-2"><i class="fa fa-phone fa-li text-danger"></i> Phone: +1 (800) 123-4567</li>
                        <li class="mb-2"><i class="fa fa-comments fa-li text-danger"></i> Live Chat: Available on our website</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END Contact Section -->

        <!-- Call to Action -->
        <div class="content">
            <div class="block block-rounded text-center">
                <div class="block-content block-content-full bg-primary">
                    <h3 class="font-w700 text-white mb-3">Ready to boost your social media presence?</h3>
                    <a class="btn btn-alt-primary" href="#signup">Get Started</a>
                </div>
            </div>
        </div>
        <!-- END Call to Action -->
    </main>
            <?php 
        }
      
      
      
    protected function table(array $columns , array $i_am_batman)    
    {   
      ?>
      <div class="row">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <?php foreach ($columns as $column => $options) :?>
                    <th class = "<?= $options['class']?>" style = "<?= $options['style']?>" ><?= $options["label"] ?></th>
                <?php endforeach;?>
            </tr>
            </thead>
            <?php foreach ($i_am_batman as $user) : ?>
            <tbody>
                <tr>
                        <?php foreach ($columns as $column => $options):?>
                        <?php if ($column == 'action_of_row'): ?>
                            <td class = "<?= $options['class']?>">
                            <?php foreach ($options['buttons'] as $button) : ?>
                                <a href="<?= $button['href']?>?id=<?=$user['id']?>" class = "<?= $button['button_class']?>"><i class = "<?= $button['i_class']?>"><?=$button['label']?></i></a>  
                            <?php endforeach; ?>
                            </td>   
                        <?php else :?>
                             <td class = "<?= $options['class']?>"><?= $user[$column]?></td>
                        <?php endif?>
                    <?php endforeach;?>
                </tr>
            </tbody>
            <?php endforeach;?>
        </table>
    </div>


      <?php
    }
        
 
}
