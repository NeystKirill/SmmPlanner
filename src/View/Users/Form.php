<?php 
namespace App\View\Users ; 
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
                <form action="base_forms_elements.html" method="post" >
                                        <div class="form-group">
                                            <label for="example-nf-email">Name</label>
                                            <input class="form-control" type="Name" id="example-nf-email" name="new-Name" placeholder="Enter Name..">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-password">Email</label>
                                            <input class="form-control" type="Email" id="example-nf-password" name="new-Email" placeholder="Enter Email..">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-password">Password</label>
                                            <input class="form-control" type="Password" id="example-nf-password" name="new-Password " placeholder="Enter Password..">
                                        </div>
                                        <div class="form-group">
                                            <label for="example-nf-privilege">Privilege</label>
                                            <select class="form-control" id="example-nf-privilege" name="new-Privilege">
                                                <option value="1">0</option>
                                                <option value="2">1</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-sm btn-primary" type="submit">Add new user</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
            </main>
        <?php
    }
}