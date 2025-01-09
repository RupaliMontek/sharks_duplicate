<div class="container-fluid blogbannerrr"><h2>Blog</h2></div>
<div class="container-fluid onRegisteringtextOuter">
    <div class="container">
        <div class="row">
        <div class="col-md-9 col-lg-9 col-sm-12 blogdetailspagee">
<h2><?= $blog->title; ?></h2>
<img class="img-fluid" width="100%" height="auto" src="<?= base_url($blog->image) ?>">

<p><?= $blog->descriptions; ?></p>
</div>
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