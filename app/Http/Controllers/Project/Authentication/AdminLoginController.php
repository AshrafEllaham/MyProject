<?php

namespace App\Http\Controllers\Project\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Project\Admin as objModel;
use App\Services\Project\AdminService as ObjService;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class AdminLoginController extends Controller
{
    public $folderPath = "admin.auth.admin";
    public $postData = ["name", "phone", "email", "password"];
    public $mainRoute = "admins";

    /**
     * Display a listing of the resource.
     *
     */

    public function index(Request $request, ObjService $service)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route("dashboard.index");
        }
        return view('project.auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return JsonResponse
     */
    public function create(Request $request, ObjService $service)
    {
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required'
        ]);
        $user = objModel::Where('email', $request->email)->first();

        if (isset($user->email)) {

            if (auth()->guard("admin")->attempt(["email" => $user->email, "password" => $request->password])) {
                return jsonSuccess(['url' => route('dashboard.index')], __("auth.login successful"));
            }
            return jsonSuccess(null, __("auth.password"), 402);
        }
        return jsonSuccess(null, __("auth.failed email"), 401);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param ObjService $service
     * @return Application|\Illuminate\Foundation\Application|Redirector|RedirectResponse
     */
    public function store(Request $request, ObjService $service)
    {
        Session::flush();
        Auth::logout();
        return redirect(route('admin.form.login'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit(int $id, Request $request, ObjService $service)
    {
        if ($request->ajax()) {
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @param ObjService $service
     * @return void
     */
    public function update(Request $request, int $id, ObjService $service) {}

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @param ObjService $service
     * @return void
     */
    public function destroy(int $id, ObjService $service) {}
}
