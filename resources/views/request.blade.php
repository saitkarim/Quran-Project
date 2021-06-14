@extends('menu')

@section('head')
    <style>
        body{
            background-color: #ffffff;
            color: #333333;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif;
            font-size: 15px;
            font-weight: 400;
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
        }
        .sub-nav {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-bottom: 30px;
            min-height: 50px;
            padding-bottom: 15px;
        }
        .breadcrumbs {
            margin: 0 0 15px 0;
            padding: 0;
        }
        .breadcrumbs li {
            color: #666;
            display: inline;
            font-weight: 300;
            font-size: 13px;
            max-width: 450px;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        h1 {
            font-size: 2em;
            margin: 0.67em 0;
        }
        form {
            display: block;
            margin-top: 0em;
        }
        input, textarea {
            color: #000;
            font-size: 14px;
        }
        .form-field label {
            display: block;
            font-size: 13px;
            margin-bottom: 5px;
        }
        .form-field input[type="text"] {
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-field input {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            width: 100%;
        }
        .form-field ~ .form-field {
            margin-top: 25px;
        }
        label {
            cursor: default;
        }
        button, input {
            overflow: visible;
        }
        .form .suggestion-list {
            font-size: 13px;
            margin-top: 30px;
        }
        .request-form textarea {
            min-height: 120px;
        }
        .form-field textarea {
            vertical-align: middle;
        }
        textarea {
            border: 1px solid #ddd;
            border-radius: 2px;
            resize: vertical;
            width: 100%;
            outline: none;
            padding: 10px;
        }
        textarea {
            overflow: auto;
        }
        button, input, optgroup, select, textarea {
            font-family: inherit;
            font-size: 100%;
            line-height: 1.15;
            margin: 0;
        }
        textarea {
            text-rendering: auto;
            color: -internal-light-dark(black, white);
            letter-spacing: normal;
            word-spacing: normal;
            text-transform: none;
            text-indent: 0px;
            text-shadow: none;
            display: inline-block;
            text-align: start;
            appearance: auto;
            background-color: -internal-light-dark(rgb(255, 255, 255), rgb(59, 59, 59));
            -webkit-rtl-ordering: logical;
            flex-direction: column;
            resize: auto;
            cursor: text;
            white-space: pre-wrap;
            overflow-wrap: break-word;
            column-count: initial !important;
            margin: 0em;
            font: 400 13.3333px Arial;
            border-width: 1px;
            border-style: solid;
            border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
            border-image: initial;
            padding: 2px;
        }
        #hc-wysiwyg {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
            position: relative;
            resize: vertical;
            height: 250px;
            min-height: 100px;
        }
        input:not([type="checkbox"]) {
            outline: none;
        }
        input {
            font-weight: 300;
            max-width: 100%;
            box-sizing: border-box;
            transition: border .12s ease-in-out;
        }
        input[type="hidden" i] {
            display: none;
            appearance: initial;
            background-color: initial;
            cursor: default;
            padding: initial;
            border: initial;
        }
        input {
            text-rendering: auto;
            color: -internal-light-dark(black, white);
            letter-spacing: normal;
            word-spacing: normal;
            text-transform: none;
            text-indent: 0px;
            text-shadow: none;
            display: inline-block;
            text-align: start;
            appearance: auto;
            background-color: -internal-light-dark(rgb(255, 255, 255), rgb(59, 59, 59));
            -webkit-rtl-ordering: logical;
            cursor: text;
            margin: 0em;
            font: 400 13.3333px Arial;
            padding: 1px 2px;
            border-width: 2px;
            border-style: inset;
            border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
            border-image: initial;
        }
        .form-field p {
            color: #666;
            font-size: 12px;
            margin: 5px 0;
        }
        p {
            display: block;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
        }
        .form-field .optional {
            color: #666;
            margin-left: 4px;
        }
        .upload-dropzone {
            border: 1px solid #ddd;
            font-size: 12px;
            overflow: hidden;
            position: relative;
            text-align: center;
        }
        .upload-dropzone input[type=file] {
            filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
            opacity: 0;
            position: absolute;
            top: 0;
            right: 0;
            cursor: pointer;
            height: 100%;
            width: 100%;
        }
        .upload-dropzone span {
            color: #666;
            display: inline-block;
            line-height: 24px;
            padding: 10px;
        }
        a {
            color: #2ca4ab;
            text-decoration: none;
            background-color: transparent;
        }
        #upload-error {
            display: none;
            margin-top: 10px;
        }
        .notification-inline.notification-error {
            background-color: #fff0f1;
            border: 1px solid #e35b66;
            color: #cc3340;
        }
        .notification-inline {
            border-radius: 4px;
            line-height: 14px;
            margin-top: 5px;
            padding: 5px;
            position: relative;
            text-align: left;
            vertical-align: middle;
        }
        .notification-error {
            background: #ffeded;
            border-color: #f7cbcb;
        }
        .notification {
            border: 1px solid;
            display: table;
            font-family: sans-serif;
            font-size: 12px;
            padding: 13px 15px;
            transition: height .2s;
            width: 100%;
            color: #555;
        }
        script {
            display: none;
        }
        .form footer {
            margin-top: 40px;
            padding-top: 30px;
        }
        footer {
            display: block;
        }
        .button-large, input[type="submit"] {
            cursor: pointer;
            background-color: #2ca4ab;
            border: 0;
            border-radius: 4px;
            color: #ffffff;
            font-size: 14px;
            font-weight: 400;
            line-height: 2.72;
            min-width: 190px;
            padding: 0 1.9286em;
            width: 100%;
        }
        button, [type="button"], [type="reset"], [type="submit"] {
            -webkit-appearance: button;
        }
        input[type="submit" i] {
            appearance: auto;
            user-select: none;
            white-space: pre;
            align-items: flex-start;
            text-align: center;
            cursor: default;
            color: -internal-light-dark(black, white);
            background-color: -internal-light-dark(rgb(239, 239, 239), rgb(59, 59, 59));
            box-sizing: border-box;
            padding: 1px 6px;
            border-width: 2px;
            border-style: outset;
            border-color: -internal-light-dark(rgb(118, 118, 118), rgb(133, 133, 133));
            border-image: initial;
            }
        .g-recaptcha[ui=invisible] {
            margin-top: 20px;
        }
        .footer {
            border-top: 1px solid #ddd;
            margin-top: 60px;
        padding: 30px 0;
        }
        .footer-inner {
            max-width: 1160px;
            margin: 0 auto;
            padding: 0 5%;
            display: flex;
            justify-content: space-between;
        }
        .btn-file {
        position: relative;
        overflow: hidden;
        }
        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }
    </style>
@endsection

@section('title')
{{ __('lang.request')}}
@endsection

@section('main_content')
<div class="container">
    <nav class="sub-nav">
      <ol class="breadcrumbs">
      <li title="Quran">
          <a href="/home">{{ __('lang.Quran')}} -></a>
      </li>
      <li title="Submit a request">
        {{ __('lang.request')}}
      </li>
  </ol>
    </nav>
    <h1>
        {{ __('lang.request_submit')}}
      <span class="follow-up-hint">
      </span>
    </h1>
    <div id="main-content" class="form">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">!!</button>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif

        @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">☺</button>
                <strong> {{ $message }} </strong>
            </div>
        @endif
        <form id="new_request" class="request-form" data-form="" data-form-type="request" action="{{ route('request/send') }}" accept-charset="UTF-8" method="POST"
         enctype="multipart/form-data"><input name="utf8" type="hidden" value="✓">
         @csrf
        <div class="form-field string required request_anonymous_requester_email"><label for="request_anonymous_requester_email">{{ __('lang.your_email_address')}}</label>
            <input type="text" name="email" id="request_anonymous_requester_email" class="form-control" aria-required="true">
        </div>
        <div class="form-field string  required  request_subject">
            <label id="request_subject_label" for="request_subject">{{ __('lang.subject')}}</label>
            <input type="text" name="subject" id="request_subject" maxlength="150" size="150" class="form-control" aria-required="true" aria-labelledby="request_subject_label">
        </div>
        <div class="suggestion-list" data-hc-class="searchbox" data-hc-suggestion-list="true"></div>
        <div class="form-field text  required  request_description">
            <label id="request_description_label" for="request_description">{{ __('lang.description')}}</label>
            <textarea name="description" id="request_description" class="form-control" aria-required="true"
            aria-describedby="request_description_hint" aria-labelledby="request_description_label"
            data-helper="wysiwyg" ></textarea>


            <p id="request_description_hint">{{ __('lang.support_asap')}}</p>
        </div><br>
        <div>
            <label id="request_attachment_label" for="request_attachment">{{ __('lang.attachment')}}
                <i>({{__('lang.optional')}})</i></label><br>
                <span class="btn btn-default btn-file">
                    {{ __('lang.browse')}} <input type="file" name="file" id="file" class="form-control" multiple>
                </span>
            <br>
        </div>

            <footer><input type="submit" name="commit" value="{{ __('lang.submit')}}"><script src="https://www.recaptcha.net/recaptcha/enterprise.js" async="" defer=""></script>

            </footer>
        </form>
    </div>
</div>
<footer class="footer">
    <div class="footer-inner">
        <a title="Home" href="/home">{{ __('lang.Quran')}}</a>
        <div class="footer-language-selector">
        </div>
    </div>
</footer>
@endsection
