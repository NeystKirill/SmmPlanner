<?php 
namespace App\View ; 

class Profile extends \App\View\Main 
{
    public function content($i_am_batman)
    {
        ?>
  <main id="main-container" style="min-height: 876px;">
        <div class="content content-boxed">
            <!-- User Header -->
            <div class="block">
                <!-- Basic Info -->
                <div class="bg-image" style="background-image: url('/oneui/assets/img/photos/photo29@2x.jpg');">
                    <div class="block-content bg-primary-op text-center overflow-hidden">
                    <div class="push-30-t push animated fadeInDown">
                        <?php
                        // Проверяем наличие фото
                        if (isset($i_am_batman['user']['icon']) && !empty($i_am_batman['user']['icon'])) {
                            // Преобразуем фото в корректный base64 формат
                            $photo_base64 = base64_encode($i_am_batman['user']['icon']);
                            $photo_src = 'data:image/jpeg;base64,' . $photo_base64;
                        } else {
                            // Используем дефолтное фото, если пользовательского фото нет
                            $photo_src = '/oneui/assets/img/avatars/avatar10.jpg';
                        }
                        ?>
                        <img class="img-avatar img-avatar96 img-avatar-thumb" src="<?= $photo_src ?>" alt="User Avatar">
                    </div>
                        <div class="push-30 animated fadeInUp">
                            <h2 class="h2 font-w800 text-white push-5"><?= $i_am_batman['user']['username'] ?></h2>
                            <h3 class="h3 text-white-op"><?= $i_am_batman['user']['privilege'] ? 'Admin' : 'Manager' ?></h3>
                        </div>
                    </div>
                </div>
                <!-- END Basic Info -->
                <div class="block-content text-center">
                    <div class="row items-push text-uppercase">
                        <div class="col-xs-6 col-sm-3">
                            <div class="font-w700 text-gray-darker animated fadeIn">Your subscription</div>
                            <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">Zero step </a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <div class="font-w700 text-gray-darker animated fadeIn">Connected instagram accounts:</div>
                            <a class="h2 font-w300 text-primary animated flipInX" href="/insta"> <?= count($i_am_batman['insta'])?></a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <div class="font-w700 text-gray-darker animated fadeIn">Active tasks</div>
                            <a class="h2 font-w300 text-primary animated flipInX" href="/tasks"><?= count($i_am_batman['tasks']) ?></a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <div class="font-w700 text-gray-darker animated fadeIn">Your ratings is 
                                <?php $task_count = count($i_am_batman['tasks']); ?>
                                <?= 
                                    ($task_count <= 3) ? 'Bronze' : 
                                    (($task_count <= 5) ? 'Silver' : 
                                    (($task_count <= 7) ? 'Gold' : 
                                    (($task_count <= 10) ? 'Diamond' : 'GOAT')))
                                ?>
                            </div>
                            <div class="text-warning push-10-t animated flipInX">
                                <i class="si si-badge" style="font-size:25px"></i>
                            </div>
                        </div>
                    </div>
                </div>
            
            <!-- END User Header -->
             <!-- Navigation Tabs -->
             <div class="block">
                <ul class="nav nav-tabs nav-justified push-20">
                    <li class="active">
                        <a href="/profile"><i class="si si-user" style="font-size:30px"></i></a>
                    </li>
                    <li>
                        <a href="/profile/password"><i class="si si-lock" style="font-size:30px"></i></a>
                    </li>
                    <li>
                        <a href="/profile/appear"><i class="si si-note" style="font-size:30px"></i></a>
                    </li>
                </ul>
            </div>
        </div>
            <!-- Main Content -->
            <div class="block-content tab-content">
                <div class="tab-pane fade in active" id="tab-profile-personal">
                    <div class="row items-push">
                        <div class="col-sm-6 col-sm-offset-3 form-horizontal">
                        <div class="form-group">
                            <div class="col-xs-17">
                            <?php if ($i_am_batman['user']['sec_email'] && $i_am_batman['insta'] ):?>
                            <span class="h5 label label-success text-white"><i class="fa fa-check"></i>Completed account </span>
                            <?php else : ?>
                                <span class="h5 label label-danger text-white"><i class="fa fa-close"></i>Not completed account </span>
                                <div class="help-block">Add recovery email or instagram account</div>
                            <?php endif;?>
                            </div></div>
                            <div class="form-group">
                                <div class="col-xs-17">
                                    <a href="/profile/appear" style="cursor: grab;">
                                    <label class="h2 font-w700 text-gray-darker animated fadeIn"><i class="si si-envelope text-primary" style="font-size: 22px"></i>Main email address:</label>
                                    </a><div class="h4 form-control-static font-w700"><?= $i_am_batman['user']['email'] ?></div><br>
                                </div>
                            </div><br>
                            <div class="form-group">
                                <div class="col-xs-17">
                                    <a href="/profile/appear" style="cursor: grab;">
                                    <label class="h2 font-w700 text-gray-darker animated fadeIn"><i class="si si-envelope text-primary" style="font-size: 22px"></i>Recovery email address:</label>
                                    </a><div class="h4 form-control-static font-w700"><?= $i_am_batman['user']['sec_email'] ?? 'You dont\'t have recovery email!' ?></div><br>
                                </div>
                            </div><br>
                            <div class="form-group">
                                <div class="col-xs-17">
                                    <label class="h2 font-w700 text-gray-darker animated fadeIn"><i class="fa fa-instagram primary text-danger" style="font-size: 22px"></i> Your connected instagram accounts</label>
                                    <?php foreach ($i_am_batman['insta'] as $key => $account) : ?>
                                        <div class="h4 form-control-static font-w700"><?= ($key+1) . ': ' , $account['username'] ?></div>
                                    <?php endforeach; ?><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-17">
                                    <label class="h2 font-w700 text-gray-darker animated fadeIn"> <i class="si si-calculator primary text-danger" style="font-size: 22px"></i> Your active tasks:</label>
                                    <?php foreach ($i_am_batman['tasks'] as $key => $task) : ?>
                                        <div class="h4 form-control-static font-w700"><?= ($key+1) . ': ' , $task['task_name'] . '<br>'
                                        . 'post date:'. $task['post_date'] . '<br>'
                                        . 'creation date: '. $task['create_date']
                                        ?></div>
                                    <?php endforeach; ?><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-17">
                                    <label class="h2 font-w700 text-gray-darker animated fadeIn">Your level is  
                                    <?= 
                                        ($task_count <= 3) ? 'Bronze' : 
                                        (($task_count <= 5) ? 'Silver' : 
                                        (($task_count <= 7) ? 'Gold' : 
                                        (($task_count <= 10) ? 'Diamond' : 'GOAT')))
                                    ?></label>  <i class="si si-badge text-warning" style="font-size:25px"></i>
                                    <div class="h4 form-control-static font-w700">If you would like to improve your level to take benefits from it <br> <a class ="h3 text-warning" href="/">To know more </a></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-17">
                                    <label class="h2 font-w700 text-gray-darker animated fadeIn">Current subscription:</label>
                                        <div class="h4 form-control-static font-w700">Zero step subscription</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Main Content -->
        </div>
    </main>

<!-- Подключение необходимых скриптов для работы вкладок -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


        <?php
    }
}