<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Repair;
use App\Models\RepairDetail;
use App\Models\VehicleInfor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function __construct(Repair $model)
    {
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $query = $this->model->with([
            'Customer' => function ($query) {
                return $query->select('id', 'name', 'phone', 'address');
            },
            'VehicleInfor' => function ($query) {
                return $query->select('id', 'licensePlates');
            },
            'User' => function ($query) {
                return $query->where('role', 'staff')->select('id', 'name');
            }
        ]);

        if ($request->state != '') {
            $query = $query->where('state', $request->state);
        }
        if ($request->name != '') {
            $query = $query->whereHas('Customer', function ($query) use ($request) {
                $query->where('customers.name', 'LIKE', '%' . $request->name . '%');
            })
                ->orWhereHas('VehicleInfor', function ($query) use ($request) {
                    $query->where('vehicle_infors.licensePlates', 'LIKE', '%' . $request->name . '%');
                });
        }
        if ($request->page_size != '') {
            $query = $query->paginate($request->page_size);
        } else {
            $query = $query->paginate(10);
        }

        return response()->json([
            'result' => $query
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        $repair = Repair::with([
            'VehicleInfor' => function ($query) {
                return $query->select('*')->with([
                    'Brand' => function ($sub) {
                        return $sub->select('id', 'name');
                    }
                ]);
            },
            'Customer' => function ($query) {
                return $query->select('id', 'name', 'phone', 'address');
            },
            'User' => function ($query) {
                return $query->where('role', 'staff')->select('id', 'name');
            }
        ])->where('id', $id)->first();

        return response()->json([
            'result' => $repair
        ]);
    }

    public function store(Request $request)
    {
        $customer = Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        $vehicle = VehicleInfor::create([
            'licensePlates' => $request->licensePlates,
            'type_vehicle' => $request->typeVehicle,
            'yearProduct' => $request->yearProduct,
            'frameNumber' => $request->frameNumber,
            'color' => $request->color,
            'capacity' => $request->capacity,
            'brand_id' => $request->brand,
            'model' => $request->model,
            'kmNumber' => $request->kmNumber,
        ]);

        $name_cus = Customer::where([
            'name' => $request->name,
            'phone' => $request->phone
        ])->first();

        $license_plate = VehicleInfor::where([
            'licensePlates' => $request->licensePlates,
            'kmNumber' => $request->kmNumber
        ])->first();

        if (empty($name_cus) || empty($license_plate)) {
            return response()->json();
        }

        $repair = Repair::create([
            'customer_id' => $name_cus->id,
            'vehicle_infor_id' => $license_plate->id,
            'code' => $request->repairCode,
            'state' => $request->state,
            'user_id' => $request->staff,
            'receipt_date' => $request->receiptDate,
            'appointmentdate' => $request->appointmentDate,
            'note' => $request->note,
            'service' => $request->service,
            'vehicleCondition' => $request->vehicleCondition,
            'customerRequest' => $request->customerRequest,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if ($repair && $customer && $vehicle) {
            return response()->json([
                'message' => 'Thêm thành công'
            ], 200);
        }

        return response()->json([
            'message' => 'Thêm không thành công'
        ], 401);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $repair = Repair::where('id', $id)->first();
        if (!$repair) {
            return response()->json([
                'message' => 'Không tìm thấy bản ghi'
            ], 404);
        }

        $result = Repair::where('id', $id)->update([
            'state' => $request->state
        ]);

        if ($result) {
            return response()->json([
                'message' => 'Sửa thành công'
            ], 200);
        }

        return response()->json([
            'message' => 'Sửa không thành công'
        ], 401);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $repair = Repair::where('id', $id)->first();
        if (!$repair) {
            return response()->json([
                'message' => 'Không tìm thấy bản ghi'
            ], 404);
        }

        RepairDetail::where('repair_id', $repair->id)->delete();
        $result = Repair::where('id', $repair->id)->delete();
        if ($result) {
            return response()->json([
                'message' => 'Xóa thành công'
            ], 200);
        }

        return response()->json([
            'message' => 'Xóa không thành công'
        ], 401);
    }

    public function transaction()
    {
        $totals = Repair::selectRaw("count(case when state = '1' then 1 end) as receive")
            ->selectRaw("count(case when state = '2' then 1 end) as processing")
            ->selectRaw("count(case when state = '3' then 1 end) as complete")
            ->first();
        $data = [
            [
                'id' => '1',
                'status' => 'Tiếp nhận',
                'total' => $totals->receive
            ],
            [
                'id' => '2',
                'status' => 'Đang xử lý',
                'total' => $totals->processing
            ],
            [
                'id' => '3',
                'status' => 'Hoàn thành',
                'total' => $totals->complete
            ]
        ];
        return response()->json([
            'result' => $data
        ]);
    }

    public function dashboard()
    {
        // get 12 month
        $monthOne = Carbon::now()->startOfYear()->format('m');
        $monthTwo = Carbon::now()->startOfYear()->addMonth(1)->format('m');
        $monthThree = Carbon::now()->startOfYear()->addMonth(2)->format('m');
        $monthFour = Carbon::now()->startOfYear()->addMonth(3)->format('m');
        $monthFive = Carbon::now()->startOfYear()->addMonth(4)->format('m');
        $monthSix = Carbon::now()->startOfYear()->addMonth(5)->format('m');
        $monthSeven = Carbon::now()->startOfYear()->addMonth(6)->format('m');
        $monthEight = Carbon::now()->startOfYear()->addMonth(7)->format('m');
        $monthNight = Carbon::now()->startOfYear()->addMonth(8)->format('m');
        $monthTen = Carbon::now()->startOfYear()->addMonth(9)->format('m');
        $monthElevent = Carbon::now()->startOfYear()->addMonth(10)->format('m');
        $monthTwice = Carbon::now()->startOfYear()->addMonth(11)->format('m');

        // get total in 12 month
        $totalInMonthOne = Repair::whereMonth('updated_at', $monthOne)->select('state', 'total', 'updated_at')->where('state', 3)->sum('total');
        $totalInMonthTwo = Repair::whereMonth('updated_at', $monthTwo)->select('state', 'total', 'updated_at')->where('state', 3)->sum('total');
        $totalInMonthThree = Repair::whereMonth('updated_at', $monthThree)->select('state', 'total', 'updated_at')->where('state', 3)->sum('total');
        $totalInMonthFour = Repair::whereMonth('updated_at', $monthFour)->select('state', 'total', 'updated_at')->where('state', 3)->sum('total');
        $totalInMonthFive = Repair::whereMonth('updated_at', $monthFive)->select('state', 'total', 'updated_at')->where('state', 3)->sum('total');
        $totalInMonthSix = Repair::whereMonth('updated_at', $monthSix)->select('state', 'total', 'updated_at')->where('state', 3)->sum('total');
        $totalInMonthSeven = Repair::whereMonth('updated_at', $monthSeven)->select('state', 'total', 'updated_at')->where('state', 3)->sum('total');
        $totalInMonthEight = Repair::whereMonth('updated_at', $monthEight)->select('state', 'total', 'updated_at')->where('state', 3)->sum('total');
        $totalInMonthNight = Repair::whereMonth('updated_at', $monthNight)->select('state', 'total', 'updated_at')->where('state', 3)->sum('total');
        $totalInMonthTen = Repair::whereMonth('updated_at', $monthTen)->select('state', 'total', 'updated_at')->where('state', 3)->sum('total');
        $totalInMonthEleven = Repair::whereMonth('updated_at', $monthElevent)->select('state', 'total', 'updated_at')->where('state', 3)->sum('total');
        $totalInMonthTwice = Repair::whereMonth('updated_at', $monthTwice)->select('state', 'total', 'updated_at')->where('state', 3)->sum('total');

        $data = [
            (int) $totalInMonthOne,
            (int) $totalInMonthTwo,
            (int) $totalInMonthThree,
            (int) $totalInMonthFour,
            (int) $totalInMonthFive,
            (int) $totalInMonthSix,
            (int) $totalInMonthSeven,
            (int) $totalInMonthEight,
            (int) $totalInMonthNight,
            (int) $totalInMonthTen,
            (int) $totalInMonthEleven,
            (int) $totalInMonthTwice
        ];

        return response()->json([
            'result' => $data
        ]);
    }

}