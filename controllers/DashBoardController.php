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
        $weekStart = date("Y-m-d", strtotime('monday last week'));
//        $weekStart = date("Y-m-d", strtotime('monday this week'));
        $weekEnd = date("Y-m-d", strtotime("sunday this week"));
        $dateStart = date("Y-m-d") . ' 00:00:00';
        $dateEnd = date("Y-m-d") . ' 23:59:59';
        $today = date('Y-m-d');

//        $weekStart = date("Y-m-d", strtotime($weekStart . "-1 days"));
//        $weekEnd = date("Y-m-d", strtotime($weekEnd . "-1 days"));

//        debugPrint($weekStart);
//        debugPrint($weekEnd);
//        exit;


        $patientCountToday = Appointment::find()->where([
            'DATE(appointment.created_at)' => date('Y-m-d')
        ])->count();

        $patientCountWeek = Appointment::find()->where([
            'BETWEEN', 'DATE(appointment.created_at)', $weekStart, $weekEnd
        ])->count();

        return $this->render('index', [
            'patientCountToday' => $patientCountToday,
            'patientCountWeek' => $patientCountWeek,
        ]);
    }
}