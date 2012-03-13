<?php

class Listing
{
    function __construct($state,$start,$end)
    {
        $this->state = $state;
        $this->startDate = $start;
        $this->endDate = $end;
        $this->model = SpecialDeal::model()->findAll(array(
            'join' => '
                LEFT JOIN deal d
                ON d.deal_id = t.deal_id
                LEFT JOIN golf_course gc
                ON d.golf_course_id = gc.id
                ',
            'condition' =>'
                gc.state = :stateId 
                AND t.deal_date >= :startDate 
                AND t.deal_date <= :endDate
                ',
            'params' => array(
                ':stateId' => $state,
                ':startDate' => $start,
                ':endDate' => $end
            )
        ));
    }

    public function getGolfCourseData()
    {
        $data = array();
        $golfCourses = GolfCourse::model()->findAll(array(
            'condition' => 'state = :stateId',
            'params' => array(':stateId' => $this->state)
        ));

        foreach($golfCourses as $gc){
            $data[$gc->name] = array(
                'real_price' => $gc->real_price,
                'id' => $gc->id,
            );
        }

        foreach($this->model as $deal){
            $gc_name = $deal->deal->golfCourse->name;
            if(isset($data[$gc_name]) && isset($data[$gc_name][$deal->deal_date]))
            {
                if($data[$gc_name][$deal->deal_date] > $deal->price) 
                {
                    $data[$gc_name][$deal->deal_date] = $deal->price;
                }
            } 
            else 
            {
                $data[$gc_name][$deal->deal_date] = $deal->price;
            }
        }
        return $data;
    }

    public function getPeriod($format)
    {
        $startTime = strtotime($this->startDate);
        $endTime = strtotime($this->endDate);
        $dates = array($this->startDate => date($format,$startTime));

        $current = $startTime;
        $counter = 1;
        while($current != $endTime){
            $current = strtotime("+".$counter." day",$startTime);
            $dates[date(Constants::DB_DATE_FORMAT,$current)] = date($format,$current);
            $counter++;
        }
        $dates[$this->endDate] = date($format,$endTime);

        return $dates;

    }

}
