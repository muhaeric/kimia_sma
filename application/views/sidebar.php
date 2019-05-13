<div id="populer-wrap" class="col-md-12 col-sm-6">
    <div class="title-sidebar">
        <h4 style="color:#555">
            <span class="glyphicon glyphicon-file"></span>
            <b >POST</b> POPULER
        </h4>
        <div class="underscore" style="margin-left:0px;margin-left:0px;margin-bottom:15px;"></div>
    </div>

    <div id="post-populer-sidebar">
        <ul id="post-populer-sidebar-list">
            <?php foreach ($populer as $pop): ?>
              <li><a href="<?= base_url().'single/'.$pop['slug'] ?>"><span class="glyphicon glyphicon-file" style="margin-right:5px"></span><?= $pop['judul'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
