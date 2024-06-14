<?php 
namespace App\View\Profile ;  

class FormPass extends \App\View\Main
{
    protected function content(array $i_am_batman)
    {
        ?>
        <main id="main-container" style="min-height: 876px;">
            <div class="content content-boxed">
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
                <div class="block">
                    <ul class="nav nav-tabs nav-justified push-20">
                        <li>
                            <a href="/profile"><i class="si si-user" style="font-size:30px"></i></a>
                        </li>
                        <li class="active">
                            <a href="/profile/password"><i class="si si-lock" style="font-size:30px"></i></a>
                        </li>
                        <li>
                            <a href="/profile/appear"><i class="si si-note" style="font-size:30px"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="block-content">
                    <div class="row items-push">
                        <form class="col-sm-6 col-sm-offset-3 form-horizontal" action="/profile/password" method="POST">
                        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                            <div class="form-group <?= isset($i_am_batman['message'][1]) ? 'has-error' : '' ?>">
                                <div class="col-xs-12">
                                    <label for="profile-password">Current Password</label>
                                    <input class="form-control input-lg" type="password" id="profile-password" name="current-Password">
                                    <?php if (isset($i_am_batman['message'][1])) : ?>
                                    <div class="help-block"><?= $i_am_batman['message'][1]?></div>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="form-group <?= isset($i_am_batman['message'][0]['new-Password']) ? 'has-error' : '' ?>">
                                <div class="col-xs-12">
                                    <label for="profile-password-new">New Password</label>
                                    <input class="form-control input-lg" type="password" id="profile-password-new" name="new-Password">
                                    <?php if (isset($i_am_batman['message'][0]['new-Password'])) : ?>
                                    <div class="help-block"><?= $i_am_batman['message'][0]['new-Password']?></div>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="form-group <?= isset($i_am_batman['message'][0]['new-Password-check']) ? 'has-error' : '' ?>">
                                <div class="col-xs-12">
                                    <label for="profile-password-new-confirm">Confirm New Password</label>
                                    <input class="form-control input-lg" type="password" id="profile-password-new-confirm" name="new-Password-check">
                                    <?php if (isset($i_am_batman['message'][0]['new-Password-check'])) : ?>
                                    <div class="help-block"><?= $i_am_batman['message'][0]['new-Password-check']?></div>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12"><br>
                                    <button class="btn btn-sm btn-primary block-center" type="submit">Change pass</button> 
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php
    }
}