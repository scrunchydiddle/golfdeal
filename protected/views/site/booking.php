<script>
require(["dojo/_base/connect","dojo/domReady!"],function(connect){
    require(["GD/BookingForm"],function(){
        bForm = new GD.BookingForm({
            title: 'Booking Form',
//            titleClass: 'section-title',
            golfCourse: "<?php echo $gcName; ?>",
            'date':"<?php echo $_GET['date']; ?>"
        });
        bForm.placeAt('booking-form');
		bForm.render();
    });
    require(["GD/MatrixTable"],function(toggler){
        mt = new GD.MatrixTable({
            target:'table-matrix',
            title: 'Book Tee Time',
            titleClass: 'section-title'
        });
    });
    connect.subscribe("deal.click",function(spid){
        require(["dojo/_base/xhr"],function(xhr){
            xhr.get({
                url:'../specialDeal/'+spid+'?ajax=true',
                handleAs:'json',
                load:function(data){ 
                    Deal = data;
                    bForm.dealType = data.description;
                    bForm.resetTeeTime();
                    bForm.render();
                    mt.startTime = data.startTime;
                    mt.render();
                }
            });
        });
    });
    connect.subscribe("checkbox.click",function(cb){
        bForm.teetime.push(cb.value);
        bForm.render();
    });
    require(["dojo/query"],function(query){
        var links = query('.matrix td a');

        require(["dojo/_base/array","dojo/dom-attr"],function(arr,dom){
            arr.forEach(links, function(link,i){
                connect.connect(link,'onclick',function(e){ 
                    var id = dom.get(e.currentTarget, 'id');
                    connect.publish("deal.click",[id]);
                });
            });
        })

    });

});

</script>
<h1 class="section-title">Book & Pay Securely</h1>
<table class="matrix">
<tr class="row-header">
    <td class="column-1">
    </td>
<?php foreach($columns as $column) { ?>
    <td>
<?php 
    $postfix = ' am';
    if($column > 12){
        $postfix = ' pm';
        $column = $column - 12;
    } else if($column == 12) {
        $postfix = ' noon';
    }
        
    echo $column . $postfix; 
?>
    </td>
<?php } ?>
</tr>
<?php foreach($data as $desc => $dt){ ?>
<tr class="row-data">
    <td class="column-1"><?php echo $desc; ?></td>
    <?php 
        foreach($columns as $column) { 
            if(!empty($dt[$column])){
                $value = '<a id="'.$dt[$column]['spid'].'">'.$dt[$column]['price'].'</a>';
            } else { 
                $value = '-';
            }
    ?>
        <td><?php echo $value;?></td>

    <?php } ?>
</tr>
<?php } ?>
</table>
<div id="table-matrix"></div>
<div id="booking-form"></div>
