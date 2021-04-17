<?php

namespace App\Http\Controllers;

use App\Models\CustomerDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
