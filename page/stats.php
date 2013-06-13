<?php
if(!isset($_SESSION['logged_id']) && !isset($_GET['param2'])) {
    header('Location: /home');
}
require_once('../classes/Link.class.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SupLink</title>
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/bootstrap-responsive.css" rel="stylesheet">
    <script src="/js/dhtmlxchart.js" type="text/javascript"></script>
    <link rel="STYLESHEET" type="text/css" href="/css/dhtmlxchart.css">
</head>

<body>
<div class="container-narrow">
    <div class="masthead">
        <ul class="nav nav-pills pull-right">
            <li class="active"><a href="/home">Home</a></li>
            <li><a href="/logout">Logout</a></li>
        </ul>
        <h3 class="muted">SupLink-143783</h3>
    </div>

    <hr>

    <?php
    $link = new Link();

    ?>

    <div class="row-fluid">
        <div class="span10">
            <span class="label"><?php echo $link->get_link_fromUrl($_GET['param2'])['name']; ?> / <?php echo $link->get_link_fromUrl($_GET['param2'])['long_link']; ?></span>
        </div>
        <div class="span2">
            <span class="badge badge-success"><?php echo $link->get_link_fromUrl($_GET['param2'])['click_total']; ?> clicks</span>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span12">
            <div id="chart1" style="width:auto;height:300px;border:1px solid #A4BED4;"></div>
            <script>
                var data = [

                        <?php
                        $clickPerDay =  Array();
                        foreach($link->get_stats_fromUrl($_GET['param2']) as $row) {
                            array_push($clickPerDay,$row['date_click']);
                        }
                        $clickPerDay = array_count_values($clickPerDay);

                        foreach ($clickPerDay as $key => $value) {
                            echo '{ click:"'.$value.'", day:"'.$key.'" },';
                        }
                          ?>
                ];


                var barChart1 =  new dhtmlXChart({
                    view:"bar",
                    alpha:function(data){
                        return data.click/10;
                    },
                    container:"chart1",
                    value:"#click#",
                    label:"#click#",
                    color:"#66cc33",
                    width:50,
                    tooltip:{
                        template:"#click#"
                    },
                    xAxis:{
                        title:"Click per day",
                        template:"#day#"
                    },
                    yAxis:{
                        start:0,
                        end:20,
                        step:1,
                        title:"clicks"
                    }
                })
                barChart1.parse(data,"json");
            </script>
        </div>
    </div>

    <hr>

    <div class="footer">
        <p>&copy; SupLink-143783 2013</p>
    </div>

</div>

</body>
</html>
