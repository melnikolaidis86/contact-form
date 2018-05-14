<!-- Sidebar -->
<div class="col-md-4">

    <div class="p-3 bg-light text-muted rounded">
    <h4 class="mb-3 text-center font-italic">
        Κατηγορίες
    </h4>
    <ul class="media-list media-list-users list-group">
        <?php foreach($categories as $category) : ?>
        <li class="list-group-item">
            <div class="media w-100">
                <div class="media-body text-center">
                    <strong><?php echo $category->category_name; ?></strong>
                </div>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
    </div>
</div>