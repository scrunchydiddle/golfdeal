<?php $this->pageTitle=Yii::app()->name; ?>
<?php
$endtime = strtotime($endDate);
$starttime = strtotime($startDate);
$next_date = date(Constants::DB_DATE_FORMAT,strtotime("+1 day",$endtime));
$previous_date = date(Constants::DB_DATE_FORMAT,strtotime("-14 day",$starttime));
?>
<h1 class="section-title">Choose Date and Place</h1>
<table class="matrix">
<tr>
    <td colspan="2"></td>
    <td colspan="4" class="previous">
<?php 
    if( strtotime("-14 day",$starttime) >= strtotime(date(Constants::DB_DATE_FORMAT,time()))){
?>
        <a href="?state=<?php echo $state; ?>&startDate=<?php echo $previous_date; ?>">
        &laquo Previous Fourteen Days
        </a>
<?php
    }
?>
</td>
    <td colspan="6"></td>
    <td colspan="4" class="next">
    <a href="?state=<?php echo $state; ?>&startDate=<?php echo $next_date; ?>">
    Next Fourteen Days &raquo
    </a>
    </td>
</tr>
<?php 
    $arr = array('','Full Rate');
    $regex = '/^(\w+)\s(.+)$/';
    $replacement = '${1}<br>${2}';
    foreach($columns as $key => $date){
        array_push($arr,preg_replace($regex,$replacement,$date));
    }
    echo rowBuilder($arr,'row-header');
    if(!empty($data)){
        foreach($data as $gc_name => $deals){
            if(!empty($deals))
                $arr = array($gc_name,$deals['real_price']);
            else 
                $arr = array($gc_name,'-');

            foreach($columns as $key => $date ){
                if(isset($deals[$key])){
                    $link = linkBuilder($deals['id'],$key,$deals[$key]);
                    array_push($arr,$link);
                } else {
                    array_push($arr,'-');
                }
            }
            echo rowBuilder($arr,'row-data');
        }
    } else {
?>
        <tr class="no-data">
            <td colspan="16">No data available</td>
        </tr>
<?php 

    }
?>
</table>

<?php
function linkBuilder($id, $date, $text){
    return "<a href=\"booking?gcid=$id&date=$date\">$text<a>";
}
function rowBuilder($data, $class){
    $row = "<tr class=\"$class\">";
    $index = 1;
    $prefix = 'column-';
    foreach($data as $dt){
        $row .= '<td class="'.$prefix.$index."\">$dt</td>";
        $index++;
    }
    $row .= '</tr>';

    return $row;
}
?>
