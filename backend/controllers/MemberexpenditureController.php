<?php

namespace backend\controllers;

use Yii;
use yii\db\Query;
use backend\models\Memberexpenditure;
use backend\models\Paymenthistory;
use backend\models\Memberbalance;  
use backend\models\MemberexpenditureSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MemberexpenditureController implements the CRUD actions for Memberexpenditure model.
 */
class MemberexpenditureController extends Controller
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
     * Lists all Memberexpenditure models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MemberexpenditureSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Memberexpenditure model.
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
     * Creates a new Memberexpenditure model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Memberexpenditure();
        $payment=new Paymenthistory();
        $balance=new Memberbalance();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $bal=Memberbalance::find()->where(['member_id'=>$model->member_id])->sum('balance');
            if($model->expediture <= $bal){
              if($model->save(false)){
                  $total_debit=Memberexpenditure::find()->where(['member_id'=>$model->member_id])->sum('expediture');
                  $total_credit=Paymenthistory::find()->where(['member_id'=>$model->member_id])->sum('amount_paid');
                  $remaining_balance=$total_credit-$total_debit;
                  Yii::$app->db->createCommand()
                     ->update('memberbalance',['balance'=>$remaining_balance],['member_id'=>$model->member_id]) 
                     ->execute();
                    Yii::$app->session->setFlash('msg', '
                    <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <strong> </strong> Succcess.</div>'
                 );

                return $this->redirect(['index']);

              }
              
            }
           echo '
           <div class="alert alert-danger alert-dismissable" role="alert">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <strong> </strong> Failed,amount debited is more that available credit</div>';
            
        }

        return $this->renderajax('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Memberexpenditure model.
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
     * Deletes an existing Memberexpenditure model.
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
     * Finds the Memberexpenditure model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Memberexpenditure the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Memberexpenditure::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
