<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ScanController extends Controller
{
    public function scanIn()
    {
        return view("scan.scanIn");
    }

    public function scanInProcess(Request $request)
    {
        $status = "error";
        $message = "Kode tidak ditemukan";
        $invt = Invitation::join('guest', 'guest.id_guest', '=', 'invitation.id_guest')
        ->where('qrcode_invitation',  $request->qrcode)->first();

        if($invt){
            if($invt->checkin_invitation == null){
                $status = "success";
                $data['checkin_invitation'] = Carbon::now();
                if($file = $request->file('webcam')){
                    $file->move(public_path('/scan/scan-in')  , $request->qrcode . ".jpeg" );
                    $data['checkin_img_invitation'] = $request->qrcode . ".jpeg";
                }
                Invitation::where('id_invitation', $invt->id_invitation)->update($data);
                $message = "Selamat datang ".$invt->name_guest." terima kasih atas kehadirannya";
            }else{
                $status = "warning";
                $message = "Tamu Sudah Scan In";
            }
        }
        return response()->json([
            'status'    => $status,
            'message'   => $message
        ]);
    }

    public function scanOut()
    {
        return view("scan.scanOut");
    }
    
    public function scanOutProcess(Request $request)
    {
        $status = "error";
        $message = "Kode tidak ditemukan";
        $invt = Invitation::join('guest', 'guest.id_guest', '=', 'invitation.id_guest')
        ->where('qrcode_invitation',  $request->qrcode)->first();

        if($invt){
            $status = "warning";
            if($invt->checkin_invitation == null){
                $message = "Tamu Belum Scan In";
            }else if($invt->checkout_invitation == null){
                $status = "success";
                $data['checkout_invitation'] = Carbon::now();
                if($file = $request->file('webcam')){
                    $file->move(public_path('/scan/scan-out')  , $request->qrcode . ".jpeg" );
                    $data['checkout_img_invitation'] = $request->qrcode . ".jpeg";
                }
                Invitation::where('id_invitation', $invt->id_invitation)->update($data);
                $message = "Scan Out Berhasil";
                
            }else{
                $status = "warning";
                $message = "Tamu Sudah Scan Out";
            }
        }
        return response()->json([
            'status'    => $status,
            'message'   => $message
        ]);
    }
}
