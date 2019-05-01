<?php

namespace backend\controllers;

use Yii;
use backend\models\Paymenthistory;
use backend\models\Memberbalance;
use backend\models\PaymenthistorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PaymenthistoryController implements the CRUD actions for Paymenthistory model.
 */
class PaymenthistoryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Paymenthistory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PaymenthistorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Paymenthistory model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Paymenthistory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Paymenthistory();
        $balance = new Memberbalance();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if($model->save(false)){
                $total=Paymenthistory::find()->where(['member_id'=>$model->member_id])->sum('amount_paid');
                $old_balance=Memberbalance::find()->where(['member_id'=>$model->member_id])->sum('balance');
                $new_balance=$old_balance+$model->amount_paid;
                Yii::$app->db->createCommand()
                ->update('memberbalance', ['balance' => $new_balance], ['member_id' => $model->member_id])
                ->execute();
                Yii::$app->session->setFlash('msg', '
                    <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <strong> </strong> Succcess.</div>'
                 );

                return $this->redirect(['index']);
            }
            
        }

        return $this->renderajax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Paymenthistory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Paymenthistory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Paymenthistory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Paymenthistory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Paymenthistory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
