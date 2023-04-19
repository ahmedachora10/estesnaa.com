<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserWithdrawalRequest;
use App\Http\Requests\Admin\StoreUserWithdrawalRequestRequest;
use App\Http\Requests\Admin\UpdateUserWithdrawalRequestRequest;

class UserWithdrawalRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.requests.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreUserWithdrawalRequestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserWithdrawalRequestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserWithrawalRequest  $userWithrawalRequest
     * @return \Illuminate\Http\Response
     */
    public function show(UserWithdrawalRequest $userWithrawalRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserWithrawalRequest  $userWithrawalRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(UserWithdrawalRequest $userWithrawalRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateUserWithdrawalRequestRequest  $request
     * @param  \App\Models\UserWithrawalRequest  $userWithrawalRequest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserWithdrawalRequestRequest $request, UserWithdrawalRequest $userWithrawalRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserWithrawalRequest  $userWithrawalRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserWithdrawalRequest $userWithrawalRequest)
    {
        //
    }
}