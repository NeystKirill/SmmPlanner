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
                                    <a tabindex="-1" href="base_pages_inbox.html">
                                        <i class="si si-envelope-open pull-right"></i>
                                        <span class="badge badge-primary pull-right"></span>Inbox
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="base_pages_profile.html">
                                        <i class="si si-user pull-right"></i>Profile
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="javascript:void(0)">
                                        <i class="si si-settings pull-right"></i>Settings
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Actions</li>
                                <li>
                                    <a tabindex="-1" href="base_pages_lock.html">
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
<main id="main-container">
    <div class="content bg-gray-lighter">
        <div class="row items-push">
            <div class="col-sm-12">
                <h1 class="page-heading">
                    <?= $i_am_batman['page_name'] ?><small></small>
                </h1>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <h2 class="content-heading" style="text-align: center; color: #5c90d2;">Welcome to Your Social Media Dashboard</h2>
                <p style="text-align: center; font-size: 18px; color: #333;">Stay updated with the latest news in social media, explore new features of our SMMPlanner, and discover how you can enhance your social media management.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="block" style="padding: 20px; margin-bottom: 20px; background-color: #fff; border: 1px solid #ddd; border-radius: 4px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h3 class="block-title" style="color: #e67e22;"><i class="fa fa-newspaper-o" aria-hidden="true"></i> Latest News</h3>
                    <ul>
                        <li style="color: #34495e;"><i class="fa fa-angle-right" aria-hidden="true"></i> Check out the latest trends in social media for 2024.</li>
                        <li style="color: #34495e;"><i class="fa fa-angle-right" aria-hidden="true"></i> Learn about new algorithms affecting content visibility.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block" style="padding: 20px; margin-bottom: 20px; background-color: #fff; border: 1px solid #ddd; border-radius: 4px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h3 class="block-title" style="color: #27ae60;"><i class="fa fa-cogs" aria-hidden="true"></i> Key Features of SMMPlanner</h3>
                    <ul>
                        <li style="color: #34495e;"><i class="fa fa-check-square" aria-hidden="true"></i> Streamlined Workflow: Intuitive interfaces for efficient management.</li>
                        <li style="color: #34495e;"><i class="fa fa-check-square" aria-hidden="true"></i> Enhanced Integration: Seamless connection with all major social networks.</li>
                        <li style="color: #34495e;"><i class="fa fa-check-square" aria-hidden="true"></i> Real-time Analytics: Live feedback to optimize your strategy.</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="block" style="padding: 20px; margin-bottom: 20px; background-color: #fff; border: 1px solid #ddd; border-radius: 4px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                    <h3 class="block-title" style="color: #8e44ad;"><i class="fa fa-tools" aria-hidden="true"></i> Additional Tools</h3>
                    <ul>
                        <li style="color: #34495e;"><i class="fa fa-search" aria-hidden="true"></i> Social Media Health Check: Analyze the effectiveness of your profiles.</li>
                        <li style="color: #34495e;"><i class="fa fa-search" aria-hidden="true"></i> Competitor Analysis Tool: Gain insights into your competitors' strategies.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>


            <?php 
        }
      
      
      
    protected function table(array $columns , array $i_am_batman)    
    {   
      ?>
      <div class="block">
        <table class="table table-bordered table-striped table-hover">
            <thead>
            <tr>
                <?php foreach ($columns as $column) :?>
                    <th class = "<?= $column['class']?>" style = "<?= $column['style']?>"><?= $column["label"] ?></th>
                <?php endforeach;?>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach ($i_am_batman as $point) :
                        foreach ($point as $data):?>
                        <th><?= $data ?></th>
                    <?php endforeach;
                    endforeach;?>
                </tr>
            </tbody>
        </table>
    </div>


      <?php
    }
        
 
}
