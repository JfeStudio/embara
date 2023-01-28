<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Camp $camp)
    {
        return view('checkout.create', compact('camp'));
    }

    public function success(){
        return view('checkout.success-checkout');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Camp $camp)
    {
        // ambil semua request
        $camps = $request->all();
        // kita juga butuh data id user yang login
        $camps['user_id'] = Auth::id();
        // kita juga butuh id camp, 1 = gila belajar, 2 = baru belajar
        $camps['camp_id'] = $camp->id;
        // dd($camps, $camps['user_id'], $camps['camp_id']);
        // update user data
        $user = Auth::user();
        $user->email = $camps['email'];
        $user->name = $camps['name'];
        $user->occupation = $camps['occupation'];
        $user->save();

        Checkout::create($camps);
        return to_route('checkout.success');
        // dd($camps);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}