<?php
namespace app\controllers;

use app\models\Appointment;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class DashviewController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['index'],
                    'rules' => [
                        [
                            'actions' => [],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ]
        );
    }

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
        $salesAmountWeek = Appointment::find()->where([
            'BETWEEN', 'DATE(appointment.created_at)', $weekStart, $weekEnd
        ])->sum('amount');


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
//            $increasePercent = ($patientCountLastWeekThisDay / $patientCountYesterday) * 100;
        } else{
            $patientLevelSinceLastWeek = 0;
//            $increasePercent = ($patientCountYesterday / $patientCountLastWeekThisDay) * 100; //TODO
        }

        return $this->render('index', [
            'patientCountToday' => $patientCountToday,
            'patientCountWeek' => $patientCountWeek,
            'salesAmountWeek' => $salesAmountWeek,
            'patientCountMonth' => $patientCountMonth,
            'patientLevelSinceLastWeek' => $patientLevelSinceLastWeek,
            'increasePercent' => number_format($increasePercent,2),
        ]);
    }

    public function actionGetPatientFlow() {
        $weekStart = date("Y-m-d", strtotime('monday this week'));
        $weekEnd = date("Y-m-d", strtotime("sunday this week"));

        $weekStartLastWeek = date("Y-m-d", strtotime('monday last week'));
        $weekEndLastWeek = date("Y-m-d", strtotime('sunday last week'));

        $request = Yii::$app->request->bodyParams;
        $appointmentCurrentWeek = Appointment::find()
            ->select([
                'COUNT(appointment.appointment_id) as patient_count',
                'DATE(appointment.created_at) as date',
                'DAYNAME(appointment.created_at) as day',
                'SUM(appointment.amount) as amount',
            ])
            ->where([
                'BETWEEN', 'DATE(appointment.created_at)', $weekStart, $weekEnd
            ])
            ->groupBy([
                'DATE(appointment.created_at)',
                'DAYNAME(appointment.created_at)'
            ])
            ->orderBy([
                'date' => SORT_ASC
            ])
            ->asArray()
            ->all();

        $appointmentLastWeek = Appointment::find()
            ->select([
                'COUNT(appointment.appointment_id) as patient_count',
                'DATE(appointment.created_at) as date',
                'DAYNAME(appointment.created_at) as day',
                'SUM(appointment.amount) as amount',
            ])
            ->where([
                'BETWEEN', 'DATE(appointment.created_at)', $weekStartLastWeek, $weekEndLastWeek
            ])
            ->groupBy([
                'DATE(appointment.created_at)'
            ])
            ->orderBy([
                'appointment.created_at' => SORT_ASC
            ])
            ->asArray()
            ->all();
       debugPrint($appointmentCurrentWeek);
       debugPrint($appointmentLastWeek);
       exit;
       
        $initVal = ["0","0","0","0","0","0","0"];
        $currentWeekPatientCount = $initVal;
        $currentWeekAmount = $initVal;
        foreach ($appointmentCurrentWeek as $appointment) {
            if ($appointment['day'] == 'Monday') {
                $currentWeekPatientCount[0] =  $appointment['patient_count'];
                $currentWeekAmount[0] =  $appointment['amount'];
            } elseif ($appointment['day'] == 'Tuesday') {
                $currentWeekPatientCount[1] =  $appointment['patient_count'];
                $currentWeekAmount[1] =  $appointment['amount'];
            } elseif ($appointment['day'] == 'Wednesday') {
                $currentWeekPatientCount[2] =  $appointment['patient_count'];
                $currentWeekAmount[2] =  $appointment['amount'];
            } elseif ($appointment['day'] == 'Thursday') {
                $currentWeekPatientCount[3] =  $appointment['patient_count'];
                $currentWeekAmount[3] =  $appointment['amount'];
            } elseif ($appointment['day'] == 'Friday') {
                $currentWeekPatientCount[4] =  $appointment['patient_count'];
                $currentWeekAmount[4] =  $appointment['amount'];
            } elseif ($appointment['day'] == 'Saturday') {
                $currentWeekPatientCount[5] =  $appointment['patient_count'];
                $currentWeekAmount[5] =  $appointment['amount'];
            } else{
                $currentWeekPatientCount[6] =  $appointment['patient_count'];
                $currentWeekAmount[6] =  $appointment['amount'];
            }
        }

        /** @var TYPE_NAME $lastWeekPatientCount */
        $lastWeekPatientCount = $initVal;
        $lastWeekAmount = $initVal;
        foreach ($appointmentLastWeek as $appointment) {
            if ($appointment['day'] == 'Monday') {
                $lastWeekPatientCount[0] =  $appointment['patient_count'];
                $lastWeekAmount[0] =  $appointment['amount'];
            } elseif ($appointment['day'] == 'Tuesday') {
                $lastWeekPatientCount[1] =  $appointment['patient_count'];
                $lastWeekAmount[1] =  $appointment['amount'];
            } elseif ($appointment['day'] == 'Wednesday') {
                $lastWeekPatientCount[2] =  $appointment['patient_count'];
                $lastWeekAmount[2] =  $appointment['amount'];
            } elseif ($appointment['day'] == 'Thursday') {
                $lastWeekPatientCount[3] =  $appointment['patient_count'];
                $lastWeekAmount[3] =  $appointment['amount'];
            } elseif ($appointment['day'] == 'Friday') {
                $lastWeekPatientCount[4] =  $appointment['patient_count'];
                $lastWeekAmount[4] =  $appointment['amount'];
            } elseif ($appointment['day'] == 'Saturday') {
                $lastWeekPatientCount[5] =  $appointment['patient_count'];
                $lastWeekAmount[5] =  $appointment['amount'];
            } else{
                $lastWeekPatientCount[6] =  $appointment['patient_count'];
                $lastWeekAmount[6] =  $appointment['amount'];
            }
        }

//        debugPrint($currentWeekPatientCount);
//        debugPrint($currentWeekAmount);

        $chartData = [
            'currentWeekCount' => $currentWeekPatientCount,
            'currentWeekAmount' => $currentWeekAmount,
            'lastWeekCount' => $lastWeekPatientCount,
            'lastWeekAmount' => $lastWeekAmount,
        ];
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $chartData;

    }
}