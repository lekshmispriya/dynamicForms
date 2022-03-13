<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\elements;
use App\Models\forms;
use App\Models\form_contents;
use DataTables;
use DB;

class Form_controller extends Controller
{
    
    public function getElements()
    {
        $data = elements::get()->toArray();
        return view('addForm')->with('elements', $data);
    }

    public function saveForm(Request $request)
    {
       if ($request->ajax()) 
       {
        $post = $request->all();//print_r($post);die;
        if(!empty($request->label) && !empty($request->element))
        {
            $elements = $request->element;
            $custom_value = $request->custom_value; 
            $forms_data = forms::get()->toArray();
                if(!empty($forms_data))
                {
                    $form_id = forms::max('form_id');
                    $form_id = $form_id +1;
                    $fname   = "Form ".$form_id;
                }
                else{
                    $fname ="Form 1";
                }
                $add_forms       = new forms;
                $add_forms->name = $fname;
                $add_forms->save();
                $last_insert_fid = $add_forms->id;
            foreach($request->label as $key=>$row)
            {
                             
                if($elements[$key] == '3')
                {   
                    $customArray = rtrim($custom_value[$key], ',');
                    $custom_data  = json_encode(explode(",",$customArray));
                }
                else{
                    $custom_data ="";
                }    
                $add_form_contents          = new form_contents;
                $add_form_contents->f_id    = $last_insert_fid;
                $add_form_contents->label   = $row;
                $add_form_contents->type    = $elements[$key];
                $add_form_contents->custom_values = $custom_data;
                $add_form_contents->save();

                $result=array("status"=>true,"msg"=>"Form addedd successfully");
            }
        }
        else{
            $result=array("status"=>false,"msg"=>"Something went wrong,Please try again later");
        }
       }
       else{
        $result=array("status"=>false,"msg"=>"Something went wrong,Please try again later");
    }  
    print_r(json_encode($result));
    }
    

    public function ajaxForm(Request $request)
    {
       if ($request->ajax()) {
            $data = forms::latest()->get();
            return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('Actions',function($row){
                $btn = '<a href="'.url("/editForm/".$row->form_id).'" data-toggle="tooltip" data-id="'.$row->form_id.'" title="Edit" class=" btn btn-primary btn-sm ">Edit</a>';
                $btn = $btn.' <a href="'.url("/viewForm/".$row->form_id).'" data-toggle="tooltip" data-id="'.$row->form_id.'" title="View" class=" btn btn-success btn-sm ">View</a>';
                $btn = $btn.' <a href="'.url("/deleteForm/".$row->form_id).'" data-toggle="tooltip" data-id="'.$row->form_id.'" title="Delete" class="btn btn-danger btn-sm ">Delete</a>';
                return $btn;
                
            })
            ->rawColumns(['Actions'])
            ->make(true);
        }

    }

    public function editForm($id)
    {
       if($id!="")
         {
           $data['elements'] = elements::get()->toArray();
           $data['edit_id'] = $id;  
           $data['form_contents'] = form_contents::where(array("f_id"=>$id))->get()->toArray();
           return view('editForm')->with($data);
         }
        
    }

    public function updateForm(Request $request)
    {
        if ($request->ajax()) {
                $post =$request->all();
                $elements = $request->element;
                $custom_value = $request->custom_value; 
                $update =form_contents::where(array("f_id"=>$request->edit_id))->delete();
                foreach($request->label as $key=>$row)
                {
                             
                if($elements[$key] == '3')
                {   
                   // $customArray = rtrim($custom_value[$key], ',');
                   // $custom_data  = json_encode(explode(",",$customArray));
                    $custom_data  =$custom_value[$key];
                }
                else{
                    $custom_data ="";
                }    
                $add_form_contents          = new form_contents;
                $add_form_contents->f_id    = $request->edit_id;
                $add_form_contents->label   = $row;
                $add_form_contents->type    = $elements[$key];
                $add_form_contents->custom_values = $custom_data;
                $add_form_contents->save();

                $result=array("status"=>true,"msg"=>"Form updated successfully");
            }
        }
        else{
            $result=array("status"=>false,"msg"=>"Something went wrong,Please try again later");
        }
        print_r(json_encode($result));
    }
    public function viewForm($id)
    {
        if($id!="")
         {
         
           $data['edit_id'] = $id;  
           $data['form_contents'] = form_contents::where(array("f_id"=>$id))->get()->toArray();
           return view('viewForm')->with($data);
         }
    }
}
