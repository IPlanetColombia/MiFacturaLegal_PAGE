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
use mysql_xdevapi\Exception;


class OdooIntegrationv2Controller extends BaseController
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
    private $descuento = [];
    private $type;
    public $api = 'https://apiv2.mifacturalegal.com/api/';

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
        $facturas = [];
        $errores = [];
        $email = new EmailController();
        $trafficLight = new TrafficLight();
        $lastTrafficlight = $trafficLight->orderBy('id', 'DESC')->limit(1)->get()->getResult();
        $numberTrafficlight = count($lastTrafficlight);
        if ($numberTrafficlight != 0) {
            if (empty($lastTrafficlight[0]->finish_date) || $lastTrafficlight[0]->finish_date == '' || $lastTrafficlight[0]->finish_date == null) {
                $asunto = "MFL - Envio de Facturas -  Proceso Activo validar con soporte Tecnico.";
                $cuerpo = "Se encuentra un proceso activo ejecutándose en estos momentos, por favor contacte a soporte tecnico.";
                 echo "<h1>Mi Factura Legal</h1><br>" . $cuerpo . "<br><button id='cerrar'>Cerrar</button>";
                 echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script><script>$('#cerrar').click(function(){window.close();});</script>";
                //se realiza el envio del correo electronico
                $email->send('soporte@mifacturalegal.com', 'Integración Odoo', 'facturacion@petsology.com', $asunto, $cuerpo);
                $email->send('soporte@mifacturalegal.com', 'Integración Odoo', 'emtovar1@gmail.com', $asunto, $cuerpo);
                $email->send('soporte@mifacturalegal.com', 'Integración Odoo', 'pruebasapp@iplanetcolombia.com', $asunto, $cuerpo);
                die();
            }
        }

        //$idTraffic = $trafficLight->insert(['start_date' => date('Y-m-d H:m:s')]);
        $invoices = new Invoices();
        $data = $this->models->execute_kw($this->db, $this->uid, $this->password,
            'account.move', 'search_read', [[['state', '=', 'posted'], ['x_studio_dian', '!=', 'Enviada'],['x_studio_dian', '!=', ''],['x_studio_dian', '!=', 'Enviada x MFL']]], ['fields' => ['x_studio_dian','partner_id', 'name', 'state', 'type_name', 'reversed_entry_id', 'invoice_date'], 'order' => 'id asc']);
        // valida cantidad de facturas
         $numberInvoices = 0;
        foreach ($data as $validate){
            if($validate['type_name'] == 'Invoice' || $validate['type_name'] == 'Credit Note'){
                $numberInvoices++;
            }
        }
        if ($numberInvoices == 0) {
            //Facturas faltantes sin enviar o que no se han enviado por errores
            $data = $this->models->execute_kw($this->db, $this->uid, $this->password,
                'account.move', 'search_read', [[['state', '=', 'posted'],['x_studio_dian', '=', 'Rechazada']]], ['fields' => ['partner_id', 'name', 'state', 'type_name', 'reversed_entry_id', 'invoice_date'], 'order' => 'id asc']);
            $missingInvoices = count($data);
            if ($missingInvoices == 0) {
                //$trafficLight->set(['finish_date' => date('Y-m-d H:m:s')])->where(['id' => $idTraffic])->update();
                $asunto = "MFL - Envio de Facturas - Exitoso sin facturas";
                $cuerpo = "No hay facturas para enviar. Se realiza proceso de verificación de facturas faltantes  o Rechazadas y tampoco se encuentran facturas.";
                 echo "<h1>Mi Factura Legal</h1><br>" . $cuerpo . "<br><button id='cerrar'>Cerrar</button>";
                 echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script><script>$('#cerrar').click(function(){window.close();});</script>";
                //se realiza el envio del correo electronico
                $email->send('soporte@mifacturalegal.com', 'Integración Odoo', 'facturacion@petsology.com', $asunto, $cuerpo);
                $email->send('soporte@mifacturalegal.com', 'Integración Odoo', 'emtovar1@gmail.com', $asunto, $cuerpo);
                $email->send('soporte@mifacturalegal.com', 'Integración Odoo', 'pruebasapp@iplanetcolombia.com', $asunto, $cuerpo);
                die();
            }
        }
        $dates = [];
        foreach ($data as $cliente) {
            $this->type = 'invoice_lines';
            if ($cliente['type_name'] == 'Invoice' || $cliente['type_name'] == 'Credit Note') {
                /***
                 * @author john vergara
                 * @email jvergara@iplanetcolombia.com
                 * @message  validador de erros de facturas que sean diferentes a nota credito o factura de venta nacional
                 * @date 2020-12-07
                 */
                try {
                    if($cliente['invoice_date'] < date('Y-m-d') || $cliente['invoice_date'] > date('Y-m-d')) {
                        throw new \Exception('Esta factura tiene fecha para un día diferente al día de hoy. Factura N° '.$cliente['name']);
                    }
                } catch (\Exception $e) {
                    array_push($errores, 'Excepción: '.$e->getMessage());
                    continue;
                }
                /*try {
                    if ($cliente['name'] == 'INV/2020/0213' || $cliente['name'] == 'INV/2020/0214' || $cliente['name'] == 'INV/2020/0215' || $cliente['name'] == 'INV/2020/0216' || $cliente['name'] == 'INV/2020/0217' || $cliente['name'] == 'INV/2020/0218') {
                        throw new \Exception('Factura N° '.$cliente['name'].' ya facturada en FML.');
                    }
                    if ($cliente['name'] == 'INV/2020/0219' || $cliente['name'] == 'INV/2020/0220' || $cliente['name'] == 'INV/2020/0221' || $cliente['name'] == 'INV/2020/0222' || $cliente['name'] == 'INV/2020/0223' || $cliente['name'] == 'INV/2020/0224' || $cliente['name'] == 'INV/2020/0225') {
                        throw new \Exception('Factura N° '.$cliente['name'].' ya facturada en FML.');
                    }
                    if ($cliente['name'] == 'INV/2020/0226' || $cliente['name'] == 'INV/2020/0227' || $cliente['name'] == 'INV/2020/0228' || $cliente['name'] == 'INV/2020/0229' || $cliente['name'] == 'INV/2020/0230' || $cliente['name'] == 'INV/2020/0231') {
                        throw new \Exception('Factura N° '.$cliente['name'].' ya facturada en FML.');
                    }
                    if ($cliente['name'] == 'INV/2020/0232' || $cliente['name'] == 'INV/2020/0233' || $cliente['name'] == 'INV/2020/0234' || $cliente['name'] == 'INV/2020/0235') {
                        throw new \Exception('Factura N° '.$cliente['name'].' ya facturada en FML.');
                    }
                } catch (\Exception $e) {
                    array_push($errores, 'Excepción: '.$e->getMessage());
                    continue;
                }*/
                /***
                 *
                 */
                if($cliente['type_name'] == 'Invoice'){
                    $lastResolutionmfl = $invoices->selectMax('invoice_mfl')->where(['status' => 1,'type_document' => 'invoice'])->get()->getResult();
                    $numberResolutionmfl = count($lastResolutionmfl);
                    if ($numberResolutionmfl == 0 || $lastResolutionmfl[0]->invoice_mfl == '' || $lastResolutionmfl[0]->invoice_mfl == null) {
                        $multipleResolution = $this->_multipleResolution($this->integration->companies_id);
                        $resolution = $this->_resolucion(1,$this->integration->companies_id,$multipleResolution[0]->resolution);
                        $this->resolutionNumber = $multipleResolution[0]->resolution;
                        $this->number = $resolution->resolution;
                    } else {
                        $multipleResolution = $this->_multipleResolution($this->integration->companies_id);
                        $this->resolutionNumber = $multipleResolution[0]->resolution;
                        $this->number = $lastResolutionmfl[0]->invoice_mfl + 1;
                    }
                }else{
                    $lastResolutionmfl = $invoices->selectMax('invoice_mfl')->where(['status' => 1,'type_document' => 'Credit Note'])->get()->getResult();
                    $numberResolutionmfl = count($lastResolutionmfl);
                    if ($numberResolutionmfl == 0 || $lastResolutionmfl[0]->invoice_mfl == '' || $lastResolutionmfl[0]->invoice_mfl == null) {
                        $multipleResolution = $this->_multipleResolution($this->integration->companies_id);
                        $resolution = $this->_resolucion(4,$this->integration->companies_id,$multipleResolution[0]->resolution );
                        $this->number = $resolution->resolution;
                    } else {
                        $multipleResolution = $this->_multipleResolution($this->integration->companies_id);
                        $this->number = $lastResolutionmfl[0]->invoice_mfl + 1;
                    }
                }


                //datos  a enviar
                $this->invoice = [];
                /***
                 * @author john vergara
                 * @email jvergara@iplanetcolombia.com
                 * @message  validador de erros de facturas que sean diferentes a nota credito o factura de venta nacional
                 * @date 2020-12-07
                 */
                if($cliente['type_name'] == 'Credit Note'){
                    $this->type = 'credit_note_lines';
                    $dataInvoicesNc = $this->models->execute_kw($this->db, $this->uid, $this->password,
                        'account.move', 'search_read', [[['id', '=', $cliente['reversed_entry_id'][0]]]], ['fields' => ['partner_id', 'name', 'state', 'type_name', 'reversed_entry_id']]);
                    try {
                        if (!isset($dataInvoicesNc[0]['name']) || $dataInvoicesNc[0]['name'] == '') {
                            throw new \Exception('Inconvenientes al traer datos de referencia de factura para Nota Crédito');
                        }else{
                            $invoiceNC = $invoices->where(['invoice_odoo' => $dataInvoicesNc[0]['name']])->get()->getResult();
                            $this->invoice['billing_reference'] = [
                                'number'     => $invoiceNC[0]->invoice_mfl,
                                'uuid'       => $invoiceNC[0]->cufe,
                                'issue_date' => $invoiceNC[0]->date
                            ];
                            $dataNcType = $this->models->execute_kw($this->db, $this->uid, $this->password,
                                'account.move.reversal', 'search_read', [[['move_id', '=', $dataInvoicesNc[0]['id']]]], ['fields' => ['date', 'refund_method','move_id']]);
                            try {
                                if (!isset($dataNcType[0]['refund_method']) || $dataNcType[0]['refund_method'] == '' ) {
                                    throw new \Exception('Inconvenientes al traer datos de reembolso');
                                }else{
                                    if($dataNcType[0]['refund_method'] == 'refund'){
                                        $this->invoice['discrepancyresponsecode'] = 1;
                                        $this->invoice['discrepancyresponsedescription'] = 'Reembolso parcial';
                                    }else{
                                        $this->invoice['discrepancyresponsecode'] = 2;
                                        $this->invoice['discrepancyresponsedescription'] = 'Anulación de factura';
                                    }
                                    $name = $dataInvoicesNc[0]['name'];
                                }
                            } catch (\Exception $e) {
                                array_push($errores, 'Excepción: '.$e->getMessage());
                                continue;
                            }
                        }
                    } catch (\Exception $e) {
                        array_push($errores, 'Excepción: '.$e->getMessage());
                        continue;
                    }
                }

                /***
                 *
                 */
                if($cliente['type_name'] == 'Credit Note'){
                    $this->invoice['number'] = $this->number;
                    $this->invoice['type_document_id'] = 4;
                }else{
                    $this->invoice['number'] = $this->number;
                    $this->invoice['resolution_number'] = $this->resolutionNumber;
                    $this->invoice['type_document_id'] = 1;
                    $this->paymentForms();
                }
                $this->invoice['notes'] = '<p>Política de Devoluciones - Satisfacción total garantizada.</p><br><p>Nuestra política es simple. Si no está completa e incondicionalmente satisfecho por cualquier motivo, puede devolver el producto. Con gusto aceptaremos paquetes dentro de los 30 días de la fecha de venta y le daremos un reembolso completo, que se hará efectivo dentro de los tiempos vigentes establecidos por la normatividad Colombiana para este fin. También pagaremos el envío de devolución. Todo lo que pedimos es que el producto no esté usado o vencido, esté en la misma condición en que lo recibió y esté en la caja o empaque original.</p><br><p>Para realizar una devolución, escríbanos a servicio@petsology.co</p><br><p>Excepciones: La política de devoluciones no aplica para la compra de medicamentos a través de la Aplicación.</p>';
                $this->invoice['date'] = date('Y-m-d');
                $this->invoice['time'] = date('H:i:s');
                $this->invoice['idcurrency'] = 35;
                $this->customer($cliente["partner_id"][0]);
                $this->lineInvoice($cliente['id'],$this->type);
                $this->_legalMonetaryTotals();
                $this->_taxesTotals();
                $this->invoice['allowance_charges'] = $this->descuento;
                

                /*$curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => ($cliente['type_name'] == 'Credit Note')?$this->api . 'ubl2.1/credit-note':$this->api . 'ubl2.1/invoice',
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
                
                curl_close($curl);*/
                /***
                 * @author john vergara
                 * @email jvergara@iplanetcolombia.com
                 * @message  create notification on odoo.co
                 */
                // datos para poder realizar
                if($cliente['type_name'] == 'Credit Note'){
                    $nameInvoice = $cliente['name'].' (Reversión de: '.$name.')';
                    $mensaje = $this->models->execute_kw($this->db, $this->uid, $this->password,
                        'mail.message', 'search_read', [[['record_name', '=', $nameInvoice]]],
                        [
                            'fields' => [
                                'parent_id',
                                'res_id',
                                'author_id',
                                'create_uid'
                            ], 'limit' => 1
                        ]
                    );
                }else{
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
                }
                $errors ='';
                $valor = json_decode($response);
                if(isset($valor->cufe) || isset($valor->cude)){
                   $text = $valor->ResponseDian->Envelope->Body->SendBillSyncResponse->SendBillSyncResult->StatusDescription;
                if ($text != 'Validación contiene errores en campos mandatorios.') {
                    /***
                     * @author john vergara
                     * @email jvergara@iplanetcolombia.com
                     * @message verifica si la factura ya estaba en rechazada y la cambia a validada
                     * @date 2020-12-07
                     */
                    $invoicesValidate = $invoices->where(['invoice_odoo' => $cliente['name']])->get()->getResult();
                    $numberValidate = count($invoicesValidate);
                    if($numberValidate == 0){
                        $dataInvoices = [
                            'date' => date('Y-m-d'),
                            'invoice_odoo' => $cliente['name'],
                            'invoice_mfl' => $this->number,
                            'cufe' => ($this->type == 'invoice_lines')?$valor->cufe:'',
                            'type_document' => ($this->type == 'invoice_lines')?'invoice':'Credit Note',
                            'status' => 1
                        ];
                        $invoices->insert($dataInvoices);
                    }else{
                        $dataInvoices = [
                            'date' => date('Y-m-d'),
                            'invoice_odoo' => $cliente['name'],
                            'invoice_mfl' => $this->number,
                            'cufe' => ($this->type == 'invoice_lines')?$valor->cufe:$valor->cude,
                            'type_document' => ($this->type == 'invoice_lines')?'invoice':'Credit Note',
                            'status' => 1
                        ];
                        $invoices->set($dataInvoices)->where(['invoice_odoo' => $cliente['name']])->update();
                    }
                    /***
                     */

                    $dataFactura = [
                        'invoice_odoo' => $cliente['name'],
                        'invoice_mfl' => $this->number,
                        'status' => 'Enviada',
                        'observacion' => 'No hubo inconvenientes.'
                    ];
                    array_push($facturas, $dataFactura);


                    // comentario en la factura
                    try {
                        if (!isset($mensaje[0]['parent_id'][0]) || !isset($mensaje[0]['res_id']) || !isset($mensaje[0]['author_id'][0])) {
                            throw new \Exception('Inconveniente al momento de enviar el mensaje a Odoo');
                        }else{
                            $id = $this->models->execute_kw($this->db, $this->uid, $this->password,
                                'mail.message', 'create', [
                                    [
                                        'subject' => 'Re: ' . $cliente['name'],
                                        'date' => date('Y-m-d H:i:s'),
                                        'body' => ($this->type == 'invoice_lines')?'<p>Factura generada con N° ' . $this->invoice['number'] . ' <a target="_blank" href="'.$this->api.'download/' . $this->Company->identification_number . '/FES-' . $this->invoice['number'] . '.pdf">Ver Factura</a></p>':'<p>Nota crédito generada con N°' . $this->invoice['number'] . ' <a target="_blank" href="'.$this->api.'download/' . $this->Company->identification_number . '/NCS-NC' . $this->invoice['number'] . '.pdf">Ver Nota Crédito</a></p>',
                                        'parent_id' => $mensaje[0]['parent_id'][0],
                                        'model' => 'account.move',
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
                    } catch (\Exception $e) {
                        array_push($errores, 'Excepción: '.$e->getMessage());
                    }
                    // cambiar estado factura odoo
                    $estado = $this->models->execute_kw($this->db, $this->uid, $this->password, 'account.move', 'write',
                        array(array($cliente['id']), array('x_studio_dian' => "Enviada")));

                    $ref = $this->models->execute_kw($this->db, $this->uid, $this->password, 'account.move', 'write',
                        array(array($cliente['id']), array('ref' => $this->number)));
                    // envio de correo
                    if($cliente['type_name'] == 'Credit Note'){
                        $this->_email($this->Company->identification_number, 'NC', $this->number);
                    }else{
                        $this->_email($this->Company->identification_number, $multipleResolution[0]->prefix, $this->number);
                    }
                } else {
                    $message = $valor->ResponseDian->Envelope->Body->SendBillSyncResponse->SendBillSyncResult->ErrorMessage;
                    foreach ($message as $value) {
                        $errors .= '<p>' . json_encode($value) . '</p>';
                    }
                    $dataInvoices = [
                        'date' => date('Y-m-d'),
                        'invoice_odoo' => $cliente['name'],
                        'invoice_mfl' => $this->number,
                        'type_document' => ($this->type == 'invoice_lines')?'invoice':'Credit Note',
                        'status' => 2
                    ];
                    $dataFactura = [
                        'invoice_odoo' => $cliente['name'],
                        'invoice_mfl' => $this->number,
                        'status' => 'Rechazada',
                        'observacion' => $errors
                    ];
                    array_push($facturas, $dataFactura);
                    $invoices->insert($dataInvoices);
                    // cambiar estado factura odoo

                    $asunto = "MFL - Factura N°" . $cliente['name'] . " con Problemas.";
                    $cuerpo = "Hubo un inconveniente al momento de realizar él envió de la factura N° " . $cliente['name'] . " a la Dian, por favor Validar que la factura tenga todos los impuestos y los datos del cliente correspondiente, eroores :" . $errors;
                    //se realiza el envio del correo electronico
                    $email->send('soporte@mifacturalegal.com', 'Integración Odoo', 'facturacion@petsology.com', $asunto, $cuerpo);
                    try {
                        if (!isset($mensaje[0]['parent_id'][0]) || !isset($mensaje[0]['res_id']) || !isset($mensaje[0]['author_id'][0])) {
                            throw new \Exception('Inconveniente al momento de enviar el mensaje a Odoo');
                        }else{
                            $id = $this->models->execute_kw($this->db, $this->uid, $this->password,
                                'mail.message', 'create', [
                                    [
                                        'subject' => 'Re: ' . $cliente['name'],
                                        'date' => date('Y-m-d H:i:s'),
                                        'body' => ($this->type == 'invoice_lines')?'<p>Hubo un inconveniente al momento de realizar el envió de la factura N° ' . $cliente['name'] . ' a la Dian, por favor Validar que la factura tenga todos los impuestos y los datos del cliente correspondiente,error ' . $errors . '</p>':'<p>Hubo un incoveniente al momento de realizar el envió de la Nota Crédito N° ' . $cliente['name'] . ' a la Dian, por favor Validar que la Nota Crédito tenga todos los impuestos y los datos del cliente correspondiente,error ' . $errors. '</p>',
                                        'parent_id' => $mensaje[0]['parent_id'][0],
                                        'model' => 'account.move',
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
                    } catch (\Exception $e) {
                        array_push($errores, 'Excepción: '.$e->getMessage());
                    }
                    $estado = $this->models->execute_kw($this->db, $this->uid, $this->password, 'account.move', 'write',
                        array(array($cliente['id']), array('x_studio_dian' => "Rechazada")));
                } 
                }else{
                    $errors ='';
                    if($valor->errors){
                        foreach($valor->errors as $item){
                            foreach($item as $value){
                                 array_push($errores, 'Excepción: '.$value);
                            }
                        }
                    }
                }
            }
        }
        //$trafficLight->set(['finish_date' => date('Y-m-d H:m:s')])->where(['id' => $idTraffic])->update();

        $numberErrorInvoices = count($errores) + count($facturas);
        $asunto = (count($errores) == 0)?"MFL - Reporte de proceso de envío a la DIAN.":"MFL - Reporte de envío a la DIAN (CON EXCEPCIONES).";
        $cuerpo = "<P>Reporte de proceso de envío a la DIAN</p>";
        if(count($facturas) > 0 ){
            $cuerpo .= "<p>Las siguientes facturas o Notas Crédito fueron enviadas y tienen su correspondiente estado a continuación:</p>
        <table>
            <thead>
                <tr>
                    <td>Factura Odoo</td>
                    <td>Factura MFL</td>
                    <td>Estado</td>
                    <td>Observacion</td>
                </tr>
            </thead>
            <tbody>";
            foreach ($facturas as $factura) {
                $cuerpo .= "<tr>
                        <td>" . $factura['invoice_odoo'] . "</td>
                        <td>" . $factura['invoice_mfl'] . "</td>
                        <td>" . $factura['status'] . "</td>
                        <td>" . $factura['observacion'] . "</td>
                    </tr>";
            }
            $cuerpo .= "</tbody>
        </table><br><p>Cantidad de Documentos procesados :".count($facturas)."</p><br>";
        }else{
            $cuerpo .="No se encontraron facturas para enviar.<br>";
        }
        $cuerpo .= "<p>Excepciones</p>";
        if(count($errores) > 0){
            foreach ($errores as $error){
                $cuerpo .= $error."<br>";
            }
        }else{
            $cuerpo .="No se encontraron excepciones.<br>";
        }
        //se realiza el envio del correo electronico
        if($numberErrorInvoices > 0 ){
            $email->send('soporte@mifacturalegal.com', 'Integración Odoo', 'facturacion@petsology.com', $asunto, $cuerpo);
            $email->send('soporte@mifacturalegal.com', 'Integración Odoo', 'pruebasapp@iplanetcolombia.com', $asunto, $cuerpo);
            $email->send('soporte@mifacturalegal.com', 'Integración Odoo', 'emtovar1@gmail.com', $asunto, $cuerpo);
            echo "<h1>Mi Factura Legal</h1><br>" . $cuerpo . "<br><button id='cerrar'>Cerrar</button>";
            echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script><script>$('#cerrar').click(function(){window.close();});</script>";
        }else{
            echo "<h3>No se han encontrado Facturas enviadas ni excepciones en el envío</h3>";
        }

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
            ['fields' => ['id', 'vat', 'name', 'phone', 'mobile', 'street', 'email', 'display_name', 'x_studio_cliente_mostrador']]
        );

        $this->invoice['customer']['name'] = $data[0]['name'] ? $data[0]['name'] : $data[0]['display_name'];
        $this->invoice['customer']['identification_number'] = (!empty($data[0]['vat']) && $data[0]['x_studio_cliente_mostrador'] == false) ? $data[0]['vat'] : '222222222222';
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

    public function lineInvoice($orderId, $typeInv)
    {
        $data = $this->models->execute_kw($this->db, $this->uid, $this->password,'account.move.line', 'search_read',[[['move_id', '=', $orderId], ['product_id', '!=', false]]],['fields' => ['id', 'price_unit', 'price_subtotal', 'quantity', 'discount', 'name', 'tax_line_id', 'move_name', 'product_id', 'tax_ids']]);
        $l = 0;
        $d = 0;
        $this->descuento = [];
        foreach ($data as $line) {
            if($data[$l]['price_subtotal'] < 0){
                $this->descuento[$d] = [
                    'discount_id' => 1,
                    'charge_indicator' => false,
                    'allowance_charge_reason' => $data[$l]['name'],
                    'amount' => abs($data[$l]['price_subtotal'])
                ];
                $d++;
            }else{
                $first = strpos($data[$l]['name'], '[');
                $end = strpos($data[$l]['name'], ']');
                if ($data[$l]['price_subtotal'] != 0) {
                    $this->invoice[$typeInv][$l]['unit_measure_id'] = 70;
                    $this->invoice[$typeInv][$l]['invoiced_quantity'] = $data[$l]['quantity'];
                    $discount = (($data[$l]['price_unit'] * $data[$l]['quantity']) * $data[$l]['discount']) / 100;
                    $this->invoice[$typeInv][$l]['line_extension_amount'] = $data[$l]['price_subtotal'];
                    $this->invoice[$typeInv][$l]['free_of_charge_indicator'] = false;
    
                    $this->invoice[$typeInv][$l]['description'] = $data[$l]['name'];
                    $this->invoice[$typeInv][$l]['code'] = substr($data[$l]['name'], $first + 1, $end - 1);
                    $this->invoice[$typeInv][$l]['type_item_identification_id'] = 4;
                    $this->invoice[$typeInv][$l]['price_amount'] = ($data[$l]['price_subtotal'] / $data[$l]['quantity']) + ($discount / $data[$l]['quantity']);
                    $this->invoice[$typeInv][$l]['base_quantity'] = $data[$l]['quantity'];
    
                    $this->invoice[$typeInv][$l]['allowance_charges'][0]['charge_indicator'] = false;
                    $this->invoice[$typeInv][$l]['allowance_charges'][0]['allowance_charge_reason'] = 'DESCUENTO GENERAL';
                    $this->invoice[$typeInv][$l]['allowance_charges'][0]['amount'] = $discount;
                    $this->invoice[$typeInv][$l]['allowance_charges'][0]['base_amount'] = $data[$l]['price_unit'];
    
    
                    $accountTax = $this->models->execute_kw($this->db, $this->uid, $this->password,
                        'account.tax', 'search_read',
                        [[['id', '=', $data[$l]['tax_ids']]]],
                        ['fields' => ['name', 'amount']]);
    
                    $i = 0;
                    foreach ($accountTax as $item) {
    
                        if ($this->_validationTax($item['name']) == 1) {
                            $this->invoice[$typeInv][$l]['tax_totals'][$i]['tax_id'] = $this->_validationTax($item['name']);
                            $this->invoice[$typeInv][$l]['tax_totals'][$i]['tax_amount'] = (double)number_format(((($data[$l]['price_subtotal'])) * abs($item['amount'])) / 100, '2', '.', '');
                            $this->invoice[$typeInv][$l]['tax_totals'][$i]['taxable_amount'] = ($data[$l]['price_subtotal']);
                            $this->invoice[$typeInv][$l]['tax_totals'][$i]['percent'] = (string)abs($item['amount']);
                        } else {
                            if($typeInv != 'credit_note_lines'){
                                $this->invoice['invoice_lines'][$l]['with_holding_tax_total'][$i]['tax_id'] = $this->_validationTax($item['name']);
                                $this->invoice['invoice_lines'][$l]['with_holding_tax_total'][$i]['tax_amount'] = ((($data[$l]['price_subtotal'])) * abs($item['amount'])) / 100;
                                $this->invoice['invoice_lines'][$l]['with_holding_tax_total'][$i]['taxable_amount'] = ($data[$l]['price_subtotal']);
                                $this->invoice['invoice_lines'][$l]['with_holding_tax_total'][$i]['percent'] = (string)abs($item['amount']);
                            }
                        }
                        $i++;
    
                    }
    
                    if (!isset($this->invoice[$typeInv][$l]['tax_totals']) || count($this->invoice[$typeInv][$l]['tax_totals']) == 0) {
                        $this->invoice[$typeInv][$l]['tax_totals'][$i]['tax_id'] = 1;
                        $this->invoice[$typeInv][$l]['tax_totals'][$i]['tax_amount'] = '0.00';
                        $this->invoice[$typeInv][$l]['tax_totals'][$i]['taxable_amount'] = ($data[$l]['price_subtotal']);
                        $this->invoice[$typeInv][$l]['tax_totals'][$i]['percent'] = '0.00';
                    }
                    
                } 
            }
            $l++;
        }

        if (!isset($this->invoice[$typeInv][$l]['with_holding_tax_total'])) {
            $this->invoice['with_holding_tax_total'] = [];
        }
    }

    private function _legalMonetaryTotals()
    {
        $lineExtensionAmount = 0;
        $taxExclusiveAmount = 0;
        $taxInclusiveAmount = 0;
        $allowanceTotalAmount = 0;
        $m = 0;
        foreach ($this->invoice[$this->type] as $item) {
            $lineExtensionAmount += $item['line_extension_amount'];
            $taxExclusiveAmount += $item['line_extension_amount'];
        }

        foreach ($this->invoice[$this->type] as $item) {
            if (isset($item['tax_totals'])) {
                foreach ($item['tax_totals'] as $tax) {
                    if ($tax['tax_id'] == 1) {
                        $taxInclusiveAmount += $tax['tax_amount'];
                    }
                }
            }

        }
        foreach($this->descuento as $item){
            $allowanceTotalAmount += abs($item['amount']);
            $this->descuento[$m]['base_amount'] = $lineExtensionAmount;
            $m++;
        }

        $this->invoice['legal_monetary_totals']['line_extension_amount'] = (double)number_format($lineExtensionAmount, '2', '.', '');
        $this->invoice['legal_monetary_totals']['tax_exclusive_amount'] = (double)number_format($taxExclusiveAmount, '2', '.', '');
        $this->invoice['legal_monetary_totals']['tax_inclusive_amount'] = (double)number_format($taxInclusiveAmount + $lineExtensionAmount, '2', '.', '');
        $this->invoice['legal_monetary_totals']['allowance_total_amount'] = (double)number_format($allowanceTotalAmount,'2', '.', '');
        $this->invoice['legal_monetary_totals']['charge_total_amount'] = '0.00';
        $this->invoice['legal_monetary_totals']['payable_amount'] = (double)number_format($taxInclusiveAmount + $lineExtensionAmount - $allowanceTotalAmount, '2', '.', '');
    }

    private function _taxesTotals()
    {

        $iva = [];
        $percent = [];
        foreach ($this->invoice[$this->type] as $value) {
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


        foreach ($this->invoice[$this->type] as $item) {
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
            CURLOPT_URL => "https://facturadorv2.mifacturalegal.com/api/invoices/multiple_resolutions_odoo/" . $id,
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

    public function _resolucion($typeDocument, $company,$id = null)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://facturadorv2.mifacturalegal.com/api/invoices/resolution_odoo/".$typeDocument."/".$company."/".$id,
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
            CURLOPT_URL => "https://facturadorv2.mifacturalegal.com/api/companiesodoo/" . $id,
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

    public function _email($identification_number, $prefix, $resolution)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->api . "send-email-customer/Now",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                "company_idnumber" => $identification_number,
                "prefix" => empty($prefix) ? '' : $prefix,
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
        //var_dump($data);
    }


}

