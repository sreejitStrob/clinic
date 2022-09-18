<?php
namespace app\controllers;

use app\models\Appointment;
use yii\web\Controller;

class DashboardController extends Controller
{

    public function actionIndex () {

        $yearStart = date("Y-m-d", strtotime('this year January 1st'));
        $yearEnd = date("Y-m-d", strtotime("this year December 31st"));

        $monthStart = date("Y-m-d", strtotime('first day of this month'));
        $monthEnd = date("Y-m-d", strtotime("last day of this month"));

        $lastMonthStart = date("Y-m-d", strtotime('first day of last month'));
        $lastMonthEnd = date("Y-m-d", strtotime("last day of last month"));

        $weekStart = date("Y-m-d", strtotime('monday this week'));
        $weekEnd = date("Y-m-d", strtotime("sunday this week"));

        $weekStartLastWeek = date("Y-m-d", strtotime('monday last week'));
        $weekEndLastWeek = date("Y-m-d", strtotime('sunday last week'));

        $dateStart = date("Y-m-d") . ' 00:00:00';
        $dateEnd = date("Y-m-d") . ' 23:59:59';
        $today = date('Y-m-d');

//        $weekStart = date("Y-m-d", strtotime($weekStart . "-1 days"));
        $yesterday = date("Y-m-d", strtotime( "-1 days"));
        $oneWeekAgo = date("Y-m-d", strtotime( "-8 days"));
//        debugPrint($yesterday);
//        debugPrint($oneWeekAgo);
//        debugPrint($weekStartLastWeek);
//        debugPrint($weekEndLastWeek);
//        exit;

        $patientCountToday = Appointment::find()->where([
            'DATE(appointment.created_at)' => date('Y-m-d')
        ])->count();

        $patientCountWeek = Appointment::find()->where([
            'BETWEEN', 'DATE(appointment.created_at)', $weekStart, $weekEnd
        ])->count();

        $patientCountMonth = Appointment::find()->where([
            'BETWEEN', 'DATE(appointment.created_at)', $monthStart, $monthEnd
        ])->count();

        /*
         * Increase since last week
         * */
        $patientCountYesterday = Appointment::find()->where([
            'DATE(appointment.created_at)' => $yesterday
        ])->count();

        $patientCountLastWeekThisDay = Appointment::find()->where([
            'DATE(appointment.created_at)' => $oneWeekAgo
        ])->count();

        $increasePercent = 0;
        if ($patientCountYesterday >= $patientCountLastWeekThisDay) {
            $patientLevelSinceLastWeek = 1;
            $increasePercent = ($patientCountLastWeekThisDay / $patientCountYesterday) * 100;
        } else{
            $patientLevelSinceLastWeek = 0;
            $increasePercent = ($patientCountYesterday / $patientCountLastWeekThisDay) * 100;
        }

        return $this->render('index', [
            'patientCountToday' => $patientCountToday,
            'patientCountWeek' => $patientCountWeek,
            'patientCountMonth' => $patientCountMonth,
            'patientLevelSinceLastWeek' => $patientLevelSinceLastWeek,
            'increasePercent' => $increasePercent,
        ]);
    }
}