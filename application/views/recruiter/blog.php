<div class="container-fluid blogbannerrr"><h2>Blog</h2></div>
<div class="container-fluid onRegisteringtextOuter">
    <div class="container">
        <div class="row">
        <div class="col-md-9 col-lg-9 col-sm-12">
        <?php foreach($blog as $row){ ?>
        <div class="blogpostleftt">
        <img class="img-fluid" width="300px" height="auto" src="<?= base_url($row['image']) ?>">
        <div class="blogshortDescr"><h2><a href="<?= base_url('recruitment/blog_details/' .$row['title_url']); ?>"><?= $row['title']; ?></a></h2>
<p><?= substr($row['descriptions'], 0, 200); ?>...</p>
<a href="<?= base_url('recruitment/blog_details/' .$row['title_url']); ?>">Read More <i class="fa fa-arrow-right"></i></a>
</div
</div>

</div><?php } ?></div>
<div class="col-md-3 col-lg-3 col-sm-12 blogRightsidebarr">
    <h2>Latest Blog Posts</h2>
    <ul>
        <?php foreach ($recent_blogs as $row): ?>
            <li><a href="<?= base_url('recruitment/blog_details/' . $row['title_url']); ?>"><?= $row['title']; ?></a></li>
        <?php endforeach; ?> 
    </ul>
</div>


</div>
</div>
</div>

