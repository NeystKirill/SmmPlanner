<?php 

namespace App\View\InstaAccounts ;

class FormDelete extends \App\View\Main
{
    protected function content(array $i_am_batman) 
    { 
        ?>
        <main id="main-container" >
            <div class="content bg-gray-lighter">
                <div class="row items-push">
                    <div class="col-sm-11">
                    </div>
                </div>
            </div>
            <form class="col-sm-3 text-center" style = "margin-left: 72rem" method = "post" action = "<?= $i_am_batman['action_to']['delete']?>">
                 <input type="hidden" name="id" value="<?= $i_am_batman['data']['id']?>" />
                    <div class="alert alert-danger alert-dismissable text-center">
                    <h3 class="font-w300 push-15">Warning</h3>
                    <h4><p> Are you sure <a class="alert-link" href="javascript:void(0)">you want delete this account</a>?</p></h4>
                    <button class = "btn btn-sm btn-danger" type = "submit">Delete</button>
                    <a class ="btn btn-sm btn-primary" href = "<?= $i_am_batman['action_to']['cancel'] ?>">Cancel</a>
                </div>
            </form>
        </main>
        <?php
    }
}