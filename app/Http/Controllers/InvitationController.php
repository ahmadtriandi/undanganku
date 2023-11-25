<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Guest;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Str;

class InvitationController extends Controller
{


    //  LINK for Guest access
    public function linkGuest($qrcode)
    {

        if(!file_exists(public_path('/qrCode/'. $qrcode .'.png'))){
            $this->qrcodeGenerator($qrcode);
        }

        $invt = Invitation::join('guest', 'guest.id_guest', '=', 'invitation.id_guest')
                            ->where('qrcode_invitation', $qrcode)->first();
        $event = Event::where('id_event', 1)->first();
        if($invt){
            return view('link-guest.index', compact('invt', 'event'));
            // return view('link-guest.sendMail', compact('invt', 'event'));
        }else{
            return view('link-guest.notFound');
        }
        
    }
    //  LINK for Guest send email
    public function linkGuestEmail($qrcode)
    {
        $invt = Invitation::join('guest', 'guest.id_guest', '=', 'invitation.id_guest')
                            ->where('qrcode_invitation', $qrcode)->first();
        $event = Event::where('id_event', 1)->first();
        return view('link-guest.sendMail', compact('invt', 'event'));
        
    }

    public function downloadQrCode($code)
    {
        return response()->download(public_path('qrCode/'. $code. ".png"));
    }



    public function getGuest(Request $request)
    {
        if ($request->ajax()) {
            $data = Guest::where('id_guest', $request->id_guest)->first();
            return response()->json([
                'status' => "success",
                'data'  => $data
            ]);
        }
    }

    public function checkUniq($qrcode)
    {
        $cek = Invitation::where('qrcode_invitation', $qrcode)->get();
        return $cek->count() > 0 ? TRUE : FALSE;
    }

    public function generateCode()
    {
        $qrcode = Str::random(6);
        if ($this->checkUniq($qrcode)) {
            return $this->generateCode();
        }
        return $qrcode;
    }



    public function qrcodeGenerator($code)
    {
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($code)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(ErrorCorrectionLevel::High)
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
            ->validateResult(false)
            ->build();
        $result->saveToFile(public_path('/qrCode/' . $code . '.png'));
    }

    public function sendEmail()
    {
        
        $status = "error";
        $message = "Gagal mengirim ke email";
        $mail = new PHPMailer(true);
        try {

            $guestQrcode    = $_GET['guestQrcode'];
            $guestName      = $_GET['guestName'];
            $guestMail      = $_GET['guestMail'];

            set_time_limit(0); // remove a time limit if not in safe mode
            // OR
            set_time_limit(120); // set the time limit to 120 seconds

            $mail->SMTPDebug  = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();           
            $mail->Timeout    = 60;                                
            $mail->SMTPKeepAlive = true;
            $mail->Host       = env("MAIL_HOST", "smtp.gmail.com");    //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = env("MAIL_USERNAME", "undanganku23@gmail.com");                     //SMTP username
            $mail->Password   = env("MAIL_PASSWORD", "tudx lniw ahtu ufwx");                               //SMTP password
            $mail->SMTPSecure = env("MAIL_ENCRYPTION", "tls");             //Enable implicit TLS encryption
            $mail->Port       = env("MAIL_PORT", 587);                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            $mail->setFrom(env("MAIL_FROM_ADDRESS", "undanganku23@gmail.com"), myEvent()->name_event);
            $mail->addAddress($guestMail, $guestName);    

            $mail->AddEmbeddedImage(public_path('/asset/tmp/bg.png'), 'bg', "bg");   
            $mail->AddEmbeddedImage(public_path('qrCode/' . $guestQrcode . '.png'), 'qrcode', 'qrcode');    
            $mail->AddEmbeddedImage(public_path('asset/front/logo2.png'), 'logo');   
       
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = myEvent()->type_event;
            $mail->Body    = $this->linkGuestEmail($guestQrcode)->render();

            $mail->send();
            $mail->SmtpClose();

            Invitation::where('qrcode_invitation', $guestQrcode)->update(['send_email_invitation' => 1]);

            $status = "success";
            $message = "Berhasil mengirim ke email";
        } catch (Exception $e) {
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        return redirect("invite")->with($status, $message);
    }
    

    public function index()
    {
        $invitations = Invitation::join('guest', 'guest.id_guest', '=', 'invitation.id_guest')
            ->orderBy('send_email_invitation', "ASC")->orderBy('table_number_invitation', "ASC")->get();
        return view('invitation.index', compact('invitations'));
    }

    public function create()
    {
        $guests = Guest::orderBy('name_guest', "ASC")->with('invitation')->get();
        return view('invitation.create', compact('guests'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guest'          => 'required',
            'type'           => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $qrcode = $this->generateCode();
        $this->qrcodeGenerator($qrcode);
        

        Invitation::create([
            "id_guest"                      => $request->guest,
            "qrcode_invitation"             => $qrcode,
            "table_number_invitation"       => $request->table_number,
            "type_invitation"               => $request->type,
            "information_invitation"        => $request->information,
            "link_invitation"               => url('/registered/' . $qrcode),
            "image_qrcode_invitation"       => url('/qrCode/' . $qrcode . ".png"),
        ]);

        return redirect('/invite')->with('success', "Berhasil menambah data");
    }

    public function edit($id)
    {
        $invitation = Invitation::join('guest', 'guest.id_guest', '=', 'invitation.id_guest')->where('id_invitation', $id)->first();
        return view('invitation.edit', compact('invitation'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'type'           => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        Invitation::where('id_invitation', $id)->update([
            "table_number_invitation"       => $request->table_number,
            "type_invitation"               => $request->type,
            "information_invitation"        => $request->information,
        ]);


        return redirect('/invite')->with('success', "Berhasil mengedit data");
    }


    public function delete(Request $request)
    {
        if (file_exists(public_path('/qrCode/' . $request->qrcode . ".png"))) {
            unlink(public_path('/qrCode/' . $request->qrcode . ".png"));
        }
        if (file_exists(public_path('/scan/scan-in/' . $request->qrcode . ".jpeg"))) {
            unlink(public_path('/scan/scan-in/' . $request->qrcode . ".jpeg"));
        }   
        if (file_exists(public_path('/scan/scan-out/' . $request->qrcode . ".jpeg"))) {
            unlink(public_path('/scan/scan-out/' . $request->qrcode . ".jpeg"));
        }
        Invitation::where('id_invitation', $request->id_invitation)->delete();
        return redirect('invite')->with('success', "Berhasil menghapus data");
    }
}
