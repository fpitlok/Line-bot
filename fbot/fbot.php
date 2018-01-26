
<?php
    $check = $_GET['check'];
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%3B",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache",
          "postman-token: d666ec94-fa45-ddd9-6b71-4556609d4ac2"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
      }


      $data = json_decode($response,true);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SeedSoft</title>

    <link href="https://fonts.googleapis.com/css?family=Kanit:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>

        body {
            font-family: 'Prompt', sans-serif;
            /*font-family: 'Roboto', sans-serif;*/
            /*font-weight:100;*/
            background: #212529 !important;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Prompt', sans-serif;
        }



        .navbar-default{
            width: 100%;
            background: -webkit-linear-gradient(left, #22d686, #2dbbd3, #22d686, #2dbbd3);
            background: linear-gradient(to right, #22d686, #2dbbd3, #22d686, #2dbbd3);
            background-size: 600% 100%;
            -webkit-animation: HeroBG 20s ease infinite;
            animation: HeroBG 20s ease infinite;
        }

        @-webkit-keyframes HeroBG {
            0% {
                background-position: 0 0;
            }
            50% {
                background-position: 100% 0;
            }
            100% {
                background-position: 0 0;
            }
        }

        @keyframes HeroBG {
            0% {
                background-position: 0 0;
            }
            50% {
                background-position: 100% 0;
            }
            100% {
                background-position: 0 0;
            }
        }

        .navbar-default .navbar-brand {
            color: #fffff9;
        }
        .btn-outline-secondary {
            color: #fffff9;
        }


    </style>

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-toggleable-md navbar-default bg-faded">
  <a class="navbar-brand" href="#">ระบบจัดการ Line Bot</a>

  <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div> -->
</nav>



    <br> <br> <br>
    <?php
          if($check ==1){
             ?>
            <div style="margin-left:200px;margin-right:200px;">  <button type="button" class="btn btn-success btn-lg btn-block">ปรับยอดเงินสำเร็จ</button> </div>
        <?php   }  ?>
     <br>


        <div class="container">
          <table class="table table-dark table-striped">
         <thead>
           <tr>
             <th class="text-center">ชื่อ</th>
             <th class="text-center">ID</th>
             <th class="text-center">ยอดเงินคงเหลือ</th>
             <th class="text-center">จัดการ</th>
           </tr>
         </thead>
         <tbody>





          <?php

          foreach($data["result"] as $item) { //foreach element in $arr
            $userID = $item['balance_tks_userid'];
            $username= '';
            $curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => "https://api.line.me/v2/bot/group/Ccab41b434c5bffb33de6b56baa03f642/member/".$userID,
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 30,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "GET",
                      CURLOPT_HTTPHEADER => array(
                        "authorization: Bearer QyHSaarki7OaukcmDqWBZJD88fJb5N4evyOobmL7QyJOPpfV9YQz+gDgIvGXVXAEU6ouir3bOeDcpShjwTOJib4P6jWHYh31pVMM2CAwUeVFq5PVGR/AHd5Ze80zm5YFBcjYGRUDqMHIDs9qSaLzLQdB04t89/1O/w1cDnyilFU=",
                        "cache-control: no-cache",
                        "postman-token: 6dc09c6b-dd83-81ca-75ed-71ce43b5edd7"
                      ),
                    ));

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) {
                      echo "cURL Error #:" . $err;
                    } else {

                    $data = json_decode($response,true);
                    $username =  $data['displayName'];
                    }



                    ?>

                    <tr>
                      <td class="text-center"><?php echo $username; ?></td>
                      <td class="text-center"><?php echo $item['id']; ?></td>
                      <td class="text-center"><?php echo $item['balance_tks_balance']; ?></td>
                      <td class="text-center"><a href="fmanage.php?var=<?php echo $item['id']; ?>&var2=<?php echo $username; ?>&var3=<?php echo $item['balance_tks_balance'];?>" class="btn btn-primary" role="button">จัดการข้อมูล</a></td>
                    </tr>

               <?php
             }

            ?>
      </tbody>
      </table>
        </div>


</body>
</html>

<?php
?>

<script type="text/javascript">

    function validateForm() {
        var fname = document.forms["user_update"]["fname"].value;
        var lname = document.forms["user_update"]["lname"].value;
        var companyname = document.forms["user_update"]["companyname"].value;
        var branch = document.forms["user_update"]["branch"].value;
        var address1 = document.forms["user_update"]["address1"].value;
        var address2 = document.forms["user_update"]["address2"].value;
        var phone = document.forms["user_update"]["phone"].value;
        var i = 0;
        if (fname == "") {
            alert("โปรดกรอกชื่อจริง");

            return false;
        }
        if (lname == "") {
            alert("โปรดกรอกนามสกุล");

            return false;
        }
        if (companyname == "") {
            alert("โปรดกรอกชื่อบริษัท");

            return false;
        }
        if (branch == "") {
            alert("โปรดกรอกสาขา");

            return false;
        }
        if (address1 == "") {
            alert("โปรดกรอกที่อยู่ปัจจุบัน");

            return false;
        }
        if (address2 == "") {
            alert("โปรดกรอกที่อยู่ตามทะเบียนบ้าน");

            return false;
        }
        if (address2 == "") {
            alert("โปรอดกรอกเบอร์โทรศัพท์");

            return false;
        }
        if (!phone.match(/^[0-9]*$/)) {
            alert("เบอร์โทรศัพท์ไม่ถูกต้อง");
            return false;
        }
    }



    function clicked() {
        if (confirm('คุณต้องการ Reset ข้อมูลกลับไปยังค่าเริ่มต้น ?')) {
            location.reload();
        } else {
            return false;
        }
    }

    function goBack() {
        if (confirm('091-123456789')) {
          location.reload();
        } else {
            return false;
        }
    }


    </script>
