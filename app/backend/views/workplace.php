<?php require('templates/header.php'); ?>
<div class="container-fluid" id="workspace" style="margin-top: 100px;"  <?php if (!isset($workspace->workspaces)) { echo "hidden"; }?>>
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
                        <tbody id="taskResults">
                            <?php
                            if ($workspace->tasks != null) {
                                foreach ($workspace->tasks as $task) {
                                ?>
                                    <tr>
                                        <th scope="row" class="text-center" style="width: 0;">
                                            <input class="form-check-input check_inside_table" style=" position: relative;" name="taskCheckbox" type="checkbox" id="<?php echo $task['taskID'] ?>">
                                        </th>
                                        <td><?php echo $task['taskDescription'] ?> </td>
                                        <td><?php echo $task['dateTime'] ?></td>
                                        <td><?php echo $task['priority'] ?></td>
                                        <td><?php echo $task['subject'] != 'null' ? $task['subject'] : '' ?></td>
                                    </tr>
                                <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th scope="row">
                                    <button type="button" style="margin-top: 15px;" id="addTask" class="btn btn-sm btn-dark">Add</button>
                                </th>
                                <td class="pt-3">
                                    <input type="text" class="form-control input-sm" id="iptTaskDescription" placeholder="Task">
                                </td>
                                <td class="pt-3">
                                    <input type="datetime-local" class="form-control input-sm" id="iptDate" placeholder="Date">
                                </td>
                                <td class="pt-3">
                                    <select class="form-control input-sm" name="workspaces" id="sltPriority">
                                        <option value="high">High</option>
                                        <option value="medium">Medium</option>
                                        <option value="low">Low</option>
                                    </select>
                                </td>
                                <td class="pt-3">
                                    <select class="form-control input-sm" name="workspaces" id="sltSubject">
                                        <option></option>
                                        <?php
                                        if ($workspace->subjects != null) {
                                            foreach ($workspace->subjects as $subject) {
                                        ?>
                                                <option id="<?php echo $subject['id'] ?>"><?php echo $subject['description'] ?> </option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-4">
            <h2>Subjects</h2>
            <div class="row">
                <div class="col-12">
                    <table class="table table-sm">
                        <tbody id="subjectResults">
                            <?php
                            if ($workspace->subjects != null) {
                                foreach ($workspace->subjects as $subject) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $subject['description'] ?> 
                                        <span id='clickableAwesomeFont' onclick="deleteSubject(<?php echo $subject['id'] ?>)">
                                            <i class="bi bi-trash float-right"></i>
                                        </span>
                                    </td>
                                </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="pt-3">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="inptSubject" placeholder="Subject">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-red " id="addSubject" type="button">Add</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<main class="form-signin text-center" id="introductionWindow" style="margin-top: 150px;" <?php if (isset($workspace->workspaces)) { echo "hidden"; }?>>
    <form class="loginForm" name="login">
        <h1>Create your first Workspace!</h1>
        <p>A workspace can contain all your tasks and personal notes. You can create several workspaces depending on your needs! <br> Let's create the first one:</p>
        <input type="text" class=" form-control input" id="iptWorkspaceName" placeholder="Workspace Name">
        <button class="w-100 btn btn-lg btn-primary mt-2" id="createFirstWorkspace" type="button">Create!</button>
    </form>
</main>

<script src="/js/workspace.js"></script>
<script src="/js/logout.js"></script>

<link rel="stylesheet" href="../css/workspace.css">

<?php require('templates/footer.php'); ?>