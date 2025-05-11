<?php ob_start();
include('con_base/functions.inc.php');
master_main();


require_once 'get_categories.php';

if (isset($_GET['del'])) {
    $qry = mysqli_query($DB_LINK, "select parent_id from tbl_category where id=" . $_GET['del']) or die(mysqli_error());
    $row = mysqli_fetch_array($qry);
    mysqli_query($DB_LINK, "delete from tbl_category where id=" . $_GET['del']) or die(mysqli_error());
    $_SESSION['msg'] = array('success', 'Deleted Successfully');
    header("location:category_list?parent=" . $row['parent_id'] . "");
    exit;
}
if (isset($_REQUEST['in_feature'])) {
    mysqli_query($DB_LINK, "update tbl_category set is_feature=1 where id=" . $_GET['in_feature']) or die(mysqli_error());
    $_SESSION['msg'] = array('success', 'Feature Disabled Successfully');
    header("location:category_list?parent=" . $_GET['parent'] . "");
    exit;
}
if (isset($_REQUEST['out_feature'])) {
    mysqli_query($DB_LINK, "update tbl_category set is_feature=0 where id=" . $_GET['out_feature']) or die(mysqli_error());
    $_SESSION['msg'] = array('success', 'Feature Activated Successfully');
    header("location:category_list?parent=" . $_GET['parent'] . "");
    exit;
}
if (isset($_REQUEST['ban'])) {
    mysqli_query($DB_LINK, "update tbl_category set status=0 where id=" . $_GET['ban']) or die(mysqli_error());
    $_SESSION['msg'] = array('success', 'Banned Successfully');
    header("location:category_list?parent=" . $_GET['parent'] . "");
    exit;
}
if (isset($_REQUEST['unban'])) {
    mysqli_query($DB_LINK, "update tbl_category set status=1 where id=" . $_GET['unban']) or die(mysqli_error());
    $_SESSION['msg'] = array('success', 'Unbanned Successfully');
    header("location:category_list?parent=" . $_GET['parent'] . "");
    exit;
}

if (isset($_REQUEST['in_cat'])) {
    mysqli_query($DB_LINK, "update tbl_category set is_cat=1 where id=" . $_GET['in_cat']) or die(mysqli_error());
    $_SESSION['msg'] = array('success', 'Updated Successfully');
    header("location:category_list?parent=" . $_GET['parent'] . "");
    exit;
}
if (isset($_REQUEST['out_cat'])) {
    mysqli_query($DB_LINK, "update tbl_category set is_cat=0 where id=" . $_GET['out_cat']) or die(mysqli_error());
    $_SESSION['msg'] = array('success', 'Updated Successfully');
    header("location:category_list?parent=" . $_GET['parent'] . "");
    exit;
}

if (isset($_REQUEST['in_cat'])) {
    mysqli_query($DB_LINK, "update tbl_category set is_cat=1 where id=" . $_GET['in_cat']) or die(mysqli_error());
    $_SESSION['msg'] = array('success', 'Updated Successfully');
    header("location:category_list?parent=" . $_GET['parent'] . "");
    exit;
}
if (isset($_REQUEST['out_cat'])) {
    mysqli_query($DB_LINK, "update tbl_category set is_cat=0 where id=" . $_GET['out_cat']) or die(mysqli_error());
    $_SESSION['msg'] = array('success', 'Updated Successfully');
    header("location:category_list?parent=" . $_GET['parent'] . "");
    exit;
}

if (isset($_REQUEST['in_add'])) {
    mysqli_query($DB_LINK, "update tbl_category set is_add=1 where id=" . $_GET['in_add']) or die(mysqli_error());
    $_SESSION['msg'] = array('success', 'Updated Successfully');
    header("location:category_list?parent=" . $_GET['parent'] . "");
    exit;
}
if (isset($_REQUEST['out_add'])) {
    mysqli_query($DB_LINK, "update tbl_category set is_add=0 where id=" . $_GET['out_add']) or die(mysqli_error());
    $_SESSION['msg'] = array('success', 'Updated Successfully');
    header("location:category_list?parent=" . $_GET['parent'] . "");
    exit;
}

if (isset($_REQUEST['del_img'])) {

    unlink("../upload/category/" . $_GET['img']);
    mysqli_query($DB_LINK, "update tbl_category set images='' where id=" . $_GET['del_img']) or die(mysqli_error());
    $_SESSION['msg'] = array('success', 'Image Deleted Successfully');
    header("location:category_list?parent=" . $_GET['parent'] . "");
    exit;
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <meta charset="utf-8"/>
        <title>Website Content Manager :: <?php echo $SITE_NAME; ?></title>
        <meta name="description" content="overview &amp; stats"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
        <?php include("include/header_file.php"); ?>
        <script type="text/javascript">
            function cp(a, b, c) {
                window.location.href = "cust_list?txtsearch=" + a + "&fdt=" + b + "&tdt=" + c;
            }
        </script>
    </head>
    <body class="no-skin">
    <?php include('include/header.php'); ?>
    <?php include('include/sidemenu.php'); ?>
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li><i class="ace-icon fa fa-home home-icon"></i> <a href="index">Home</a></li>
                    <li class="active">Website Content Manager</li>
                </ul>
                <!-- /.breadcrumb -->
            </div>
            <div class="page-content">
                <!-- /.page-header -->
                <div class="page-content">
                    <div class="page-header">
                        <h1>Content Manager <?php
                            if (isset($_GET['parent'])) {
                                if (($_GET['parent']) != 0) {
                                    $qry = mysqli_query($DB_LINK, "select * from tbl_category where id=" . $_GET['parent']) or die(mysqli_error());
                                    $row = mysqli_fetch_array($qry);
                                    echo 'Related To ' . strtoupper($row['title']);
                                }
                            }
                            ?></h1>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 text-right">

                            <?php if ($_SESSION['master_role_id'] == 0) {
                                ?>
                                <a href="category_reg?parent=<?php echo isset($_GET['parent']) ? $_GET['parent'] : '0'; ?>"
                                   class="btn btn-primary various2 fancybox.iframe" type="submit" name="submit">
                                    <i class="fa fa-plus"></i> Add Main Parent </a>
                            <?php } else {
                                if (isset($_GET['parent'])) {
                                    if (($_GET['parent']) != 0) {
                                        if ($row['parent_id'] == 209) {
                                            ?>
                                            <a href="category_reg?parent=<?php echo $_GET['parent']; ?>"
                                               class="btn btn-primary various2 fancybox.iframe" type="submit"
                                               name="submit">
                                                <i class="fa fa-plus"></i> Add</a>
                                            <?php
                                        } else {
                                            if ($row['is_add'] == 1) {
                                                /* */
                                                ?>
                                                <a href="category_reg?parent=<?php echo $_GET['parent']; ?>"
                                                   class="btn btn-primary various2 fancybox.iframe" type="submit"
                                                   name="submit">
                                                    <i class="fa fa-plus"></i> Add</a>
                                                <?php
                                            }
                                        }
                                    }
                                }
                            }
                            if (isset($_GET['parent'])) {
                                if (($_GET['parent']) != 0) {

                                    if ($row['parent_id'] == 253) {
                                        ?>
                                        <a href="category_reg?parent=<?php echo $_GET['parent']; ?>"
                                           class="btn btn-primary various2 fancybox.iframe" type="submit" name="submit">
                                            <i class="fa fa-plus"></i> Add</a>
                                        <?php
                                    }
                                    ?>
                                    <a href="category_list?parent=<?php echo get_parent($_GET['parent']); ?>"
                                       class="btn btn-warning  ">
                                        <i class="fa fa-backward"></i> Go Back</a>
                                <?php }
                            } ?>

                        </div>
                    </div>
                    <!-- /.page-header -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="clearfix">
                                <div class="pull-right tableTools-container"></div>
                            </div>
                            <!-- div.table-responsive -->
                            <!-- div.dataTables_borderWrap -->
                            <div>
                                <?php
                                $parent_id = "parent_id=0";
                                if (isset($_GET['parent']))
                                {
                                if ($_GET['parent'] != 0)
                                {
                                    $parent_id = "parent_id= '" . trim($_GET['parent']) . "' ";
                                    ?>

                                    <table id="example" class="table table-striped table-hover nowrap" cellspacing="0"
                                           width="100%">
                                        <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Title</th>
                                            <th>Ordering</th>
                                            <th>Last Updated</th>
                                            <?php if ($_SESSION['master_role_id'] == 0) { ?>
                                                <th>Is Master</th><?php } ?>
                                            <th>Status</th>
                                            <th>Img</th>
                                            <th>Feature</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $count = 1;
                                        //echo "select * from tbl_category where $parent_id order by ord asc";
                                        $qry = mysqli_query($DB_LINK, "select * from tbl_category where $parent_id order by ord asc") or die(mysqli_error());
                                        foreach ($qry as $row) {
                                            ?>
                                            <tr class="table-activity">
                                                <td><?php echo $count; ?></td>
                                                <td>
                                                    <?php echo data_cutter(($row['title']), 50);
                                                    if ($row['title_hi'] != '') {
                                                        echo "<br>" . data_cutter($row['title_hi'], 100);
                                                    }
                                                    if (sizeof(fetchCategoryTree($row['id'])) > 0) { ?> (<?php echo sizeof(fetchCategoryTree($row['id'])); ?>) <?php } ?>

                                                    <div class="tools action-buttons">
                                                        <?php
                                                        if ($_SESSION['master_role_id'] == 0) {
                                                            ?>
                                                            <a href="category_list?parent=<?php echo $row['id']; ?>">
                                                                Add New </a>&nbsp;&nbsp;&nbsp;
                                                            <?php echo $row['url']; ?> <br>
                                                            <a class="various2 fancybox.iframe blue"
                                                               href="category_edit.php?edit=<?php echo $row['id']; ?>"
                                                               title="Edit"><i
                                                                        class="ace-icon fa fa-pencil bigger-125"></i></a>
                                                            <?php if ($row['status'] == 1) { ?>
                                                                <a href="category_list.php?ban=<?php echo $row['id']; ?>&parent=<?php echo $row['parent_id']; ?>"
                                                                   id="bandiv"><i class="fa fa-ban fa-lg"
                                                                                  style="color:green"
                                                                                  title="Ban"></i></a>
                                                            <?php } else { ?>
                                                                <a href="category_list.php?unban=<?php echo $row['id']; ?>&parent=<?php echo $row['parent_id']; ?>"
                                                                   id="bandiv"><i class="fa fa-ban fa-lg"
                                                                                  style="color:red"
                                                                                  title="Unban"></i></a>
                                                            <?php } ?>

                                                            <a class="red"
                                                               onClick="return del(<?php echo $row['id']; ?>, 'category_list')">
                                                                <i class="ace-icon fa fa-times bigger-125"
                                                                   title="Delete"></i> </a>

                                                        <?php } else {
                                                            if ($row['parent_id'] != 0) {

                                                                if ($row['parent_id'] == 209) {
                                                                    ?>
                                                                    &nbsp;&nbsp;&nbsp;<a class="blue"
                                                                                         href="category_list?parent=<?php echo $row['id']; ?>"
                                                                                         title="View Segment"><i
                                                                                class="ace-icon fa fa-eye bigger-125"></i>
                                                                        View</a>

                                                                    <?php
                                                                } else {

                                                                    if (sizeof(fetchCategoryTree($row['id'])) > 0) { ?>
                                                                        &nbsp;&nbsp;&nbsp;<a class="blue"
                                                                                             href="category_list?parent=<?php echo $row['id']; ?>"
                                                                                             title="View Segment"><i
                                                                                    class="ace-icon fa fa-eye bigger-125"></i>
                                                                            View</a>
                                                                    <?php }
                                                                } ?>


                                                                <?php if ($row['is_add'] == 1) { ?>
                                                                    &nbsp;<!--&nbsp;&nbsp;<a class="blue"  href="category_list?parent=<?php /*echo $row['id'];*/ ?>" title="View Segment"><i class="ace-icon fa fa-eye bigger-125"></i> View</a>
                                              --> <a class="green" href="category_reg?parent=<?php echo $row['id']; ?>"
                                                     title="Add New Segment"><i class="ace-icon fa fa-plus bigger-125"></i>
                                                                        Add</a>
                                                                <?php } ?>
                                                                <a class="various2 fancybox.iframe blue"
                                                                   href="category_edit.php?edit=<?php echo $row['id']; ?>"
                                                                   title="Edit"><i
                                                                            class="ace-icon fa fa-pencil bigger-125"></i>
                                                                    Edit</a>
                                                                <?php if ($row['is_cat'] == 0) { ?>
                                                                    <a class="red"
                                                                       onClick="return del(<?php echo $row['id']; ?>, 'category_list')">
                                                                        <i class="ace-icon fa fa-times bigger-125"
                                                                           title="Delete"></i> Delete </a>

                                                                <?php }
                                                            }
                                                        } ?>


                                                    </div>
                                                </td>
                                                <td><?php echo $row['ord']; ?></td>
                                                <td><?php echo date_dm($row['regdate']); ?></td>
                                                <?php if ($_SESSION['master_role_id'] == 0) { ?>
                                                    <td><?php
                                                        if ($_SESSION['master_role_id'] == 0) {
                                                            if ($row['is_cat'] == 0) {
                                                                echo '<a href="category_list.php?in_cat=' . $row['id'] . '&parent=' . $row['parent_id'] . '" class="red"><strong>NO</strong></a>';
                                                            } else if ($row['is_cat'] == 1) {
                                                                echo '<a href="category_list.php?out_cat=' . $row['id'] . '&parent=' . $row['parent_id'] . '" class="green"><strong>YES</strong></a>';
                                                            }

                                                            if ($row['is_add'] == 0) {
                                                                echo '&nbsp;&nbsp;&nbsp;<a href="category_list.php?in_add=' . $row['id'] . '&parent=' . $row['parent_id'] . '" class="red"><strong>New Child </strong></a>';
                                                            } else if ($row['is_add'] == 1) {
                                                                echo '&nbsp;&nbsp;&nbsp;<a href="category_list.php?out_add=' . $row['id'] . '&parent=' . $row['parent_id'] . '" class="green"><strong>New Child </strong></a>';
                                                            }
                                                        } else {
                                                            if ($row['parent_id'] != 0) {
                                                                if ($row['is_cat'] == 0) {
                                                                    echo '<a href="category_list.php?in_cat=' . $row['id'] . '&parent=' . $row['parent_id'] . '" class="red"><strong>NO</strong></a>';
                                                                } else if ($row['is_cat'] == 1) {
                                                                    echo '<a href="category_list.php?out_cat=' . $row['id'] . '&parent=' . $row['parent_id'] . '" class="green"><strong>YES</strong></a>';
                                                                }
                                                            }
                                                        } ?></td>
                                                <?php } ?>
                                                <td>
                                                    <?php

                                                    if ($_SESSION['master_role_id'] == 0) {
                                                        if ($row['status'] == 0) {
                                                            echo '<a href="category_list.php?in_s=' . $row['id'] . '&parent=' . $row['parent_id'] . '" class="red"><strong>Disable</strong></a>';
                                                        } else if ($row['status'] == 1) {
                                                            echo '<a href="category_list.php?out_s=' . $row['id'] . '&parent=' . $row['parent_id'] . '" class="green"><strong>Active</strong></a>';
                                                        }
                                                    } else {
                                                        if ($row['parent_id'] != 0) {
                                                            if ($row['is_cat'] == 0) {
                                                                if ($row['status'] == 0) {
                                                                    echo '<a href="category_list.php?in_s=' . $row['id'] . '&parent=' . $row['parent_id'] . '" class="red"><strong>Disable</strong></a>';
                                                                } else if ($row['status'] == 1) {
                                                                    echo '<a href="category_list.php?out_s=' . $row['id'] . '&parent=' . $row['parent_id'] . '" class="green"><strong>Active</strong></a>';
                                                                }
                                                            }
                                                        }
                                                    } ?></td>
                                                <td><?php

                                                    if ($_SESSION['master_role_id'] == 0) {
                                                        if ($row['images'] == '') {
                                                            echo 'No Image..';
                                                        } else {
                                                            echo '<a class="various fancybox.iframe blue" href="../upload/category/' . $row['images'] . '" ><img src="../upload/category/' . $row['images'] . '"  style="border-radius: 0%;max-width: 100px;"></a><br>

';
                                                            ?><a
                                                            href="category_list.php?del_img=<?= $row['id']; ?>&parent=<?= $row['parent_id']; ?>&img=<?= $row['images']; ?>" >
                                                                Delete</a><?php
                                                        }
                                                    } else {
                                                        if ($row['parent_id'] != 0) {
                                                            if ($row['images'] == '') {
                                                                echo 'No Image..';
                                                            } else {
                                                                echo '<a class="various fancybox.iframe blue" href="../upload/category/' . $row['images'] . '" ><img src="../upload/category/' . $row['images'] . '"  style="border-radius: 0%;max-width: 100px;"></a><br>

';
                                                                ?><a
                                                                href="category_list.php?del_img=<?= $row['id']; ?>&parent=<?= $row['parent_id']; ?>&img=<?= $row['images']; ?>" >
                                                                    Delete</a><?php
                                                            }
                                                        }
                                                    }

                                                    ?></td>

                                                <td>
                                                    <?php
                                                    if ($row['is_feature'] == 0) {
                                                        echo '<a href="category_list.php?in_feature=' . $row['id'] . '&parent=' . $row['parent_id'] . '" class="red"><strong>NO</strong></a>';
                                                    } else if ($row['is_feature'] == 1) {
                                                        echo '<a href="category_list.php?out_feature=' . $row['id'] . '&parent=' . $row['parent_id'] . '" class="green"><strong>YES</strong></a>';
                                                    }
                                                    ?>
                                                </td>

                                            </tr>
                                            <?php $count++;
                                            $url = strtolower(clean($row['title']) . '');
                                            if ($row['url'] != $url) 
                                            {
                                                //echo "update tbl_category set url='$url' where parent_id!=0 and id=" . $row['id'];
                                                mysqli_query($DB_LINK, "update tbl_category set url='$url' where parent_id!=0 and id=" . $row['id']);
                                            }


                                        } ?>
                                        </tbody>

                                    </table>

                                    <?php
                                }
                                else
                                {
                                ?>
                                <div class="row">
                                    <?php
                                    $count = 1;
                                    $qry = mysqli_query($DB_LINK, "select * from tbl_category where $parent_id order by ord asc") or die(mysqli_error());
                                    foreach ($qry as $row) {
                                        ?>
                                        <div class="col-sm-2">
                                            <div class="widget-box  ">
                                                <div class="widget-header widget-header-flat">
                                                    <h6 class="widget-title lighter text-center"> <?php echo($row['title']); ?></h6>
                                                </div>
                                                <div class="widget-body">
                                                    <div class="widget-main no-padding text-center">
                                                        <a href="category_list?parent=<?php echo $row['id']; ?>">View</a>
                                                        <?php
                                                        if ($_SESSION['master_role_id'] == 0) { ?>
                                                            <div class="tools action-buttons">
                                                                <?php
                                                                if ($_SESSION['master_role_id'] == 0) {
                                                                    ?>
                                                                    <?php echo $row['url']; ?> <br>
                                                                    <a class="various2 fancybox.iframe blue"
                                                                       href="category_edit.php?edit=<?php echo $row['id']; ?>"
                                                                       title="Edit"><i
                                                                                class="ace-icon fa fa-pencil bigger-125"></i></a>
                                                                    <?php if ($row['status'] == 1) { ?>
                                                                        <a href="category_list.php?ban=<?php echo $row['id']; ?>&parent=<?php echo $row['parent_id']; ?>"
                                                                           id="bandiv"><i class="fa fa-ban fa-lg"
                                                                                          style="color:green"
                                                                                          title="Ban"></i></a>
                                                                    <?php } else { ?>
                                                                        <a href="category_list.php?unban=<?php echo $row['id']; ?>&parent=<?php echo $row['parent_id']; ?>"
                                                                           id="bandiv"><i class="fa fa-ban fa-lg"
                                                                                          style="color:red"
                                                                                          title="Unban"></i></a>
                                                                    <?php }

                                                                    if ($row['is_add'] == 0) {
                                                                        echo '<a href="category_list.php?in_add=' . $row['id'] . '&parent=' . $row['parent_id'] . '" class="red"><strong>New Child Closed</strong></a>';
                                                                    } else if ($row['is_add'] == 1) {
                                                                        echo '<a href="category_list.php?out_add=' . $row['id'] . '&parent=' . $row['parent_id'] . '" class="green"><strong>New Child Active</strong></a>';
                                                                    } ?>

                                                                    <a class="red"
                                                                       onClick="return del(<?php echo $row['id']; ?>, 'category_list')">
                                                                        <i class="ace-icon fa fa-times bigger-125"
                                                                           title="Delete"></i> </a>

                                                                <?php } else {
                                                                    if ($row['parent_id'] != 0) { ?>
                                                                        <a class="various2 fancybox.iframe blue"
                                                                           href="category_edit.php?edit=<?php echo $row['id']; ?>"
                                                                           title="Edit"><i
                                                                                    class="ace-icon fa fa-pencil bigger-125"></i></a>

                                                                        <a class="red"
                                                                           onClick="return del(<?php echo $row['id']; ?>, 'category_list')">
                                                                            <i class="ace-icon fa fa-times bigger-125"
                                                                               title="Delete"></i> </a>

                                                                    <?php }
                                                                    if ($row['is_add'] == 1) {
                                                                        ?>
                                                                        &nbsp;&nbsp;&nbsp;<a
                                                                                href="category_list?parent=<?php echo $row['id']; ?>"
                                                                                title="Add New Segment"><i
                                                                                    class="ace-icon fa fa-plus bigger-125"></i>
                                                                            Add New</a>
                                                                        <?php
                                                                    }

                                                                } ?>


                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php
                            }
                            }
                            else
                            {
                            ?>
                            <div class="row">
                                <?php
                                $count = 1;
                                $qry = mysqli_query($DB_LINK, "select * from tbl_category where $parent_id order by ord asc") or die(mysqli_error());
                                foreach ($qry as $row) {
                                    ?>
                                    <div class="col-sm-2">
                                        <div class="widget-box  ">
                                            <div class="widget-header widget-header-flat">
                                                <h6 class="widget-title lighter text-center"> <?php echo($row['title']); ?></h6>
                                            </div>
                                            <div class="widget-body">
                                                <div class="widget-main no-padding text-center">
                                                    <a href="category_list?parent=<?php echo $row['id']; ?>">View</a>
                                                    <?php
                                                    if ($_SESSION['master_role_id'] == 0) { ?>
                                                        <div class="tools action-buttons">
                                                            <?php
                                                            if ($_SESSION['master_role_id'] == 0) {
                                                                ?>
                                                                <?php echo $row['url']; ?> <br>
                                                                <a class="various2 fancybox.iframe blue"
                                                                   href="category_edit.php?edit=<?php echo $row['id']; ?>"
                                                                   title="Edit"><i
                                                                            class="ace-icon fa fa-pencil bigger-125"></i></a>
                                                                <?php if ($row['status'] == 1) { ?>
                                                                    <a href="category_list.php?ban=<?php echo $row['id']; ?>&parent=<?php echo $row['parent_id']; ?>"
                                                                       id="bandiv"><i class="fa fa-ban fa-lg"
                                                                                      style="color:green"
                                                                                      title="Ban"></i></a>
                                                                <?php } else { ?>
                                                                    <a href="category_list.php?unban=<?php echo $row['id']; ?>&parent=<?php echo $row['parent_id']; ?>"
                                                                       id="bandiv"><i class="fa fa-ban fa-lg"
                                                                                      style="color:red"
                                                                                      title="Unban"></i></a>
                                                                <?php }

                                                                if ($row['is_add'] == 0) {
                                                                    echo '<a href="category_list.php?in_add=' . $row['id'] . '&parent=' . $row['parent_id'] . '" class="red"><strong>New Child Closed</strong></a>';
                                                                } else if ($row['is_add'] == 1) {
                                                                    echo '&nbsp;&nbsp;&nbsp;<a href="category_list.php?out_add=' . $row['id'] . '&parent=' . $row['parent_id'] . '" class="green"><strong>New Child Active</strong></a>';
                                                                } ?>

                                                                <a class="red"
                                                                   onClick="return del(<?php echo $row['id']; ?>, 'category_list')">
                                                                    <i class="ace-icon fa fa-times bigger-125"
                                                                       title="Delete"></i> </a>

                                                            <?php } else {
                                                                if ($row['parent_id'] != 0) { ?>
                                                                    <a class="various2 fancybox.iframe blue"
                                                                       href="category_edit.php?edit=<?php echo $row['id']; ?>"
                                                                       title="Edit"><i
                                                                                class="ace-icon fa fa-pencil bigger-125"></i></a>

                                                                    <a class="red"
                                                                       onClick="return del(<?php echo $row['id']; ?>, 'category_list')">
                                                                        <i class="ace-icon fa fa-times bigger-125"
                                                                           title="Delete"></i> </a>

                                                                <?php }

                                                                if ($row['is_add'] == 1) {
                                                                    ?>
                                                                    <a href="category_list?parent=<?php echo $row['id']; ?>"
                                                                       title="Add New Segment"><i
                                                                                class="ace-icon fa fa-plus bigger-125"></i>
                                                                        Add New</a>
                                                                    <?php
                                                                }

                                                            } ?>


                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
        <!-- /.row -->
    </div>
    <!-- /.page-content -->
    </div>
    <!-- /.main-content -->
    <?php include('include/footer.php'); ?>
    <?php include("include/footer_file.php"); ?>
    </body>
    </html>
<?php
mysqli_close($DB_LINK);
ob_end_flush();
?>