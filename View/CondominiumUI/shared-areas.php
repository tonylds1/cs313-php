
<div class="justify-content-center search-box">
    <h1>SHARED AREAS</h1>
    <p>List all the shared areas added.</p>
    <form method="post" action="week05">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name='id' placeholder="ID">
            </div>
            <div class="col">
                <input type="text" class="form-control" name='name' placeholder="Description">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
</div>

<div class="justify-content-center">

<?php foreach ($list as $sharedArea): ?>
    <div class="row">
        <div class="col-sm">
            <a href="/front.php/shared-area/show/<?=$sharedArea->getId(); ?>">
                <?=$sharedArea->getId();?>
            </a>
        </div>
        <div class="col-sm">
            <a href="/front.php/shared-area/show/<?=$sharedArea->getId(); ?>">
                <?=$sharedArea->getName();?>
            </a>
        </div>
    </div>
<?php endforeach; ?>

</div>

<div class="justify-content-center search-box">
    <h1>NEW SHARED AREA</h1>

    <form id="new-shared-area" method="post" action="shared-area/new">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name='name' placeholder="Description">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
