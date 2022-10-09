<?php
namespace app\helpers;

use app\models\Ailment;
use app\models\ConsultantType;
use app\models\ConsultationType;
use app\models\Patient;
use app\models\Product;
use yii\helpers\ArrayHelper;

class AppHelper {


    public static $gender = ['M' => 'Male', 'F' => 'Female','O' => 'Other'];

    public static function getPatientList () {
        $patientModel = Patient::find()->all();
        return ArrayHelper::map($patientModel, 'patient_id', function ($patientModel) {
            $patientPhone = (!empty($patientModel->phone)) ? $patientModel->phone : "";
            return (!empty($patientPhone)) ? $patientModel->name.' ('.$patientPhone. ')' : $patientModel->name;
        });
    }

    public static function getConsultationType () {
        $consultationType = ConsultationType::find()->where([
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

    public static function getProducts() {
        $productModel = Product::find()->all();
        return ArrayHelper::map($productModel, 'product_id', 'name');
    }

}