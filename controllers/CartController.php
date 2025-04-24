<?php

namespace app\controllers;

use app\models\Cart;
use app\models\CartItem;
use app\models\CartSearch;
use app\models\Movie;
use app\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

use Yii;

/**
 * CartController implements the CRUD actions for Cart model.
 */
class CartController extends Controller
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
     * Lists all Cart models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CartSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cart model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cart model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Cart();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cart model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cart model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cart model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Cart the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    
    
    public function actionAdd($id) {
        
        $transaction = Yii::$app->db->beginTransaction();

        try {
            $movie = Movie::findOne($id);
            
            if (!$movie) {
                throw new NotFoundHttpException('No se encontró la película');
            }
            // Buscamos si el usuario tiene un carrito activo
            $cart = Cart::find()->where(['status' => 'active', 'user_id'=> Yii::$app->user->id])->one();
            if (!$cart) {
                $cart = new Cart();
                $cart->user_id = Yii::$app->user->id;
                
                if(!$cart->save()) {
                    Yii::$app->session->setFlash('error', 'Se ha producido un error al crear el carrito');
                    return $this->redirect(['site/index']);
                }
            }

            // Verificar si la película ya está en el carrito
            $item = CartItem::findOne(['cart_id' => $cart->id, 'movie_id' => $movie->id]);

            if ($item) {
                Yii::$app->session->setFlash('error', 'La película ya está en el carrito');
                return $this->redirect(Yii::$app->request->referrer);
            }

            $item = new CartItem([
                'cart_id' => $cart->id,
                'movie_id' => $movie->id,
                'price' => $movie->price,
            ]);

            if (!$item->save()) {
                Yii::$app->session->setFlash('error', 'No se pudo añadir la película al carrito');
                return $this->redirect(Yii::$app->request->referrer);
            }
            $transaction->commit();
            Yii::$app->session->setFlash('success', 'Película añadida al carrito correctamente');

            Yii::$app->session->set('cart_count', count($cart->cartItems));

            return $this->redirect(Yii::$app->request->referrer);


        } catch (\Exception $e) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('error', 'An error ocurred while adding the movie to the cart', $e->getMessage());        }
    }

    public function actionMyCart(){
        $cart = Cart::find()
        ->where(['user_id' => Yii::$app->user->id, 'status' => 'active'])
        ->with('cartItems')
        ->one();

        if (!$cart) {
            $cart = new Cart([
                'user_id' => Yii::$app->user->id
            ]);
        }

        return $this->render('my-cart', ['cart' => $cart]);
    }
    
    public function actionDeleteAll() {

        $cart = Cart::find()->where([
            'user_id' => Yii::$app->user->id,
            'status' => 'active'
        ])->one();

        if ($cart) {
            // Borra todos los items del carrito
            CartItem::deleteAll(['cart_id' => $cart->id]);
        }

        Yii::$app->session->set('cart_count', count($cart->cartItems));
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionCheckout() {
        // Establecer la URL de retorno
        $returnUrl = Url::to(['cart/success'], true);
        
        // Obtener el carrito activo del usuario
        $cart = Cart::find()->where([
            'user_id' => Yii::$app->user->id,
            'status' => 'active'
        ])->one();

        // Si el carrito no existe, redirigir a la página principal
        if (!$cart) {
            Yii::$app->session->setFlash('error', 'No hay carrito activo.');
            return $this->redirect(['site/index']);
        }

        // Calcular el total del carrito
        $totalAmount = 0;
        foreach ($cart->cartItems as $item) {
            $totalAmount += $item->movie->price;
        }

        // Crear un PaymentIntent en Stripe
        $stripe = new \Stripe\StripeClient(Yii::$app->params['stripeSecretKey']);
        $paymentIntent = $stripe->paymentIntents->create([
            'amount' => $totalAmount * 100,  // Stripe requiere que la cantidad esté en céntimos
            'currency' => 'eur',  // Ajusta a la moneda que necesites
            'description' => 'Compra de productos en el carrito',
            'metadata' => ['cart_id' => $cart->id],  // Se puede añadir más metadata si es necesario
        ]);

        // El client_secret se necesita para completar el pago en el frontend
        $clientSecret = $paymentIntent->client_secret;

        // Pasar los datos al frontend (view)
        return $this->render('checkout', [
            'cart' => $cart,
            'totalAmount' => $totalAmount,
            'clientSecret' => $clientSecret,
            'returnUrl' => $returnUrl
        ]);
    }

    public function actionSuccess() {
        $cart = Cart::find()->where([
            'user_id' => Yii::$app->user->id,
            'status' => 'active'
        ])->one();

        if (!$cart) {
            Yii::$app->session->setFlash('error', 'No hay carrito activo.');
            return $this->redirect(['site/index']);
        }

        return $this->render('success', ['cart' => $cart]);
    }

    protected function findModel($id)
    {
        if (($model = Cart::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

/*
The PaymentIntent object
{
  "id": "pi_3MtwBwLkdIwHu7ix28a3tqPa",
  "object": "payment_intent",
  "amount": 2000,
  "amount_capturable": 0,
  "amount_details": {
    "tip": {}
  },
  "amount_received": 0,
  "application": null,
  "application_fee_amount": null,
  "automatic_payment_methods": {
    "enabled": true
  },
  "canceled_at": null,
  "cancellation_reason": null,
  "capture_method": "automatic",
  "client_secret": "pi_3MtwBwLkdIwHu7ix28a3tqPa_secret_YrKJUKribcBjcG8HVhfZluoGH",
  "confirmation_method": "automatic",
  "created": 1680800504,
  "currency": "usd",
  "customer": null,
  "description": null,
  "invoice": null,
  "last_payment_error": null,
  "latest_charge": null,
  "livemode": false,
  "metadata": {},
  "next_action": null,
  "on_behalf_of": null,
  "payment_method": null,
  "payment_method_options": {
    "card": {
      "installments": null,
      "mandate_options": null,
      "network": null,
      "request_three_d_secure": "automatic"
    },
    "link": {
      "persistent_token": null
    }
  },
  "payment_method_types": [
    "card",
    "link"
  ],
  "processing": null,
  "receipt_email": null,
  "review": null,
  "setup_future_usage": null,
  "shipping": null,
  "source": null,
  "statement_descriptor": null,
  "statement_descriptor_suffix": null,
  "status": "requires_payment_method",
  "transfer_data": null,
  "transfer_group": null
}

*/
