<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="color-scheme" content="light">
<meta name="supported-color-schemes" content="light">
<style>

    .container{
        background-color: #f1f1f1;
    }
@media only screen and (max-width: 600px) {
.inner-body {
width: 100% !important;
}

.footer {
width: 100% !important;
}
}

@media only screen and (max-width: 500px) {
.button {
width: 100% !important;
}
}
</style>
</head>
<body>
{{-- 
<table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="center">
<table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation"> --}}
<div class="container">
    {{ $header ?? '' }}

<!-- Email Body -->
<tr>
<td class="body" width="100%" cellpadding="0" cellspacing="0">
<table class="inner-body" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<!-- Body content -->
<tr>
<td class="content-cell">
{{ Illuminate\Mail\Markdown::parse($slot) }}

{{ $subcopy ?? '' }}
<br>
<div style='color: rgb(92, 7, 56); font-size: 14px;'>===========<br>Equipe Gestion Restaurant <br> 22/03/22  </div>
</td>
</tr>
</table>
</td>
</tr>

{{ $footer ?? '' }}
<table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">
<td>
    <td class="content-cell" align="center">
       
    </tr>
</td>
</table>

</div>
{{-- </table>
</td>
</tr>
</table> --}}
</body>
</html>
