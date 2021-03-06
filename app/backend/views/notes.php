<?php require('templates/header.php'); ?>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-12">
            <h1>Notes</h1>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="inptNoteTitle" placeholder="Title">
                <div class="input-group-append">
                    <button class="btn btn-sm btn-dark" id="addNote" type="button">Add</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">

            <ul class="list-group w-100" id="notesList">
                <?php
                if ($workspace->notes != null) {
                    foreach ($workspace->notes as $note) {
                ?>
                    <a href="/workspace/notes/viewEdit?id=<? echo $note["NotesID"] ?>" class="link-dark">
                        <li class="list-group-item text-dark" >
                            <?php echo $note["title"] ?> 
                            <span class="float-right font-italic text-dark"><?php echo $note["created"] ?></span>
                        </li>
                    </a>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<script src="/js/notes.js"></script>
<script src="/js/logout.js"></script>
<script src="/js/header.js"></script>
<?php require('templates/footer.php'); ?>