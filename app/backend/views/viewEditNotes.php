<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/remarkable/1.7.1/remarkable.min.js"></script>
    <title>Porter</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top bg-dark">
            <a class="navbar-brand" href="#">Porter</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </header>
    <div class="container" id="viewNote" style="margin-top: 100px;">
        <div class="row mb-3">
            <div class="col-6 ">
                <a href="/workspace/notes/" type="button" class="float-left btn btn-sm btn-outline-dark"> Back</a>
            </div>
            <div class="col-6 ">
                <button id="deleteNote" type="button" class="float-right btn btn-sm btn-danger"> Delete</button>
            </div>
        </div>

        <div class="row">
            <h2 class=" w-100">
                <?php echo $note[0]["title"] ?>
                <div class="float-right">
                    <span class=" font-italic text-dark"><?php echo $note[0]["created"] ?></span>
                </div>
            </h2>
        </div>
        <hr>
        <div class="row  float-right">
            <button type="button" onclick="showEditWindow(this);" class="btn btn-dark">Edit</button>
        </div>
        <div id="htmlText" class="row" style="display: contents;">
            <?php echo $note[0]["textHtml"] ?>
        </div>
    </div>

    <div class="container" id="editNote" style="margin-top: 100px; display:none;">
        <div class="row">
            <input type="text" class="form-control input-sm" id="iptTitle" placeholder="Task" value="<?php echo $note[0]["title"] ?>">
        </div>
        <hr>
        <div class="row">
            <textarea class="form-control" id="markupText" rows="100">
<?php echo $note[0]["textMarkup"] ?>
            </textarea>
        </div>
        <button style="position: fixed; bottom:10px; right:10px;" type="button" onclick="saveChanges(this);" class="btn btn-dark">Save Changes</button>
    </div>
    <script src="/js/editNotes.js"></script>
    <?php require('templates/footer.php'); ?>