<h1>UPDATE SHARED AREA</h1>

<form id="new-shared-area" method="post" action="/front.php/shared-area/save/<?=$sharedArea->getId(); ?>">
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" name='name' placeholder="Description"
            value="<?=$sharedArea->getName(); ?>">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</form>
