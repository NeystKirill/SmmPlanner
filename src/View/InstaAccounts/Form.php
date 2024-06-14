<?php
namespace App\View\InstaAccounts ; 
class Form extends \App\View\Main
{
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
            <div class="block">
                <div class="block-content block-content-narrow">
                    <form action="<?= $i_am_batman['action_to']?>" method="post">
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                        <div class="form-group <?= isset($i_am_batman['messange']['new-Name']) ? 'has-error' : '' ?>">
                            <label for="example-nf-email">Name</label>
                            <input class="form-control" type="text" id="example-nf-email" name="new-Name" placeholder="Enter Name.." value="<?= $i_am_batman['data']['username'] ?? '' ?>">
                            <?php if (isset($i_am_batman['messange']['new-Name'])) : ?>
                            <div class = "help-block"><?= $i_am_batman['messange']['new-Name']?></div>
                            <?php endif ?>
                        </div>
                        <div class="form-group <?= isset($i_am_batman['messange']['new-Password']) ? 'has-error' : '' ?>">
                            <label for="example-nf-password">Password</label>
                            <input class="form-control" type="password" id="example-nf-password" name="new-Password" placeholder="Enter Password.." >
                            <?php if (isset($i_am_batman['messange']['new-Password'])) : ?>
                            <div class = "help-block"><?= $i_am_batman['messange']['new-Password']?></div>
                            <?php endif ?>
                        </div>
                        <div class="form-group <?= isset($i_am_batman['messange']['new-Password-check']) ? 'has-error' : '' ?>">
                            <label for="example-nf-password-check">Check password</label>
                            <input class="form-control" type="password" id="example-nf-password-check" name="new-Password-check" placeholder="Enter same Password.." >
                            <?php if (isset($i_am_batman['messange']['new-Password-check'])) : ?>
                            <div class = "help-block"><?= $i_am_batman['messange']['new-Password-check']?></div>
                            <?php endif ?>
                        </div>

                         <div class="form-group">
                         <button class="btn btn-sm btn-primary text-center" type="submit">Add new Account</button>
                            </div>
                        </div>
                       
                    </form>
                </div>
            </div>
        </main>
        <?php
    }
}
