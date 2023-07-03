<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <style>

        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap');



        * {
            box-sizing: border-box;
            list-style: none;
            text-decoration: none;
            margin: 0;
        }

        .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
        }
        .logo img {
            width: 100px;
        }

        body {
            background: transparent;
            margin: 50px 0;
            color: #000;
            font-family: 'Cairo', sans-serif !important;
        }

        .layout {margin: 0 auto;	max-width: 1170px;	width: 100%;padding: 0 15px;}
        /********Grid Widht *******/

        .form-group{ float:left;    padding-left: 15px;    padding-right: 15px;       width: 50%;}
        .grid-8{width: 66.6667%;}
        .grid-12{width: 100%;padding-left: 15px;	padding-right: 15px;	position: relative;    overflow: hidden;}


        /***Section Css******/

        section {       color: #222;    padding: 30px 0;}
        .text-center{text-align:center;}
        .section-title {    color: #222;    font-size: 35px;    font-weight: bold;    text-transform: uppercase;}
        .contact p {    color: #222;       padding-top: 10px;}
        .form{ margin:0 auto;}
        .form form {    margin-top: 50px;}
        input {    width: 100%;}
        .form-control {    width: 100%;}
        .form-control {    background-color: #fff;    border: 1px solid #ccc;    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
            color: #555;    display: block;    font-size: 14px;     line-height: 1.42857;    padding: 6px 12px;
            transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;    width: 100%;
            text-transform: capitalize;}

        .costom-btn {    background:#70193d;   font-family: 'Cairo', sans-serif !important;  font-size: 18px; border: 0; outline: none !important;   color: #ffffff;
            text-transform: uppercase;
            width: 100%;	   padding: 8px 12px;	   cursor: pointer;}
        .form-group {    margin-top: 23px;}
        .icon-text {    color: #ffffff;        text-align: center;
            text-transform: uppercase;	 margin: 25px 0;}
        .icon-holder {    margin: 0 auto;    width: 265px;}
        .icon-holder ul li a {    color: #ffffff;    height: 38px;    width: 38px;}
        .icon-holder ul li {    display: inline;    padding: 12px;}
        @media (max-width:980px) {
            .layout {				width: 80%;	}
            .grid-6 {				width: 50%;	}
        }
        @media (max-width:640px) {
            .layout {		width: 90%;	}
            .form-group, .grid-8 {		width: 100%;	}


        }

        .submit-btn {
            margin-bottom: 50px;
        }

        .information-contact {
            margin: 20px 0;
        }

        .information-contact h3 {
            margin-bottom: 10px;
        }

        .information-contact a {
            font-size: 18px;
            color: #70193d;
            margin: 0 15px;
            display: inline-block;
            font-weight: 600;
        }
    </style>
</head>
<body>


<section class="contact">
    <div class="logo">
        <img src="https://alsada.apex.ps/logo.png" alt="">
    </div>
    <div class="layout">
        <div class="text-center">
            <h1 class="section-title">تواصل معنا</h1>
            <p>
                .  يُرجى التواصل معنا في حال كان لديك أي استفسار عن تطبيق السادة
            </p>


        </div>
        <div style="margin-bottom: 50px;">
            <form >
                <div class="form-inline">
                    <div class="form-group grid-6 ">
                        <input type="text" placeholder="الاسم" id="exampleInputName" name="name" class="form-control">
                    </div>
                    <div class="form-group grid-6">
                        <input type="email" placeholder="البريد الالكتروني" id="exampleInputEmail" name="email" class="form-control">
                    </div>
                    <div class="form-group grid-12">
                        <input type="text" placeholder="العنوان" id="exampleInputSubject" name="subject" class="form-control">
                    </div>
                    <div class="form-group grid-12">
                        <textarea placeholder="محتوى الرسالة" id="exampleInputMessage" rows="3" name="message" class="form-control"></textarea>
                    </div>
                </div>
                <div id="submit" class="form-group grid-12 submit-btn">
                    <input type="submit" value="ارسال" class="btn  btn-lg costom-btn" id="send_message">
                </div>
            </form>
        </div> <!-- /.col-xs-12 .col-sm-offset-2 .col-sm-8 -->

        <div class="text-center">
            <div class="information-contact">
                <h3>
                    معلومات التواصل
                </h3>
                <a href="tel:+97444664835">+97444664835</a>
                <a href="mailto:info@al-sada.qa">info@al-sada.qa</a>
            </div>
        </div>

    </div>
</section>


</body>
</html>
