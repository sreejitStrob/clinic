<?php

namespace app\controllers;

use app\models\PatientHistory;
use app\models\PatientHistorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PatientHistoryController implements the CRUD actions for PatientHistory model.
 */
class PatientHistoryController extends Controller
{
    /**
     * @inheritDoc
     */
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
            ]
        );
    }

    /**
     * Lists all PatientHistory models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PatientHistorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PatientHistory model.
     * @param int $patient_history_id Patient History ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($patient_history_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($patient_history_id),
        ]);
    }

    /**
     * Creates a new PatientHistory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new PatientHistory();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'patient_history_id' => $model->patient_history_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PatientHistory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $patient_history_id Patient History ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($patient_history_id)
    {
        $model = $this->findModel($patient_history_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'patient_history_id' => $model->patient_history_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing PatientHistory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $patient_history_id Patient History ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($patient_history_id)
    {
        $this->findModel($patient_history_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PatientHistory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $patient_history_id Patient History ID
     * @return PatientHistory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($patient_history_id)
    {
        if (($model = PatientHistory::findOne(['patient_history_id' => $patient_history_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
