<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RestaurantBundle\Model\RestaurantType;
use FarsiLib;
use Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;

    protected $layout;

    protected $where;

    public function __construct()
    {
        $this->setLayout('layout.admin');

        $search = Request::get('search');
        if ($search) {
            foreach ($search as $key => $item) {
                foreach ($search[$key] as $type => $field) {
                    if ($field == '') continue;
                    switch ($type)
                    {
                        case 'integer' :
                            $this->where .= " AND `$key` = '$field'";
                            break;
                        case 'string':
                            $this->where .= " AND `$key` like '%$field%'";
                            break;
                        case 'datetime':
                            $date = FarsiLib::j2gDate($field);
                            $this->where .=" AND `$key` like '%$date%'";
                            break;
                        case 'date':
                            $date = FarsiLib::j2gDate($field);
                            $this->where .=" AND `$key` = '$date'";
                            break;
                    }
                }
            }
        }
        $this->where = $this->where ? '1' . $this->where : 1;
    }

    public function setLayout($layout)
    {
        return $this->layout = $layout;

    }

    public function getLayout()
    {
        return $this->layout;
    }

    public function setContent($entity = [], $ajax_tpl = null)
    {
        $ajax_tpl = $ajax_tpl ? $ajax_tpl : 'ajax';
        $folder = lcfirst(config('app.bundle')) . '.' . lcfirst(config('app.controller')) . '.' . lcfirst(config('app.prefix'));
        if (Request::ajax()) {
            $this->layout =  view($folder . '.' . $ajax_tpl,with([$ajax_tpl != 'show' ? 'entity' : 'value' => $entity]));
            die($this->layout);
        }

        $this->layout->content = view($folder . '.index', with(['entity' => $entity]));
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout))
        {
            $this->layout = view($this->layout);
        }
    }


    public function callAction($method, $parameters)
    {
        $this->setupLayout();

        $response = call_user_func_array(array($this, $method), $parameters);


        if (is_null($response) && ! is_null($this->layout))
        {
            $response = $this->layout;
        }

        return $response;
    }
}
