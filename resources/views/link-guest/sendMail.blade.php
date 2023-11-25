<html
    style="
font-family: sans-serif;
    line-height: 1.15;
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: transparent;
">
<head>
</head> 

<body
    style="
    margin: 0;
    padding: 0;
      font-family: -apple-system, BlinkMacSystemFont, Segoe UI, Roboto,
          Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji,
          Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
">
    <div style="width: 700px;
                background-image: url('cid:bg');
                background-size:cover;
                background-repeat:repeat;
                background-position: center;
                background-color: #6c3c0c;
        ">
        <div class="container" style="color: white;">
            <div style="text-align: center; color: white;">
                <img src="cid:logo" style="width: 340px;margin-top: 1.5rem" alt="...">
                <h3 style="margin-top: 1rem; color: white">
                    {{ $event->type_event }}
                    <div class="display-4"
                        style="margin-top: 10px;
                            font-size: 4rem;
                            font-weight: 250;
                            line-height: 1.2;
                            color: white;">
                        {{ $event->name_event }}
                    </div>
                </h3>


                <table style="width: 100%;color: white">
                    <tr>
                        <td style="width: 10%; background-color: none">
                            <span style="text-align: right;">
                                <h5 style="margin-right: 2px">{{ \Carbon\Carbon::parse($event->start_event)->isoFormat('dddd, DD MMMM YYYY') }}</h5>
                                <h6 style="margin-right: 2px">
                                     {{ \Carbon\Carbon::parse($event->start_event)->isoFormat('hh:mm a') . ' - ' . \Carbon\Carbon::parse($event->end_event)->isoFormat('hh:mm a') }}
                                </h6>
                            </span>

                        </td>
                        <td style="width: 0.1%; background-color: white; padding: 0 0;">
                            <span style="padding: 0 1px; background-color: white; height: 100%"></span>

                        </td>
                        <td style="width: 10%; background-color: none">
                            <span style="text-align: left">
                                <h5 style="margin-left: 2px">{{ $event->place_event }}</h5>
                                <h6 style="margin-left: 2px">{{ $event->location_event }}</h6>   
                            </span>

                        </td>
                    </tr>
                </table>

                

                <h2 class="p-2" style="padding: 0.5rem">
                    {{ strtoupper($invt->type_invitation) }}
                        {{ $invt->table_number_invitation != null ? "- ". ucwords($invt->table_number_invitation) : "" }}
                    </h2>

                <p>
                    {{ $invt->information_invitation }}
                </p>

                <p style="margin: 1rem 0;color: white;">
                    Simpan barcode ini dan ditunjukkan pada saat acara
                </p>

                <div style="margin-bottom: 1.5rem">
                    <img src="cid:qrcode" class="rounded"
                        style="width: 150px;border-radius: 0.25rem;" alt="...">
                    <h3 class="mt-3">
                        <h4 style="cursor: pointer">
                            <span>
                                {{ $invt->qrcode_invitation }}
                            </span>
                        </h4>
                        {{ $invt->name_guest }}
                        <div>
                        </div>
                    </h3>

                    <a
                        style="display: inline-block;
                        font-weight: 400;
                        color: #212529;
                        text-align: center;
                        vertical-align: middle;
                        user-select: none;
                        background-color: transparent;
                        border: 1px solid transparent;
                        padding: 0.375rem 0.75rem;
                        font-size: 1rem;
                        line-height: 1.5;
                        border-radius: 0.25rem;
                        color: #212529;
                        background-color: #ffc107;
                        border-color: #ffc107;
                        text-decoration: none;
                        border-radius: 50rem;
                        margin-bottom: 1rem;
                        margin-top: 1rem;
                        "
                        href="{{ url('/invitation/' . $invt->qrcode_invitation) }}">Kunjungi Tautan Undangan</a>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
