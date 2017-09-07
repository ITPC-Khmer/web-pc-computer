<?php

namespace App\Models\Backend;

use App\Helpers\Glb;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class Admin extends Model
{
    protected $table = 'admins';

    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->format('d/m/Y H:i');
    }

    public function getOptionAttribute($option)
    {
        return json_decode($option);
    }

    public function setOptionAttribute($value)
    {
        $this->attributes['option'] = json_encode($value);
    }

    static function getPaginateSearch($request)
    {

        $page = session('page') ? session('page') : $request->page;
        if (session('page')) {
            Paginator::currentPageResolver(function () use ($page) {
                return $page;
            });
        }
        $q['name'] = $request->name;
        $q['phone'] = $request->phone;
        $q['email'] = $request->email;
        $q['role_title'] = $request->role_title;


        $_result = Admin::select('admins.*', DB::raw('roles.title as role_title'));

        foreach ($q as $k => $v) {

            $_result->where(function ($w) use ($k, $v) {
                $searchWords = preg_split('/\s+/', $v);// explode(' ', $v);
                foreach ($searchWords as $word) {
                    if (trim($word) != '') {
                        $w->orWhere(($k=='role_title'?'roles.title':'admins.'.$k), 'LIKE', '%' . $word . '%');
                    }
                }
            });
        }
        $result = $_result->join('roles', 'admins.role_id', '=', 'roles.id')
            ->orderBy('admins.id', 'DESC')
            ->paginate(PageLimit);

        foreach ($q as $k => $v) {
            if (trim($v) != '') {
                $result->appends($k, $v);
            }
        }

        return array_merge(['result' => $result], $q, ['page' => $page]);
    }

    static function saveForm($request)
    {
        $id = $request->id;

        if ($id > 0) {
            $model = Admin::find($id);
        } else {
            $model = new Admin();
        }
        $model->role_id = $request->role_id;
        $model->name = $request->name;
        $model->phone = $request->phone;
        $model->email = $request->email;
        $model->password = \Hash::make($request->password);

        if ($model->save()) {
            return $model;
        } else {
            return null;
        }
    }
}