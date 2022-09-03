<?php

namespace app\controllers;

use app\models\ConsultationType;
use app\models\ConsultationTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ConsultationTypeController implements the CRUD actions for ConsultationType model.
 */
class ConsultationTypeController extends Controller
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
     * Lists all ConsultationType models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ConsultationTypeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ConsultationType model.
     * @param int $consultant_type_id Consultant Type ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($consultant_type_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($consultant_type_id),
        ]);
    }

    /**
     * Creates a new ConsultationType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ConsultationType();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'consultant_type_id' => $model->consultant_type_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ConsultationType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $consultant_type_id Consultant Type ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($consultant_type_id)
    {
        $model = $this->findModel($consultant_type_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'consultant_type_id' => $model->consultant_type_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ConsultationType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $consultant_type_id Consultant Type ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($consultant_type_id)
    {
        $this->findModel($consultant_type_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ConsultationType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $consultant_type_id Consultant Type ID
     * @return ConsultationType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($consultant_type_id)
    {
        if (($model = ConsultationType::findOne(['consultant_type_id' => $consultant_type_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
