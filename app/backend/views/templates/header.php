<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>    
    <title>Porter</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top bg-dark">
            <a class="navbar-brand" href="#">Porter</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <div class="workspaceSelection">
                            <?php
                            if (!empty($_SESSION['unique_id'])) {
                            ?> <select class="form-control" name="workspaces" id="workspaces">
                                    <?php
                                    foreach ($workspace->workspaces as $selectedWorkspace) {
                                    ?>
                                        <option value="<?php echo $selectedWorkspace['id'] ?>" <?php if($_SESSION['workspace'] == $selectedWorkspace['id']) echo"selected" ?>>
                                            <?php echo $selectedWorkspace['name'] ?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            <?php
                            }
                            ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link"> | </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/workspace">Workspace</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="/workspace/notes">Notes</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>