<?php

namespace App\Http\Controllers\Parts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PartsModule\Part;

class SiteController extends Controller
{
    
    public function index()
    {

        $parts = part::paginate(25);   
        return view('parts.index',compact('parts'));

    }

    public function search(Request $request)
    {
        $query = Part::select('*');
        $filter = $request->all();
        if(isset($filter['search_param']) && !empty($filter['search_data']))
        {
            $names = explode(' ',$filter['search_data']);
            $query->where($filter['search_param'],'LIKE', '%' . $filter['search_data'] . '%');
            if(!empty($names) && count($names)>1)
                foreach($names as $itemWord)
                    $query->orWhere($filter['search_param'],'LIKE', '%' . $itemWord . '%');
        }
        $parts = $query->paginate(25);   
        return view('parts.index',compact('parts','filter'));
    }
}