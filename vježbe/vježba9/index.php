<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>vježba 9</title>
    </head>
    <body>
        <?php
            $state = "";

            function store($currentDateTime){
                $currentDay = $currentDateTime->format('N');
                $currentHour = $currentDateTime->format('G');
                $currentMinute = $currentDateTime->format('i');
                $currentDate = $currentDateTime->format('d-m');

                $holidays = ['01-01','06-01','01-05','30-05','22-06','05-08','15-08',
                    '01-11','18-11','25-12','26-12',];

                if(in_array($currentDate, $holidays)){
                    $state = "zatvoren";
                }
                else if ($currentDay < 6) {
                    if ($currentHour >= 8 && $currentHour < 20) {
                        $state = "otvoren";
                    } else {
                        $state = "zatvoren";
                    }
                }
                else if ($currentDay == 6) {
                    if ($currentHour >= 9 && $currentHour < 14) {
                        $state = "otvoren";
                    } else {
                        $state = "zatvoren";
                    }
                }
                else{
                    $state = "zatvoren";
                }
                echo "Dućan je $state";
            }

            $currentDateTime = new DateTime();
            //$specificDateTime = new DateTime('2024-10-26 13:30');
            echo '<p>Trenutni datum i vrijeme: ' . $currentDateTime->format('d.m.Y, H:i') . '</p>';
            store($currentDateTime);
        ?>
    </body>
</html>