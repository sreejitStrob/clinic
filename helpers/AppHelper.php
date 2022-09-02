<?php
namespace app\helpers;

use app\models\Ailment;
use app\models\ConsultantType;
use app\models\Patient;
use yii\helpers\ArrayHelper;

class AppHelper {

    public static $citizenshipList = ['KU' => 'Kuwait', 'EX' => 'Expat'];

    public static function getPatientList () {
        $patientModel = Patient::find()->all();
        return ArrayHelper::map($patientModel, 'patient_id', 'name');
    }

    public static function getConsultationType () {
        $consultationType = ConsultantType::find()->where([
            'is_deleted' => 0
        ])->all();
        return ArrayHelper::map($consultationType, 'consultant_type_id', 'name');
    }

    public static function getAilmentList() {
        $ailmentModel = Ailment::find()->where([
            'is_deleted' => 0
        ])->all();
        return ArrayHelper::map($ailmentModel, 'ailment_id', 'name');
    }

}