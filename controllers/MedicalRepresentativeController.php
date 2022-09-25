<?php

namespace app\controllers;

use app\models\MedicalRepresentative;
use app\models\MedicalRepresentativeSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MedicalRepresentativeController implements the CRUD actions for MedicalRepresentative model.
 */
class MedicalRepresentativeController extends Controller
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
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['index','create','update','view'],
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


    /**
     * Lists all MedicalRepresentative models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MedicalRepresentativeSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MedicalRepresentative model.
     * @param int $medical_representative_id Medical Representative ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($medical_representative_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($medical_representative_id),
        ]);
    }

    /**
     * Creates a new MedicalRepresentative model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MedicalRepresentative();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'medical_representative_id' => $model->medical_representative_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MedicalRepresentative model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $medical_representative_id Medical Representative ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($medical_representative_id)
    {
        $model = $this->findModel($medical_representative_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'medical_representative_id' => $model->medical_representative_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MedicalRepresentative model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $medical_representative_id Medical Representative ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($medical_representative_id)
    {
        $this->findModel($medical_representative_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MedicalRepresentative model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $medical_representative_id Medical Representative ID
     * @return MedicalRepresentative the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($medical_representative_id)
    {
        if (($model = MedicalRepresentative::findOne(['medical_representative_id' => $medical_representative_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
