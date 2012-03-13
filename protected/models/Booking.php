<?php

class Booking {
    function __construct($gcid, $date){
        $this->gcid = $gcid;
        $this->model = SpecialDeal::model()->findAll(array(
            'join' => '
                LEFT JOIN deal d
                ON d.deal_id = t.deal_id
                LEFT JOIN golf_course gc
                ON d.golf_course_id = gc.id
                ',
            'condition' => '
                gc.id = :gcid
                AND t.deal_date = :date
                ',
            'params' => array(
                ':gcid' => $gcid,
                ':date' => $date,
            )
        ));
    }

    function getDealDetails (){
        $data = array();

        $gc_deals = Deal::model()->findAll(array(
            'condition' => 'golf_course_id = :gcid',
            'params' => array(':gcid' => $this->gcid)
        ));

        foreach($gc_deals as $gc_deal){
            $data[$gc_deal->description] = array();
        }

        foreach($this->model as $deal){
            $time = explode(':',$deal->tee_time);
            $data[$deal->deal->description][intval($time[0])] = array(
                'price' => $deal->price,
                'spid' => $deal->special_deal_id
            );
        }

        return $data;
    }

    function getPeriod(){
        $model = GolfCourse::model()->find(array(
            'condition' => 'id = :gcid',
            'params' => array( ':gcid' => $this->gcid ),
        ));
        $this->golfCourseName = $model->name;
        $start = explode(':',$model->start_time);
        $end = explode(':',$model->end_time);

        $startHour = $start[0];
        $period = array();
        while($startHour < $end[0]){
            array_push($period, intval($startHour));
            $startHour++;
        }

        return $period;
        
    }
}
