
<?php 
session_start();
require_once('classes/autoload.php');
require_once('header.php');
$DB = new Database();

$info = (object)[];  //empty object

//logout
if (!isset($_SESSION['userid'])) 
{
    if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type != "login" && $DATA_OBJ->data_type != "signup") 
    {
        $info->logged_in = false;
        echo json_encode($info);
        die;
    }
}



$sql = "select * from admin where userid = :userid limit 1";
$id = $_SESSION['userid'];
$data = $DB->read($sql, ['userid'=>$id]);

if (is_array($data)) 
{

   $data = $data[0];

   //check if exist image
   $image = ($data->gender == "Male") ? 'assets/images/user_gender_male.jpg' : 'assets/images/user_gender_female.jpg';

   if (file_exists($data->image)) //looking for if exist some file int the collumn image
   {
        $image = $data->image;
   }


    $gender_male = "";  //initialise a string to put checked on input radio
    $gender_female = ""; //initialise a string to put checked on input radio

    //checked if gender is equal with actual user
    if ($data->gender == "Male") 
    {
        $gender_male = "checked"; //if is, gender_male recieve checked
    }else
    {
        $gender_female = "checked"; //if is not, gender_female recieve checked
    }


   echo '

   <style>

        .dragging{

            border: dashed 2px #448aff;
        }


   </style>

<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10"><span style="color:#1877f2;">ITELSOCIAL</span> - Painel do Administrador da Rede</h5>
                    <p class="m-b-0">Bem vindo ao ITELSOCIAL ADMIN</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="index.php">Página Incial</a>
                        <li class="breadcrumb-item">Perfil</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <!--<div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Hello card</h5>
                                    <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li>
                                                <i class="fa fa fa-wrench open-card-option"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-window-maximize full-card"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-minus minimize-card"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-refresh reload-card"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-trash close-card"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">-->

                                 <div class="row" style="background-color: white;">
                                     <div class="col-sm-2">  
                                     </div>

                                     <div class="col-sm-8">
                                        <form id="myform" method="post" enctype="multipart/form-data">
                                            <table class="table table-bordered table-hover">
                                                <tr align="center">
                                                    <td colspan="6"><h3>Edita o seu perfil</h3></td>
                                                </tr>
                                                <tr>
                                                    <tr>

                                                        <td>
                                                        <!--<span style="font-size:11px; margin-left:9px;">Arraste e solte uma imagem para Trocar</span>-->
                                                        
                                                        <style="font-weight: bold;"><img ondragover="handle_drap_and_drop(event)" ondrop="handle_drap_and_drop(event)" ondragleave="handle_drap_and_drop(event)" src="'.$image.'" style="width:200px; height:200px; margin:10px;"></td>

                                                        <td>
                                                            <label for="change_image_input" id="change_image_button" style="background-color:#9b9a80; color:white; width:220px; margin-top: 25%; padding:1em; border-radius;5px; cursor: pointer; text-align:center">Trocar Imagem</label>

                                                            <input class="form-control" type="file" onchange="upload_profile_image(this.files)" id="change_image_input" style="display:none">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold;">Email: </td>

                                                        <td>
                                                            <input class="form-control" type="email" name="email" required value="'.$data->email.'">
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td style="font-weight: bold;">Nome Completo: </td>

                                                        <td>
                                                            <input class="form-control" type="text" name="username" required value="'.$data->username.'">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="font-weight: bold;">Palavra-passe</td>

                                                        <td>
                                                            <input class="form-control" type="password" name="password" id="mypass" required value="'.$data->password.'">
                                                            <input type="checkbox" onclick="show_password()"><strong>Mostrar palavra-passe</strong>
                                                        </td>
                                                    </tr>

                                                   
                                                    
                                                    <tr>
                                                        <td style="font-weight: bold;">Género</td>

                                                        <td>

                                                        <input id="gender_male" type="radio" name="gender" value="Male" '.$gender_male.'> <label for="gender_male"> Masculino</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="gender_female" type="radio" name="gender" value="Female" '.$gender_female.'> <label for="gender_female"> Feminino</label>

                                                        
                                                     </td>
                                                 </tr>

                                <tr align="center">
                                    <td colspan="2">
                                        <input id="save_settings_button" type="submit" class="btn btn-info" name="update" style="width: 230px; background-color:#50da70;" value="Salvar Aterações" onclick="collect_data(event)">
                                    </td>
                                </tr>
                            </table>
                        </form>  
                    </div>
                    <div class="col-sm-2">

                    </div>
                </div>   
                                <!--</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->
<div id="styleSelector"></div>
</div>
</div>
</div>
</div>
<!-- Warning Section Starts -->
<!-- Older IE warning message -->
    <!--[if lt IE 10]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="assets/images/browser/chrome.png" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="assets/images/browser/firefox.png" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="assets/images/browser/opera.png" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="assets/images/browser/safari.png" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="assets/images/browser/ie.png" alt="">
                            <div>IE (9 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="assets/js/script.min.js"></script>
</body>

</html>

<script type="text/javascript">

    function _(element){

       return document.getElementById(element);
   }

   var logout = _("logout");
   logout.addEventListener("click", logout_user);


   function get_data(find,type){

    var xml = new XMLHttpRequest();

    xml.onload = function(){

        if (xml.readyState == 4 || xml.status == 200) {

            handle_result(xml.responseText, type);
        }
    }

        var data = {}; //objecto vazio
        data.find= find;
        data.data_type = type;
        data = JSON.stringify(data);

        xml.open("POST","API.php",true);
        xml.send(data);

    }

    function handle_result(result,type){
//alert(result);
        if (result.trim() != "") {
            var obj = JSON.parse(result);
            if (typeof(obj.logged_in) != "undefined" && !obj.logged_in) { //typedef e equivalente a isset em php

                window.location = "auth-normal-sign-in.php";

            }else{

                switch(obj.data_type){

                    case "user_info":
                        var username = _("username");
                        var username2 = _("username2");

                        var img_l = _("img_l");
                        var img_r = _("img_r");

                        username.innerHTML = obj.username;
                        username2.innerHTML = obj.username;

                        img_l.src = obj.image;
                        img_r.src = obj.image;
                    break;

                    case "save_profile":
                        alert(obj.message);
                        get_data({}, "user_info"); //refreshing the user_info
                        window.location = "user-profile.php";
                    break;
                }   

            }

        }
    }

    function logout_user(){

        var answer = confirm("Tens certeza que pretende Terminar Sessão?");

        if (answer) {

            get_data({}, "logout");
        }

    }

    get_data({}, "user_info");

    function show_password(){

        show_pass = "text"; 
        keep_pass = "password";
        mypass = _("mypass");

        if(mypass.type == "text"){

            mypass.type = keep_pass;

        }
        else{

            mypass.type = show_pass;
        } 
       
    }
    
</script>
<script type="text/javascript">

    function collect_data(){
        
        var save_settings_button = _("save_settings_button");
        save_settings_button.disabled = true;
        save_settings_button.value = "Carregando.....";

        var myform = _("myform");
        var inputs = myform.getElementsByTagName("INPUT");

        data = {};  //inicialisando um objecto vazio
        for (var i = inputs.length - 1; i >= 0; i--) {
            var key = inputs[i].name;

            switch(key){ //se o key for igual a um dos case faz:

                case "username":
                    data.username = inputs[i].value;
                    break;

                case "email":
                    data.email = inputs[i].value;
                    break;

                case "password":
                    data.password = inputs[i].value;
                    break;

                case "gender":
                    if(inputs[i].checked){
                        data.gender = inputs[i].value;  
                    }
                    break; 

            }
        }
        send_data(data,"save_profile");
    }

    function send_data(data, type){

        var xml = new XMLHttpRequest();
        xml.onload = function(){

            if (xml.readyState == 4 || xml.status == 200) {

                handle_result(xml.responseText);
                var save_settings_button = _("save_settings_button");
                save_settings_button.disabled = false;
                save_settings_button.value = "Salvar Aterações";
   
            }
        }

        data.data_type = type;
        var data_string = JSON.stringify(data);  //convertendo para string a data a ser enviado

        xml.open("POST", "API.php", true);
        xml.send(data_string);
    }

    function upload_profile_image(files){ //files is an array

        var change_image_button = _("change_image_button");
        change_image_button.disabled = false;
        change_image_button.innerHTML = "Actualizando Imagem...";

        var myform = new FormData();  //declarating a new FormData object

        var xml = new XMLHttpRequest();
        xml.onload = function(){

            if (xml.readyState == 4 || xml.status == 200) {

                //alert(xml.responseText);
                get_data({}, "user_info"); //refreshing the user_info
                window.location = "user-profile.php";
                change_image_button.disabled = false;
                change_image_button.innerHTML = "Trocar Imagem";
   
            }
        }

        myform.append("files", files[0]); //appending files which files[0]
        myform.append("data_type", "change_profile_image"); //appending data_type which is Change im....

        xml.open("POST", "uploader.php", true);
        xml.send(myform);

    }

    function handle_drap_and_drop(e){  //dragging, drop and leave image

        if(e.type == "dragover"){

            e.preventDefault();  //prevenir o comportamento padrao de sustituir a imagem na pagina
            e.target.className = "dragging";

        }

        else if(e.type == "dragleave"){

            e.target.className = "";

        }

        else if(e.type == "drop"){

            e.preventDefault();  //prevenir o comportamento padrao de sustituir a imagem na pagina
            e.target.className = "";
            //console.log(e.dataTransfer.files);
            upload_profile_image(e.dataTransfer.files); //calling the function to upload the image

        }
    }

    
</script>

';
}







