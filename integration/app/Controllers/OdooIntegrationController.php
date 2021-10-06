<?php

/**
 * @author wilson andres bachiller ortiz
 * @date    12/11/2020
 */


namespace App\Controllers;

require_once '../app/Libraries/ripcord/ripcord.php';


use App\Controllers\EmailController;
use App\Models\Integration;
use App\Models\Invoices;
use App\Models\TrafficLight;
use ripcord;


class OdooIntegrationController extends BaseController
{
    private $url;
    private $db;
    private $username;
    private $password;
    private $models;
    private $uid;
    private $invoice = [];
    private $integration;
    private $number;
    private $resolutionNumber;
    private $Company = [];
    private $customer = [];
    public $api = 'https://planeta-internet.com/api/';

    public function __construct()
    {
        $ingration = new Integration();
        $this->integration = $ingration->asObject()->find(1);

        $this->url = $this->integration->url;
        $this->db = $this->integration->database;
        $this->username = $this->integration->username;
        $this->password = $this->integration->password;

        // datos Compañia en MFL
        $this->Company = $this->_company($this->integration->companies_id);

        // Validation version odooo
        $common = ripcord::client("$this->url/xmlrpc/2/common");
        $version = $common->version();
        if (!isset($version)) {
            echo json_encode('Se a producido un error al obtener la version de Odoo');
            die();
        }
        // Authentication
        $this->uid = $common->authenticate($this->db, $this->username, $this->password, $version);
        if (!is_numeric($this->uid)) {
            echo json_encode('No se pudo realizar la autentificación Correctamente');
            die();
        }
        $this->models = ripcord::client("$this->url/xmlrpc/2/object");

        /***
         * @author john vergara
         * @email jvergara@iplanetcolombia.com
         * @message  resolucion dian y datos compañia
         */

    }

    //
    public function init()
    {
        $email = new EmailController();
        $trafficLight = new TrafficLight();
        $lastTrafficlight = $trafficLight->orderBy('id', 'DESC')->limit(1)->get()->getResult();
        $numberTrafficlight = count($lastTrafficlight);
        if ($numberTrafficlight != 0) {
            if (empty($lastTrafficlight[0]->finish_date) || $lastTrafficlight[0]->finish_date == '' || $lastTrafficlight[0]->finish_date == null) {
                $asunto = "Proceso Activo";
                $cuerpo = "Se encuentra un proceso activo ejecutándose en estos momentos.";
                //se realiza el envio del correo electronico
                $email->send('soporte@mifacturalegal.com', 'Integración Odoo', 'pruebasapp@iplanetcolombia.com', $asunto, $cuerpo);
                die();
            }
        }

        $idTraffic = $trafficLight->insert(['start_date' => date('Y-m-d H:m:s')]);
        $invoices = new Invoices();
        // trae la ultima factura generada por parte de Odoo
        $lastInvoice = $invoices->selectMax('invoice_odoo')->where(['status' => 1])->get()->getResult();
        if (!isset($lastInvoice[0]->invoice_odoo) || $lastInvoice[0]->invoice_odoo == '' || $lastInvoice[0]->invoice_odoo == null) {
            $data = $this->models->execute_kw($this->db, $this->uid, $this->password,
                'sale.order', 'search_read', [[['create_date', '>=', date('Y-m-d')],['x_studio_dian_1', '!=', 'Enviada'],['x_studio_dian_1', '!=', '']]], ['fields' => ['partner_id', 'name']]);

        } else {
            $data = $this->models->execute_kw($this->db, $this->uid, $this->password,
                'sale.order', 'search_read', [[['create_date', '>=', date('Y-m-d')], ['name', '>', $lastInvoice[0]->invoice_odoo],['x_studio_dian_1', '!=', 'Enviada'],['x_studio_dian_1', '!=', '']]], ['fields' => ['partner_id', 'name']]);

        }

        // valida cantidad de facturas
        $numberInvoices = count($data);
        if ($numberInvoices == 0) {
            //Facturas faltantes sin enviar o que no se han enviado por errores
            $data = $this->models->execute_kw($this->db, $this->uid, $this->password,
                'sale.order', 'search_read', [[['create_date', '>=', date('Y-m-d')], ['x_studio_dian_1', '!=', 'Enviada'],['x_studio_dian_1', '!=', '']]], ['fields' => ['partner_id', 'name']]);
            $missingInvoices = count($data);
            if ($missingInvoices == 0) {
                $trafficLight->set(['finish_date' => date('Y-m-d H:m:s')])->where(['id' => $idTraffic])->update();
                $asunto = "Sin Facturas";
                $cuerpo = "No hay facturas para enviar. Se realiza proceso de verificación de facturas faltantes  o no enviadas y tampoco se encuentran facturas.";
                //se realiza el envio del correo electronico
                $email->send('soporte@mifacturalegal.com', 'Integración Odoo', 'pruebasapp@iplanetcolombia.com', $asunto, $cuerpo);
                die();
            }
        }
        $dates = [];

        foreach ($data as $cliente) {
            $lastResolutionmfl = $invoices->selectMax('invoice_mfl')->where(['status' => 1])->get()->getResult();
            $numberResolutionmfl = count($lastResolutionmfl);
            if($numberResolutionmfl == 0 || $lastResolutionmfl[0]->invoice_mfl == '' || $lastResolutionmfl[0]->invoice_mfl == null){
                $multipleResolution = $this->_multipleResolution($this->integration->companies_id);
                $resolution = $this->_resolucion($multipleResolution[0]->resolution, $this->integration->companies_id);
                $this->resolutionNumber = $multipleResolution[0]->resolution;
                $this->number = $resolution->resolution;
            }else{
                $multipleResolution = $this->_multipleResolution($this->integration->companies_id);
                $this->resolutionNumber = $multipleResolution[0]->resolution;
                $this->number = $lastResolutionmfl[0]->invoice_mfl + 1;
            }
            //datos  a enviar
            $this->invoice = [];
            $this->invoice['number'] = $this->number;
            $this->invoice['type_document_id'] = 1;
            $this->invoice['resolution_number'] = $this->resolutionNumber;
            $this->invoice['date'] = date('Y-m-d');
            $this->invoice['time'] = date('H:i:s');
            $this->invoice['idcurrency'] = 35;
            $this->customer($cliente["partner_id"][0]);
            $this->paymentForms();
            $this->lineInvoice($cliente['id']);
            $this->_legalMonetaryTotals();
            $this->_taxesTotals();


            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => $this->api . 'api/ubl2.1/invoice/' . $this->Company->testId,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($this->invoice),
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Accept: application/json",
                    "Authorization: Bearer " . $this->Company->token,
                    "Content-Type: application/json"
                ),
            ));

            $response = curl_exec($curl);


            curl_close($curl);
            /***
             * @author john vergara
             * @email jvergara@iplanetcolombia.com
             * @message  create notification on odoo.co
             */
            // datos para poder realizar
            $mensaje = $this->models->execute_kw($this->db, $this->uid, $this->password,
                'mail.message', 'search_read', [[['record_name', '=', $cliente['name']]]],
                [
                    'fields' => [
                        'parent_id',
                        'res_id',
                        'author_id',
                        'create_uid'
                    ], 'limit' => 1
                ]
            );

            $valor = json_decode($response);
            if (isset($valor->ResponseDian)) {
                $dataInvoices = [
                    'invoice_odoo' => $cliente['name'],
                    'invoice_mfl' => $this->number,
                    'status' => 1
                ];
                $invoices->insert($dataInvoices);
                // cambiar estado factura odoo
                $estado = $this->models->execute_kw($this->db, $this->uid, $this->password, 'sale.order', 'write',
                    array(array($cliente['id']), array('x_studio_dian_1' => "Enviada")));
                // comentario en la factura
                $id = $this->models->execute_kw($this->db, $this->uid, $this->password,
                'mail.message', 'create', [
                    [
                        'subject' => 'Re: ' . $cliente['name'],
                        'date' => date('Y-m-d H:i:s'),
                        'body' => '<p>Factura generada con Resolucion N°' . $this->invoice['number'] . ' <a target="_blank" href="https://planeta-internet.com/api/api/download/'.$this->Company->identification_number.'/FES-SETP'. $this->invoice['number'] . '.pdf">Ver Factura</a></p>',
                        'parent_id' => $mensaje[0]['parent_id'][0],
                        'model' => 'sale.order',
                        'res_id' => $mensaje[0]['res_id'],
                        'record_name' => $cliente['name'],
                        'message_type' => 'comment',
                        'subtype_id' => 1,
                        'author_id' => $mensaje[0]['author_id'][0],
                        'add_sign' => 't',
                        'create_uid' => 2,
                        'create_date' => date('Y-m-d H:i:s'),
                        'write_uid' => 2,
                        'write_date' => date('Y-m-d H:i:s')

                    ]
                ]);
                // envio de correo
                $this->_email($this->Company->identification_number,$multipleResolution[0]->prefix,$this->number);
            } else {
                $dataInvoices = [
                    'invoice_odoo' => $cliente['name'],
                    'invoice_mfl' => $this->number,
                    'status' => 2
                ];
                $invoices->insert($dataInvoices);
                // cambiar estado factura odoo
                $estado = $this->models->execute_kw($this->db, $this->uid, $this->password, 'sale.order', 'write',
                    array(array($cliente['id']), array('x_studio_dian_1' => "No Enviada")));
                $asunto = "Factura N°" . $cliente['name'] . " no se envió con exito.";
                $cuerpo = "Hubo un incoveniente al momento de realizar el envió de la factura N°" . $cliente['name'] . " a la Dian, por favor Validar que la factura tenga todos los impuestos y los datos del cliente correspondiente";
                //se realiza el envio del correo electronico
                $email->send('soporte@mifacturalegal.com', 'Integración Odoo', 'pruebasapp@iplanetcolombia.com', $asunto, $cuerpo);
                $id = $this->models->execute_kw($this->db, $this->uid, $this->password,
                'mail.message', 'create', [
                    [
                        'subject' => 'Re: ' . $cliente['name'],
                        'date' => date('Y-m-d H:i:s'),
                        'body' => '<p>Hubo un incoveniente al momento de realizar el envió de la factura N°' . $cliente['name'] . 'a la Dian, por favor Validar que la factura tenga todos los impuestos y los datos del cliente correspondiente</p>',
                        'parent_id' => $mensaje[0]['parent_id'][0],
                        'model' => 'sale.order',
                        'res_id' => $mensaje[0]['res_id'],
                        'record_name' => $cliente['name'],
                        'message_type' => 'comment',
                        'subtype_id' => 1,
                        'author_id' => $mensaje[0]['author_id'][0],
                        'add_sign' => 't',
                        'create_uid' => 2,
                        'create_date' => date('Y-m-d H:i:s'),
                        'write_uid' => 2,
                        'write_date' => date('Y-m-d H:i:s')

                    ]
                ]);
            }

            echo $response;
        }
        $trafficLight->set(['finish_date' => date('Y-m-d H:m:s')])->where(['id' => $idTraffic])->update();
    }


    public function customer($partnerId)
    {
        $data = $this->models->execute_kw(
            $this->db,
            $this->uid,
            $this->password,
            'res.partner',
            'read',
            [$partnerId],
            ['fields' => ['id', 'vat', 'name', 'phone', 'mobile', 'street', 'email', 'display_name']]
        );

        $this->invoice['customer']['name'] = $data[0]['name'] ? $data[0]['name'] : $data[0]['display_name'];
        $this->invoice['customer']['identification_number'] = $data[0]['vat'] ? $data[0]['vat'] : '222222222222';
        $this->invoice['customer']['phone'] = (!empty($data[0]['phone'])) ? str_replace(' ', '', str_replace('+57 ', '', $data[0]['phone'])) : $this->Company->phone;
        $this->invoice['customer']['address'] = (!empty($data[0]['street'])) ? $data[0]['street'] : $this->Company->address;
        $this->invoice['customer']['email'] = (!empty($data[0]['email'])) ? $data[0]['email'] : $this->Company->email;
        $this->invoice['customer']['merchant_registration'] = '000000';
        $this->invoice['customer']['type_document_identification_id'] = 3;
        $this->invoice['customer']['type_organization_id'] = 1;
        $this->invoice['customer']['municipality_id'] = 149;
        $this->invoice['customer']['type_regime_id'] = 2;

        if (!empty($data[0]['vat']) && !empty($data[0]['email']) && !empty($data[0]['phone'])) {
            $this->customer = [
                'usuario' => 'usuario registrado',
                'email' => $data[0]['email']
            ];
        } elseif (empty($data[0]['vat']) && !empty($data[0]['email'])) {
            $this->customer = [
                'usuario' => 'usuario registrado',
                'email' => $data[0]['email']
            ];
        } elseif (empty($data[0]['vat']) && !empty($data[0]['phone'])) {
            $this->customer = [
                'usuario' => 'usuario registrado',
                'email' => $data[0]['email']
            ];
        } else {
            $this->customer = [
                'usuario' => 'usuario registrado'
            ];
        }
    }

    public function paymentForms()
    {
        $this->invoice['payment_form']['payment_form_id'] = 1;
        $this->invoice['payment_form']['payment_method_id'] = 10;
        $this->invoice['payment_form']['payment_due_date'] = date('Y-m-d');
        $this->invoice['payment_form']['duration_measure'] = 0;
    }

    public function lineInvoice($orderId)
    {
        $data = $this->models->execute_kw($this->db, $this->uid, $this->password,
            'sale.order.line', 'search_read',
            [[['order_id', '=', $orderId]]],
            ['fields' => ['id', 'price_unit', 'price_subtotal', 'product_uom_qty', 'discount', 'name', 'tax_id']]);

        $l = 0;
        foreach ($data as $line) {
            if ($data[$l]['price_subtotal'] != 0) {
                $this->invoice['invoice_lines'][$l]['unit_measure_id'] = 70;
                $this->invoice['invoice_lines'][$l]['invoiced_quantity'] = $data[$l]['product_uom_qty'];
                $discount = (($data[$l]['price_unit'] * $data[$l]['product_uom_qty'] )*$data[$l]['discount'])/100;
                $this->invoice['invoice_lines'][$l]['line_extension_amount'] = $data[$l]['price_subtotal'];
                $this->invoice['invoice_lines'][$l]['free_of_charge_indicator'] = false;

                $this->invoice['invoice_lines'][$l]['description'] = $data[$l]['name'];
                $this->invoice['invoice_lines'][$l]['code'] = $data[$l]['name'];
                $this->invoice['invoice_lines'][$l]['type_item_identification_id'] = 4;
                $this->invoice['invoice_lines'][$l]['price_amount'] = ($data[$l]['price_subtotal'] / $data[$l]['product_uom_qty']) + ($discount/$data[$l]['product_uom_qty']);
                $this->invoice['invoice_lines'][$l]['base_quantity'] = $data[$l]['product_uom_qty'];

                $this->invoice['invoice_lines'][$l]['allowance_charges'][0]['charge_indicator'] = false;
                $this->invoice['invoice_lines'][$l]['allowance_charges'][0]['allowance_charge_reason'] = 'DESCUENTO GENERAL';
                $this->invoice['invoice_lines'][$l]['allowance_charges'][0]['amount'] = $discount;
                $this->invoice['invoice_lines'][$l]['allowance_charges'][0]['base_amount'] = $data[$l]['price_unit'];


                $accountTax = $this->models->execute_kw($this->db, $this->uid, $this->password,
                    'account.tax', 'search_read',
                    [[['id', '=', $data[$l]['tax_id']]]],
                    ['fields' => ['name', 'amount']]);

                $i = 0;
                foreach ($accountTax as $item) {

                    if ($this->_validationTax($item['name']) == 1) {
                        $this->invoice['invoice_lines'][$l]['tax_totals'][$i]['tax_id'] = $this->_validationTax($item['name']);
                        $this->invoice['invoice_lines'][$l]['tax_totals'][$i]['tax_amount'] = (double)number_format(((($data[$l]['price_subtotal'])) * abs($item['amount'])) / 100, '2', '.', '');
                        $this->invoice['invoice_lines'][$l]['tax_totals'][$i]['taxable_amount'] = ($data[$l]['price_subtotal']);
                        $this->invoice['invoice_lines'][$l]['tax_totals'][$i]['percent'] = (string)abs($item['amount']);
                    } else {
                        $this->invoice['invoice_lines'][$l]['with_holding_tax_total'][$i]['tax_id'] = $this->_validationTax($item['name']);
                        $this->invoice['invoice_lines'][$l]['with_holding_tax_total'][$i]['tax_amount'] = ((($data[$l]['price_subtotal'])) * abs($item['amount'])) / 100;
                        $this->invoice['invoice_lines'][$l]['with_holding_tax_total'][$i]['taxable_amount'] = ($data[$l]['price_subtotal']);
                        $this->invoice['invoice_lines'][$l]['with_holding_tax_total'][$i]['percent'] = (string)abs($item['amount']);

                    }
                    $i++;

                }
                
                if(!isset($this->invoice['invoice_lines'][$l]['tax_totals']) || count($this->invoice['invoice_lines'][$l]['tax_totals']) == 0){
                        $this->invoice['invoice_lines'][$l]['tax_totals'][$i]['tax_id'] = 1;
                        $this->invoice['invoice_lines'][$l]['tax_totals'][$i]['tax_amount'] = '0.00';
                        $this->invoice['invoice_lines'][$l]['tax_totals'][$i]['taxable_amount'] = ($data[$l]['price_subtotal']);
                        $this->invoice['invoice_lines'][$l]['tax_totals'][$i]['percent'] = '0.00';
                }
                $l++;
            }
        }

        if (!isset($this->invoice['invoice_lines'][$l]['with_holding_tax_total'])) {
            $this->invoice['with_holding_tax_total'] = [];
        }


    }

    private function _legalMonetaryTotals()
    {
        $lineExtensionAmount = 0;
        $taxExclusiveAmount = 0;
        $taxInclusiveAmount = 0;
        foreach ($this->invoice['invoice_lines'] as $item) {
            $lineExtensionAmount += $item['line_extension_amount'];
            $taxExclusiveAmount += $item['line_extension_amount'];
        }

        foreach ($this->invoice['invoice_lines'] as $item) {
            if (isset($item['tax_totals'])) {
                foreach ($item['tax_totals'] as $tax) {
                    if ($tax['tax_id'] == 1) {
                        $taxInclusiveAmount += $tax['tax_amount'];
                    }
                }
            }

        }

        $this->invoice['legal_monetary_totals']['line_extension_amount'] = (double)number_format($lineExtensionAmount, '2', '.', '');
        $this->invoice['legal_monetary_totals']['tax_exclusive_amount'] = (double)number_format($taxExclusiveAmount, '2', '.', '');
        $this->invoice['legal_monetary_totals']['tax_inclusive_amount'] = (double)number_format($taxInclusiveAmount + $lineExtensionAmount, '2', '.', '');
        $this->invoice['legal_monetary_totals']['allowance_total_amount'] = '0.00';
        $this->invoice['legal_monetary_totals']['charge_total_amount'] = '0.00';
        $this->invoice['legal_monetary_totals']['payable_amount'] = (double)number_format($taxInclusiveAmount + $lineExtensionAmount, '2', '.', '');
    }

    private function _taxesTotals()
    {

        $iva = [];
        $percent = [];
        foreach ($this->invoice['invoice_lines'] as $value) {
            if (isset($value['tax_totals'])) {
                ;
                foreach ($value['tax_totals'] as $item) {
                    if (!array_key_exists($item['percent'], $percent)) {
                        array_push($iva, $item);
                        $percent["" . $item['percent'] . ""] = $item['percent'];
                    } else {
                        $m = 0;
                        foreach ($iva as $valid) {
                            if ($valid['percent'] == $item['percent']) {
                                $iva[$m]['tax_amount'] += $item['tax_amount'];
                                $iva[$m]['taxable_amount'] += $item['taxable_amount'];
                            }
                            $m++;
                        }

                    }

                }
            }
        }


        $retention = [];
        $l = 0;


        foreach ($this->invoice['invoice_lines'] as $item) {
            if (isset($item['with_holding_tax_total'])) {
                foreach ($item['with_holding_tax_total'] as $taxTotal) {
                    if ($taxTotal['tax_id'] == '5' || $taxTotal['tax_id'] == '6' || $taxTotal['tax_id'] == '7') {
                        if (array_key_exists($taxTotal['tax_id'], $retention)) {
                            if (isset($retention[$taxTotal['tax_id']][$l]['percent']) && $retention[$taxTotal['tax_id']][$l]['percent'] == $taxTotal['percent']) {
                                $k = 0;
                                foreach ($retention[$taxTotal['tax_id']] as $values) {
                                    if ($retention[$taxTotal['tax_id']][$k]['percent'] = $taxTotal['percent']) {
                                        $retention[$taxTotal['tax_id']][$k]['taxable_amount'] += $taxTotal['taxable_amount'];
                                        $retention[$taxTotal['tax_id']][$k]['tax_amount'] += $taxTotal['tax_amount'];
                                    }
                                    $k++;
                                }
                            }
                            $l++;
                            $retention[$taxTotal['tax_id']][$l] = $taxTotal;
                        } else {
                            $retention[$taxTotal['tax_id']][$l] = $taxTotal;
                        }
                    }
                }
            }
        }

        $array = [];
        $info = [];


        if (isset($retention[5])) {
            array_push($info, (array)$retention[5]);
        }

        if (isset($retention[6])) {
            array_push($info, (array)$retention[6]);
        }

        if (isset($retention[7])) {
            array_push($info, (array)$retention[7]);
        }

        foreach ($info as $item) {
            foreach ($item as $item2) {
                if ($item2['percent'] != 0.00) {
                    array_push($array, $item2);
                }
            }
        }
        if (count($array) > 0) {
            $this->invoice['with_holding_tax_total'] = $array;
        }
        if (!empty($iva)) {
            $this->invoice['tax_totals'] = $iva;
        }


    }


    private function _validationTax($name)
    {
        if (strpos($name, 'IVA') !== false) {
            return 1;
        } else if (strpos($name, 'RteFte') !== false) {
            return 6;
        } else if (strpos($name, 'RteICA') !== false) {
            return 7;
        }
    }

    private function _resolution($id = null)
    {
        $resolution = new Resolution();
        $resolution = $resolution->where(['companies_id' => Auth::querys()->companies_id]);

        if ($id) {
            $resolution->where(['resolution' => $id]);
            $consulta = ['type_documents_id' => 1];
            $resolution->where($consulta);
        }

        $resolution = $resolution
            ->orderBy('id', 'DESC')
            ->asObject()
            ->first();


        $invoices = new Invoice();
        $invoices->select('invoices.resolution');
        if ($id) {
            $invoices->where(['companies_id' => Auth::querys()->companies_id, 'resolution_id =' => $id]);
        }
        $invoices = $invoices->orderBy('id', 'DESC')
            ->asObject()
            ->first();


        if (!$invoices) {
            return $resolution->from;

        } else {
            return $invoices->resolution + 1;
        }

    }

    /***
     * @author john vergara
     * @email jvergara@iplanetcolombia.com
     * @message  funciones multiple Resolution y resolution
     */
    public function _multipleResolution($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://planeta-internet.com/mifacturalegal/public/api/invoices/multiple_resolutions_odoo/" . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    public function _resolucion($id, $company)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://planeta-internet.com/mifacturalegal/public/api/invoices/resolution_odoo/" . $id . "/" . $company,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    public function _company($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://planeta-internet.com/mifacturalegal/public/api/companiesodoo/" . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);

    }
    
    public function _email($identification_number,$prefix,$resolution){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->api."api/send-email-customer/Now",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                "company_idnumber" => $identification_number,
                "prefix" => empty($prefix) ? '': $prefix,
                "number" => (string)$resolution
            ]),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "accept: application/json"
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $data = json_decode($response);
        var_dump($data);
    } 


}

