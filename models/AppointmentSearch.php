<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Appointment;

/**
 * AppointmentSearch represents the model behind the search form of `app\models\Appointment`.
 */
class AppointmentSearch extends Appointment
{
    public $isFollowup = "";
    /**
     * {@inheritdoc}
     */
    public function rules()
    {


        return [
            [['appointment_id', 'patient_id', 'ailment_id'], 'integer'],
            [['patient_name', 'notes', 'created_at', 'updated_at','is_followup','isFollowup'], 'safe'],
            [['age', 'amount'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Appointment::find();

        if (isset($params['AppointmentSearch']['isFollowup']) && $params['AppointmentSearch']['isFollowup'] == 'Y') {
            $query->andWhere([
                'is_followup' => 1
            ]);
        } elseif (isset($params['AppointmentSearch']['isFollowup']) && $params['AppointmentSearch']['isFollowup'] == 'N'){
            $query->andWhere([
                'is_followup' => 0
            ]);
        }
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['appointment_id' => SORT_DESC]],
        ]);

        $this->load($params);

//        exit;
        // grid filtering conditions
        $query->andFilterWhere([
            'appointment_id' => $this->appointment_id,
            'patient_id' => $this->patient_id,
            'ailment_id' => $this->ailment_id,
            'age' => $this->age,
            'amount' => $this->amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'patient_name', $this->patient_name])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
