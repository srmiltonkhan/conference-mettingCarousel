<?php include('admin/db_config.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <title>Infinite Brand logo Slider</title>
      <link rel='stylesheet' href='admin/vendor/bootstrap/css/bootstrap.min.css'>
  <link rel="stylesheet" type="text/css" href="admin/css/slick.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
   <script src="admin/vendor/jquery/jquery.min.js"></script>
 <script src="admin/js/slick.min.js"></script>
 <script type="text/javascript">
    $(document).ready(function(){
      $('.logo-slider').slick({
          slidesToShow:2,
          slidesToScroll: 1,
          dots: true,
          autoplay: true,
          arrows: true,
          autoplaySpeed: 1000,
          infinite: true,
      });
    });
 </script>
  <style type="text/css">
/*    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      outline: 0;
    }
    body{
      font-family: Roboto, sans-serif;
      background: white;
    }*/
 
    .container{
      max-width: 2000px;
      margin: 0 auto;
    }
    /*h1{
      font-size: 30px;
      font-weight: 500;
      text-align: center;
      position: relative;
      margin-bottom: 60px;
    }
    h1:after{
      content: '';
      position: absolute;
      width: 100px;
      height: 4px;
      background-color: red;
      bottom: -20px; 
      left: 0;
      right: 0;
      margin: 0 auto;
    }*/
    .confimg{
      width: 100%;
      max-width: 250px;
      height: auto;
    }
    .logo-slider .item{
      background-color: #fff;
      box-shadow: 0 4px 5px #cacaca;
      border-radius: 8px;
      padding: 15px;
      border: 2px solid #111;
    }
    .logo-slider .slick-slide{
      margin: 15px;
    }
    .slick-dots li.slick-active button:before{
      color: #ff5722;
    }
    .slick-dots li button:before{
      font-size: 12px;
    }
    .slick-next:before,
    .slick-prev:before{
      color: #ff8159;
      font-size: 24px;
    }
    .item:hover{
      display: block;
      transition: all ease 0.3s;
      transform: scale(1.1);
      /*transform: scale(1.1) translateY(-5px);*/
    }
    .conference{
      display: flex;
    }
    .confimage{
      flex-grow: 1;
      width: 40%;
    }
    .confTitleDate{
      width: 60%;
    }

    .confTleDt{
      display: flex;
    }
    .conTle{
      flex-grow: 1;
      width: 100%;
    }
    .conDate{
      width: 35%;
    }
    .conDate p{
      background: darkgreen;
      color: white;
    }

  </style>
</head>
<body>
  <div class="container">
    <h1>RECENT CONFERENCES & MEETING</h1>
<div class="logo-slider">
<?php
    $query = "SELECT * FROM slidnewsgallery WHERE type = 'conferencs' and snstatus = 'active' ORDER BY snid ASC LIMIT 10"; 
    $stat = $pdo_conn->prepare($query);
    $stat->execute();
    $confrowCount = $stat->rowCount();
    $conferencs = '';
    echo $confrowCount;
            ?>

<?php       

    if($confrowCount > 0){
        foreach ($stat->fetchAll() as $row) {
          $conferencs .='
        <div class="item">
          <div class="conference">
              <div class="confimage">
                  <a href="#" target="_blank"><img class="confimg" src="admin/img/conmetting/'.$row['snfilename'].'" alt=""></a>
              </div>
              <div class="confTitleDate">
                <div class="confTleDt">
                    <div class="conTle">
                        <p><b>'.$row['title'].'</b></p>
                        <p>'.$row['title'].'<a href="#">Click</a></p>
                    </div>
                    <div class="conDate">
                        <p>'.$row['conferencedate'].'</p>
                    </div>                  
                </div>
               </div> 
          </div>
        </div>
          ';

        }
      }
        else{
          echo "no";
        }
        echo $conferencs;

          ?>





  </div>
</div>

</div>


</body>
</html>


<!--         <div class="item">
          <div class="conference">
              <div class="confimage">
                  <a href="#" target="_blank"><img class="confimg" src="admin/img/conmetting/'.$row['snfilename'].'" alt=""></a>
              </div>
              <div class="confTitleDate">
                <div class="confTleDt">
                    <div class="conTle">
                        <p><b>Conference and Meeting Titleeeting TitleeetingTitleeetingTitleeeting Title</b></p>
                        <p>ARMED FORCES MEDICAL RESEARCH JOURNEY <a href="#">Click</a></p>
                    </div>
                    <div class="conDate">
                        <p>29 May, 2021</p>
                    </div>                  
                </div>
               </div> 
          </div>
        </div> -->