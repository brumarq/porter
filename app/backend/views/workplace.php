<?php require('templates/header.php'); ?>

<div class="container-fluid" style="margin-top: 100px;">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-12">
                    <h2>Tasks
                        <div class="float-right">
                            <button type="button" class="btn btn-sm btn-secondary-dark">Today</button> 
                            <button type="button" class="btn btn-sm btn-secondary-dark">Week</button>
                            <button type="button" class="btn btn-sm btn-secondary-dark">All</button>
                        </div>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Task</th>
                                <th scope="col">Date / Time</th>
                                <th scope="col">Priority</th>
                                <th scope="col">Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($workspace->tasks as $task) {
                            ?> 
                                <tr>
                                    <th scope="row">
                                        <input class="form-check-input check_inside_table" type="checkbox" id="" value="option1">
                                    </th>
                                    <td><?php echo $task['taskDescription'] ?> </td>
                                    <td><?php echo $task['dateTime'] ?></td>
                                    <td><?php echo $task['priority'] ?></td>
                                    <td><?php echo $task['subject'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-sm btn-dark">Add</button>
                    <button type="button" class="btn btn-sm btn-dark">Delete</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <h2>Subjects</h2>
            <div class="row">
                <div class="col-12">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td>Vaccum Floor</td>
                            </tr>
                            <tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="row">
                <div class="col-12 float-right">
                    <button type="button" class="btn btn-sm btn-dark">Add</button>
                    <button type="button" class="btn btn-sm btn-dark float-right">Delete</button>
                </div>
            </div>

            <div class="row mt-5">
                <h2>Habbit Tracker</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td>Vaccum Floor</td>
                            </tr>
                            <tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="row">
                <div class="col-12 float-right">
                    <button type="button" class="btn btn-sm btn-dark">Add</button>
                    <button type="button" class="btn btn-sm btn-dark float-right">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/workspace.js"></script>
<link rel="stylesheet" href="../css/workspace.css">

<?php require('templates/footer.php'); ?>