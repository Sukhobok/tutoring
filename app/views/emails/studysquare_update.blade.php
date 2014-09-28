<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	
	<body style="margin: 0 auto; padding: 0; border: 0; font-size: 100%; font: inherit; vertical-align: baseline; line-height: 1; width: 600px; box-shadow: 0 2px 18px -1px rgba(0, 0, 0, 0.4); font-family: 'Source Sans Pro', sans-serif;">
		<div id="wrapper" style="margin: 20px 0;padding: 0;border: 0;font-size: 100%;font: inherit;vertical-align: baseline;background: #eef1f3;width: 100%;height:auto">
			<div style="margin: 0;padding: 0;border: 0;font-size: 100%;font: inherit;vertical-align: baseline;display: block;height: 46px;background: #2a2a2a;text-align: center;width: 100%;position: relative;z-index: 1;box-shadow: 0 2px 18px -2px rgba(0, 0, 0, 0.4)"><div class="content" style="margin: 0;padding: 0;border: 0;font-size: 100%;font: inherit;vertical-align: baseline">
			<img src="{{ $message->embed(public_path('images/logo_beta.png')) }}" style="margin: 0;padding: 0;border: 0;font-size: 100%;font: inherit;vertical-align: baseline"/></div>
		</div>

		<div id="index_top" style="margin: 0;padding: 0;border: 0;font-size: 100%;font: inherit;vertical-align: baseline;position: relative;height: 240px !important;width: 100%;background: #000 url({{ URL::to('themes/university/img/slider/img-1.jpg') }}) no-repeat;background-size: 100% 100%;z-index: 0;text-align: center;border-bottom: 15px solid #252525;margin-bottom: 45px;margin-top:-10px;">
			<div class="description" style="margin: 0 auto;padding: 0;border: 0;font-size: 100%;font: inherit;vertical-align: baseline;display: block;position: relative;">
				<br /><br /><br /><br /><br /><br /><br />
				<p style="margin: 0;padding: 3px 3px;border: 0;font-size: 28px;font: inherit;vertical-align: baseline;margin-top: 3px;display: inline-block;background: rgba(0, 0, 0, 0.6);color: #fff;font-weight: 700;">StudySquare is back!</p>
			</div>
		</div>
		
		<div id="index_top_description" style="margin: 0;padding: 20px;border: 0;font-size: 12px;font: inherit;vertical-align: baseline;font-weight: 400;color: #727272; clear:both;">
			<p style="margin: 0;padding: 0;border: 0;font-size: 100%;font: inherit;vertical-align: baseline">
			We have added new features and security updates to our newest release. Please click the link to reset your password and begin using StudySquare.com to increase your GPA by collaborating with other students and finding a tutor who is ready to help you at your convenience.  
			</p>
			<br /><br />
			We hope you enjoy everything Study Square has to offer.
			<br />
			<a href="{{ $token_link }}">{{ $token_link }}</a>
			<br /><br />
			- The StudySquare Team
		</div>
		<br /><br />
		
		<div style="margin: 0;padding: 0;border: 0;font-size: 100%;font: inherit;vertical-align: baseline;display: block;height: 75px;width: 100%;background: #dde5ea;padding-top: 25px;text-align: center">
			Copyright &copy; {{ date('Y') }}. All rights reserved to StudySquare
		</div>
		<div style="clear:both;"></div>
	</div>
</body>
</html>
