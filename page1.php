<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        body {
           background-image: linear-gradient(red,yellow,blue);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
        q1 {
            color:greenyellow ;
            text-align: center;
            font-family: "B Titr";
            /* font-size: 20px; */
        }
        q2 {
            color:yellow ;
            text-align: right;
            font-family: "B Titr";
            /* font-size: 20px; */
        }
        q3 {
            color:black ;
            text-align:center;
            font-family: "B Titr";
            font-size: 25px;

        }
        q4 {
            color:red ;
            text-align:center;
            font-family: "B Titr";
            font-size: 35px;

        }
    </style>
</head>
<body> 
     
        <div  class="container-fluid "  dir="rtl">
            <nav class="navbar navbar-expand-sm  navbar-primary" style="background-color:gray">
                <ul class="navbar-nav">
                  <a class="nav-link text-align:right mr-4 " data-toggle="modal" href="#myModal1"><h4>عضویت</h4></a>    
                </ul>
            </nav>
              <?php if (isset($_GET['error'])): ?>
                <h5 style="text-align:right;" class="my-2 alert alert-danger" >
                  <?php echo $_GET['error']; ?>
                </h2>
              <?php endif; ?>
              <?php if (isset($_GET['info'])): ?>
                <h5 style="text-align:right;" class="my-2 alert alert-success" >
                  <?php echo $_GET['info']; ?>
                </h2>
              <?php endif; ?>
          </div>

    <div class="modal fade" id="myModal1" dir="rtl">
     <div class="modal-dialog" dir="rtl">
       <div class="modal-content" dir="rtl">
      
          <div class="modal-header">
            <h4 class="modal-title">عضویت</h4>
            <button type="button" class="close" data-dismiss="modal"></button>
         </div>
        
         <div class="modal-body">
           <div class="col-10 p-5">
             <form method="post" action="post.php">
               <label for="a1" ><q3> نام کاربری</q3> </label>
               <input class="form-control "   type="text" name="form[user]" placeholder="نام کاربری"  id="a3"></br>
               <label for="a2"><q3>گذر واژه</q3> </label>
               <input   class="form-control" type="password" name="form[pass]"placeholder="کلمه عبور" id="a4">
               </br></br>
               <select class="form-control" name="form[access]">
               <option value="1" >professor</option>
               <option value="2" >student</option>
             </select><br><br>
        
             </div>
           </div>

        
         <div class="modal-footer ">
             <button type="submit" class="btn btn-primary mr-5" >ثبت</button>
             <button type="button" class="btn btn-primary mr-5" data-dismiss="modal">بستن</button>
         </div>
            </form>
        </div>  
      </div>
    </div> 
   </br>
   </br>
   <div  class="contianer text-center mt-5">
     <div class="row">
       <form style="background-color: rgb(255, 255, 255); border-radius: 50px; border:dimgray 3px solid"  class=" text-right  rounded p-4 mx-auto"  method="post" action="login.php">

         <label for="a1" ><q3> نام کاربری</q3> </label>
         <input class="form-control "   type="text" name="form[user]" placeholder="نام کاربری"  id="a1"></br>
         <label for="a2"><q3>گذر واژه</q3> </label>
         <input   class="form-control" type="password" name="form[pass]"placeholder="کلمه عبور" id="a2"></br>
        
            
         <input class=" btn-lg btn-outline-primary col-10 mr-4 " type="submit" value="ورود" >
         </br>
         </br>
         <a href="#myModal" class="mr-5 text-danger font-weight-bolder" data-toggle="modal" onclick="alert">آیا رمز خود را فراموش کرده اید ؟ </a>
        </form>
       </div>
    </div>




      
   <div class="modal fade" id="myModal">
     <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">توجه</h4>
          <button type="button" class="close" data-dismiss="modal"></button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          درصورت فراموش کردن رمز عبور خود از واحد مربوطه پرسجو کنید .
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">بستن</button>
        </div>
        
      </div>
    </div>
  
  


   
    <div>
     <div>
      <div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
        </div>
      </div>
    </div>


    <div  class="container mt-5"  dir="rtl">
       <div  class="row  ">


      </div>
    </div>
  </body>
</html>
