<?php

namespace App\Http\Controllers\Back\Librarians;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\RequiredIf;


class ReadersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $readers = User::where('user_type_id',2);


        if(request()->ajax()) {
            return datatables()->of($readers)
                ->addColumn('action', 'backend.pages.librarians.components.readers_action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.pages.librarians.readers')->with('title','Readers');
    }

    public function create(Request $request)
    {

        $readerId = $request->id;

        $rule = [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|unique:users,email,'.$readerId,
            'password' => 'required',
            'confirm_password' => 'required|same:'.$request->password,

        ];

        if($readerId){
            $rule['password'] = 'nullable';
            $rule['confirm_password'] = new RequiredIf($request->password != null) . "|same:$request->password";
        }

        $validator = Validator::make($request->all(),$rule,[
            'confirm_password.same' => "Password and confirm password dont match"
        ]);

        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors(),'status' => false]);
        }

        $reader = User::updateOrCreate(
            [
                'id' => $readerId
            ],
            [
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'user_type_id' => UserType::where('type','reader')->pluck('id')->first(),
                'password' => bcrypt($request->password),
            ]);

        return Response()->json($reader);


    }

    public function edit(Request $request)
    {
        $where = array('id' => $request->id);
        $reader  = User::where($where)->first();

        return Response()->json($reader);
    }

    public function destroy(Request $request)
    {
        $reader = User::where('id',$request->id)->delete();

        return Response()->json($reader);
    }
}
