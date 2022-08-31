<?php

namespace app\controllers;

use app\models\Ailment;
use app\models\AilmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AilmentController implements the CRUD actions for Ailment model.
 */
class AilmentController extends Controller
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
     * Lists all Ailment models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AilmentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ailment model.
     * @param int $ailment_id Ailment ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ailment_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ailment_id),
        ]);
    }

    /**
     * Creates a new Ailment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Ailment();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ailment_id' => $model->ailment_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ailment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ailment_id Ailment ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ailment_id)
    {
        $model = $this->findModel($ailment_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ailment_id' => $model->ailment_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ailment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ailment_id Ailment ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ailment_id)
    {
        $this->findModel($ailment_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ailment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ailment_id Ailment ID
     * @return Ailment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ailment_id)
    {
        if (($model = Ailment::findOne(['ailment_id' => $ailment_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
