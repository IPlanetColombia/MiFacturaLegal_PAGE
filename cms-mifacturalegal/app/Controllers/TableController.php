<?php


namespace App\Controllers;


use App\Traits\Grocery;
use App\Models\Menu;
use App\Models\Nosotros;
use App\Models\ImgNosotros;
use App\Models\PreciosAdicionales;
use App\Models\Footer;
use App\Models\Head;
use App\Models\HomeGeneral;
use App\Models\PasosGeneral;
use App\Models\ModulosGeneral;
use App\Models\PreciosGeneral;
use App\Models\HomeDetail;
use App\Models\PasosDetail;
use App\Models\PreciosDetail;
use App\Models\Gmail;
use CodeIgniter\Exceptions\PageNotFoundException;

class TableController extends BaseController
{
    use Grocery;

    private $crud;

    public function __construct()
    {
        $this->crud = $this->_getGroceryCrudEnterprise();
        $this->crud->setSkin('bootstrap-v3');
        $this->crud->setLanguage('Spanish');
    }

    public function index($data)
    {
        $menu = new Menu();
        $component = $menu->where(['table' => $data, 'component' => 'table'])->get()->getResult();
        if($component) {
            $this->crud->setTable($component[0]->table);
            switch ($component[0]->table) {
                case 'head':
                    $this->crud->displayAs([
                        'title'     => 'Titulo',
                        'name'       => 'Nombre del aplicativo',
                        'key_words' => 'Palabras clave',
                        'description' => 'Descripción'
                    ]);
                    $this->crud->setFieldUpload('favicon', '',base_url().'./../../php/img/head');
                    $this->crud->setFieldUpload('logo', '',base_url().'./../../php/img/head');
                    $this->crud->callbackUpload(function ($uploadData)  {
                        $uploadPath = '../../php/img/head'; // directory of the drive
                        $publicPath = '../../php/img/head'; // public directory (at the URL)
                        $fieldName = $uploadData->field_name;
                        $img = '../../php/img/head/'.$_FILES[$fieldName]['name'];
                        if(file_exists($img)){
                            $filename = isset($_FILES[$fieldName]) ? $_FILES[$fieldName]['name'] : null;
                            $uploadData->filePath = $publicPath . '/' . $filename;
                            $uploadData->filename = $filename;
                            return $uploadData;
                        }else{
                            $storage = new \Upload\Storage\FileSystem($uploadPath);
                            $file = new \Upload\File($fieldName, $storage);
                            $filename = isset($_FILES[$fieldName]) ? $_FILES[$fieldName]['name'] : null;
                            if ($filename === null) {
                                return false;
                            }
                            $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
                            $filename = preg_replace("/([^a-zA-Z0-9\-\_]+?){1}/i", '_', $filename);
                            $file->setName($filename);
                            $file->addValidations([
                                new \Upload\Validation\Extension(['gif', 'jpeg', 'jpg', 'png', 'svg', 'ico']),
                                new \Upload\Validation\Size('20M')
                            ]);
                            $display_errors = ini_get('display_errors');
                            $error_reporting = error_reporting();
                            ini_set('display_errors', 'on');
                            error_reporting(E_ALL);
                            try {
                                $file->upload();
                            } catch (\Upload\Exception\UploadException $e) {
                                $errors = print_r($file->getErrors(), true);
                                return (new \GroceryCrud\Core\Error\ErrorMessage())->setMessage("There was an error with the upload:\n" . $errors);
                            } catch (\Exception $e) {
                                throw $e;
                            }
                            ini_set('display_errors', $display_errors);
                            error_reporting($error_reporting);
                            $filename = $file->getNameWithExtension();
                            $uploadData->filePath = $publicPath . '/' . $filename;
                            $uploadData->filename = $filename;
                            return $uploadData;
                        }
                    });
                    $this->crud->callbackAfterInsert(function ($stateParameters) {
                        $detail = new Head();
                        $detail = $detail->findAll();
                        $uploadPath = '../../php/img/head';
                        $dirint = dir($uploadPath);
                        $i = 0;
                        while(($archivo = $dirint->read()) !== false){
                            if($i > 1){
                                $delete = true;
                                foreach($detail as $img){
                                    if($archivo == $img['favicon']){
                                        $delete = false;
                                    }
                                    if($archivo == $img['logo']){
                                        $delete = false;
                                    }
                                }
                                if($delete)
                                    unlink('../../php/img/head/'.$archivo);
                            }
                            $i++;
                        }

                        return $stateParameters;
                    });
                    $this->crud->callbackAfterUpdate(function ($stateParameters) {
                        $detail = new Head();
                        $detail = $detail->findAll();
                        $uploadPath = '../../php/img/head';
                        $dirint = dir($uploadPath);
                        $i = 0;
                        while(($archivo = $dirint->read()) !== false){
                            if($i > 1){
                                $delete = true;
                                foreach($detail as $img){
                                    if($archivo == $img['favicon']){
                                        $delete = false;
                                    }
                                    if($archivo == $img['logo']){
                                        $delete = false;
                                    }
                                }
                                if($delete)
                                    unlink('../../php/img/head/'.$archivo);
                            }
                            $i++;
                        }
                        return $stateParameters;
                    });
                    $this->crud->callbackAfterDelete(function ($stateParameters) {
                        $detail = new Head();
                        $detail = $detail->findAll();
                        $uploadPath = '../../php/img/head';
                        $dirint = dir($uploadPath);
                        $i = 0;
                        while(($archivo = $dirint->read()) !== false){
                            if($i > 1){
                                $delete = true;
                                foreach($detail as $img){
                                    if($archivo == $img['favicon']){
                                        $delete = false;
                                    }
                                    if($archivo == $img['logo']){
                                        $delete = false;
                                    }
                                }
                                if($delete)
                                    unlink('../../php/img/head/'.$archivo);
                            }
                            $i++;
                        }
                        return $stateParameters;
                    });
                    $count = new Head();
                    $count = $count->countAllResults();
                    if($count > 0){
                        $this->crud->unsetAdd();
                        $this->crud->unsetDelete();
                    }
                    break;
                case 'header':
                    $this->crud->displayAs([
                        'title' => 'Titulo',
                        'icon'  => 'Icono',
                    ]);
                    $this->crud->requiredFields(['title', 'link']);
                    break;
                case 'home_general':
                    $this->crud->displayAs([
                        'title' => 'Titulo',
                        'description' => 'Descripción (opcional)'
                    ]);
                    $this->crud->requiredFields(['title']);
                    $count = new HomeGeneral();
                    $count = $count->countAllResults();
                    if($count > 0){
                        $this->crud->unsetAdd();
                        $this->crud->unsetDelete();
                    }
                    break;
                case 'home_detail':
                    $this->crud->displayAs([
                        'title'     => 'Titulo',
                        'img'       => 'Imagen',
                        'link_demo' => 'Link'
                    ]);
                    $this->crud->requiredFields(['title', 'img', 'link_demo']);
                    $this->crud->setFieldUpload('img', '',base_url().'./../../php/img/home');
                    $this->crud->callbackUpload(function ($uploadData)  {
                        $uploadPath = '../../php/img/home'; // directory of the drive
                        $publicPath = '../../php/img/home'; // public directory (at the URL)
                        $fieldName = $uploadData->field_name;
                        $img = '../../php/img/home/'.$_FILES[$fieldName]['name'];
                        if(file_exists($img)){
                            $filename = isset($_FILES[$fieldName]) ? $_FILES[$fieldName]['name'] : null;
                            $uploadData->filePath = $publicPath . '/' . $filename;
                            $uploadData->filename = $filename;
                            return $uploadData;
                        }else{
                            $storage = new \Upload\Storage\FileSystem($uploadPath);
                            $file = new \Upload\File($fieldName, $storage);
                            $filename = isset($_FILES[$fieldName]) ? $_FILES[$fieldName]['name'] : null;
                            if ($filename === null) {
                                return false;
                            }
                            $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
                            $filename = preg_replace("/([^a-zA-Z0-9\-\_]+?){1}/i", '_', $filename);
                            $file->setName($filename);
                            $file->addValidations([
                                new \Upload\Validation\Extension(['gif', 'jpeg', 'jpg', 'png', 'svg']),
                                new \Upload\Validation\Size('20M')
                            ]);
                            $display_errors = ini_get('display_errors');
                            $error_reporting = error_reporting();
                            ini_set('display_errors', 'on');
                            error_reporting(E_ALL);
                            try {
                                $file->upload();
                            } catch (\Upload\Exception\UploadException $e) {
                                $errors = print_r($file->getErrors(), true);
                                return (new \GroceryCrud\Core\Error\ErrorMessage())->setMessage("There was an error with the upload:\n" . $errors);
                            } catch (\Exception $e) {
                                throw $e;
                            }
                            ini_set('display_errors', $display_errors);
                            error_reporting($error_reporting);
                            $filename = $file->getNameWithExtension();
                            $uploadData->filePath = $publicPath . '/' . $filename;
                            $uploadData->filename = $filename;
                            return $uploadData;
                        }
                    });
                    $this->crud->callbackAfterInsert(function ($stateParameters) {
                        $detail = new HomeDetail();
                        $detail = $detail->findAll();
                        $uploadPath = '../../php/img/home';
                        $dirint = dir($uploadPath);
                        $i = 0;
                        while(($archivo = $dirint->read()) !== false){
                            if($i > 1){
                                $delete = true;
                                foreach($detail as $img){
                                        // $errorMessage = new \GroceryCrud\Core\Error\ErrorMessage();
                                        // return $errorMessage->setMessage(json_encode($img['img']));
                                    if($archivo == $img['img']){
                                        $delete = false;
                                    }
                                }
                                if($delete)
                                    unlink('../../php/img/home/'.$archivo);
                            }
                            $i++;
                        }

                        return $stateParameters;
                    });
                    $this->crud->callbackAfterUpdate(function ($stateParameters) {
                        $detail = new HomeDetail();
                        $detail = $detail->findAll();
                        $uploadPath = '../../php/img/home';
                        $dirint = dir($uploadPath);
                        $i = 0;
                        while(($archivo = $dirint->read()) !== false){
                            if($i > 1){
                                $delete = true;
                                foreach($detail as $img){
                                    if($archivo == $img['img']){
                                        $delete = false;
                                    }
                                }
                                if($delete)
                                    unlink('../../php/img/home/'.$archivo);
                            }
                            $i++;
                        }
                        return $stateParameters;
                    });
                    $this->crud->callbackAfterDelete(function ($stateParameters) {
                        $detail = new HomeDetail();
                        $detail = $detail->findAll();
                        $uploadPath = '../../php/img/home';
                        $dirint = dir($uploadPath);
                        $i = 0;
                        while(($archivo = $dirint->read()) !== false){
                            if($i > 1){
                                $delete = true;
                                foreach($detail as $img){
                                    if($archivo == $img['img']){
                                        $delete = false;
                                    }
                                }
                                if($delete)
                                    unlink('../../php/img/home/'.$archivo);
                            }
                            $i++;
                        }
                        return $stateParameters;
                    });
                    break;
                case 'modal':
                    $this->crud->displayAs([
                        'text'      => 'Contenido',
                        'home_id'   => 'Detalles',
                    ]);
                    $this->crud->setRelation('home_id', 'home_detail', 'title');
                    $this->crud->setTexteditor(['text']);
                    break;
                case 'pasos_general':
                    $this->crud->displayAs([
                        'title'      => 'Titulo',
                        'description'   => 'Descripción',
                    ]);
                    $this->crud->setTexteditor(['description']);
                    $count = new PasosGeneral();
                    $count = $count->countAllResults();
                    if($count > 0 ){
                        $this->crud->unsetAdd();
                        $this->crud->unsetDelete();
                    }
                    $this->crud->requiredFields(['title']);
                    break;
                case 'pasos_detail':
                    $this->crud->displayAs([
                        'title' => 'Titulo',
                        'img'   => 'Imagen',
                        'text'  => 'Descripción'
                    ]);
                    $this->crud->requiredFields(['title', 'img', 'text']);
                    $this->crud->setTexteditor(['text']);
                    $this->crud->setFieldUpload('img', '',base_url().'./../../php/img/pasos');
                    $this->crud->callbackUpload(function ($uploadData)  {
                        $uploadPath = '../../php/img/pasos'; // directory of the drive
                        $publicPath = '../../php/img/pasos'; // public directory (at the URL)
                        $fieldName = $uploadData->field_name;
                        $img = '../../php/img/pasos/'.$_FILES[$fieldName]['name'];
                        if(file_exists($img)){
                            $filename = isset($_FILES[$fieldName]) ? $_FILES[$fieldName]['name'] : null;
                            $uploadData->filePath = $publicPath . '/' . $filename;
                            $uploadData->filename = $filename;
                            return $uploadData;
                        }else{
                            $storage = new \Upload\Storage\FileSystem($uploadPath);
                            $file = new \Upload\File($fieldName, $storage);
                            $filename = isset($_FILES[$fieldName]) ? $_FILES[$fieldName]['name'] : null;
                            if ($filename === null) {
                                return false;
                            }
                            $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
                            $filename = preg_replace("/([^a-zA-Z0-9\-\_]+?){1}/i", '_', $filename);
                            $file->setName($filename);
                            $file->addValidations([
                                new \Upload\Validation\Extension(['gif', 'jpeg', 'jpg', 'png', 'svg']),
                                new \Upload\Validation\Size('20M')
                            ]);
                            $display_errors = ini_get('display_errors');
                            $error_reporting = error_reporting();
                            ini_set('display_errors', 'on');
                            error_reporting(E_ALL);
                            try {
                                $file->upload();
                            } catch (\Upload\Exception\UploadException $e) {
                                $errors = print_r($file->getErrors(), true);
                                return (new \GroceryCrud\Core\Error\ErrorMessage())->setMessage("There was an error with the upload:\n" . $errors);
                            } catch (\Exception $e) {
                                throw $e;
                            }
                            ini_set('display_errors', $display_errors);
                            error_reporting($error_reporting);
                            $filename = $file->getNameWithExtension();
                            $uploadData->filePath = $publicPath . '/' . $filename;
                            $uploadData->filename = $filename;
                            return $uploadData;
                        }
                    });
                    $this->crud->callbackAfterInsert(function ($stateParameters) {
                        $detail = new PasosDetail();
                        $detail = $detail->findAll();
                        $uploadPath = '../../php/img/pasos';
                        $dirint = dir($uploadPath);
                        $i = 0;
                        while(($archivo = $dirint->read()) !== false){
                            if($i > 1){
                                $delete = true;
                                foreach($detail as $img){
                                        // $errorMessage = new \GroceryCrud\Core\Error\ErrorMessage();
                                        // return $errorMessage->setMessage(json_encode($img['img']));
                                    if($archivo == $img['img']){
                                        $delete = false;
                                    }
                                }
                                if($delete)
                                    unlink('../../php/img/pasos/'.$archivo);
                            }
                            $i++;
                        }

                        return $stateParameters;
                    });
                    $this->crud->callbackAfterUpdate(function ($stateParameters) {
                        $detail = new PasosDetail();
                        $detail = $detail->findAll();
                        $uploadPath = '../../php/img/pasos';
                        $dirint = dir($uploadPath);
                        $i = 0;
                        while(($archivo = $dirint->read()) !== false){
                            if($i > 1){
                                $delete = true;
                                foreach($detail as $img){
                                    if($archivo == $img['img']){
                                        $delete = false;
                                    }
                                }
                                if($delete)
                                    unlink('../../php/img/pasos/'.$archivo);
                            }
                            $i++;
                        }
                        return $stateParameters;
                    });
                    $this->crud->callbackAfterDelete(function ($stateParameters) {
                        $detail = new PasosDetail();
                        $detail = $detail->findAll();
                        $uploadPath = '../../php/img/pasos';
                        $dirint = dir($uploadPath);
                        $i = 0;
                        while(($archivo = $dirint->read()) !== false){
                            if($i > 1){
                                $delete = true;
                                foreach($detail as $img){
                                    if($archivo == $img['img']){
                                        $delete = false;
                                    }
                                }
                                if($delete)
                                    unlink('../../php/img/pasos/'.$archivo);
                            }
                            $i++;
                        }
                        return $stateParameters;
                    });
                    break;
                case 'modulos_general':
                    $this->crud->displayAs([
                        'title_1' => 'Titulo 1',
                        'description_1'  => 'Descripción 1',
                        'title_2' => 'Titulo 2',
                        'description_2'  => 'Descripción 2'
                    ]);
                    $this->crud->requiredFields(['title_1', 'title_2']);
                    $this->crud->setTexteditor(['description_1', 'description_2']);
                    $count = new ModulosGeneral();
                    $count = $count->countAllResults();
                    if($count > 0){
                        $this->crud->unsetAdd();
                        $this->crud->unsetDelete();
                    }
                    break;
                case 'modulos_detail':
                    $this->crud->displayAs([
                        'title' => 'Titulo',
                        'description'  => 'Descripción',
                    ]);
                    $this->crud->requiredFields(['title', 'description', 'link']);
                    $this->crud->setTexteditor(['description']);
                    break;
                case 'why':
                    $this->crud->displayAs([
                        'icon'  => 'Icono',
                        'title' => 'Titulo',
                        'text'  => 'Descripción',
                        'phone' => 'Teléfono',
                    ]);
                    $this->crud->fieldType('phone', 'numeric');
                    $this->crud->requiredFields(['icon', 'title', 'text', 'phone', 'mensaje']);
                    $this->crud->setTexteditor(['text', 'mensaje']);
                    break;
                case 'precios_general':
                    $this->crud->displayAs([
                        'title' => 'Titulo',
                        'description'  => 'Descripción',
                    ]);
                    $this->crud->requiredFields(['title']);
                    $this->crud->setTexteditor(['description']);
                    $count = new PreciosGeneral();
                    $count = $count->countAllResults();
                    if($count > 0){
                        $this->crud->unsetAdd();
                        $this->crud->unsetDelete();
                    }
                    break;
                case 'precios_detail':
                    $this->crud->displayAs([
                        'title'         => 'Titulo',
                        'precio_mes'    => 'Pago por mes',
                        'precio_anual'  => 'Pago anual',
                        'description'   => 'Descripción',
                        'list'          => 'Lista',
                    ]);
                    $this->crud->requiredFields(['title', 'precio_mes', 'precio_anual', 'link']);
                    $this->crud->setTexteditor(['list']);
                    $count = new PreciosDetail();
                    $count = $count->countAllResults();
                    if($count > 4){
                        $this->crud->unsetAdd();
                        // $this->crud->unsetDelete();
                    }
                    $this->crud->fieldType('precio_mes', 'numeric');
                    $this->crud->fieldType('precio_anual', 'numeric');
                    break;
                case 'precios_adicionales':
                    $this->crud->displayAs([
                        'title'         => 'Titulo',
                        'sub_title'    => 'Sub subtitulo',
                        'phone'  => 'Teléfono',
                    ]);
                    $count = new PreciosAdicionales();
                    $count = $count->countAllResults();
                    $detail = new PreciosDetail();
                    $detail = $detail->findAll();
                    $this->crud->requiredFields(['title', 'sub_title', 'phone']);
                    // $titulos = ['title' => 'Titulo'];
                    $columnas = ['title', 'sub_title', 'phone', 'mensaje'];
                    $editar = ['title', 'sub_title', 'phone', 'mensaje'];
                    $insertar = ['title', 'sub_title', 'phone', 'mensaje'];
                    foreach($detail as $key => $precio){
                        if($key <= 3){
                            array_push($columnas, 'precio_'.($key+1));
                            array_push($columnas, 'texto_'.($key+1));
                            array_push($editar, 'precio_'.($key+1));
                            array_push($editar, 'texto_'.($key+1));
                            array_push($insertar, 'precio_'.($key+1));
                            array_push($insertar, 'texto_'.($key+1));
                            $this->crud->fieldType('precio_'.($key+1), 'numeric');
                        }
                    }
                    $this->crud->fieldType('phone', 'numeric');
                    $this->crud->columns($columnas);
                    $this->crud->addFields($insertar);
                    $this->crud->editFields($editar);
                    if($count > 0){
                        $this->crud->unsetAdd();
                        $this->crud->unsetDelete();
                    }
                    $this->crud->fieldType('precio', 'numeric');
                    break;
                case 'comparaciones':
                    $detail = new PreciosDetail();
                    $detail = $detail->findAll();
                    $titulos = ['title' => 'Titulo'];
                    $columnas = ['title'];
                    $editar = ['title'];
                    $insertar = ['title'];
                    foreach($detail as $key => $precio){
                        // $this->crud->displayAs(['title' => 'no']);
                        $titulos["precio_".($key+1)] = $precio['title'];
                        array_push($columnas, 'precio_'.($key+1));
                        array_push($editar, 'precio_'.($key+1));
                        array_push($insertar, 'precio_'.($key+1));

                    }
                    $this->crud->displayAs($titulos);
                    $this->crud->columns($columnas);
                    $this->crud->addFields($insertar);
                    $this->crud->editFields($editar);
                    $this->crud->requiredFields(['title']);
                    break;
                case 'nosotros':
                    $this->crud->displayAs([
                        'title'     => 'Titulo',
                        'sub_title' => 'Sub titulo',
                        'text'      => 'Descripción',
                        'phone'     => 'Teléfono',
                    ]);
                    $this->crud->requiredFields(['title', 'text', 'phone']);
                    $this->crud->setTexteditor(['text']);
                    $this->crud->fieldType('phone', 'numeric');
                    $count = new Nosotros();
                    $count = $count->countAllResults();
                    if($count > 0){
                        $this->crud->unsetAdd();
                        $this->crud->unsetDelete();
                    }
                    break;
                case 'img_nosotros':
                    $this->crud->displayAs(['img' => 'Imagen']);
                    $this->crud->requiredFields(['img']);
                    $this->crud->setTexteditor(['text']);
                    $this->crud->setFieldUpload('img', '',base_url().'./../../php/img/nosotros');
                    $this->crud->callbackUpload(function ($uploadData)  {
                        $uploadPath = '../../php/img/nosotros'; // directory of the drive
                        $publicPath = '../../php/img/nosotros'; // public directory (at the URL)
                        $fieldName = $uploadData->field_name;
                        $img = '../../php/img/nosotros/'.$_FILES[$fieldName]['name'];
                        if(file_exists($img)){
                            $filename = isset($_FILES[$fieldName]) ? $_FILES[$fieldName]['name'] : null;
                            $uploadData->filePath = $publicPath . '/' . $filename;
                            $uploadData->filename = $filename;
                            return $uploadData;
                        }else{
                            $storage = new \Upload\Storage\FileSystem($uploadPath);
                            $file = new \Upload\File($fieldName, $storage);
                            $filename = isset($_FILES[$fieldName]) ? $_FILES[$fieldName]['name'] : null;
                            if ($filename === null) {
                                return false;
                            }
                            $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
                            $filename = preg_replace("/([^a-zA-Z0-9\-\_]+?){1}/i", '_', $filename);
                            $file->setName($filename);
                            $file->addValidations([
                                new \Upload\Validation\Extension(['gif', 'jpeg', 'jpg', 'png', 'svg']),
                                new \Upload\Validation\Size('20M')
                            ]);
                            $display_errors = ini_get('display_errors');
                            $error_reporting = error_reporting();
                            ini_set('display_errors', 'on');
                            error_reporting(E_ALL);
                            try {
                                $file->upload();
                            } catch (\Upload\Exception\UploadException $e) {
                                $errors = print_r($file->getErrors(), true);
                                return (new \GroceryCrud\Core\Error\ErrorMessage())->setMessage("There was an error with the upload:\n" . $errors);
                            } catch (\Exception $e) {
                                throw $e;
                            }
                            ini_set('display_errors', $display_errors);
                            error_reporting($error_reporting);
                            $filename = $file->getNameWithExtension();
                            $uploadData->filePath = $publicPath . '/' . $filename;
                            $uploadData->filename = $filename;
                            return $uploadData;
                        }
                    });
                    $this->crud->callbackAfterInsert(function ($stateParameters) {
                        $detail = new ImgNosotros();
                        $detail = $detail->findAll();
                        $uploadPath = '../../php/img/nosotros';
                        $dirint = dir($uploadPath);
                        $i = 0;
                        while(($archivo = $dirint->read()) !== false){
                            if($i > 1){
                                $delete = true;
                                foreach($detail as $img){
                                        // $errorMessage = new \GroceryCrud\Core\Error\ErrorMessage();
                                        // return $errorMessage->setMessage(json_encode($img['img']));
                                    if($archivo == $img['img']){
                                        $delete = false;
                                    }
                                }
                                if($delete)
                                    unlink('../../php/img/nosotros/'.$archivo);
                            }
                            $i++;
                        }

                        return $stateParameters;
                    });
                    $this->crud->callbackAfterUpdate(function ($stateParameters) {
                        $detail = new ImgNosotros();
                        $detail = $detail->findAll();
                        $uploadPath = '../../php/img/nosotros';
                        $dirint = dir($uploadPath);
                        $i = 0;
                        while(($archivo = $dirint->read()) !== false){
                            if($i > 1){
                                $delete = true;
                                foreach($detail as $img){
                                    if($archivo == $img['img']){
                                        $delete = false;
                                    }
                                }
                                if($delete)
                                    unlink('../../php/img/nosotros/'.$archivo);
                            }
                            $i++;
                        }
                        return $stateParameters;
                    });
                    $this->crud->callbackAfterDelete(function ($stateParameters) {
                        $detail = new ImgNosotros();
                        $detail = $detail->findAll();
                        $uploadPath = '../../php/img/nosotros';
                        $dirint = dir($uploadPath);
                        $i = 0;
                        while(($archivo = $dirint->read()) !== false){
                            if($i > 1){
                                $delete = true;
                                foreach($detail as $img){
                                    if($archivo == $img['img']){
                                        $delete = false;
                                    }
                                }
                                if($delete)
                                    unlink('../../php/img/nosotros/'.$archivo);
                            }
                            $i++;
                        }
                        return $stateParameters;
                    });
                    break;
                case 'footer':
                    $this->crud->displayAs([
                        'title'     => 'Titulo',
                        'phone_1'   => 'Teléfono 1',
                        'mensaje_1' => 'Mensaje 1',
                        'phone_2'   => 'Teléfono 2',
                        'mensaje_2' => 'Mensaje 2',
                        'phone_3'   => 'Teléfono 3',
                        'mensaje_3' => 'Mensaje 3',
                        'email'     => 'Correo',
                        'direction' => 'Dirección',
                    ]);
                    $this->crud->requiredFields(['title']);
                    for($i = 1; $i <= 3; $i++){
                        $this->crud->fieldType('phone_'.$i, 'numeric');
                    }
                    $count = new Footer();
                    $count = $count->countAllResults();
                    if($count > 0){
                        $this->crud->unsetAdd();
                        $this->crud->unsetDelete();
                    }
                    break;
                case 'question':
                    $this->crud->setRelation('home_detail_id', 'home_detail', 'title');
                    $this->crud->displayAs([
                        'title'     => 'Titulo',
                        'home_detail_id'   => 'Modulo de ayuda',
                        'status' => 'Estado',
                    ]);
                    break;
                case 'detail_question':
                        $this->crud->setRelation('question_id', 'question', 'title');
                        $this->crud->displayAs([
                            'title'     => 'Titulo',
                            'question_id'   => 'Pregunta',
                            'text' => 'Descripcion',
                            'status' => 'Estado',
                            'img' => 'Imagen/Gif'
                        ]);
                        $this->crud->setTexteditor(['text']);
                        $this->crud->setFieldUpload('img', '', base_url().'./../../php/img/question');
                        // $this->crud->callbackBeforeUpload(function ($uploadData) {
                        //     $fieldName = $uploadData->field_name;
                        
                        //     $filename = isset($_FILES[$fieldName]) ? $_FILES[$fieldName]['name'] : null;
                        //     if (!preg_match('/\.(png|jpg|jpeg|gif)$/',$filename)) {
                        //         return (new \GroceryCrud\Core\Error\ErrorMessage())
                        //             ->setMessage("The file extension for filename: '" . $filename. "'' is not supported!");
                        //     }
                        //     // Don't forget to return the uploadData at the end
                        //     return $uploadData;
                        // });
                        $this->crud->callbackUpload(function ($uploadData)  {
                            $uploadPath = '../../php/img/question'; // directory of the drive
                            $publicPath = '../../php/img/question'; // public directory (at the URL)
                            $fieldName = $uploadData->field_name;
                            $img = '../../php/img/question/'.$_FILES[$fieldName]['name'];
                            if(file_exists($img)){
                                $filename = isset($_FILES[$fieldName]) ? $_FILES[$fieldName]['name'] : null;
                                $uploadData->filePath = $publicPath . '/' . $filename;
                                $uploadData->filename = $filename;
                                return $uploadData;
                            }else{
                                $storage = new \Upload\Storage\FileSystem($uploadPath);
                                $file = new \Upload\File($fieldName, $storage);
                                $filename = isset($_FILES[$fieldName]) ? $_FILES[$fieldName]['name'] : null;
                                if ($filename === null) {
                                    return false;
                                }
                                $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
                                $filename = preg_replace("/([^a-zA-Z0-9\-\_]+?){1}/i", '_', $filename);
                                $file->setName($filename);
                                $file->addValidations([
                                    new \Upload\Validation\Extension(['gif', 'jpeg', 'jpg', 'png', 'svg']),
                                    new \Upload\Validation\Size('20M')
                                ]);
                                $display_errors = ini_get('display_errors');
                                $error_reporting = error_reporting();
                                ini_set('display_errors', 'on');
                                error_reporting(E_ALL);
                                try {
                                    $file->upload();
                                } catch (\Upload\Exception\UploadException $e) {
                                    $errors = print_r($file->getErrors(), true);
                                    return (new \GroceryCrud\Core\Error\ErrorMessage())->setMessage("There was an error with the upload:\n" . $errors);
                                } catch (\Exception $e) {
                                    throw $e;
                                }
                                ini_set('display_errors', $display_errors);
                                error_reporting($error_reporting);
                                $filename = $file->getNameWithExtension();
                                $uploadData->filePath = $publicPath . '/' . $filename;
                                $uploadData->filename = $filename;
                                return $uploadData;
                            }
                        });
                        
                        break;
                case 'gmail':
                    $this->crud->displayAs([
                        'title'     => 'Titulo',
                        'subtitle'   => 'Sub titulo',
                        'description' => 'Descripción',
                    ]);
                    $this->crud->setTexteditor(['description']);
                    $count = new Gmail();
                    $count = $count->countAllResults();
                    if($count > 0){
                        $this->crud->unsetAdd();
                        $this->crud->unsetDelete();
                    }
                    break;
                case 'gmail_detail':
                    $this->crud->displayAs([
                        'title'     => 'Titulo',
                        'img' => 'Imagen/Gif',
                        'description' => 'Descripción',
                    ]);
                    $this->crud->setTexteditor(['description']);
                    $this->crud->setFieldUpload('img', '', base_url().'./../../php/img/gmail');
                    $this->crud->callbackUpload(function ($uploadData)  {
                        $uploadPath = '../../php/img/gmail'; // directory of the drive
                        $publicPath = '../../php/img/gmail'; // public directory (at the URL)
                        $fieldName = $uploadData->field_name;
                        $img = '../../php/img/gmail/'.$_FILES[$fieldName]['name'];
                        if(file_exists($img)){
                            $filename = isset($_FILES[$fieldName]) ? $_FILES[$fieldName]['name'] : null;
                            $uploadData->filePath = $publicPath . '/' . $filename;
                            $uploadData->filename = $filename;
                            return $uploadData;
                        }else{
                            $storage = new \Upload\Storage\FileSystem($uploadPath);
                            $file = new \Upload\File($fieldName, $storage);
                            $filename = isset($_FILES[$fieldName]) ? $_FILES[$fieldName]['name'] : null;
                            if ($filename === null) {
                                return false;
                            }
                            $filename = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename);
                            $filename = preg_replace("/([^a-zA-Z0-9\-\_]+?){1}/i", '_', $filename);
                            $file->setName($filename);
                            $file->addValidations([
                                new \Upload\Validation\Extension(['gif', 'jpeg', 'jpg', 'png', 'svg']),
                                new \Upload\Validation\Size('20M')
                            ]);
                            $display_errors = ini_get('display_errors');
                            $error_reporting = error_reporting();
                            ini_set('display_errors', 'on');
                            error_reporting(E_ALL);
                            try {
                                $file->upload();
                            } catch (\Upload\Exception\UploadException $e) {
                                $errors = print_r($file->getErrors(), true);
                                return (new \GroceryCrud\Core\Error\ErrorMessage())->setMessage("There was an error with the upload:\n" . $errors);
                            } catch (\Exception $e) {
                                throw $e;
                            }
                            ini_set('display_errors', $display_errors);
                            error_reporting($error_reporting);
                            $filename = $file->getNameWithExtension();
                            $uploadData->filePath = $publicPath . '/' . $filename;
                            $uploadData->filename = $filename;
                            return $uploadData;
                        }
                    });
                    break;
            }
            $output = $this->crud->render();
            if (isset($output->isJSONResponse) && $output->isJSONResponse) {
                header('Content-Type: application/json; charset=utf-8');
                echo $output->output;
                exit;
            }

            $this->viewTable($output, $component[0]->title, $component[0]->description);
        } else {
            throw PageNotFoundException::forPageNotFound();
        }
    }
}