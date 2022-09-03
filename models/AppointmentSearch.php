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
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['appointment_id', 'patient_id', 'ailment_id', 'is_followup'], 'integer'],
            [['patient_name', 'notes', 'created_at', 'updated_at'], 'safe'],
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
//        debugPrint($params);
//        exit;
        $query = Appointment::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'appointment_id' => $this->appointment_id,
            'patient_id' => $this->patient_id,
            'ailment_id' => $this->ailment_id,
            'age' => $this->age,
            'amount' => $this->amount,
            'is_followup' => $this->is_followup,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'patient_name', $this->patient_name])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
