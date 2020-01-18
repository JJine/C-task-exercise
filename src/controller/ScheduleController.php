<?php
namespace Controller;

use App\DB;

class ScheduleController {
    function SchedulePage() {
        view("schedule");
    }

    function ScheduleAddPage() {
        $data = [
            /**
             * 1. schedules 테이블에 entry 가 없는 entry만 가져온다.
             * 2. schedules-add 안에 sql문을 작성한다.
             */

             //<> : 서로 같지 않다는 표시

             //LEFT JOIN 
             //가져올 테이블을 왼쪽으로 둔다. 
             //널이 조건으로 붙이고 싶다면 IS 를 붙여야하고 만약에 낫을 붙이고 싶다면 IS NOT
            "entry" => DB::fetchAll("SELECT E.*, S.id AS s_id FROM entry AS E LEFT JOIN schedules AS s ON E.id = S.e_id WHERE S.id IS NULL")
        ];
        view("schedule-add", $data);
    }

    function ScheduleAddProcess() {
       extract($_POST); //ex $_POST['schedule'] => $schedule
       
       //년/월/일/시/분  "/\\//"
       /**
        * |사용가능 
        * 년 : 20[19]년 [19]년
        * 월 : 05월 5일
        * 일 : 05일 5일
        * 그룹에 이름 지정하기
        * (?<name>[a-zA-z])
        
        */
       if(!preg_match("/^(?<year>20[0-9]{2}|[0-9]{2})\\/(?<month>[0-9]{1,2})\\/(?<date>[0-9]{1,2})\\/(?<hour>[0-9]{1,2})\\/(?<min>[0-9]{1,2})$/", $schedule, $arr)) {
            return back("올바르지 않습니다."); 
       }
       extract($arr);
       $schedule = "$year-$month-$date $hour:$min";
       $entry = DB::fetch("SELECT * fROM entry WHERE id =? ", [$entry]);

       //strtotime : 문자열을 strtotime("2020-01-17 2:57:14") + 10 => 10초 뒤 
       $endtime = strtotime($schedule) + $entry->running_time * 60; 
       $overlap = DB::fetch("SELECT * FROM schedules
                             WHERE (start_time <= TIMESTAMP(?) AND TIMESTAMP(?) <= end_time)
                             OR (start_time <= TIMESTAMP(?) AND TIMESTAMP(?) <= end_time) 
                             OR (TIMESTAMP(?) <= start_time AND start_time <= TIMESTAMP(?)) 
                             OR (TIMESTAMP(?) <= start_time AND start_time <= TIMESTAMP(?))", [$schedule, $schedule, $endtime, $endtime, $schedule, $endtime, $schedule, $endtime]);
        if($overlap) return back("중복된 일정이 있습니다.");
       /**
        * date 함수
        * Y : year(2020)
        * m : month(01)
        * d : date(17)
        * H : hour(15)
        *i : minute(00)
        */
       DB::query("INSERT INTO schedules(e_id, start_time, end_time) VALUES (?,?,?)", [$entry->id, $schedule, date("Y-m-d H:i", $endtime)]);
       return go ("/schedule", "일정 등록이 완료되었습니다.");
    }

    function scheduleGetProcess() {
        $data = DB::fetchAll("SELECT E.title, S.* FROM entry AS e, schedules AS S WHERE e.id = S.e_id");
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    function detailPage() {
        extract($_GET);
        if(!isset($_GET['date'])) return back("이 페이지는 없는 페이지 입니다."); //a href="date?= 부분 
        if($date !== date("Y-m-d", strtotime($date)) && $date !== date("Y-n-j", strtotime($date))) return back("이 페이지는 없는 페이지 입니다."); //n 0안붙는 포멧 ^-^
        $tomorrow = date("Y-m-d", strtotime($date) + 3600 * 24); //strtotime 초 단위를 반환시켜준다. 그러면 그것을 더해주면 된다. 그럼 다음날이 나온다.


        $entry_user = "SELECT E.*, U.user_id, U.user_name FROM entry AS E, users AS U WHERE E.u_id = U.id";
        $sql = "SELECT E.*, S.start_time, S.end_time FROM ($entry_user) AS E LEFT JOIN schedules AS S ON S.e_id = E.id WHERE TIMESTAMP(?) <= start_time AND start_time < TIMESTAMP(?)"; //그냥 $entry_user쓰면 sql문법에 어긋난다.
        //TIMESTAMP(); 자료형으로 바꿔준다. 오늘과 다음날 이전까지 구할 수 있다.
        $data = DB::fetchAll($sql, [$date, $tomorrow]); 

        view("detail", ["movies" => $data, "date"=> $date]);
    }

   
}