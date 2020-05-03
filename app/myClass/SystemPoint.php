<?php

namespace App\myClass;

use App\Models\PointHistory;
use App\Models\PointAction;
use App\Models\PointConvert;
use Exception;

class SystemPoint
{

    protected $_user;
    protected $action_name;
    protected $actionPoint;
    private $actionPointMethod;
    private $actionPointHistoryMethod;
    private $deviseConvertPointMethod;
    private $deviseConvertPoint;

    /**
     * SystemPoint constructor.
     * @param $user
     * @param $action_name
     * @throws Exception
     */
    public function __construct($user = null, $action_name = null)
    {
        $this->action_name = $action_name;
        $this->_user = $user;
        $this->actionPointMethod = PointAction::class;
        $this->actionPointHistoryMethod = PointHistory::class;
        $this->actionPoint = $this->actionPointMethod::where('libelle', $this->action_name)->first();
        // if (!$this->actionPoint) {
        //     throw new  Exception('The action name is not defined');
        // }
        $this->deviseConvertPointMethod = PointConvert::class;
        $this->deviseConvertPoint = $this->deviseConvertPointMethod::first();
    }

    /**
     * @param $action_amount
     * @description Action pour montant
     */
    public function runProcessActionAmount($action_amount)
    {
        $last_point_user = $this->_user->point;
        $unity_point = $this->deviseConvertPoint->unity_point;
        $unity_devise = $this->deviseConvertPoint->unity_devise;
        $operator_value = $this->actionPoint->operator_value;
        switch ($this->actionPoint->operator) {
            case "%":
                $new_point = ($action_amount * $operator_value) / 100; // Calcule du pourcentage
                $new_point = ($new_point * $unity_point) / $unity_devise;
                if ($this->actionPoint->sens_operator == 1) { //Augmentation
                    $last_point_user += $new_point;
                } else { //reduction
                    $last_point_user -= $new_point;
                }
                break;
            default:
                return;
                break;
        }
        $this->_user->update(
            [
                'point' => $last_point_user
            ]
        );
        $this->actionPointHistoryMethod::create(
            [
                'action_user' => $this->_user->id,
                'action_point' => $this->actionPoint->id,
                'point' => $new_point ?? 0,
                'amount' => $action_amount,
            ]
        );
    }

    /**
     * @param $action_point
     * @description Action pour les ponts
     * @throws Exception
     */
    public function runProcessActionPoint($action_point = null)
    {
        $last_point_user = $this->_user->point;
        $operator_value = $this->actionPoint->operator_value;
        switch ($this->actionPoint->operator) {
            case "%": //Calcul en pourcentage
                if (is_null($action_point)) throw new Exception("le nombre de point pour le calcul en pourcentage ne pas etre null");
                $new_point = ($action_point * $operator_value) / 100; // Calcule du pourcentage
                if ($this->actionPoint->sens_operator == 1) { //Augmentation
                    $last_point_user += $new_point;
                } else { //reduction
                    $last_point_user -= $new_point;
                }
                break;
            case "+": //Calcul en plus ou en moins
            case "-":
                $new_point = is_null($action_point) ? $operator_value : $action_point;
                if ($this->actionPoint->operator == "+") { //Augmentation
                    $last_point_user += $new_point;
                } else { //reduction
                    $last_point_user -= $new_point;
                }
                break;
            case "*":
                $new_point = is_null($action_point) ? $last_point_user : $action_point; //S'il nous indique pas le point on prend le point de l'utilisateur
                $new_point = $new_point * $operator_value; //On multiplie le point par la veleur de l'operateur
                if ($this->actionPoint->operator == "+") { //Augmentation
                    $last_point_user += $new_point;
                } else { //reduction
                    $last_point_user -= $new_point;
                }
                break;
            default:
                return;
                break;
        }
        $this->_user->update(
            [
                'point' => $last_point_user
            ]
        );
        $this->actionPointHistoryMethod::create(
            [
                'action_user' => $this->_user->id,
                'action_point' => $this->actionPoint->id,
                'point' => $new_point ?? 0,
                'amount' => $this->getConvertPointToAmount($new_point ?? 0),
            ]
        );
    }

    /**
     * @param null $user_point
     * @return float|int
     */
    public function getConvertPointToAmount($user_point = null)
    {
        $last_point_user = is_null($user_point) ? $this->_user->point : $user_point;
        $unity_point = $this->deviseConvertPoint->unity_point;
        $unity_devise = $this->deviseConvertPoint->unity_devise;
        return self::convertPointToAmount($last_point_user, $unity_devise, $unity_point);
    }

    /**
     * @param null $amount
     * @return float|int
     */
    public function getConvertAmountToPoint($amount = null)
    {
        $amount = !is_null($amount) ? $amount : 0;
        $unity_point = $this->deviseConvertPoint->unity_point;
        $unity_devise = $this->deviseConvertPoint->unity_devise;
        return self::convertAmountToPoint($amount, $unity_point, $unity_devise);
    }

    /**
     * @param $last_point_user
     * @param $unity_devise
     * @param $unity_point
     * @return float|int
     */
    public static function convertPointToAmount($last_point_user, $unity_devise, $unity_point)
    {
        return ($last_point_user * $unity_devise) / $unity_point;
    }

    /**
     * @param $amount
     * @param $unity_point
     * @param $unity_devise
     * @return float|int
     */
    public static function convertAmountToPoint($amount, $unity_point, $unity_devise)
    {
        return ($amount * $unity_point) / $unity_devise;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->_user;
    }

    /**
     * @return mixed
     */
    public function getActionName()
    {
        return $this->action_name;
    }
}
