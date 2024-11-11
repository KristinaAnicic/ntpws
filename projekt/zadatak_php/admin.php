<?php

if ($_SESSION['user']['valid'] == 'true') {
    if (!isset($action)) { $action = 1; }
    print'
    <div class="container admin">
        <div class="admin-nav" style="margin-left:12px">
                <div class="row d-flex flex-nowrap">';
                    if (($_SESSION['user']['role']) == 'admin') {
                        print '
                        <div class="col-auto text text-1 ' . ((isset($action) && $action == 1) ? 'selected' : '') .'">
                            <a class="mx-2" href="index.php?menu=8&action=1">Users</a>
                        </div>';
                        
                    }
                    print '
                    <div class="col-auto text ' . ((isset($action) && $action == 2) ? 'selected' : '') .'">
                        <a class="mx-2" href="index.php?menu=8&action=2">News</a>
                    </div>
                </div>
            </div>';

        if ($action == 1) { include("admin/users.php"); }
        else if ($action == 2) { include("admin/news.php"); }
    print '</div>';
}
?>