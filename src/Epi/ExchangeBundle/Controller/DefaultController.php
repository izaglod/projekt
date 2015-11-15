<?php

namespace Epi\ExchangeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        $data = $this->loadData();
        return $this->render('EpiExchangeBundle:Default:index.html.twig', array('data' => $data));
    }
    public function array_column(array $input, $columnKey, $indexKey = null) {
        $array = array();
        foreach ($input as $value) {
            if ( ! isset($value[$columnKey])) {
                trigger_error("Key \"$columnKey\" does not exist in array");
                return false;
            }

            if (is_null($indexKey)) {
                $array[] = $value[$columnKey];
            } else {
                if ( ! isset($value[$indexKey])) {
                    trigger_error("Key \"$indexKey\" does not exist in array");
                    return false;
                }
                if ( ! is_scalar($value[$indexKey])) {
                    trigger_error("Key \"$indexKey\" does not contain scalar value");
                    return false;
                }
                $array[$value[$indexKey]] = $value[$columnKey];
            }
        }

        return $array;
    }
    public function viewAction($code)
    {
        $data = $this->loadData();
        $key = array_search($code, $this->array_column($data, 'kod_waluty'));
        return $this->render('EpiExchangeBundle:Default:detail.html.twig', array('data' => $data[$key]));
    }
    private function loadData()
    {
        return
            array(
                array(
                    'nazwa_waluty' => 'bat (Tajlandia)',
                    'przelicznik' => '1',
                    'kod_waluty' => 'THB',
                    'kurs_sredni' => '0,1173',
                ),
                array(
                    'nazwa_waluty' => 'dolar amerykański',
                    'przelicznik' => '1',
                    'kod_waluty' => 'USD',
                    'kurs_sredni' => '3,8180',
                ),
                array(
                    'nazwa_waluty' => 'dolar australijski',
                    'przelicznik' => '1',
                    'kod_waluty' => 'AUD',
                    'kurs_sredni' => '2,9671',
                ),
                array(
                    'nazwa_waluty' => 'dolar Hongkongu',
                    'przelicznik' => '1',
                    'kod_waluty' => 'HKD',
                    'kurs_sredni' => '0,4923',
                ),
                array(
                    'nazwa_waluty' => 'dolar kanadyjski',
                    'przelicznik' => '1',
                    'kod_waluty' => 'CAD',
                    'kurs_sredni' => '3,0310',
                ),
                array(
                    'nazwa_waluty' => 'dolar nowozelandzki',
                    'przelicznik' => '1',
                    'kod_waluty' => 'NZD',
                    'kurs_sredni' => '2,8945',
                ),
            );
        }



}
