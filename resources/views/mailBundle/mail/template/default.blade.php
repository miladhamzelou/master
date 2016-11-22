<div>
    <p style="float: left;display: block;font-size: 11px;color: #999;width: 100%">
        {{ \App\Facades\FarsiFacade::g2jdate(date('Y-m-d H:i:s')) }}
    </p>
    <p style="font-family: Tahoma;direction: rtl;font-size: 12px;text-align: justify;line-height: 2;">{{ $mail['message'] }}</p>
</div>
