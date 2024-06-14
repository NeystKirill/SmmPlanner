<?php
namespace App\View\Tasks; 
class Form extends \App\View\Main
{
    protected function content(array $i_am_batman)
    {
        ?>
            <style>
        .fixed-size {
            width: 450px;
            height: 450px;
            object-fit: cover;
        }
        .preview-container {
            margin-top: 20px;
            text-align: center;
        }
        .preview-image {
            display: none;
        }
    </style>
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
                <form action="<?= $i_am_batman['action_to']?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']; ?>">
                <div class="form-group <?= isset($i_am_batman['message']['new-Name']) ? 'has-error' : '' ?>">
                        <label for="new-Name">Task name</label>
                        <input class="form-control" type="text" name="new-Name" id="new-Name" placeholder="Enter Name of task.." 
                        value="<?= $i_am_batman['data']['task_name'] ?? '' ?>">
                        <?php if (isset($i_am_batman['message']['new-Name'])) : ?>
                        <div class="help-block"><?= $i_am_batman['message']['new-Name']?></div>
                        <?php endif ?>
                    </div>
                        <div class="form-group <?= isset($i_am_batman['messange']['new-Photo']) ? 'has-error' : '' ?>">
                            <label for="new-Photo">Photo</label>
                            <input class="form-control" type="file" accept="image/*" name="new-Photo" id="new-Photo" placeholder="Enter Photo.." 
                        onchange="previewImage(event)">
                        </div>
                        <div class="preview-container">
                            <img id="preview" class="fixed-size" alt="Image Preview" src = "<?php isset($i_am_batman['data']['photo']) ? 'data:image/jpeg;base64,' . base64_encode($i_am_batman['data']['photo']) : '';?>">
                        </div>
                    <div class="form-group <?= isset($i_am_batman['message']['new-Description']) ? 'has-error' : '' ?>">
                        <label for="new-Description">Description</label>
                        <input class="form-control" type="text" name="new-Description" id="new-Description" placeholder="Enter Description.." 
                        value="<?= $i_am_batman['data']['description'] ?? '' ?>">
                        <?php if (isset($i_am_batman['message']['new-Description'])) : ?>
                        <div class="help-block"><?= $i_am_batman['message']['new-Description']?></div>
                        <?php endif ?>
                    </div>
                    <div class="form-group <?= isset($i_am_batman['message']['new-Date']) ? 'has-error' : '' ?>">
                        <label for="new-Date">Post date</label>
                        <input class="form-control" type="datetime-local" name="new-Date" id="new-Date"  value="<?= isset($i_am_batman['data']['post_date']) ? htmlspecialchars($i_am_batman['data']['post_date']) : date('Y-m-d\TH:i') ?>">
                        <?php if (isset($i_am_batman['message']['new-Date'])) : ?>
                        <div class="help-block"><?= $i_am_batman['message']['new-Date']?></div>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary" type="submit">Add new task</button>
                    </div>
                </form>
            </div>
        </div>
    </main>  
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                var photoBase64 = document.getElementById('photoBase64');
                output.src = reader.result;
                output.style.display = 'block';
                photoBase64.value = reader.result.split(',')[1];    
            };
            reader.readAsDataURL(event.target.files[0]);
        }
        document.addEventListener('DOMContentLoaded', function() {
            var preview = document.getElementById('preview');
            if (preview.src) {
                preview.style.display = 'block';
            }
        });
    </script>
        <?php
    }
}
