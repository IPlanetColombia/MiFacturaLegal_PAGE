<?php
namespace App\Models;


use CodeIgniter\Model;

class Invoices extends Model
{
protected $primaryKey = 'id';
protected $table = 'invoices';
protected $allowedFields = [
    'invoice_odoo',
    'invoice_mfl',
    'status',
    'date',
    'cufe',
    'type_document'
];
}