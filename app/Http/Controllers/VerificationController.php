<?php

namespace App\Http\Controllers;

use App\Models\Verification;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ui.pages.users.user.verification');
    }

    public function uploadDocuments()
    {
        return view('ui.pages.users.user.uploadDocuments');
    }

    public function capturePhoto()
    {
        return view('ui.pages.users.user.capturePhoto');
    }

    public function getPassportNumber(Request $r)
    {   
        $passport_number = $r->passport_number;
        $r->session()->put('passport_number', $passport_number);
        return redirect('verification/uploadDocuments');
    }

    public function getUploadedDocuments(Request $r)
    {   
        $upload_documents = rand().'-'.time().'.'.$r->upload_documents->extension();
        $r->upload_documents->move(public_path('uploads'), $upload_documents);

        
        $r->session()->put('upload_documents', $upload_documents);
        return redirect('verification/capturePhoto');
    }

    public function verify(Request $request){

        $img = $request->image;
        $folderPath = "uploads/";
      
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
      
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';
      
        $file = $folderPath . $fileName;
        file_put_contents($file, $image_base64);

        Verification::create([
            'photo' => $fileName,
            'identity_number' => session('passport_number'),
            'identity_card_document' => session('upload_documents'),
            'user_id' =>session('user_session'),
             
        ]);
        return redirect('/');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Verification  $verification
     * @return \Illuminate\Http\Response
     */
    public function show(Verification $verification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Verification  $verification
     * @return \Illuminate\Http\Response
     */
    public function edit(Verification $verification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Verification  $verification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Verification $verification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Verification  $verification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verification $verification)
    {
        //
    }
}
