<?php

namespace App\Http\Controllers;

use App\Http\Requests\SalesRequest;
use App\Models\Sales;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;


class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = Sales::Query();
                $data->orderBy("created_at","DESC");
                $dataTables = DataTables::of($data->get())
                    ->addIndexColumn()
                    ->filter(function ($instance) use ($request) {

                        if (!empty($request->get('search')['value'])) {

                            @$instance->collection = @$instance->collection->filter(function ($row) use ($request) {

                                $value = $request->get('search')['value'];
                                $date = @$row['invoice_date'] ? date('d-m-Y', strtotime(@$row['invoice_date'])) :  "";
                                $created_at = @$row['created_at'] ? date('d-m-Y', strtotime(@$row['created_at'])) :  "";
                                $updated_at = @$row['updated_at'] ? date('d-m-Y', strtotime(@$row['updated_at'])) :  "";
                                if (Str::contains(Str::lower(@$row['invoice_number'],true), Str::lower($value,true))) {
                                    return true;
                                } else if (Str::contains(Str::lower(@$row['customer_name']), Str::lower($value))) {
                                    return true;
                                } else if (Str::contains(Str::lower($date), Str::lower($value))) {
                                    return true;
                                } else if (Str::contains(Str::lower(@$created_at), Str::lower($value))) {
                                    return true;
                                } else if (Str::contains(Str::lower($updated_at), Str::lower($value))) {
                                    return true;
                                } else if (Str::contains(Str::lower(@$row['customer_email']), Str::lower($value))) {
                                    return true;
                                } else if (Str::contains(Str::lower(@$row['customer_phone']), Str::lower($value))) {
                                    return true;
                                }
                                return false;
                            });
                        }
                    })
                    

                    ->addColumn('action', function ($row) {
                        $btn  = '<a href="' . URL('sales', ['id' => encrypt($row->id)])  . '" title="Edit" style="color:#004890;"  >Edit</a>';
                        return $btn;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
                    // dd($dataTables);
                return $dataTables;
            }

            return view('sales.list');

        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::get();
        $product = Product::get();
        return view('sales.add',compact(
            'category',
            'product'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        try {
            
            foreach($request->dynForm as $key => $val){
                // dd($val->id);
                // dd($request);
                $cat_id = Product::find($val['product_id']);
                $request->merge([
                  'category_id' => $cat_id->category_id,
                  'invoice_date' => date('Y-m-d', strtotime($request->invoice_date)),
                  'product_id'   => $val['product_id'],
                  'rate'         => $val['rate'],
                  'quantity'     => $val['quantity'],
                  'gst_percentage'=> $val['gst_percentage'],
                  'total_cost'      =>$val['total_cost']
                ]);

                // dd($request->all());
                $sales  = Sales::create($request->all());
            }
        
        }
        catch (\Exception $exception) {
            return $exception->getMessage();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::get();
        $product = Product::get();
        $data = Sales::where('id', decrypt($id))->first();
        return view('sales.edit',compact(
            'category',
            'product',
            'data'
        ));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sales $sales)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request);
        $id = decrypt($request->sale_id);
        $sales = Sales::find($id);
        try {
            $sales->update($request->all());
            return redirect('sales')->with(['success' => 'Sales data updated Successfully!']);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sales)
    {
        //
    }

    public function common(Request $request)
    {
        $product_id = $request->product_id;
        $data = Product::find($product_id);
        $category = Category::find($data->category_id);
        $cat_name = '';
        if($category->category_name == 'Food'){
            $cat_name = 'FO-';
        }elseif($category->category_name == 'Electronics'){
            $cat_name = 'EL-';
        }elseif($category->category_name == 'Apparel'){
            $cat_name = 'AP-';
        }else{
            $cat_name = '';
        }

        $sequence = Sales::where('category_id',$data->category_id)->count();
        $data['sequence'] = $sequence;
        $data['category'] =  $category->category_name;
        $data['seq_name'] = $cat_name .'00'. $sequence + 1;
        // dd($sequence);
        if($data){
            return response()->json([
                'status' => true,
                'data' => $data
            ]);
        }else{
            return response()->json([
                'status' => false
            ]);
        }
    }
}
