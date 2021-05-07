<?php

namespace App\Http\Controllers;

use App\Models\CustomerDetails;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;

class CustomerDetailsController extends Controller
{
    function CustomerDetailsDashboard(){

        $this->data['title'] = 'CustomerDetails';
        $customerData = CustomerDetails::orderBy('id', 'desc')->simplePaginate(10);
        return view('staff.CustomerDetails', compact('customerData'), $this->data);

    }





    function registerCustomer(Request $request)
    {

        if ($request->isMethod('get')) {
            return redirect()->back();

        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'CustomerName' => 'required|min:3',
                'ContactNumber' => 'required|min:3|numeric',





            ]);
            $data['CustomerName'] = $request->CustomerName;
            $data['ContactNumber'] = $request->ContactNumber;








            if (CustomerDetails::create($data)) {
                return redirect()->route('CustomerDetailsDashboard')->with('success', 'Record is Inserted');
            }
        }


    }

    public function editCustomer(Request $request){
        $id= $request->User_id;
        $editcustomer = CustomerDetails::findOrFail($id);
        return view('staff.CustomerDetailsEdit', compact('editcustomer'));

    }
    public function editActionCustomer(Request $request)
    {
        if ($request->isMethod('get')) {
            return redirect()->back();
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'CustomerName' => 'required|min:3',
                'ContactNumber' => 'required|min:3|numeric',

            ]);
            $data['CustomerName'] = $request->CustomerName;
            $data['ContactNumber'] = $request->ContactNumber;
            $id = $request->customer_id;

            if(CustomerDetails::where('id',$id)->update($data)){
                return redirect()->route('CustomerDetailsDashboard')->with('success', 'Record is Updated');
            }
        }
    }

    public function deleteCustomer(Request $request)
    {
        try{
            $id= $request->User_id;
            if(CustomerDetails::findOrFail($id)->delete()){

                return redirect()->route('CustomerDetailsDashboard')->with('success', 'Record is Deleted');
            }}
            catch (Exception $e ){
                return redirect()->back()->with('fail','Unable to DELETE : Due to Existing Transaction of Customer');}


    }



    public function searchcustomer(Request $request)
    {
        $customerData = DB::table('customer_details')
        ->select('CustomerName','ContactNumber');

        if( $request->input('search')){
            $customerData = $customerData->where('CustomerName', 'LIKE', "%" . $request->search . "%");
        }
        $customerData = $customerData->paginate(10);
        return view('Staff.CustomerDetails', compact('customerData'));
    }

    public function POSCustomer(Request $request){


        $id= $request->customer_id;
        $customer = CustomerDetails::findOrFail($id);



		return view('staff.POS',compact('customer'));


    }
}