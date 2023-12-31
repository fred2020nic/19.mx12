<?php

namespace App\Controllers;

use App\Models\Auth;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;

class Main extends BaseController
{
    protected $request;

    public function __construct()
    {
        $this->request = \Config\Services::request();
        $this->session = session();
        $this->auth_model = new Auth;
        $this->prod_model = new Product;
        $this->tran_model = new Transaction;
        $this->tran_item_model = new TransactionItem;
        $this->data = ['session' => $this->session, 'request' => $this->request];
    }

    public function index()
    {
        $this->data['page_title'] = "Home";
        return view('pages/home', $this->data);
    }

    public function users()
    {
        $this->data['page_title'] = "Users";
        $this->data['page'] =  !empty($this->request->getVar('page')) ? $this->request->getVar('page') : 1;
        $this->data['perPage'] =  10;
        $this->data['total'] =  $this->auth_model->where("id != '{$this->session->login_id}'")->countAllResults();
        $this->data['users'] = $this->auth_model->where("id != '{$this->session->login_id}'")->paginate($this->data['perPage']);
        $this->data['total_res'] = is_array($this->data['users']) ? count($this->data['users']) : 0;
        $this->data['pager'] = $this->auth_model->pager;
        return view('pages/users/list', $this->data);
    }
    public function user_add()
    {
        if ($this->request->getMethod() == 'post') {
            extract($this->request->getPost());
            if ($password !== $cpassword) {
                $this->session->setFlashdata('error', "Las contraseñas no coinciden.");
            } else {
                $udata = [];
                $udata['name'] = $name;
                $udata['email'] = $email;
                if (!empty($password))
                    $udata['password'] = password_hash($password, PASSWORD_DEFAULT);
                $checkMail = $this->auth_model->where('email', $email)->countAllResults();
                if ($checkMail > 0) {
                    $this->session->setFlashdata('error', "Correo electrónico del usuario ya tomado.");
                } else {
                    $save = $this->auth_model->save($udata);
                    if ($save) {
                        $this->session->setFlashdata('main_success', "Los detalles del usuario se han actualizado correctamente.");
                        return redirect()->to('Main/users');
                    } else {
                        $this->session->setFlashdata('error', "Los detalles del usuario no se han podido actualizar.");
                    }
                }
            }
        }

        $this->data['page_title'] = "Agregar Usuario";
        return view('pages/users/add', $this->data);
    }
    public function user_edit($id = '')
    {
        if (empty($id))
            return redirect()->to('Main/users');
        if ($this->request->getMethod() == 'post') {
            extract($this->request->getPost());
            if ($password !== $cpassword) {
                $this->session->setFlashdata('error', "Las contraseñas no coinciden.");
            } else {
                $udata = [];
                $udata['name'] = $name;
                $udata['email'] = $email;
                if (!empty($password))
                    $udata['password'] = password_hash($password, PASSWORD_DEFAULT);
                $checkMail = $this->auth_model->where('email', $email)->where('id!=', $id)->countAllResults();
                if ($checkMail > 0) {
                    $this->session->setFlashdata('error', "Correo electrónico del usuario ya tomado.");
                } else {
                    $update = $this->auth_model->where('id', $id)->set($udata)->update();
                    if ($update) {
                        $this->session->setFlashdata('success', "Los detalles del usuario se han actualizado correctamente.");
                        return redirect()->to('Main/user_edit/' . $id);
                    } else {
                        $this->session->setFlashdata('error', "Los detalles del usuario no se han podido actualizar.");
                    }
                }
            }
        }

        $this->data['page_title'] = "Editar Usuario";
        $this->data['user'] = $this->auth_model->where("id ='{$id}'")->first();
        return view('pages/users/edit', $this->data);
    }

    public function user_delete($id = '')
    {
        if (empty($id)) {
            $this->session->setFlashdata('main_error', "La eliminación del usuario falló debido a una identificación desconocida.");
            return redirect()->to('Main/users');
        }
        $delete = $this->auth_model->where('id', $id)->delete();
        if ($delete) {
            $this->session->setFlashdata('main_success', "Usuario eliminado correctamente.");
        } else {
            $this->session->setFlashdata('main_error', "La eliminación del usuario falló debido a una identificación desconocida.");
        }
        return redirect()->to('Main/users');
    }

    public function products()
    {
        $this->data['page_title'] = "Productos";
        $this->data['page'] =  !empty($this->request->getVar('page')) ? $this->request->getVar('page') : 1;
        $this->data['perPage'] =  10;
        $this->data['total'] =  $this->prod_model->countAllResults();
        $this->data['products'] = $this->prod_model->paginate($this->data['perPage']);
        $this->data['total_res'] = is_array($this->data['products']) ? count($this->data['products']) : 0;
        $this->data['pager'] = $this->prod_model->pager;
        return view('pages/products/list', $this->data);
    }
    public function product_add()
    {
        if ($this->request->getMethod() == 'post') {
            extract($this->request->getPost());
            $udata = [];
            $udata['code'] = $code;
            $udata['barras'] = $barras;
            $udata['name'] = $name;
            $udata['description'] = $description;
            $udata['cantidad'] = $cantidad;
            $udata['price'] = $price;
            $checkCode = $this->prod_model->where('code', $code)->countAllResults();
            if ($checkCode) {
                $this->session->setFlashdata('error', "Código de producto ya tomado.");
            } else {
                $save = $this->prod_model->save($udata);
                if ($save) {
                    $this->session->setFlashdata('main_success', "Los detalles del producto se han actualizado correctamente.");
                    return redirect()->to('Main/products/');
                } else {
                    $this->session->setFlashdata('error', "Los detalles del producto no se han podido actualizar.");
                }
            }
        }

        $this->data['page_title'] = "Agregar Nuevo Producto";
        return view('pages/products/add', $this->data);
    }
    public function eys_add()
    {
        if ($this->request->getMethod() == 'post') {
            extract($this->request->getPost());
            $udata = [];
            $udata['code'] = $code;
            $udata['barras'] = $barras;
            $udata['name'] = $name;
            $udata['description'] = $description;
            $udata['cantidad'] = $cantidad;
            $udata['price'] = $price;
            $checkCode = $this->prod_model->where('code', $code)->countAllResults();
            if ($checkCode) {
                $this->session->setFlashdata('error', "Código de producto ya tomado.");
            } else {
                $save = $this->prod_model->save($udata);
                if ($save) {
                    $this->session->setFlashdata('main_success', "Los detalles del producto se han actualizado correctamente.");
                    return redirect()->to('Main/products/');
                } else {
                    $this->session->setFlashdata('error', "Los detalles del producto no se han podido actualizar.");
                }
            }
        }

        $this->data['page_title'] = "Agregar Nuevo Movimiento";
        return view('pages/eys/add', $this->data);
    }
    public function product_edit($id = '')
    {
        if (empty($id))
            return redirect()->to('Main/products');
        if ($this->request->getMethod() == 'post') {
            extract($this->request->getPost());
            $udata = [];
            $udata['code'] = $code;
            $udata['barras'] = $barras;
            $udata['name'] = $name;
            $udata['description'] = $description;
            $udata['cantidad'] = $cantidad;
            $udata['price'] = $price;
            $checkCode = $this->prod_model->where('code', $code)->where("id!= '{$id}'")->countAllResults();
            if ($checkCode) {
                $this->session->setFlashdata('error', "Código de producto ya tomado.");
            } else {
                $update = $this->prod_model->where('id', $id)->set($udata)->update();
                if ($update) {
                    $this->session->setFlashdata('success', "Los detalles del producto se han actualizado correctamente.");
                    return redirect()->to('Main/product_edit/' . $id);
                } else {
                    $this->session->setFlashdata('error', "Los detalles del producto no se han podido actualizar.");
                }
            }
        }

        $this->data['page_title'] = "Editar Producto";
        $this->data['product'] = $this->prod_model->where("id ='{$id}'")->first();
        return view('pages/products/edit', $this->data);
    }

    public function product_delete($id = '')
    {
        if (empty($id)) {
            $this->session->setFlashdata('main_error', "La eliminación del producto falló debido a una identificación desconocida.");
            return redirect()->to('Main/products');
        }
        $delete = $this->prod_model->where('id', $id)->delete();
        if ($delete) {
            $this->session->setFlashdata('main_success', "El producto ha sido eliminado con éxito.");
        } else {
            $this->session->setFlashdata('main_error', "La eliminación del producto falló debido a una identificación desconocida.");
        }
        return redirect()->to('Main/products');
    }
    public function pos()
    {
        $this->data['page_title'] = "Nueva Transacción";
        $this->data['products'] =  $this->prod_model->findAll();

        return view('pages/pos/add', $this->data);
    }

    public function save_transaction()
    {
        extract($this->request->getPost());

        $pref = date("Ymd");
        $code = sprintf("%'.05d", 1);
        while (true) {
            if ($this->tran_model->where(" code = '{$pref}{$code}' ")->countAllResults() > 0) {
                $code = sprintf("%'.05d", ceil($code) + 1);
            } else {
                $code = $pref . $code;
                break;
            }
        }

        $data['code'] = $code;
        foreach ($this->request->getPost() as $k => $v) {
            if (!is_array($this->request->getPost($k)) && !in_array($k, ['id'])) {
                $data[$k] = htmlspecialchars($v);
            }
        }
        $save_transaction = $this->tran_model->save($data);
        if ($save_transaction) {
            $transaction_id = $this->tran_model->insertID();
            foreach ($product_id as $k => $v) {
                $data2['transaction_id'] = $transaction_id;
                $data2['product_id'] = $v;
                $data2['price'] = $price[$k];
                $data2['quantity'] = $quantity[$k];
                $this->tran_item_model->save($data2);
            }
            $this->session->setFlashdata('main_success', "La transacción se ha guardado con éxito.");
            return redirect()->to('Main/pos');
        }
    }
    public function transactions()
    {
        $this->data['page_title'] = "Transaciones";
        $this->data['page'] =  !empty($this->request->getVar('page')) ? $this->request->getVar('page') : 1;
        $this->data['perPage'] =  10;
        $this->data['total'] =  $this->tran_model->countAllResults();
        $this->data['transactions'] = $this->tran_model
            ->select(" transactions.*, COALESCE((SELECT SUM(transaction_items.quantity) FROM transaction_items where transaction_id = transactions.id ), 0) as total_items")
            ->paginate($this->data['perPage']);
        $this->data['total_res'] = is_array($this->data['transactions']) ? count($this->data['transactions']) : 0;
        $this->data['pager'] = $this->tran_model->pager;
        return view('pages/pos/list', $this->data);
    }

    public function transaction_delete($id = '')
    {
        if (empty($id)) {
            $this->session->setFlashdata('main_error', "La eliminación de la transacción falló debido a una identificación desconocida.");
            return redirect()->to('Main/transactions');
        }
        $delete = $this->tran_model->where('id', $id)->delete();
        if ($delete) {
            $this->session->setFlashdata('main_success', "La transacción ha sido eliminada con éxito.");
        } else {
            $this->session->setFlashdata('main_error', "La eliminación de la transacción falló debido a una identificación desconocida.");
        }
        return redirect()->to('Main/transactions');
    }
    public function transaction_view($id = '')
    {
        if (empty($id)) {
            $this->session->setFlashdata('main_error', "Los detalles de la transacción no se pudieron cargar debido a una identificación desconocida.");
            return redirect()->to('Main/transactions');
        }
        $this->data['page_title'] = "Transacciones";
        $this->data['details'] = $this->tran_model->where('id', $id)->first();
        if (!$this->data['details']) {
            $this->session->setFlashdata('main_error', "Los detalles de la transacción no se pudieron cargar debido a una identificación desconocida.");
            return redirect()->to('Main/transactions');
        }
        $this->data['items'] = $this->tran_item_model
            ->select("transaction_items.*, CONCAT(products.code,'-',products.name) as product")
            ->where('transaction_id', $id)
            ->join('products', " transaction_items.product_id = products.id ", 'inner')
            ->findAll();
        return view('pages/pos/view', $this->data);
    }

    public function eys()
    {
        $this->data['page_title'] = "Entradas y Salidas";
        $this->data['products'] =  $this->prod_model->findAll();

        return view('pages/eys/list', $this->data);
    }

    public function configuracion()
    {
        $this->data['page_title'] = "Datos de la Empresa";
        $this->data['products'] =  $this->prod_model->findAll();

        return view('pages/configuraciones/add', $this->data);
    }

    public function empresa_add()
    {
        if ($this->request->getMethod() == 'post') {
            extract($this->request->getPost());
            $udata = [];
            $udata['nombre'] = $nombre;
            $udata['razon'] = $razon;
            $udata['calle'] = $calle;
            $udata['municipio'] = $municipio;
            $udata['telefono'] = $telefono;
            $udata['regimen'] = $regimen;
            $udata['rfc'] = $rfc;
            $udata['colonia'] = $colonia;
            $udata['estado'] = $estado;
            $udata['serie'] = $serie;
            $udata['sucursal'] = $sucursal;
            $save = $this->prod_model->save($udata);
            if ($save) {
                $this->session->setFlashdata('main_success', "Los detalles de la empresa se han actualizado correctamente.");
                return redirect()->to('Main/products/');
            } else {
                $this->session->setFlashdata('error', "Los detalles de la empresa no se han podido actualizar.");
            }
        }

        $this->data['page_title'] = "Agregar Nueva Empresa";
        return view('pages/configuraciones/add', $this->data);
    }
}
